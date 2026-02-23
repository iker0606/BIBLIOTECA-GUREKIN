<?php
session_start();
session_destroy();
header("Location: ./acceder/acceder.php");
exit();
?>