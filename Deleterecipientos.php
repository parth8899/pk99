<?php
include "../connect.php";
mysql_query("Delete from receipientos where Recipient_id=".$_REQUEST["t1"]."");
echo "<script>window.location='receipientos.php'</script>";
?>
