<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Asia Pro &mdash; Human Resource Management</title>
    <link href="img/log.jpg" rel="shortcut icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/jquery-ui.css">
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">

    <link rel="stylesheet" href="css1/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css1/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css1/aos.css">

    <link rel="stylesheet" href="css1/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="index.php">Asia Pro &mdash; Human Resource Management</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
               
              </ul>
            </nav>
          </div>

         
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="login.php" class="nav-link"><span>Login</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Join our Team today!</h1>  
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Our Goal is to provide a better employee's each and everyone company the deals the skill of every individual.</p>
                  
                </div>
                <?php 
                if (isset($_GET['sent'])) {
                  echo "<script>alert('Resume Sent')</script>";
                }
                 ?>
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                 <form method="POST" class="form-box" enctype="multipart/form-data">
                  <h3>Fill up Application</h3>
                                         <div class="form-group">
                                                    <input class="form-control" name="fname" type="text" placeholder="Enter First Name" required="">
                                                </div>
                                        <div class="form-group">
                                                    
                                                    <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" required="">
                                                </div>
                                        <div class="form-group">
                                                    
                                                    <input class="form-control" type="date" name="bdate" placeholder="" required="">
                                                </div>
                                        <div class="form-group">
                                                  
                                                    <input class="form-control" type="number" name="contact" placeholder="Enter Mobile Number" required="">
                                                </div>
                                        <div class="form-group">
                                                    <select class="form-control" name="gender" required="">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                        

                                        <div class="form-group">
                                                
                                                <input type="file" class="form-control" name="file" accept="application/pdf" required="">
                                                </div>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa-mail-forward"></i>Send Resume</button>
                                    </form>
                  </form>
                   <?php 
                   include('db.php');
                                        if (isset($_POST['submit'])) {
                                           $fname = $_POST['fname'];
                                           $lname = $_POST['lname'];
                                           $bdate = $_POST['bdate'];
                                           $contact = $_POST['contact'];
                                           $gender = $_POST['gender'];
                                           
                                           
                                           $allow = array('pdf');
                                           $temp = explode(".", $_FILES['file']['name']);
                                           $extension = end($temp);
                                           $uploadfile = $_FILES['file']['name'];
                                           move_uploaded_file($_FILES['file']['tmp_name'], "img/pdf_files/".$_FILES['file']['name']);
                                           $query = mysqli_query($con, "INSERT INTO `employees`( `first_name`, `last_name`, `birthdate`, `contact_info`, `gender`, `void`, `file`) VALUES ('$fname','$lname','$bdate','$contact','$gender','false','$uploadfile')");
                                            echo "<script>document.location='index.php?sent'</script>";
                                        }
                                     ?>

                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
  
    
     
    
    
  </div> <!-- .site-wrap -->

  <script src="js1/jquery-3.3.1.min.js"></script>
  <script src="js1/jquery-migrate-3.0.1.min.js"></script>
  <script src="js1/jquery-ui.js"></script>
  <script src="js1/popper.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/jquery.stellar.min.js"></script>
  <script src="js1/jquery.countdown.min.js"></script>
  <script src="js1/bootstrap-datepicker.min.js"></script>
  <script src="js1/jquery.easing.1.3.js"></script>
  <script src="js1/aos.js"></script>
  <script src="js1/jquery.fancybox.min.js"></script>
  <script src="js1/jquery.sticky.js"></script>

  
  <script src="js1/main.js"></script>
    
  </body>
</html>