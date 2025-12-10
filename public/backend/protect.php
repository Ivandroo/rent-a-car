<?php
// Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If user is not authenticated, redirect to the sign-in page.
// Use a relative location that resolves to the project's signin (works from nested folders).
if (!isset($_SESSION['id'])) {
    header('Location: ../../signin.php');
    exit;
}
?>