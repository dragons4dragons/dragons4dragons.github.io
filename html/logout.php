<?php
session_start();
setcookie("user", '', time() - 3600);
session_destroy();
session_abort();

header('Location:home');
exit;
?>