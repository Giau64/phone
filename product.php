<script language="javascript">
    function deleteConfirm()
    {
        if(confirm("Are you sure to delete!"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
<?php
require('requirelogin.php');
include_once("connection.php");
if(isset($_GET["function"])=="del")
{
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sq = "SELECT Image FROM product WHERE Pro_ID='$id'";
        $res = mysqli_query($conn, $sq);
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if (!$res) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        $filePic = $row['Image'];
        unlink("product_image/".$filePic);
        mysqli_query($conn, "DELETE FROM product WHERE Pro_ID='$id'");
    }   
}
?>
<form name="frm" method="post">
    <h1>Product Management</h1>
    <p>
        <a class="glyphicon glyphicon-plus" href="index1.php?page=add_product"> Add</a>
    </p>
    <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><strong>No.</strong></th>
                <th><strong>Product ID</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Description</strong></th>
                <th><strong>Category ID</strong></th>
                <th><strong>Image</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>
            </tr>
            </thead>

        <tbody>
        <?php
            include_once("connection.php");
            $No=1;
            $result = mysqli_query($conn, "SELECT Pro_ID, Pro_Name, Qty, Price, a.Description, b.Cat_ID, Image
            FROM product a, category b 
            WHERE a.Cat_ID = b.Cat_ID");
            if (!$result) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
        <tr>
            <td ><?php echo $No; ?></td>
            <td ><?php echo $row['Pro_ID']; ?></td>
            <td><?php echo $row['Pro_Name']; ?></td>
            <td ><?php echo $row['Qty']; ?></td>
            <td><?php echo $row['Price']; ?></td>
            <td><?php echo $row['Description']; ?></td>
            <td><?php echo $row['Cat_ID']; ?></td>
            <td align='center'><img src='product_image/<?php echo $row['Image']?>' border='0' width="50" height="50" /></td>
            <td align='center'><a class="glyphicon glyphicon-edit" href="index1.php?page=update_product&&id=<?php echo $row["Pro_ID"]; ?>"></a></td>
            <td align="center"><a class="glyphicon glyphicon-trash" href="index1.php?page=product&&function=del&&id=<?php echo $row["Pro_ID"]; ?>" onclick="return deleteConfirm()"></a></td>
        </tr>
        <?php
            $No++;
            }
        ?>
        </tbody>
    
    </table>  

</form>
</body>