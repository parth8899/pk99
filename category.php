<?php
include "header.php";
include "../connect.php";
$rs = mysql_query("select * from category");
echo "<h1><a href=addcat.php class = myButton>New Category</a></h1>";
echo "<table width = 100% >";
echo "<tr><td> Category Id <td> Category Name <td> Delete <td> Edit </tr>";
while($ar= mysql_fetch_array($rs))
{
	echo "<tr><td>". $ar["C_id"];
	echo "<td>". $ar["C_name"];
	echo "<td><a class = myButton1  href = Deletecategory.php?t1=".$ar["C_id"]."> Delete </a>";
	echo "<td><a class = myButton1 href = Editcategory.php?t1=".$ar["C_id"].">Edit </a>";
	echo "</tr>";
}
echo "</table>";

include "footer.php";
?>