<?php
  session_start();
  include_once("config.php");
  //$UserType ="";
  if(isset($_POST['Login_User']))
  {     
    $email = $_POST["txt_UserName"]; 
    $password = $_POST["txt_Password"];
    echo $email."' and '".$password ;
    //sleep(2);    
    $num = array();
    $sql = "call user_login_sp('$email','$password')";
    $query = mysqli_query($con,$sql);
    $num = mysqli_fetch_array($query);
    if($num >= 1)
    {
      $_SESSION['user_id'] = $num['user_id'];
      $_SESSION['user_name'] = $num['user_fname'];
      $_SESSION['user_image'] = $num['user_image'];
      $UserType = $num['user_type'];
      $_SESSION['userType'] = $UserType;
      echo $UserType;
      if($UserType == "Admin")
      {
        $extra="Admin/AdminDashboard.php";
        echo "<script>window.location.href='".$extra."'</script>";
        //header("Admin/AdminDashboard.php");       
      }
      else if($UserType == "User")
      {
        $extra="Users/MyTask.php";
        echo "<script>window.location.href='".$extra."'</script>";
      }
    }      
    else
    {
      $_SESSION['logout']="*Invalid username or password";
      $extra="login.php";
      echo "<script>window.location.href='".$extra."'</script>";
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>User Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
    <meta content="Mannatthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="account-body accountbg">

    <!-- Log In page -->
    <div class="row vh-100 ">
      <div class="col-12 align-self-center">
        <div class="auth-page">
          <div class="card auth-card shadow-lg">
            <div class="card-body">
              <div class="px-3">
                <div class="auth-logo-box">
                  <a href="#" class="logo logo-admin"><img src="assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                </div><!--end auth-logo-box-->
                                
                <div class="text-center auth-logo-text">
                  <h4 class="mt-0 mb-3 mt-5">Let's Get Started Task Managment</h4>
                  <p class="text-muted mb-0">
                    Sign in to continue to Task Managment.
                  </p>  
                </div> <!--end auth-logo-text-->  
                <form class="form-horizontal auth-form my-4" method="POST">
                  <div class="form-group">
                    <label for="username">Username Or Email Id</label>
                      <div class="input-group mb-3">
                        <span class="auth-form-icon">
                          <i class="dripicons-user"></i> 
                        </span>                                                                                                              
                        <input type="text" class="form-control" id="username" name="txt_UserName" placeholder="Enter username">
                      </div>                                    
                  </div><!--end form-group--> 
          
                  <div class="form-group">
                    <label for="userpassword">Password</label>
                    <div class="input-group mb-3"> 
                      <span class="auth-form-icon">
                        <i class="dripicons-lock"></i> 
                      </span>                                                       
                      <input type="password" class="form-control" id="userpassword" name="txt_Password" placeholder="Enter password">
                    </div>                               
                  </div><!--end form-group--> 
          
                  <div class="form-group row mt-4">
                    <div class="col-sm-6">
                      <div class="custom-control custom-switch switch-success">
                        <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                        <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                      </div>
                    </div><!--end col--> 
                    <div class="col-sm-6 text-right">
                      <a href="#" class="text-muted font-13">
                        <i class="dripicons-lock"></i> Forgot password?
                      </a>                                    
                    </div><!--end col--> 
                  </div><!--end form-group--> 
          
                  <div class="form-group mb-0 row">
                    <div class="col-12 mt-2">
                      <button class="btn btn-primary btn-round btn-block waves-effect waves-light" name="Login_User" type="submit">Log In 
                        <i class="fas fa-sign-in-alt ml-1"></i>
                      </button>
                    </div><!--end col--> 
                  </div> <!--end form-group-->                           
                </form><!--end form-->
              </div>
              <!--end-->
              
              <div class="m-3 text-center text-muted">
                <p class="">Don't have an account ?  
                  <a href="AddUser.php" class="text-primary ml-2">Free Resister
                  </a>
                </p>
              </div>                     
            </div><!--end card-body-->
          </div><!--end card-->
          </div><!--end auth-page-->
        </div><!--end col--> 
      </div>          
    </div><!--end row-->
    <!-- End Log In page -->

    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/waves.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.js"></script>
  </body>
</html>
