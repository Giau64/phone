<?php
	require('requirelogin.php');
	include_once("connection.php");
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$result = mysqli_query($conn, "SELECT * FROM category WHERE Cat_ID='$id'");
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$cat_id = $row['Cat_ID'];
			$cat_name = $row['Cat_Name'];
			$cat_des = $row['Description'];
?>

<div class="container">
	<h2>UPDATE CATEGORY</h2>
	<form id="form1" name="form1" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
		<label>Category ID:</label>
		<input type="text" class="form-control" id="txtID" name="txtID" readonly value='<?php echo $cat_id ;?>'>
		</div>
		<div class="form-group">
		<label>Category Name:</label>
		<input type="text" class="form-control" id="txtName" name="txtName" value='<?php echo $cat_name;?>'>
		</div>
		<div class="form-group">
		<label>Description:</label>
		<input type="text" class="form-control" id="txtDes" name="txtDes" value='<?php echo $cat_des;?>'>
		</div>
		<button type="submit" class="btn btn-primary" name="btnUpdate" value="Update">Update</button>
		<button type="submit" class="btn btn-danger" name="btnCancel" onclick="window.location='category.php'">Cancel</button>
		
	</form>
	</br>
	</div>
	<?php
	include_once("connection.php");
	if(isset($_POST["btnUpdate"]))	
	{
		$id = $_POST["txtID"];
		$name = $_POST["txtName"];
		$description = $_POST["txtDes"];
		$err="";
		if($name=="")
		{
			$err.="<li>Enter category name, please</li>";
		}
		if($err!="")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
			$sq="SELECT * FROM category WHERE Cat_ID != '$id' and Cat_Name='$name'";
			$result = mysqli_query($conn,$sq);
			if(mysqli_num_rows($result)==0)
			{
				mysqli_query($conn, "UPDATE category SET Cat_Name = '$name', Description='$description' WHERE Cat_ID='$id'");
				echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=category"/>';
			}
		}
	}
?>
<?php
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=category"/>';
}

?>