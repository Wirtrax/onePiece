<?php
session_start();
unset($_SESSION['auth']);
unset($_SESSION['status']);
header('Location: ../../index.php');
?>