<?php
// tchof kan l cookie kayn tna7iha tegleb lwa9t ta3ha expire
if (isset($_COOKIE['user_id'])) {
    unset($_COOKIE['user_id']);
    setcookie('user_id', '', time() - 3600, '/');
}

if (isset($_COOKIE['auth'])) {
    unset($_COOKIE['auth']);
    setcookie('auth', '', time() - 3600, '/');
}

if (isset($_COOKIE['role'])) {
    unset($_COOKIE['role']);
    setcookie('role', '', time() - 3600, '/');
}

// traj3ek to the login page
header("Location: login.php"); 
exit;
?>
