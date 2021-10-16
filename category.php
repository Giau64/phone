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
    if(isset($_GET["function"])=="del")
        {
            if(isset($_GET["id"]))
            {
                $id = $_GET["id"];
                mysqli_query($conn, "DELETE FROM category WHERE Cat_ID='$id'");
            }
        }
?>

<form method="post" action="">
    <h1>Product Category</h1>
    <p>
    <a class="glyphicon glyphicon-plus" href="index1.php?page=add_category"> Add</a>
    </p>
<table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><strong>No.</strong></th>
            <th><strong>Category ID</strong></th>
            <th><strong>Category Name</strong></th>
            <th><strong>Description</strong></th>
            <th><strong>Edit</strong></th>
            <th><strong>Delete</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once("connection.php");
        $No=1;
        $result = mysqli_query($conn, "SELECT * FROM category");
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
        ?>
        <tr>
            <td><?php echo $No; ?></td>
            <td><?php echo $row["Cat_ID"]; ?></td>
            <td><?php echo $row["Cat_Name"]; ?></td>
            <td><?php echo $row["Description"]; ?></td>
            <td style='text-align:center'>
            <a class="glyphicon glyphicon-edit cursor" href="?page=update_category&&id=<?php echo $row["Cat_ID"]; ?>"></a></td>
            <td align="center"><a class="glyphicon glyphicon-trash" href="index1.php?page=category&&function=del&&id=<?php echo $row["Cat_ID"]; ?>" onclick="return deleteConfirm()"></a></td>
        </tr>
        <?php
            $No++;
            }
        ?>
        </tbody>
</table>
</div>
</form>