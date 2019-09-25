<?php 
    
session_start();
  $con = mysqli_connect("localhost","root","","hr_db");
  if (isset($_POST['submit'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($con, "SELECT * FROM `admin` WHERE username = '$email' AND password = md5('$password')");
     $result = mysqli_fetch_array($query);
     $row = mysqli_num_rows($query);
     $query2 = mysqli_query($con, "SELECT * FROM branch WHERE branch_name ='$email' AND password = '$password'");
     $result2 = mysqli_fetch_array($query2);
     $id = $result2['branch_id'];
     $row1 = mysqli_num_rows($query2);
    if ($row > 0) {
            $_SESSION['id'] = $id ;
          $_SESSION['email'] = true;
          $_SESSION['email'] = $result['username'];
          header("Location: admin/index.php");
        }  
    else if ($row1 > 0) {
        $_SESSION['id'] = true;
         $_SESSION['id'] = $id ;
        $_SESSION['email'] = true;
        $_SESSION['email'] = $result2['branch_name'];
          header("Location: employee.php");
    }
     else{
      echo "<script>alert('Wrong Email or Password')</script>";
     }   
  }

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Asia Pro &mdash; Human Resource Management</title>
    <link href="img/logo.jpg" rel="shortcut icon">

        <!-- Bootstrap Core CSS -->
        <link href="admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="admin/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="admin/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body bgcolor="#3340" >
            

          <?php 
          if (isset($_GET['sent'])) {
            echo "<script>alert('Resume Sent')</script>";
          }
           ?>


        <div class="container"  style="margin-top: 80px;">
            <div class="row">
              
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">

                          <img src="img/log.jpg" height="200" width="330"> 
                            <h3 class="panel-title" align="center">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="admin/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="admin/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="admin/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="admin/js/startmin.js"></script>

    </body>
</html>
