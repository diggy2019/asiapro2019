<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header('location:index.php');
}   
 ?>

 <?php 
    include('db.php');
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
    <link href="img/log.jpg" rel="shortcut icon">

        <!-- Bootstrap Core CSS -->
        <link href="imports/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="imports/css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="imports/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="imports/css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="imports/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="imports/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
           <?php include('include/header.php'); ?>
           <?php include('include/sidebar.php'); ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Feedback</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <?php 
                        $id = $_GET['id'];
                        $query = mysqli_query($con, "SELECT * FROM employees WHERE employee_id ='$id'");
                        $row = mysqli_fetch_array($query);
                     ?>


                    <div class="row" style="margin-left: 150px;">
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                 <div class="panel-heading">
                                    Add Feedback
                                </div>
                                <div class="panel-body">
                                    <form role="form" method="POST">
                                         <div class="form-group">
                                                    <label>Employee Name</label>
                                                    <input readonly="" value=" <?php echo $row['first_name'].' '. $row['last_name']; ?> " class="form-control" name="name" type="text" placeholder="Enter branch Name"> 
                                                </div>
                                        <div class="form-group">
                                                    <label>Feedback</label>
                                                    <textarea class="form-control" name="feedback" placeholder="Enter your feedback"></textarea>
                                                </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-success">Submit Feedback</button>
                                    </form>
                                </div>

                                <?php 
                                        if (isset($_POST['submit'])) {
                                            $name = $_POST['name'];
                                            $feedback = $_POST['feedback'];

                                            mysqli_query($con, "INSERT INTO `feedback`(`employee_name`, `title`, `date`) VALUES ('$name','$feedback',NOW())");
                                           
                                             echo "<script>document.location='employee.php?feedback'</script>";
                                        }
                                     ?>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
        
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="imports/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="imports/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="imports/js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="imports/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="imports/js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="imports/js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
