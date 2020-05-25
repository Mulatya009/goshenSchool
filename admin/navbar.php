<?php
  include('conn.php');

  $sql = "SELECT * FROM system_users";
  $res = mysqli_query($conn, $sql);
  
  while($fet = mysqli_fetch_array($res)) {
    $dp = $fet['img'];
    $name = $fet['user_name'];
  }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
<?php
  include('upperLinks.php');
 ?>
</head>
<style>
  #logo{
    margin-left: 60px;
  }
  #face{
    border-radius: 50%;
    height: 30px;
    width: 28px;
    margin-top: -3px;
    margin-left: 40px;
  }
  #log_out{
  margin-right: 20px;
  margin-left: 40px;
  font-size: 20px;
  color: #8d2f5d;
}
</style>

<body>

<!-- header -->
<header class="fixed-top header">
  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light p-0">
        <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"id="logo"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item @@about">
              <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                content
              </a>
              <div class="dropdown-menu text-capitalize" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="teacher.php">update Teachers</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="teacher-single.php">update events</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="notice.php">update Notices</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="notice-single.php">update courses</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="notice-single.php">update blogs</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="notice-single.php">update gallery</a>
              </div>
            </li>
            <li class="nav-item @@about">
              <a class="nav-link" href="index.php">users</a>
            </li>
            <li class="nav-item nav-profile dropdown">
            <a class="nav-link " id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="img/<?php echo $dp; ?>" id="face">
              </div>

            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="nav-profile-text dropdown-item" href="#">
                <p class="mb-1 text-black" style="color: #27367F;">Hello <?php echo $name; ?></p>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logOut.php">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../index.php"><span class="fa fa-sign-out" id='log_out'></span></a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
<!-- /header -->

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Register</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="#" class="row">
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="signupPhone" name="signupPhone" placeholder="Phone">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="signupName" name="signupName" placeholder="Name">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control mb-3" id="signupEmail" name="signupEmail" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control mb-3" id="signupPassword" name="signupPassword" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">SIGN UP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="row">
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="loginPhone" name="loginPhone" placeholder="Phone">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="loginName" name="loginName" placeholder="Name">
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control mb-3" id="loginPassword" name="loginPassword" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- lower links -->
<?php
  include('lowerLinks.php');
?>

</body>
</html>