<?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br><br>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];   // Displaying session message
                    unset($_SESSION['add']); // Removing session message
                }
            ?>
            <table class="tbl-full">
                <tr>
                    <th>S.No.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    // Query to get all admin
                    $sql = "select * from tbl_admin";
                    // Execute the query
                    $res = mysqli_query($conn, $sql);

                    // Check if the query is executed or not
                    if ($res == true){
                        // Count rows to check if we have data in DB
                        $count = mysqli_num_rows($res); //Function to get all rows in the DB
                        $sn = 1; // Create a variable and  assign the value

                        // Check the number of rows
                        if ($count > 0){
                            while($rows=mysqli_fetch_assoc($res)){

                                // Using while loop to get all the data from the DB
                                // It will execute as long as we have data in DB

                                // Get individual data
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];

                                // Display the values in our table
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="" class="btn-secondary">Update Admin</a>
                                        <a href="" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }

                        else{
                            // We don't have data in DB
                        }
                    }
                ?>
            </table>
        </div>
    </div>
<?php include('partials/footer.php'); ?>