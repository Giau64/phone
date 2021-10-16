<link rel="stylesheet" type="text/css" href="asm2.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
    require('requirelogin.php');
	include_once("connection.php");
	function bind_Category_List($conn, $selectedValue){
		$sqlstring ="SELECT Cat_ID, Cat_Name from category";
		$result = mysqli_query($conn, $sqlstring);
		echo "<select name='CategoryList' class='form-control'>
				<optiom calue='0'>Choose category</option>";
				while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					if($row['Cat_ID']==$selectedValue){
						echo "<option value='".$row['Cat_ID']."'select>".$row['Cat_Name']."</option>";
					}
					else {
						echo "<option value='".$row['Cat_ID']."'>".$row['Cat_Name']."</option>";
					}
				}
echo "</select>";
	}
?>



<?php
    include_once("connection.php");
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $sqlstring ="SELECT Pro_Name, Qty, Price, Description, Cat_ID, Image  FROM product where Pro_ID='$id'";

        $result=mysqli_query($conn, $sqlstring);
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);

        $proname=$row["Pro_Name"];
        $qty=$row['Qty'];
        $price=$row['Price'];
		$des=$row['Description'];
		$category=$row['Cat_ID'];
        $pic=$row['Image'];
    
?>


<?php
    if(isset($_POST["btnUpdate"]))
    {
        $id=$_POST["txtID"];
        $proname=$_POST["txtName"];
        $category=$_POST['CategoryList'];
		$price=$_POST['txtPrice'];
		$des=$_POST['txtDescription'];
        $qty=$_POST['txtQty'];
        $pic=$_FILES['txtImage'];

        $err="";
        if(trim($id)==""){
            $err .="<li>Enter product ID, please</li>";
        }
        if(trim($proname)==""){
            $err .="<li>Enter product name, please</li>";
        }
        if($category=="0"){
            $err .="<li>Choose product category, please</li>";
        }
        if(!is_numeric($qty))
        {
            $err .="<li>Product quantity must be number</li>";
        }
        if(!is_numeric($price)){
            $err .="<li>Product price must be number</li>";
        }
        if($err !=""){
            echo "<ul>$err</ul>";
        }
        else {
            if($pic['name']!="")
            {
                if($pic['type']=="image/jpg"||$pic['type']=="image/jpeg"||$pic['type']=="image/png"||$pic['type']=="image/gif"){
                    if($pic['size']<=700000)
                    {
                        $sq="SELECT * FROM product WHERE Pro_ID !='$id' and Pro_Name='$proname'";
                        $result = mysqli_query($conn,$sq);
                        if(mysqli_num_rows($result)==0)
                        {
                            copy($pic['tmp_name'],"product_image/".$pic['name']);
                            $filePic=$pic['name'];

                            $sqlstring="UPDATE product SET Pro_Name='$proname', Qty=$qty, Price=$price, 
							Description='$des', Cat_ID = '$category',  Image='$filePic' WHERE Pro_ID='$id'";
                            mysqli_query($conn,$sqlstring);
                            echo '<meta http-equiv="refresh" content="0; URL=index1.php?page=product"/>';
                        }
                        else {
                            echo "<li>Duplicate product Name</li>";
                        }
                    }
                    else {
                        echo "Size of image too big";
                    }
                }else{
                    echo "Image format is not correct";
                }
            }
            else {
                $sq="SELECT * FROM product WHERE Pro_ID !='$id' and Pro_Name='$proname'";
                $result=mysqli_query($conn,$sq);
                if(mysqli_num_rows($result)==0)
                {
                    $sqlstring="UPDATE product SET Pro_Name='$proname', Qty=$qty, Price=$price, 
					Description='$des', Cat_ID = '$category' WHERE Pro_ID='$id'";
                    mysqli_query($conn,$sqlstring);
                    echo '<meta http-equiv="refresh" content="0; URL=index1.php?page=product"/>';
                }
            }
        }
    }
?>
<div class="container">
  <h2>UPDATE PRODUCT</h2>
  <form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
    <div class="form-group">
      <label>Product ID:</label>
      <input type="text" name="txtID" id="txtID" class="form-control" readonly value='<?php echo $id;?>' />
    </div>
    <div class="form-group">
      <label>Product name:</label>
      <input type="text" name="txtName" id="txtName" class="form-control" value='<?php echo $proname;?>'/>
    </div>
    <div class="form-group">
      <label>Quantity:</label>
      <input type="number" name="txtQty" id="txtQty" class="form-control" value='<?php echo $qty;?>'>
    </div>
    <div class="form-group">
      <label>Price:</label>
      <input type="text" name="txtPrice" id="txtPrice" class="form-control" value='<?php echo $price;?>'>
    </div>
    <div class="form-group">
      <label>Description:</label>
      <input type="text" name="txtDescription" class="form-control" value='<?php echo $des;?>'>
	</div>
    <div class="form-group">
      <label>Product category:</label>
        <?php bind_Category_List($conn, $category); ?>
    </div>
    <div class="form-group">
      <label>Image:</label>
      <img src='product_image/<?php echo $pic; ?>' border ='0' width="50" height="50" />
      <input type="file" name="txtImage" id="txtImage" class="form-control" value='<?php echo $pic;?>'/>
    </div>
    <button type="submit" class="btn btn-primary"  name="btnUpdate" id="btnUpdate">Submit</button>
    <button type="button" class="btn btn-danger" name="btnCancel" onclick="window.location='index1.php?page=product'">Cancel</button>
  </form>
</div>
<?php	
	}
    else{
        echo '<meta http-equiv="refresh" content="0; URL=index1.php?page=product"/>';
    }
?>