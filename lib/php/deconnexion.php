<?php
session_start();//On ouvre la session
$_SESSION= array();
session_destroy();//On détruit la session
header('location: index.php');//On se redirige vers l'index
?>