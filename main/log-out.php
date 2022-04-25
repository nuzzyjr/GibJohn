<?php

session_start();

//destroying cookie and session then returning to index.php
unset($_COOKIE["remember_me"]);
setcookie("remember_me", "", time() - 3600);
session_destroy();

header("Location: index.php");

?>
