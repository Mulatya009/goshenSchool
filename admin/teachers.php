<?php

  session_start();

    include('conn.php');

    if(isset($_POST['teachers'])) {
      $fName = trim(mysqli_real_escape_string($conn, $_POST['fName']));
      $lName = trim(mysqli_real_escape_string($conn, $_POST['lName']));
      $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
      $position = trim(mysqli_real_escape_string($conn, $_POST['position']));
      $department = trim(mysqli_real_escape_string($conn, $_POST['department']));
      $mainSubject = trim(mysqli_real_escape_string($conn, $_POST['mainSubject']));

      // passport
      $name = $_FILES['passport'] ['name'];
      $size = $_FILES['passport'] ['size'];
      $type = $_FILES['passport'] ['type'];
      $temp = $_FILES['passport'] ['tmp_name'];

      // move to folder
      move_uploaded_file($temp, "img/" .$name);

      // confirm that the teacher is not in the system
      $sql_c = "SELECT * FROM teacher";
        $results = mysqli_query($conn, $sql_c );
        
        while($fetch = mysqli_fetch_assoc($results)) {
          $e = $fetch['email'];
          $fn = $fetch['first_name'];
          $ln = $fetch['last_name'];
          $pos = $fetch['position'];


          if($email === $e) {
            die('user already exist');
         }
         elseif(empty($email)) {
          die('please enter all the details');
         }
            
        }

        $add_sql = "INSERT INTO teacher (passport, first_name, last_name, email, position,department, main_subject) VALUES ('$name', '$fName', '$lName', '$email', '$position', '$department', '$mainSubject')";
        $option = mysqli_query($conn, $add_sql);
  
        if(!$option) {
            exit('An error occured');
        }
        else{
            echo('the teacher has been sucessifully added');
          
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
    <!-- page title -->
    <section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
        <div class="col-md-8">
            <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Teachers</a></li>
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
              <h2 class="mb-0 text-nowrap mr-3">Manage teachers</h2>
              <div class="border-top w-100 border-primary d-none d-sm-block"></div>
            <div>
                <a class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block" href="#" data-toggle="modal" data-target="#addTeacherModal">add teachers</a>
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

        $sql_f = "SELECT * FROM teacher";
        $results_f = mysqli_query($conn, $sql_f );

          while($row = mysqli_fetch_assoc($results_f)) {
            $pass = $row['passport'];
            $e = $row['email'];
            $fn = $row['first_name'];
            $ln = $row['last_name'];
            $pos = $row['position'];


            ?>
            <!-- teacher -->      
              <div class="col-sm-6 col-md-3 mb-4">
                <div class="card hover-shadow">                       
                  <img class="card-img-top rounded-0" style="height: 180px;" src="img/<?php echo $pass;?>" alt="teacher">
                  <div class="card-body">
                    <a href="teacher-single.html">
                      <h4 class="card-title text-uppercase"><?php echo $fn;?> <?php  echo $ln; ?></h4>
                    </a>
                    <h6 class="text-capitalize"><?php echo $pos; ?></h6><br>
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
              <!-- /teacher -->
              <?php
          
              
          }

      


    ?>

        </div>

      <div class="col-1"></div>


    </div>

<!-- Modal -->
<div class="modal fade" id="addTeacherModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content rounded-1 border-0 py-3">
            <div class="modal-header border-0">
                <h4 class="mb-3 text-center"><a class="h3 text-primary text-center font-secondary" href="@@page-link">Add new teachers</a></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-3">
                    <div class="pt-3">
                      <h6 class="ml-2 text-capitalize">passport</h6>
                    </div>
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">first name</h6>
                    </div>
                    <div class="pt-4 ">
                      <h6 class="ml-2 text-capitalize">last name</h6>
                    </div>
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">email</h6>
                    </div>
                    <div class="pt-4 ">
                      <h6 class="ml-2 text-capitalize"> role / position</h6>
                    </div>
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">department</h6>
                    </div>
                    <div class="pt-4 ">
                      <h6 class="ml-2 text-capitalize">main subject</h6>
                    </div>
                  </div>
                  <div class="col-8">
                    <form action="teachers.php" method="POST" enctype="multipart/form-data">
                      <input type="file" name="passport" class=" mt-2" style="height: 40px;">
                      <input type="text" name="fName" class="form-control border-primary mt-2"style="height: 40px;">
                      <input type="text" name="lName" class="form-control border-primary mt-2"style="height: 40px;">
                      <input type="text" name="email" class="form-control border-primary mt-2"style="height: 40px;">
                      <input type="text" name="position" class="form-control border-primary mt-2"style="height: 40px;">
                      <select name="department" id="" class="form-control border-primary mt-2">
                        <option value="Sciences">Sciences</option>
                        <option value="">Languages</option>
                        <option value="Languages">Games & Sports</option>
                        <option value="Music">Music</option>
                        <option value="Academic">Academic</option>
                        <option value="Exams">Exams</option>
                        <option value="Humanities">Humanities</option>
                        <option value="Culture & Religion">Culture & Religion</option>
                      </select>
                      <input type="text" class="form-control border-primary mt-2"style="height: 40px;" name="mainSubject" >
                      <button type="submit" class="btn btn-primary btn-block mt-3 p-1" name="teachers"style="height: 30px;">Save</button>
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