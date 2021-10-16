<?php
	require('requirelogin.php');
	include_once("connection.php");
	function bind_Category_List($conn) {
		$sqlstring = "SELECT Cat_ID, Cat_Name from category";
		$result = mysqli_query($conn, $sqlstring);
		echo "<SELECT name='CategoryList' class='form-control'>
			<option value='0'>Choosecategory</option>";
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo "<option value='".$row['Cat_ID']."'>".$row['Cat_Name']."</option>";
			}
		echo "</select>";	
		}
		if(isset($_POST["btnAdd"]))
		{
			$id = $_POST["txtID"];
			$id = htmlspecialchars(mysqli_real_escape_string($conn, $id));
			$proname = $_POST['txtName'];
			$proname = htmlspecialchars(mysqli_real_escape_string($conn, $proname));
			$qty = $_POST['txtQty'];
			$qty = htmlspecialchars(mysqli_real_escape_string($conn, $qty));
			$price = $_POST['txtPrice'];
			$price = htmlspecialchars(mysqli_real_escape_string($conn, $price));
			$des = $_POST['txtDescription'];
			$des = htmlspecialchars(mysqli_real_escape_string($conn, $des));
			$category = $_POST['CategoryList'];
			$category = htmlspecialchars(mysqli_real_escape_string($conn, $category));
			$pic = $_FILES['txtImage'];
			$err="";

			if(trim($id)=="")
			{
				$err .="<li>Enter product ID, please</li>";
			}
			if(trim($proname)=="")
			{
				$err .="<li>Enter product name, please</li>";
			}
			if($category =="0")
			{
				$err .="<li>Choose product category, please</li>";
			}
			if(!is_numeric($qty))
			{
				$err .="<li>Product quantity must be number</li>";
			}
			if(!is_numeric($price)){
				$err .="<li>Product price must be number</li>";
			}
			if($err !="")
			{
				echo "<ul>$err</ul>";
			}
			else
			{
				if($pic['type']=="image/jpg" || $pic['type']=="image/jpeg" || $pic['type']=="image/png"|| $pic['type']=="image/gif")
				{
					if ($pic['size'] <= 614400)
					{
						$sq = "SELECT * FROM product WHERE Pro_ID='$id' OR Pro_Name='$proname'";
						$result = mysqli_query($conn, $sq);
						
						if(mysqli_num_rows($result)==0)
						{
							copy($pic['tmp_name'], "product_image/".$pic['name']);
							$filePic = $pic['name'];
							$sqlstring = "INSERT INTO product(Pro_ID, Pro_Name, Qty, Price, Description, Cat_ID, `Image`)
							VALUES('$id', '$proname', $qty, $price, '$des', '$category', '$filePic')";
							mysqli_query($conn, $sqlstring);
							echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=product"/>';
						}
						else
						{
							echo "<li>Duplicate product ID</li>";
						}

					}
					else
					{
						echo "Size of the image too big";
					}

				}
				else{
					echo "Image format is not correct";
				}
			}
	}
?>
<div class="container">
  <h2>ADD PRODUCT</h2>
  <form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
    <div class="form-group">
      <label>Product ID:</label>
      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Enter product ID" value="" />
    </div>
    <div class="form-group">
      <label>Product name:</label>
      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Enter product name" value="" />
    </div>
    <div class="form-group">
      <label>Quantity:</label>
      <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Enter quantity">
    </div>
    <div class="form-group">
      <label>Price:</label>
      <input type="text" name="txtPrice" id="txtPrice" id="txtFullname" class="form-control" id="" placeholder="Enter price">
    </div>
    <div class="form-group">
      <label>Description:</label>
      <input type="text" name="txtDescription" class="form-control" id="" placeholder="Enter description">
	</div>
    <div class="form-group">
      <label>Product category:</label>
        <?php bind_Category_List($conn); ?>
    </div>
    <div class="form-group">
      <label>Image:</label>
      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
    </div>
    <button type="submit" class="btn btn-primary"  name="btnAdd" id="btnAdd">Submit</button>
    <button type="button" class="btn btn-danger" name="" id="" onclick="window.location='index1.php?page=product'">Cancel</button>
  </form>
</div>