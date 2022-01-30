<?php
    Include("connect.php");
    $name = $_POST['name'] ;
    $email= $_POST['email'] ;
    $password= $_POST['password'] ;
    $cpassword= $_POST['cpassword'] ;
    $address= $_POST['address'] ;
    $image= $_FILES['photo'] ['name'] ;
    $tmp_name=$_FILES['photo'] ['tmp_name'];
    $role= $_POST['role'];
    if(isset($_POST['save'])){
        if(empty($_POST['name'])){
            $name="please enter name";
        }
    }

    
    if($password==$cpassword){
        move_uploaded_file($tmp_name, "../uploads/$image");
        $insert= mysqli_query($connect,"INSERT INTO user (name,email,password,address,photo,role,status,votes) VALUES ('$name','$email','$password','$address','$image','$role',0,0) ");
        if($insert){
            echo'
            <script>
            alert("Registration successful.");
            window.location= "../";
            </script>
            ';
           
        }else{
            echo'
            <script>
            alert("Some error occure");
            window.location= "../file/register.html";
            </script>
            ';
        }
    }else{
    echo'
    <script>
    alert("Password doesnt match.");
    window.location= "../file/register.html";
    </script>
    ';

    }         

?>