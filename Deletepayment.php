<?php
include "../connect.php";
mysql_query("Delete from payment where Pay_id=".$_REQUEST["t1"]."");
echo "<script>window.location='payment.php'</script>";
?>
