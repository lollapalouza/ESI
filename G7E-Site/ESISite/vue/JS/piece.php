<?php
session_start();
extract($_POST);
$_SESSION['piece'] = $id_sess;
?>