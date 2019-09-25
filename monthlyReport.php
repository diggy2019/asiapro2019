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
                            <h1 class="page-header">Monthly Report</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Result
                                </div>
                                <!-- /.panel-heading -->

                                <div class="panel-body">
                                    <div class="table-responsive">
                                   <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="upload" value="Upload">
    </form>

    <?php 
        include('Classes/PHPExcel/IOFactory.php');
        include('db.php');

        if (isset($_POST['upload'])) {
            $filename = $_FILES['file']['tmp_name'];
            $excelData = array();

            try {
                $inputFileType = PHPExcel_IOFactory::identify($filename);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($filename); 
            } catch (Exception $e) {
                die('Error loading file'. pathinfo($filename,PATHINFO_BASENAME).'":'.$e->getMessage());
            }
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row=4; $row <= $highestRow; $row++) { 
                $rowData = $sheet->rangeToArray('A'. $row . ':' . $highestColumn . $row, NULL,TRUE,FALSE);

                $sql = "INSERT INTO `monthly_report`(`employee_id`,`Name`, `Dept`, `Shift`, `Work_day`, `Day_Attended` ,`Absent_day`, `Late_Mins`, `Late_Times`, `Early_Mins`, `Early_Times`, `OT_hours`, `Holidays`, `branch_id`) VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."','".$rowData[0][4]."','".$rowData[0][5]."','".$rowData[0][6]."','".$rowData[0][7]."','".$rowData[0][8]."','".$rowData[0][9]."','".$rowData[0][10]."','".$rowData[0][11]."','".$rowData[0][12]."','$id')";
                if (mysqli_query($con, $sql)) {
                    $excelData[] = $rowData[0];
                }else {
                    echo "Errr:". $sql . "<br>" . mysqli_error($con);
                }
            }
        }
    ?>
                                        <div class="pull-right">

                                            
                                        </div>
                                       
                                                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Employee ID</th>
                                                    <th>Employee Name</th>    
                                                    <th>Dept</th>
                                                    <th>Shift</th>
                                                    <th>Worked Days</th>
                                                    <th>Day Attended</th>
                                                    <th>Absent Days</th>
                                                    <th>Late Mins.</th>
                                                    <th>Late Times</th>
                                                    <th>Early Mins.</th>
                                                    <th>Early Tmes</th>
                                                    <th>OT Hours</th>
                                                    <th>Holidays</th>
                                                    <th>Branch Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $query = mysqli_query($con,"SELECT monthly_report.employee_id, monthly_report.Name , monthly_report.Dept, monthly_report.Shift, monthly_report.Work_day, monthly_report.Day_Attended, monthly_report.Absent_day, monthly_report.Late_Mins, monthly_report.Late_Times, monthly_report.Early_Mins, monthly_report.Early_Times, monthly_report.OT_hours, monthly_report.Holidays, branch.branch_name FROM `monthly_report` INNER JOIn branch on monthly_report.branch_id=branch.branch_id"); ?>
                                                <?php while($row = mysqli_fetch_assoc($query)): ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $row['employee_id']; ?></td>
                                                    <td><?php echo $row['Name']; ?></td>
                                                    <td><?php echo $row['Dept']; ?></td>
                                                    <td><?php echo $row['Shift']; ?></td>
                                                    <td><?php echo $row['Work_day']; ?></td>
                                                    <td><?php echo $row['Day_Attended']; ?></td>
                                                    <td><?php echo $row['Absent_day']; ?></td>
                                                    <td><?php echo $row['Late_Mins']; ?></td>
                                                    <td><?php echo $row['Late_Times']; ?></td>
                                                    <td><?php echo $row['Early_Mins']; ?></td>
                                                    <td><?php echo $row['Early_Times']; ?></td>
                                                    <td><?php echo $row['OT_hours']; ?></td>
                                                    <td><?php echo $row['Holidays']; ?></td>
                                                    <td><?php echo $row['branch_name']; ?></td>
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
