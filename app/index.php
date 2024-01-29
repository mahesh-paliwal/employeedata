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

