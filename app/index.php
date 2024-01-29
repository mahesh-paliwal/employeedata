<?php
    include("connection.php");
?>

<?php

    if(isset($_POST['search'])){
        $search_id  = $_POST['search_id'];

        $query  = "SELECT * FROM employee_data_entry WHERE id = '$search_id'";

        $data  = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($data);

        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/media.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>
<body class="bg-primary">
    <div class="container-fluid p-0">
        <div class="container">
            <div class="row pt-5">
                <div class="w-50 bg-white text-center rounded-4 form-section-custom">
                    <form action="" method="POST">
                        <h2 class="text-black py-4 border-bottom border-black">Employee Data Entry Automation Software</h2>
                        <div class="pt-3">
                            <input type="number" name="search_id" class="w-100 rounded-2 border border-primary ps-2 py-1" placeholder="Search ID" value="<?php if(isset($_POST['search'])){echo $result['id'];}?>">
                        </div>
                        <div class="pt-3">
                            <input type="text" name="employee_name" class="w-100 rounded-2 border border-primary ps-2 py-1" placeholder="Employee Name" value="<?php if(isset($_POST['search'])){echo $result['emp_name'];}?>">
                        </div>
                        <div class="pt-3">
                            <select name="gender" id="" class="w-100 rounded-2 border border-primary ps-1 py-1">
                                <option value="Not Selected">Select Gender</option>
                                <option value="Male"<?php if($result['emp_gender'] == 'Male'){echo "selected";}?>>Male</option>
                                <option value="Female"<?php if($result['emp_gender'] == 'Female'){echo "selected";}?>>Female</option>
                                <option value="Others"<?php if($result['emp_gender'] == 'Others'){echo "selected";}?>>Others</option>
                            </select>
                        </div>
                        <div class="pt-3">
                            <input type="email" name="email" class="w-100 rounded-2 border border-primary ps-2 py-1" placeholder="E-mail" value="<?php if(isset($_POST['search'])){echo $result['emp_email'];}?>">
                        </div>
                        <div class="pt-3">
                            <select name="department" id="" class="w-100 rounded-2 border border-primary ps-1 py-1">
                                <option value="Not Selected">Select Department</option>
                                <option value="IT"<?php if($result['emp_department'] == 'IT'){echo "selected";}?>>IT</option>
                                <option value="HR"<?php if($result['emp_department'] == 'HR'){echo "selected";}?>>HR</option>
                                <option value="Accounts"<?php if($result['emp_department'] == 'Accounts'){echo "selected";}?>>Accounts</option>
                                <option value="Sales"<?php if($result['emp_department'] == 'Sales'){echo "selected";}?>>Sales</option>
                                <option value="Marketing"<?php if($result['emp_department'] == 'Marketing'){echo "selected";}?>>Marketing</option>
                                <option value="Business Development"<?php if($result['emp_department'] == 'Business Development'){echo "selected";}?>>Business Development</option>
                            </select>
                        </div>
                        <div class="pt-3">
                            <textarea name="address" class="w-100 rounded-2 border border-primary ps-2" placeholder="Address" id="" rows="3"><?php if(isset($_POST['search'])){echo $result['emp_address'];}?></textarea>
                        </div>
                        <div class="pt-3 pb-4">
                            <div class="row justify-content-around">
                                <div class="col-md-2">
                                    <input type="submit" value="Search" name="search" class="border-0 rounded-2 text-white bg-secondary px-3 py-1 fs-5">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" value="Save" name="save" class="border-0 rounded-2 text-white bg-success px-4 py-1 fs-5">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" value="Update" name="update" class="border-0 rounded-2 text-white bg-warning px-3 py-1 fs-5">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" value="Delete" name="delete" class="border-0 rounded-2 text-white bg-danger px-3 py-1 fs-5" onclick="return check_delete()">
                                </div>
                                <div class="col-md-2">
                                    <input type="reset" value="Clear" name="clear" class="border-0 rounded-2 text-white bg-primary px-3 py-1 fs-5">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    function check_delete(){
        return confirm('Are your sure you want to delete this record?');
    }
</script>

</html>

<?php

    if(isset($_POST['save']))
    {
        $name          = $_POST['employee_name'];
        $gender        = $_POST['gender'];
        $email         = $_POST['email'];
        $department    = $_POST['department'];
        $address       = $_POST['address'];

    $query = "INSERT INTO employee_data_entry (emp_name,emp_gender,emp_email,emp_department,emp_address) VALUES ('$name','$gender','$email','$department','$address')";

    $data = mysqli_query($conn,$query);

    if($data){
        echo "<script> alert('Data saved into Database') </script>";
    }
    else{
        echo "<script> alert('Failed to save data') </script>";
    }

    }
?>

<?php

    if(isset($_POST['delete'])){

        $id = $_POST['search_id'];
        
        $query = "DELETE FROM employee_data_entry WHERE id = '$id'";

        $data = mysqli_query($conn,$query);

        if($data){
            echo "<script> alert('Data deleted from Database') </script>";
        }
        else{
            echo "<script> alert('Failed to delete data') </script>";
        }
    }

?>

<?php

    if(isset($_POST['update'])){

        $id            = $_POST['search_id'];
        $name          = $_POST['employee_name'];
        $gender        = $_POST['gender'];
        $email         = $_POST['email'];
        $department    = $_POST['department'];
        $address       = $_POST['address'];

        
        $query = "UPDATE employee_data_entry SET emp_name = '$name',emp_gender = '$gender',emp_email = '$email',emp_department = '$department',emp_address = '$address' WHERE id = '$id'";

        $data = mysqli_query($conn,$query);

        if($data){
            echo "<script> alert('Record updated') </script>";
        }
        else{
            echo "<script> alert('Failed to update') </script>";
        }
    }

?>

