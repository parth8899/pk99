<?php
include "header.php";
include "../connect.php";
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
	mysql_query("insert into products values (null, '". $_REQUEST["cat"]."','". $_REQUEST["scat"]."','". $_REQUEST["pname"]."','". $_REQUEST["company"]."','". $_REQUEST["features"]."','". $_REQUEST["price"]."',' ')");
	echo mysql_error();
	$rs = mysql_query("select max(P_id) from products");
	$ar= mysql_fetch_array($rs);
$target_dir = "../imgs/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) 
{
	echo "Sorry";
}
$target_file  = "../imgs/".$ar[0].".".$imageFileType; 
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "file uploaded";
mysql_query("update products set Image = '". $ar[0].".".$imageFileType."' where P_id = ".$ar[0]."");
echo mysql_error();
echo "<script>window.location = 'products.php'</script>";
}
}

?>
<form method = post enctype="multipart/form-data">
<table>
<tr>
<td> Select The Category </td>
<td>
	<select name = cat onChange="getSubcat(this.value)">
	<option>---SELECT---</option>
	<?php
	$rs = mysql_query("select * from category");
	while($ar = mysql_fetch_array($rs))
	{
		echo "<option value = ". $ar["C_id"].">". $ar["C_name"];
	}
	?>
	</select>
</td>
</tr>
<tr>
	<td> Select sub category </td>
	<td> 
	 
       <select name="scat" id="scat">
        </select>
 </div>
	
	</td>
	</tr>
<tr>
	<td>Enter Product name </td>
	<td> <input type = text name = pname size="50" /></td>
</tr>
<tr>
	<td>Enter Company name </td>
	<td> <input type = text name = company size=50/></td>
</tr>
<tr>
	<td>Enter Features </td>
	<td> <textarea name = features rows = 5 cols = 60></textarea>
</td>
</tr>
<tr>
	<td> Enter Price </td>
	<td> <input type = text name = price /> </td>
 </tr>
 <tr>
 	<td> Image </td>
	<td> <input type = file name = image /> </td>
</tr>
<tr>
<td> <input type = submit value=submit name=submit /> </td>
<td> <input type = reset value = reset /> </td>
</tr>
</table>
<?php
include "footer.php";
?>
