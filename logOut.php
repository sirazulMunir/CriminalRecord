<?php
session_start();
unset($_SESSION['authority_email']);
session_destroy();

header("Location: index.php");
exit;
?>
