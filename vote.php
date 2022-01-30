<?php
session_start();
include('connect.php');
$votes= $_POST['gvotes'];
$totalvotes= $votes+1;
$id=$_POST['gid'];
$uid=$_SESSION['userdata']['id'];
 
    $update_votes = mysqli_query($connect,"UPDATE user SET votes='$totalvotes' where id='$id' ");
    $update_user_status= mysqli_query($connect,"UPDATE user SET status=1 where id='$uid'");
    if($update_votes and $update_user_status){
    $groups= mysqli_query($connect,"SELECT * FROM user WHERE role=2");
    $groupsdata= mysqli_fetch_all($groups,MYSQLI_ASSOC);

    $_SESSION['userdata'] ['status']= 1;
    $_SESSION['groupsdata']= $groupsdata;

    echo'
    <script>
    alert(" Voting successful. ");
    window.location= "../dashboard.php";
    </script>
    ';

    }
    else{
        echo'
            <script>
            alert("some error occure !!");
            window.location= "../dashboard.php";
            </script>
';
}


?>