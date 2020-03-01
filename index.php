<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>Customer</title>
    </head>
    <body>
        <div class="container-fluid" style="padding: 5%;">
            <center><div class="jumbotron" style="width: 500px; border-top: 2px red solid;">
                <h4 class="display-4">
                    Sign Up Here
                </h4>
                <hr/>
            <div class="container">
        <form action="signup.php" method="post">
            <div class="form group" style="margin-top: 20px;">
            <input type="text" name="fname" id="fname" class="form-control" placeholder="Full Name" required="true">
       </div>
            <div class="form group" style="margin-top: 20px;">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="true">
           </div>
            <div class="form group" style="margin-top: 20px;">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Password (6 or more character)" required="true">
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px;"/>
        </form>
            </div>
    </div>
                </center>
            </div>
    </body>
</html>
