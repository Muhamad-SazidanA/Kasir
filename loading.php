<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>alert('Reset Berhasil'); window.location.href = 'index.php';</script>";
exit;
?>