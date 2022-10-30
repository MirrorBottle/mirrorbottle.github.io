<?php
session_start();
include('../functions.php');

$result = delete("journals", $_GET['id']);

header("location:index.php");