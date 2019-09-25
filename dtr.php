<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header('location:index.php');
}   
 ?>

 <?php 
    include('db.php');
    $id = $_SESSION['id'];
    $timezone = 'Asia/Manila';
    date_default_timezone_set($timezone);
    $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-15 day', strtotime($range_to)));
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

           <?php 
           if (isset($_GET['delete'])) {
               echo "<script>alert('Delete Employee Successfully')</script>";
           }
           if (isset($_GET['update'])) {
               echo "<script>alert('Update Employee Successfully')</script>";
           }
            ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Daily Time Record</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Fill up all     
                                </div>
                                <!-- /.panel-heading -->
                                <?php 
                                    $query = mysqli_query($con, "SELECT * FROM branch WHERE branch_id = '$id'");
                                    $Row = mysqli_fetch_array($query);
                                 ?>
                              <div class="panel-body">
                                    <form role="form" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                                    <label>Select DTR</label>
                                                    <input class="form-control" type="file" name="file" placeholder="Enter Amount">
                                                </div>
                                        <div class="form-group">
                                                    <label>Branch</label>
                                                    <input class="form-control" type="text" value="<?php echo $Row['branch_name']; ?>" readonly="" name="branch" placeholder="Enter Amount">
                                                </div>
                                       
                                        <button type="submit" name="submit" class="btn btn-success">Send DTR</button>
                                    </form>
                                </div>

                                <?php 
                                if (isset($_POST['submit'])) {   
                                    $branch = $_POST['branch'];
                                    $month = date('M');
                                    $temp = explode(".", $_FILES['file']['name']);
                                    $extension = end($temp);
                                    $uploadfile = $_FILES['file']['name'];
                                           move_uploaded_file($_FILES['file']['tmp_name'], "img/dtr/".$_FILES['file']['name']);
                                    $kweri = mysqli_query($con, "INSERT INTO `dtr`(`dtr_no`, `file`, `branch_name`, `Month`) VALUES (NULL,'$uploadfile','$branch','$month')");
                                    echo "<script>alert('DTR SENT')</script>";
                                }
                                 ?>
                                    <!-- /.table-responsive -->
        <?php if(isset($_GET['range'])){
                      $range = $_GET['range'];
                      $ex = explode(' - ', $range);
                      $from = date('Y-m-d', strtotime($ex[0]));
                      $to = date('Y-m-d', strtotime($ex[1]));
                    } ?>
                                </div>
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
                $("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
     window.location = 'payroll.php?range='+range;
  });
            });
        </script>

    </body>
</html>
