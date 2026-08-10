<?php
/**
 * Admin authentication helpers (session + CSRF + require login).
 */
require_once dirname(__DIR__, 2) . '/config.php';
require_once dirname(__DIR__, 2) . '/includes/db.php';
require_once __DIR__ . '/helpers.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Whether the current session is an authenticated admin.
 */
function admin_is_logged_in(): bool
{
    return !empty($_SESSION['admin_id']) && !empty($_SESSION['admin_username']);
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
 * Attempt login against admin_users table.
 * Returns true on success; false on failure.
 */
function admin_attempt_login(string $username, string $password): bool
{
    $username = trim($username);
    if ($username === '' || $password === '') {
        return false;
    }

    $stmt = db()->prepare('SELECT id, username, password_hash FROM admin_users WHERE username = :username LIMIT 1');
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        return false;
    }

    session_regenerate_id(true);
    $_SESSION['admin_id']       = (int) $user['id'];
    $_SESSION['admin_username'] = $user['username'];
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
