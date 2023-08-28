<?php
include "connection.php";
session_start();
echo "welcome " . $_SESSION['user_name'];
?>

<!-- search id -->
<?php

//  for search

$user_profile = $_SESSION['user_name']; //session
if ($user_profile == true) {
    // khali means else ki bad ki condition chalegi
} else {
    header('location:login.php');
}

//search
$result = null;
if (isset($_POST['searchdata'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM form WHERE id='$search' ";
    $data = mysqli_query($conn, $query);
    $number = mysqli_num_rows($data);
    if ($number > 0) {
        $result = mysqli_fetch_assoc($data);
    } else {

        echo "<script>alert('This id is not present')</script>";
?>
        <meta http-equiv="refresh" content="0 , url=http://localhost/emp-php/form.php">
<?php

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>software Development</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .logout-button {
        text-align: right;
        /* margin-top: 1px; */
        padding-right: 200px;
    }
</style>

<body>

    <div class="logout-button">
        <a href="logout.php">
            <input type="submit" name="" value="Logout" style="background-color: lightblue; height:35px; width:100px; font-size:18px;color:white">
        </a>
    </div>

    <div class="center">
        <form action="" method="POST">
            <h1>Employee Data Entry Automation Software </h1>
            <div class="form">

                <!--  value for search -->
                <input type="text" class="textfield" name="search" placeholder="search ID" value="<?php if (isset($_POST['searchdata'])) {
                                                                                                        echo $result['id'];
                                                                                                    }
                                                                                                    ?>">

                <!--  value for search   option mde pn value for search-->
                <input type="text" class="textfield" name="name" placeholder="Employee Name" value="<?php if (isset($_POST['searchdata'])) {
                                                                                                        echo $result['emp_name'];
                                                                                                    }
                                                                                                    ?>">

                <select class="textfield" name="gender">
                    <option value="not selected">Select Gender</option>

                    <option value="male" <?php if ($result !== null && $result['emp_gender'] == 'male') {
                                                echo "selected";
                                            } ?>>Male
                    </option>

                    <option value="female" <?php if ($result !== null && $result['emp_gender'] == 'female') {
                                                echo "selected";
                                            } ?>>Female
                    </option>

                    <option value="other" <?php if ($result !== null && $result['emp_gender'] == 'other') {
                                                echo "selected";
                                            } ?>>Other
                    </option>
                </select>

                <!-- value for search -->
                <input type="text" class="textfield" name="email" placeholder="Email Address" value="<?php if (isset($_POST['searchdata'])) {
                                                                                                            echo $result['emp_email'];
                                                                                                        } ?>">

                <select class="textfield" name="department">
                    <option value="not selected">Select Department</option>

                    <option value="IT" <?php if ($result !== null && $result['emp_department'] == 'IT') {
                                            echo "selected";
                                        } ?>>IT
                    </option>
                    <option value="HR" <?php if ($result !== null && $result['emp_department'] == 'HR') {
                                            echo "selected";
                                        } ?>>HR
                    </option>
                    <option value="Accounts" <?php if ($result !== null && $result['emp_department'] == 'Accounts') {
                                                    echo "selected";
                                                } ?>>
                        Accounts</option>
                    <option value="Sales" <?php if ($result !== null && $result['emp_department'] == 'Sales') {
                                                echo "selected";
                                            } ?>>
                        Sales</option>
                    <option value="Marketing" <?php if ($result !== null && $result['emp_department'] == 'Marketing') {
                                                    echo "selected";
                                                } ?>>
                        Marketing</option>
                    <option value="Business Development" <?php if ($result !== null && $result['emp_department'] == 'Business Development') {
                                                                echo "selected";
                                                            } ?>>
                        Business Development</option>
                </select>


                <!-- value for search -->
                <textarea placeholder="Address" name="address"><?php if (isset($_POST['searchdata'])) {
                                                                    echo $result['emp_address'];
                                                                }
                                                                ?>
               </textarea>

                <input type="submit" value="search" name="searchdata" class="btn">
                <input type="submit" value="save" name="save" class="btn" style="background-color: green;">
                <input type="submit" value="Update" name="update" class="btn" style="background-color: orange;">
                <input type="submit" value="Delete" name="delete" class="btn" style="background-color: red;" onclick="return checkdelete()">
                <input type="reset" value="clear" name="" class="btn" style="background-color: blue;">

            </div>
        </form>
    </div>

</body>

</html>
<script>
    function checkdelete() {
        return confirm('Are you  want to confirm delete')
    }
</script>



<!--  for store -->
<?php
// $name = '';
// $gender = '';
// $email = '';
// $department = '';
// $address = '';

//session
$user_profile = $_SESSION['user_name'];
if ($user_profile == true) {
    // khali means else ki bad ki condition chalegi
} else {
    header('location:login.php');
}

// store
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $address = $_POST['address'];

    $query = "INSERT INTO form(emp_name,emp_gender,emp_email,emp_department,emp_address)
                        VALUES('$name','$gender','$email','$department','$address')";

    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('Data saved in database')</script>";
    } else {
        echo "<script>alert('Data Failed')</script>";
    }
}
?>


<!-- for delete -->
<?php

$user_profile = $_SESSION['user_name']; //session
if ($user_profile == true) {
} else {
    header('location:login.php');
}

// delete
if (isset($_POST['delete'])) {
    $id = $_POST['search'];
    $query = "DELETE FROM form WHERE id = '$id' ";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record Deleted')</script>";
    } else {
        echo "<script>alert('Record failed')</script>";
    }
}
?>

<!--  update/edit -->
<?php

$user_profile = $_SESSION['user_name']; //session
if ($user_profile == true) {
    // khali means else ki bad ki condition chalegi
} else {
    header('location:login.php');
}

// update
if (isset($_POST['update'])) {
    $id = $_POST['search'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $query = "UPDATE form SET  emp_name='$name',emp_gender=' $gender',emp_email='$email'
                                ,emp_department='$department',emp_address='$address'
                                WHERE id='$id'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('Data update in database')</script>";
    } else {
        echo "<script>alert('Data Failed to update')</script>";
    }
}
?>