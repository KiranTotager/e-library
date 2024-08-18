<?php
// if(isset($_POST['Register']))
// {
    include 'link.php';
    $Sname=$_POST['Sname'];
    $Usn=$_POST['usn'];
    $Branch=$_POST['branch'];
    $Phno=$_POST['phno'];
    $Password=$_POST['Password'];
    // $option=['cost'=>12,'salt'=>'KiranTotagerveryGoodBoyAndHeIsSencior'];
    $pass=password_hash($Password,PASSWORD_BCRYPT);
    $cquery="select * from studentlogin where USN='$Usn'";
    $Usnquery=mysqli_query($conn,$cquery);
    $cntUsn=mysqli_num_rows($Usnquery);
    if($cntUsn>0)
    {
        ?>
        <script>alert("This student already registered")</script>
        <?php
    }
    else{
        $inQuery="insert into studentlogin(SName,USN,Branch,MobileNO,Password) values('$Sname','$Usn','$Branch','$Phno','$pass')";
        $dbquery=mysqli_query($conn,$inQuery);
        if($dbquery){
        ?>
        <script>
            alert("Registerd successfully");
            location.replace("login.html");
        </script>
        <?php
        }
    }
// }
?>