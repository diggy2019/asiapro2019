<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header('location:index.php');
}   
 ?>

 <?php 
    include('db.php');
    $timezone = 'Asia/Manila';
    date_default_timezone_set($timezone);
    $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-15 day', strtotime($range_to)));
  $id = $_SESSION['id'];

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
           if (isset($_GET['feedback'])) {
               echo "<script>alert('Feedback Submitted')</script>";
           }
            ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Employees</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Employees list
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        
                                        <div class="pull-right">
                                        </div>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-user"></i> Name</th>
                                                    <th><i class="fa fa-calendar"></i> Birthdate</th>
                                                    <th><i class="fa fa-mobile"></i> Contact</th>
                                                    <th><i class="fa fa-intersex"></i> Gender</th>
                                                    
                                                    <th><i class="fa fa-asterisk"></i> Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $query = mysqli_query($con,"SELECT employees.employee_id, employees.first_name, employees.last_name, employees.birthdate, employees.contact_info, employees.gender, branch.branch_name FROM employees inner join branch on branch.branch_id=employees.branch_id WHERE branch.branch_id = '$id'"); ?>
                                                <?php while($row = mysqli_fetch_assoc($query)): ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                                                    <td><?php echo $row['birthdate']; ?></td>
                                                    <td><?php echo $row['contact_info'] ?></td>
                                                    <td class="center"><?php echo $row['gender']; ?></td>
                                                   
                                                    <td>
                                                        <a class="btn btn-primary" href="feedback.php?id=<?php echo $row['employee_id']; ?>"><i class="fa fa-check"></i>Feedback</a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
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
