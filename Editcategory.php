<?php
include "../connect.php";
include "header.php";
if(isset($_REQUEST["submit"]))
{
	mysql_query("update category set C_name= '". $_REQUEST["txtcat"]."' where C_id = ". $_REQUEST["txtcid"]."");
	echo "<script>window.location = 'category.php'</script>";
}
$rs  = mysql_query("select * from category where C_id = ".$_REQUEST["t1"]."");
$ar = mysql_fetch_array($rs);
?>
<form>
<table>
<tr>
<td> Category name 
<td> <input type = text name = txtcat value = <?php echo $ar["C_name"]; ?> >
</tr>
<input type = hidden name = txtcid value = <?php echo $ar["C_id"]; ?>  >
<tr><Td>
<input type = submit value = submit name = submit />
<td><input type = reset value = reset />
</tr></table>