<?php
    //connect to db
    $conn = mysqli_connect('localhost', 'root', '', 'goshendb');
    if(!$conn){
        die('could not connect'.mysqli_connect_error());
    }else{
       // echo('connected');
    }

    //when the btn is clicked
    if(isset($_POST['addAdmin'])) {
        $userName = trim(mysqli_real_escape_string($conn, $_POST['username']));
        $firstName = trim(mysqli_real_escape_string($conn, $_POST['firstname']));
        $lastName = trim(mysqli_real_escape_string($conn, $_POST['lastname']));
        $role = trim(mysqli_real_escape_string($conn, $_POST['role']));
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
        $cpassword = trim( mysqli_real_escape_string($conn, $_POST['cpassword']));

        //image upload
        $name = $_FILES['upload'] ['name'];
        $size = $_FILES['upload'] ['size'];
        $type = $_FILES['upload'] ['type'];
        $temp = $_FILES['upload'] ['tmp_name'];

        //move uploaded file
        move_uploaded_file($temp, "img/" .$name);
        
        
        //edit inputs
        //$firstName = strtoupper($firstName);
        //$lastName = strtoupper($lastName);
        //$role = strtoupper($role);
        $pass_length = 6;

        //echo($pass_length);
        
        //check wether the user is already registered
        $sql = "SELECT * FROM system_users";

        $results = mysqli_query($conn, $sql);
        

        while($fetch = mysqli_fetch_assoc($results)) {
            $dp = $fetch['img'];
            $user = $fetch['user_name'];
            $fName = $fetch['first_name'];
            $lName = $fetch['last_name'];
            $db_password = $fetch['password'];
            
    }

        if($userName === $user && $password === $db_password) {
            die('user already exist');
            return false;
        }
        else if($password !== $cpassword) {
            die('passwords do not match');
            header:location('addAdmin.php');
        }
        // else if(count($password) < $pass_length) {
        //     exit('Password too short!!!');
        // {
        else{
            $add_sql = "INSERT INTO system_users (img, user_name, first_name, last_name, user_level, email, password) VALUES ('$name', '$userName', '$firstName', '$lastName', '$role', '$email', '$password')";
            $option = mysqli_query($conn, $add_sql);

            if(!$option) {
                exit('user not registered successifully');
            }
            else{
                echo('user added successifully');
            }
        }      
 
}
    

   
?>



<!DOCTYPE html>
<html lang="zxx">
  <head>    
    <?php
        include('upperLinks.php');
    ?>
  </head>

  <body>
    <?php
        include('navbar.php');
    ?>
    <script>
      let year = new Date().getFullYear();
    </script>


    <!-- page title -->
    <section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
        <div class="col-md-8">
            <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">System Users</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
            </ul>
            <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
        </div>
    </div>
    </section>
    <!-- /page title -->
<br><br>
    <div class="m-5">
      <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center section-title justify-content-between">
              <h2 class="mb-0 text-nowrap mr-3">Manage Users</h2>
              <div class="border-top w-100 border-primary d-none d-sm-block"></div>
            <div>
                <a class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block" href="#" data-toggle="modal" data-target="#addAdmin">add users</a>
            </div>
          </div>
        </div>
    </div>
    </div>

      <!-- add a new teacher -->
      <div class="row my-4">

<div class="col-1"></div>

<div class="col-md-10 row mt-2">

<?php
             $sql = "SELECT * FROM system_users";

             $results = mysqli_query($conn, $sql);
             
     
             while($fetch = mysqli_fetch_assoc($results)) {
                 $dp = $fetch['img'];
                 $user = $fetch['user_name'];
                 $fName = $fetch['first_name'];
                 $lName = $fetch['last_name'];
                 $uLevel = $fetch['user_level'];

                 //echo $fName;
                  ?>
                      <!-- blog -->      
                      <div class="col-sm-6 col-md-3 mb-4">
                        <div class="card border-1 rounded-1 hover-shadow">
                          <div class="card-img position-relative">
                          <img class="card-img-top rounded-1" src="img/<?php echo $dp; ?>" alt="Post thumb" style="height: 180px;">
                          </div>
                          <div class="card-body">
                            <!-- post meta -->
                            <ul class="list-inline mb-3">
                              <!-- post date -->
                              <li class="list-inline-item mr-2 ml-0 text-capitalize" style="font-size: 12px;"><?php echo $uLevel; ?></li>
                              <!-- author -->
                              <li class="list-inline-item mr-1 ml-0" style="font-size: 12px;"><script>document.write(year)</script></li>
                            </ul>
                            <a href="blog-single.html">
                              <h6 class="card-title text-capitalize"><?php echo $fName; ?> <?php echo $lName; ?></h6>
                            </a>
                            <ul class="list-inline text-center">
                                <li class="list-inline-item"><a class="text-color" href="#">View</a></li>
                                <li class="list-inline-item">
                                  <a class="text-color" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span>Contact</span>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="text-color ml-1" href="#" style="font-size: 12px;" style="font-size: 12px;"><i class="ti-facebook text-primary mr-2"></i> Facebook</a>
                                  <div class="dropdown-divider"></div>
                                    <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-twitter-alt text-primary mr-2"></i>  Twitter</a>
                                  <div class="dropdown-divider"></div>
                                    <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-google text-primary mr-2"></i>  Google</a>
                                  <div class="dropdown-divider"></div>
                                    <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-linkedin text-primary mr-2"></i>  Linkedin</a> 
                                  </div>
                                </li>  
                                <li class="list-inline-item">
                                  <a class="text-color" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span>Action</span>
                                  </a>
                                <div class="dropdown-menu navbar-dropdown" aria-labelledby="elipsisDropdown">
                                  <a class="dropdown-item" href="edit.html">
                                      <i class="ti-pencil text-primary mr-2 text-success" style="margin-top: 4.1px;"></i>
                                      <span style="font-size: 12px;">edit teacher</span>
                                  </a>
                                  <div class="dropdown-divider"></div>  
                                      <a class="dropdown-item form-inline" href="#">
                                      <i class="ti-trash text-primary mr-2 text-danger" style="margin-top: 4.1px;"></i>
                                      <span style="font-size: 12px;">delete teacher</span>
                                  </a>
                                </div>
                              </ul>
                          </div>
                        </div>
                    </div>       

                 <?php
             }
        ?>
        
    <?php
   
?>
  
  </div>
    <div class="col-1"></div>
  </div>


<!-- Modal -->
<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content rounded-1 border-0 py-3">
            <div class="modal-header border-0">
                <h4 class="mb-3 text-center"><a class="h3 text-primary text-center font-secondary" href="@@page-link">Add new blog</a></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-3">
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">passport</h6>
                    </div> 
                    <div class="pt-4">
                      <h6 class="ml-2 text-capitalize">user name</h6>
                    </div>
                    <div class="pt-3">
                      <h6 class="ml-2 text-capitalize">first name</h6>
                    </div>
                    <div class="pt-4 ">
                      <h6 class="ml-2 text-capitalize">last name</h6>
                    </div>
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">user level</h6>
                    </div> 
                    <div class="pt-4 ">
                      <h6 class="ml-2 text-capitalize">email</h6>
                    </div>
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">password</h6>
                    </div>
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">confirm password</h6>
                    </div>
                  </div>
                  <div class="col-8">
                    <form action="admins.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="upload" style="height: 40px;" class="mt-2  file-upload-info" required>
                        <input type="text" name="username" style="height: 40px;" class="mt-2 form-control border-primary" required>
                        <input type="text" name="firstname" style="height: 40px;" class="mt-2 form-control border-primary" required>
                        <input type="text" name="lastname" style="height: 40px;" class="mt-2 form-control border-primary" required>
                        <select class="mt-2 form-control border-primary" name="role" style="height: 40px;" id="" required>
                            <option value="admin">Admin</option>
                            <option value="User">User</option>
                        </select>        
                        <input type="email" name="email" style="height: 40px;" class="mt-2 form-control border-primary"  required>
                        <input type="password" name="password" style="height: 40px;" class="mt-2 form-control border-primary" required>
                        <input type="password" name="cpassword" style="height: 40px;" class="mt-2 form-control border-primary" required>
                        <button type="submit" class="btn btn-primary btn-block mt-3 p-1" name="addAdmin"style="height: 30px; padding-bottom : 5px;">Add</button>
                    </form>
                  </div>
                  <div class="col-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->  
    <!-- end of adminLogin -->

    <!-- footer -->
    <?php
        include('footer.php');
    ?>

    <?php
        include('lowerLinks.php');
    ?>

  </body>
</html>






   