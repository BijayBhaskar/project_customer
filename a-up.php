<?php

require_once 'connect.php';
require_once 'mailer.php';

session_start();
if(isset($_SESSION['user_ids']))
{
    $uids1=$_SESSION['user_ids'];
}
$uids1;

if(isset($_POST["submit"]))
{
    if(isset($_FILES['file']['name']))
    {
        $filename= explode(".",$_FILES['file']['name']);
                if($filename[1] == 'csv' || $filename[1] == 'CSV' )
                {
                    $handle= fopen($_FILES['file']['tmp_name'], "r");
                    while($data= fgetcsv($handle))
                    {
                        
                        
                        
                        
                        //---------------------------------------RANDOM USER_ID GENERATED---------------------------
                          $randnum1;
                          $sql_q1="SELECT c_num FROM ( SELECT FLOOR(RAND() * 9999) AS c_num UNION SELECT FLOOR(RAND() * 9999) AS c_num) AS num_mst_p_1 WHERE 'c_num' NOT IN (SELECT user_id FROM cust) LIMIT 1;";
                          $result_1= mysqli_query($link, $sql_q1);

                          if(mysqli_num_rows($result_1) > 0)
                              {
                               while($row = mysqli_fetch_assoc($result_1))
                                   {
                                   global $randnum1;
                                    $randnum1=$row['c_num'];
                                    }
                              }
                               $uid1 ="CNS".$randnum1;  //RANDOM UNIQUE User_id Created and stored in uid variable.
                               $pass1= uniqid();
                        
                        
                        $item1= mysqli_real_escape_string($link, $data[0]);
                        $item2= mysqli_real_escape_string($link, $data[1]);
                        echo $uids1;
                        $sql_1="INSERT INTO cust(user_id,full_name,email,password,created_by,is_admin,created_on) VALUES('".$uid1."','".$item1."','".$item2."','".$pass1."','".$uids1."','0',CURRENT_TIMESTAMP);";
                        $result_2= mysqli_query($link, $sql_1);
                        if($result_2)
                        {
                            echo '<script>window.alert("All data has been added");</script>';
                        }
                        else
                        {
                            echo '<script>window.alert("Something went wrong!!!!!!");</script>';
                        }
                    }
                    fclose($handle);
                }
                else
                {
                    echo '<script>window.alert("Wrong file!!!!!!");</script>';
                }
    }
    else 
    {
        echo '<script>window.alert("not uploading");</script>';
    }
}
/*-------------------------------- PHPMAILER ----------------------------------------*/

session_destroy();