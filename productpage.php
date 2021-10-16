<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="row">
                <?php
                    if(isset($_GET['page']) && $_GET['page']=="productpage" && isset($_GET["id"]))
                    { 
                        $_GET["id"]= mysqli_real_escape_string($conn, $_GET["id"]);
                        include_once("connection.php");
                        $result = mysqli_query($conn, "Select * from product where Pro_ID = '".$_GET["id"]."'");
                        // if (!$result) {
                        //     printf("Error: %s\n", mysqli_error($conn));
                        //     exit();
                        // }
                        if(mysqli_num_rows($result)!=0)
                        {

                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        
                ?>
                        <div class="col-sm-4">
                        <div class="preview-pic tab-content">
                        <img src="img/<?php echo $row['Image']; ?>" alt="" />
                        </div> 
                        </div>
                        <h1>
                            <?php echo $row["Pro_Name"]; ?>
                        </h1>
                        <h3>
                        <?php echo number_format($row['Price'],0,",",".")."VND";?>
                        </h3>
                        <p>
                        <?php echo $row["Description"]; ?>
                        </p>

                <?php }
                }?>
				</div>
			</div>
		</div>
	</div>