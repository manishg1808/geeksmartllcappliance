<?php
/**
 * Admin authentication helpers (session + CSRF + require login).
 * Credentials are read from .env — never hardcoded or stored in the database.
 */
require_once dirname(__DIR__, 2) . '/config.php';
require_once dirname(__DIR__, 2) . '/includes/db.php';
require_once __DIR__ . '/helpers.php';

const ADMIN_LOGIN_MAX_ATTEMPTS = 5;
const ADMIN_LOGIN_LOCKOUT_SECONDS = 900;

if (session_status() === PHP_SESSION_NONE) {
    admin_start_session();
}

/**
 * Start a hardened admin session.
 */
function admin_start_session(): void
{
    $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');

    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'domain'   => '',
        'secure'   => $secure,
        'httponly' => true,
        'samesite' => 'Strict',
    ]);

    session_start();
}

/**
 * Whether the current session is an authenticated admin.
 */
function admin_is_logged_in(): bool
{
    return !empty($_SESSION['admin_authenticated'])
        && !empty($_SESSION['admin_username'])
        && hash_equals(ADMIN_USERNAME, (string) $_SESSION['admin_username']);
}

/**
 * Redirect unauthenticated users to the login page.
 */
function admin_require_auth(): void
{
    if (!admin_is_logged_in()) {
        header('Location: ' . SITE_URL . '/admin/login.php');
        exit;
    }
}

/**
 * Get or create a CSRF token for the login form.
 */
function admin_csrf_token(): string
{
    if (empty($_SESSION['admin_csrf'])) {
        $_SESSION['admin_csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['admin_csrf'];
}

/**
 * Validate a submitted CSRF token (timing-safe).
 */
function admin_csrf_validate(?string $token): bool
{
    if (empty($token) || empty($_SESSION['admin_csrf'])) {
        return false;
    }
    return hash_equals($_SESSION['admin_csrf'], $token);
}

/**
 * Whether login is temporarily locked after too many failures.
 */
function admin_login_is_locked(): bool
{
    $until = (int) ($_SESSION['admin_login_locked_until'] ?? 0);
    return $until > time();
}

/**
 * Seconds remaining on a login lockout.
 */
function admin_login_lockout_remaining(): int
{
    if (!admin_login_is_locked()) {
        return 0;
    }
    return max(0, (int) $_SESSION['admin_login_locked_until'] - time());
}

/**
 * Record a failed login attempt and lock if threshold is reached.
 */
function admin_register_failed_login(): void
{
    $_SESSION['admin_login_attempts'] = (int) ($_SESSION['admin_login_attempts'] ?? 0) + 1;

    if ($_SESSION['admin_login_attempts'] >= ADMIN_LOGIN_MAX_ATTEMPTS) {
        $_SESSION['admin_login_locked_until'] = time() + ADMIN_LOGIN_LOCKOUT_SECONDS;
        $_SESSION['admin_login_attempts'] = 0;
    }
}

/**
 * Clear failed login counters after a successful sign-in.
 */
function admin_clear_failed_logins(): void
{
    unset($_SESSION['admin_login_attempts'], $_SESSION['admin_login_locked_until']);
}

/**
 * Attempt login using credentials from .env.
 * Returns true on success; false on failure.
 */
function admin_attempt_login(string $username, string $password): bool
{
    if (admin_login_is_locked()) {
        return false;
    }

    $expectedUser = ADMIN_USERNAME;
    $expectedPass = ADMIN_PASSWORD;

    if ($expectedUser === '' || $expectedPass === '') {
        return false;
    }

    $username = trim($username);
    if ($username === '' || $password === '') {
        admin_register_failed_login();
        return false;
    }

    $userOk = hash_equals($expectedUser, $username);
    $passOk = hash_equals($expectedPass, $password);

    if (!$userOk || !$passOk) {
        admin_register_failed_login();
        return false;
    }

    admin_clear_failed_logins();
    session_regenerate_id(true);

    $_SESSION['admin_authenticated'] = true;
    $_SESSION['admin_username']     = $expectedUser;
    unset($_SESSION['admin_csrf']);

    return true;
}

/**
 * Destroy admin session and redirect to login.
 */
function admin_logout(): void
{
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
    session_destroy();
}
