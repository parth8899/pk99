<?php
include "../connect.php";
mysql_query("Delete from products where P_id=".$_REQUEST["t1"]."");
echo "<script>window.location='products.php'</script>";
?>
