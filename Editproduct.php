<?php
session_start();
include "../connect.php";
include "header.php";
?>
<script>
function getSubcat(Cid) { 

    var strURL="findsubcat.php?Cid="+Cid;
  req=new XMLHttpRequest();
  if (req) {
   req.onreadystatechange = function() {
    if (req.readyState == 4) {

     if (req.status == 200) {

      document.getElementById('scat').innerHTML=req.responseText;
    
     } else {
      alert("Problem while using XMLHTTP:\n" + req.statusText);
     }
    }    
   } 
   req.open("GET", strURL, true);
   req.send(null);
  }  
 }
</script>
<?php
if(isset($_REQUEST["submit"]))
{
mysql_query("update products set C_id = ". $_REQUEST["cat"].", S_id = ". $_REQUEST["scat"].", P_name = '". $_REQUEST["pname"]."' , Company = '". $_REQUEST["company"]. "' ,Features = '".$_REQUEST["features"]."' , Price = '". $_REQUEST["price"]."' where P_id = '". $_REQUEST["t1"]."'");
echo mysql_error();
echo "<script>window.location = 'products.php'</script>";
}
$rs = mysql_query("select * from products where P_id = ". $_REQUEST["t1"]."");
$ar = mysql_fetch_array($rs);
echo mysql_error();
?>
<form method = post>
<input type = hidden name="t1" value = "<?php echo $ar["P_id"]; ?>"  />
<table>
<tr>
<td> Select The Category  </td>
<td>
	<select name = cat onChange="getSubcat(this.value)">
	<option>---SELECT---</option>

	<?php
	$rs1 = mysql_query("select * from category");
	while($ar1 = mysql_fetch_array($rs1))
	{
		echo "<option value = ". $ar1["C_id"].">". $ar1["C_name"]."</option>";
	}
	?>
	</select>
</td>
</tr>
<tr>
	<td> Select sub category  </td>
	<td> <select name = scat id=scat>
	</select>
	</td>
	</tr>
<tr>
	<td>Enter Product name </td>
	<td> <input type = text name = pname value = "<?php echo $ar["P_name"];?>" /></td>
</tr>
<tr>
	<td>Enter Company name </td>
	<td> <input type = text name = company value = "<?php echo $ar["Company"];?>" /></td>
</tr>
<tr>
	<td>Enter Features </td>
	<td> <textarea name = features rows = 5 cols = 60><?php echo $ar["Features"]; ?></textarea>
</td>
</tr>
<tr>
	<td> Enter Price </td>
	<td> <input type = text name = price value= "<?php echo $ar["Price"];?>"  /> </td>
 </tr>
 <tr>
 	<td> Image </td>
	<td> <input type = file name = image value="<?php echo $ar["Image"];?>" /> </td>
</tr>
<tr>
<td> <input type = submit value=submit name=submit /> </td>
<td> <input type = reset value = reset /> </td>
</tr>
</table>
<?php
include "footer.php";
?>
		