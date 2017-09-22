<?php
session_start();
session_destroy();
$origin = $_SERVER["HTTP_REFERER"];
header("location:$origin");
exit();
?>