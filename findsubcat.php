<?php 
include "../connect.php";
$cid = intval($_GET['Cid']);
$query  = "SELECT S_id,C_id,S_name FROM subcategory WHERE C_id='$cid'";
$result = mysql_query($query);
?>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['S_id']?> > <?php echo $row['S_name']?> </option>
<?php } 

?>
