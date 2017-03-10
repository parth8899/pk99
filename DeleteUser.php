<?php
include "../connect.php";
mysql_query("Delete from users where Userid=".$_REQUEST["t1"]."");
echo "<script>window.location='user.php'</script>";
?>
