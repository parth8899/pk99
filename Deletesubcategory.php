<?php
include "../connect.php";
mysql_query("Delete from subcategory where S_id=".$_REQUEST["t1"]."");
echo "<script>window.location='subcategory.php'</script>";
?>
