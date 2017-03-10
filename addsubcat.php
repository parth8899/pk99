<?php
session_start();
include "../connect.php";
include "header.php";
if(isset($_REQUEST["submit"]))
{
	mysql_query("insert into subcategory values (null, '". $_REQUEST["txtcatid"]."','".$_REQUEST["subcatnm"]."')");
	echo "<script>window.location='subcategory.php'</script>";
}
?>
<table>
<form method = post>
<tr>
	<td> Select Category Name :- </td>
	<td><select name = txtcatid>
	<?php
		$rs = mysql_query("select * from category");
		while($ar = mysql_fetch_array($rs))
		{
			echo "<option value =". $ar["C_id"].">". $ar["C_name"]."</option>";
		}
	?>
	</select>
	
	
	 </td>
</tr>
<tr>
	<td> Enter Sub category name </td>
	<td> <input type = text name = subcatnm />
	</td>
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

