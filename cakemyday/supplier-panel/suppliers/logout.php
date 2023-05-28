<?php 

session_start();
session_unset();
session_destroy();
echo "<script> window.location.href='http://localhost/cakemyday/supplier-panel/suppliers/login-suppliers.php'; </script>";
?>