<?php
session_start();
session_destroy();
echo "<script>alert('logged out!');
    location.href='../index.html';</script>";
?>
