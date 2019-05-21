<?php
session_start();
extract($_POST);
$_SESSION['capteurActionneur'] = $id_sess;
?>