

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
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
           <?php include('include/header2.php'); ?>
           
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" style="padding-top: 50px;">
                                
                            </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row" style="margin-left: 300px; margin-top: 100px;">
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                 <div class="panel-heading">
                                    Resume
                                </div>
                                <div class="panel-body">
                                    <form method="POST" enctype="multipart/form-data">
                                         <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control" name="fname" type="text" placeholder="Enter First Name">
                                                </div>
                                        <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control" type="text" name="lname" placeholder="Enter Last Name">
                                                </div>
                                        <div class="form-group">
                                                    <label>Birthdate</label>
                                                    <input class="form-control" type="date" name="bdate" placeholder="">
                                                </div>
                                        <div class="form-group">
                                                    <label>Contact</label>
                                                    <input class="form-control" type="number" name="contact" placeholder="Enter Mobile Number">
                                                </div>
                                        <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                        <div class="form-group">
                                                    <label>Branch</label>
                                                    <select class="form-control" name="branch">
                                                        <?php $query = mysqli_query($con, 'SELECT * FROM `branch`');?>
                                                    <?php  while($row = mysqli_fetch_array($query)): ?>
                                                        <option value=" <?php echo $row['branch_id']; ?>"><?php echo $row['branch_name']; ?></option>
                                                    <?php endwhile; ?>
                                                    </select>
                                                </div> 

                                        <div class="form-group">
                                                <label>Resume File</label>
                                                <input type="file" name="file" accept="application/pdf">
                                                </div>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa-mail-forward"></i>Send Resume</button>
                                    </form>
                                </div>

                                <?php 
                                        if (isset($_POST['submit'])) {
                                           $fname = $_POST['fname'];
                                           $lname = $_POST['lname'];
                                           $bdate = $_POST['bdate'];
                                           $contact = $_POST['contact'];
                                           $gender = $_POST['gender'];
                                           $branch = $_POST['branch'];
                                           
                                           $allow = array('pdf');
                                           $temp = explode(".", $_FILES['file']['name']);
                                           $extension = end($temp);
                                           $uploadfile = $_FILES['file']['name'];
                                           move_uploaded_file($_FILES['file']['tmp_name'], "img/pdf_files/".$_FILES['file']['name']);
                                           $query = mysqli_query($con, "INSERT INTO `employees`( `first_name`, `last_name`, `birthdate`, `contact_info`, `gender`, `branch_id`, `void`, `file`) VALUES ('$fname','$lname','$bdate','$contact','$gender','$branch','false','$uploadfile')");
                                            echo "<script>document.location='index.php?sent'</script>";
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
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

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
