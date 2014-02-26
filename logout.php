<?php
session_start();
echo session_id();
session_destroy();
echo "<script language='javascript' type='text/javascript'>window.location.href='login.php'</script>";
?>