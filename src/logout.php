<?php
// logout: destroy session and jump to start page
    session_start();
    session_destroy();
    echo '<script>window.location.href = "index.php";</script>';
?>