<?php

session_start();
if(isset($_SESSION['is_login'])) {
  header("Location: ./journal/index.php");
} else {
  header("Location: ./auth/login.php");
}