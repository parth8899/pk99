<?php
include "../connect.php";
include "header.php";
if(isset($_REQUEST["submit"]))
{
	mysql_query("update subcategory set S_name= '". $_REQUEST["txtcat"]."' where S_id = ". $_REQUEST["txtcid"]."");
	echo "<script>window.location = 'subcategory.php'</script>";
}
$rs  = mysql_query("select * from subcategory where S_id = ".$_REQUEST["t1"]."");
$ar = mysql_fetch_array($rs);
?>
<form>
<table>
<tr>
<td> Sub category name 
<td> <input type = text name = txtcat value = <?php echo $ar["S_name"]; ?> >
</tr>
<input type = hidden name = txtcid value = <?php echo $ar["S_id"]; ?>  >
<tr><Td>
<input type = submit value = submit name = submit />
<td><input type = reset value = reset />
</tr></table>