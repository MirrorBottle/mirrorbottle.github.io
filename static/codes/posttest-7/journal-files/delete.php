<?php
session_start();
include('../functions.php');

$file = find("journal_files", $_GET['id']);
$result = delete("journal_files", $_GET['id']);

if($file) {
  unlink("../storage/{$file['file']}");
}

header("location:./index.php?id={$file['journal_id']}");