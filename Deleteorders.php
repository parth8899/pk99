<?php
include "../connect.php";
mysql_query("Delete from orders where Order_id=".$_REQUEST["t1"]."");
echo "<script>window.location='orders.php'</script>";
?>
