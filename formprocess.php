<?php
require_once("require/connection.php");

extract($_REQUEST);

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "showform") {



?>
<center>
	
<fieldset style="background-color: red;color: white;border-style: dashed; border-width: thick; border-color: darkblue;">
	<legend style="color: blue"> <h1>ADD POST</h1></legend>
<table>
<tr>	
<th>
ENTER POST TITLE :
</th>	

<td>
<input type="text"  id="posttitle"  placeholder="ENTER TITLE">
</td>
</tr>
<tr>
<th>ENTER POST SUMMARY:</th>	
<td>	
<textarea id="postsum" placeholder="ENTER SUMMARY"></textarea>
</td>
</tr>
<tr>
<th>ENTER POST DESCRIPTION:</th>	
<td>	
<textarea id="postdes" placeholder="ENTER DESCRIPTION"></textarea>
</td>
</tr>
<tr>
	<td>
		<button onclick="addpost()"   style="background-color:green;color:white">ADD POST</button> &nbsp&nbsp&nbsp&nbsp<button onclick="cancel()"  style="background-color:yellow;color:red">CANCEL</button>
	</td>


</tr>


</table>
</fieldset>

</center>


<?php


?>   



<fieldset style="height: 70px;background-color: red;color: white">
	<legend style="color: black" ><b>SEARCH HERE</b></legend>
SEARCH :    
<input type="text" id="search"  name="search" placeholder="SEARCH BY TITLE" style="width: 90%;height: 30px">
<button  onclick="searchdata()"style="background-color:green;color:white"> SEARCH</button>
</fieldset>

<?php


}



elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "addpost") {

$query = "INSERT INTO posts (postname,post_summ,post_desc)

VALUES('$posttitles','$postsumm','$postdesc'); ";

	$result = mysqli_query($connection,$query);

	if ($result) {
		echo "<h1 style='color:green' > POST ADDED SUCCESSFULLY</h1>";
	}


	else{

		echo "<h1 style='color:red' >POST ADD FAILED</h1>";
	}




}


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "showdata") {



$query2 = "SELECT * FROM posts ORDER BY post_id DESC;;";

	$result2 = mysqli_query($connection,$query2);


	if ($result2->num_rows>0){
$count=0;

?>
<br>
<br>
<center>
<table border="2px" cellpadding="10px" width="70%" style="background-color:red;color: white">
<tr><th>SR.NO</th>
	<th>POST NAME</th>
    <th>POST SUMMARY</th>
    <th>POST DESCRIPTION</th>
    <th>ACTION</th>

</tr>

<?php



		while($posts=mysqli_fetch_assoc($result2)){
?>
<tr>
	<td>
		<?php echo ++$count; ?>

	</td>
<td>
		<?php echo $posts['postname'];  ?>

	</td>

<td>
		<?php echo $posts['post_summ'];  ?>

	</td>

<td>
		<?php echo  $posts['post_desc'];  ?>

	</td>

   <td >
		<button  onclick="edit(<?php echo $posts['post_id']; ?>)" style="background-color:blue;color:white" >EDIT</button>
	
<button onclick="del(<?php echo $posts['post_id']; ?>)" style="background-color:yellow;color:red">DELETE</button>


	</td>



</tr>


<?php

		}

?>
</center>
</table>

<?php

	}




}



elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "deletedata") {


$query = "DELETE FROM posts WHERE post_id='$pid';";

	$result = mysqli_query($connection,$query);

	if ($result) {
		echo "<h1 style='color:green' > RECORD DELETED  SUCCESSFULLY</h1>";
	}


	else{

		echo "<h1 style='color:red' >RECORD DELETED  FAILED...!</h1>";
	}



}




elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "editdata") {

$query ="SELECT * FROM  posts WHERE post_id='$peid';";

$result = mysqli_query($connection,$query);
if ($result->num_rows>0){
$row=mysqli_fetch_assoc($result);

?>
<center>
	
<fieldset style="background-color: red;color:white">
	<legend style="color:blue"><h1> EDIT POST</h1></legend>
<table>
<tr>	
<th>
ENTER POST TITLE :
</th>	

<td>
<input type="text"  id="posttitleu" value="<?php  echo $row['postname'];   ?>"  placeholder="ENTER TITLE">
</td>
</tr>
<tr>
<th>ENTER POST SUMMARY:</th>	
<td>	
<textarea id="postsumu" placeholder="ENTER SUMMARY"><?php  echo $row['post_summ'];?>  </textarea>
</td>
</tr>
<tr>
<th>ENTER POST DESCRIPTION:</th>	
<td>	
<textarea id="postdesu" placeholder="ENTER DESCRIPTION"> <?php  echo $row['post_desc'];?>  </textarea>
</td>
</tr>
<tr>
	<td>
		<button onclick="update(<?php echo $row['post_id']; ?>)" style="background-color:green;color:white">UPDATE POST</button> &nbsp&nbsp&nbsp&nbsp<button onclick="cancel2()"  style="background-color:yellow;color:red">CANCEL</button>
	</td>


</tr>


</table>
</fieldset>

</center>


<?php

}

}


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "updatedata") {


$query = "UPDATE posts SET postname='$psname',
 post_summ='$pssum',
 post_desc='$psdesc'
WHERE post_id='$puid'; ";

	$result = mysqli_query($connection,$query);

	if ($result) {
		echo "<h1 style='color:green' > DATA UPDATED SUCCESSFULLY</h1>";
	}


	else{

		echo "<h1 style='color:red' > DATA UPDATED FAILED</h1>";
	}





}


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "searchdata") {
 
$query ="SELECT * FROM  posts WHERE postname='$sdata';";

$result = mysqli_query($connection,$query);

if ($result->num_rows>0) {
	


$count=0;

?>
<br>
<br>
<center>
<button id="terminate" style="float: center;background-color: red;color: yellow" onclick="X()">X</button>	
<table border="2px" cellpadding="10px" width="70%" style="background-color:blue;color: silver">
<tr><th>SR.NO</th>
	<th>POST NAME</th>
    <th>POST SUMMARY</th>
    <th>POST DESCRIPTION</th>
    <th>ACTION</th>

</tr>

<?php



		while($searchdata=mysqli_fetch_assoc($result)){
?>
<tr>
	<td>
		<?php echo ++$count; ?>

	</td>
<td>
		<?php echo $searchdata['postname'];  ?>

	</td>

<td>
		<?php echo $searchdata['post_summ'];  ?>

	</td>

<td>
		<?php echo  $searchdata['post_desc'];  ?>

	</td>

   <td >
		<button  onclick="edit(<?php echo $searchdata['post_id']; ?>)" style="background-color: yellow;color: red">EDIT</button>
	
<button onclick="del(<?php echo $searchdata['post_id']; ?>)" style="background-color: red;color: white" >DELETE</button>


	</td>



</tr>


<?php

		}

?>
</center>
</table>

<?php



}
else{

	echo "<h1 style='color:red;'>NO RECORD FOUND WITH THIS NAME</h1>";
}



}


?>