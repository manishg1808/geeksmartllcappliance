<?php
/**
 * Admin login — premium simple auth screen.
 */
require_once __DIR__ . '/includes/auth.php';

if (admin_is_logged_in()) {
    header('Location: ' . SITE_URL . '/admin/leads.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token    = $_POST['csrf_token'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!admin_csrf_validate($token)) {
        $error = 'Invalid session token. Please try again.';
    } elseif (admin_attempt_login($username, $password)) {
        header('Location: ' . SITE_URL . '/admin/leads.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
        // Small delay to slow brute-force attempts
        usleep(300000);
    }
}

$csrf = admin_csrf_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
  <title>Admin Login | <?php echo htmlspecialchars(SITE_NAME); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>/admin/assets/admin.css">
</head>
<body class="login-body">
  <div class="login-wrap">
    <div class="login-card">
      <div class="login-brand">
        <span class="brand-mark">GS</span>
        <h1><?php echo htmlspecialchars(SITE_NAME); ?></h1>
        <p>Sign in to the admin panel</p>
      </div>

      <?php if ($error !== ''): ?>
        <div class="login-alert" role="alert"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>

      <form method="post" action="" class="login-form" autocomplete="off">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf); ?>">

        <label class="field">
          <span>Username</span>
          <input type="text" name="username" required autofocus
                 value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                 placeholder="Enter username">
        </label>

        <label class="field">
          <span>Password</span>
          <input type="password" name="password" required placeholder="Enter password">
        </label>

        <button type="submit" class="btn-login">Sign In</button>
      </form>

      <p class="login-foot">
        <a href="<?php echo SITE_URL; ?>/">&larr; Back to website</a>
      </p>
    </div>
  </div>
</body>
</html>
