<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>
        <?php
            if(isset($_SESSION['add'])){ // Checking if the session is set or not
                echo $_SESSION['add'];   // Display session message if set
                unset($_SESSION['add']); // Remove session message
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php

    // Process the value from Form and Save it in database

    // Check if the submit button is clicked or not

    if (isset($_POST['submit'])){
        // Button Clicked
        //echo "Button Clicked";

        // Step 1: Get data from Form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password encryption using MD5

        // Step 2: SQL query to save data into the DB
        $sql = "insert into tbl_admin set
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

        // Step 3: Executing Query and saving data into DB
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // Step 4: Check if the query is working or not
        if ($res == true){
            // Creating a session variable to display message
            $_SESSION['add'] = "Admin Added Successfully";
            // Redirect to manage admin page
            header("location".SITEURL.'admin/manage-admin.php');
        }
        else{
            // Creating a session variable to display message
            $_SESSION['add'] = "Failed to Add Admin";
            // Redirect to add admin page
            header("location".SITEURL.'admin/add-admin.php');
        }
    }

?>