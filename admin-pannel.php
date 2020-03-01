<?php 
require_once 'connect.php';

session_start();
if(isset($_SESSION['user_ids']))
{
    $uids=$_SESSION['user_ids'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>Admin Pannel</title>
    </head>
    <body>
        <div class="container-fluid" style="padding: 2%; background-color: #373A3E;">
            <center>
                <h3 class="display-3"><font color="#FFFFFF">Admin Pannel</font></h3>
            </center>
        </div>
        <div class="container">
            <center>
                <form action="a-up.php" method="post" enctype="multipart/form-data">
          <div class="container" style="border: 1px black dotted; border-radius: 20px; margin-top: 10%; padding: 5%;">
              <div class="custom-file mb-3" style="width: 500px;">
                  <input type="file" class="custom-file-input" id="file" name="file" accept=".csv">
                  <label class="custom-file-label" for="customFile" style=" border: 1px #545454 dotted; border-radius: 5px;">Upload a CSV file</label>
            </div>
              <input type="submit" value="Upload" name="submit" class="btn btn-primary" style="width: 500px;"/>
          </div>
    
      </form>
            </center>
        </div>
        
        <!-- =============== -->
        <script>
          $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
          });
         </script>
    </body>
</html>
