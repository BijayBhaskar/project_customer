<?php
require 'connect.php';
$fname=$_POST['fname'];
$pass=$_POST['pass'];
$email=$_POST['email'];

//--------------------------------------------- RANDOM USER_ID GENERATOR--------------------
$randnum;
$sql_q1="SELECT c_num FROM ( SELECT FLOOR(RAND() * 9999) AS c_num UNION SELECT FLOOR(RAND() * 9999) AS c_num) AS num_mst_p_1 WHERE 'c_num' NOT IN (SELECT user_id FROM cust) LIMIT 1;";
$result_1= mysqli_query($link, $sql_q1);

if(mysqli_num_rows($result_1) > 0)
{
    while($row = mysqli_fetch_assoc($result_1))
    {
        global $randnum;
        $randnum=$row['c_num'];
    }
}
$uid ="CNS".$randnum;  //RANDOM UNIQUE User_id Created and stored in uid variable.



//------------------------------------------ALL INSERTION IS DONE AFTER HERE--------------------
$sql="INSERT INTO cust(user_id,full_name,email,password,created_by,is_admin,created_on) VALUES('".$uid."','".$fname."','".$email."','".$pass."','-1','1',CURRENT_TIMESTAMP);";
$result= mysqli_query($link, $sql);

if($result)
{
    echo "<script>window.alert('Your Values are added');</script>";
    echo '<center><img src="imgs/loading.gif" style="width: 50px; height: 50px; margin-top: 20%;"><br><h3><font face="arial rounded" color="#0b8bc6">Creating your Admin Pannel</font></h3><center>';
}
 else 
{
    echo "<script>window.alert('something went wrong');</script>";    
}
//------------------------------SESSION STARTS HERE-------------------------
session_start();
$_SESSION['user_ids']=$uid;
header("refresh:3; url=http://localhost/Customer/admin-pannel.php");
?>