<?php
    session_start();
    if(!isset ($_SESSION['userdata'])){
        header("location:../");
    }
        
        $userdata=$_SESSION['userdata'];
        $groupsdata=$_SESSION['groupsdata'];

        if($_SESSION['userdata']['status']==0){
            $status= '<b style= "color:red">Not Voted';

        }
        else{
            $status= '<b style = "color:green"> Voted';
        }

    
?>
<html>
    <head>
       <title>Online Voting System-dashbord</title>
       <link rel="stylesheet" href="../css/stylesheet.css">
</head>
    <body>
        <style>
            #backbtn{
            padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: whitesmoke;
            float: left ;
            }
            #logbtn{
            padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: whitesmoke;
            float: right ;
            }
            #profile{
                background-color: white;
                width: 20%;
                padding: 15px;
                float:left;

            }
            #group{
                width: 60%;
                padding: 20px;
                float:right;
                color:black;   
            } 
            #votebtn{
                padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: whitesmoke;
            float: left ;
            
            }
            #mainpannel{
                padding:10px;
            }
            #voted{

                padding: 5px;
            border-radius: 5px;
            background-color: green;
            color: white;
            float: left ; 
            margin-left:20px;
            }
        </style>
        <div id="mainsection">

        <div id ="headersection">
        <a href="../"><button id="backbtn">Back</button></a>
        <a href ="logout.php" ><button id="logbtn"> Logout</button> </a>
        <center>
        <h1>Online Voting System</h1>
        </center>
        </div>
        <hr>
        <div id="mainpannel">
        <div id="profile">
        <img  src="../uploads/<?php echo $userdata['photo'] ?>" height="200" width="200"> <br><br>
        
        <b>Name:</b><?php echo $userdata['name']?><br><br>
        <b>Email:</b><?php echo $userdata['email']?><br><br>
        <b>Address:</b><?php echo $userdata['address']?><br><br>
        <b>Status:</b><?php echo $status?><br><br>
        </div>
        <div style="margin-left:20px;"> 

            <?php
            if($_SESSION['groupsdata']){
                for($i=0;$i<count($groupsdata);$i++) {
                ?>
                    <img style="float: right;" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                    <b  style="margin-left:20px;">Group Name:</b> <?php echo $groupsdata[$i]['name'] ?> <br><br>
                    <b  style="margin-left:20px;">Votes:</b> <?php echo $groupsdata[$i]['votes'] ?><br><br> 
                    <form action="../api/vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                        <?php
                            if ($_SESSION['userdata']['status']==0){
                                ?>
                        
                        <input  type="submit" name="votebtn" value="vote" id="votebtn">
                        <?php

                            } 
                            else{
                                
                                ?>
                        
                        <button  disabled type="button" name="votebtn" value="vote" id="voted"> Voted </button> 
                        <?php
                            }
                        ?>
                    </form>
                    <br>
                <hr>
                
            </div>
                        
                <?php

                }
            }

            ?>

        </div>
        </div>
    </body>
    </html>
