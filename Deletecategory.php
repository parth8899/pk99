<?php
include "../connect.php";
mysql_query("Delete from category where C_id=".$_REQUEST["t1"]."");
echo "<script>window.location='category.php'</script>";
?>
