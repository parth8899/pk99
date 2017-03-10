<?php
session_start();
include "../connect.php";
include "header.php";
if(isset($_REQUEST["submit"]))
{
	mysql_query("insert into category values (null, '". $_REQUEST["txtcat"]."')");
	echo "<script>window.location='category.php'</script>";
}
?>
<table>
<form method = post>
<tr>
	<td> Enter Category Name :- </td>
	<td><input type = text name = txtcat /> </td>
</tr>
<tr>
	<td><input type = submit  value = submit name= submit /></td>
	<td><input type = reset value = reset /></td>
</tr>
</form>
</table>
<?php
include "footer.php";
?>

