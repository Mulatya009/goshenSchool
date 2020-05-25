<?php

  session_start();

    include('conn.php');

    if(isset($_POST['addNotice'])) {
      $nType = trim(mysqli_real_escape_string($conn, $_POST['nType']));
      $nTitle= trim(mysqli_real_escape_string($conn, $_POST['nTitle']));
      $nDate = trim(mysqli_real_escape_string($conn, $_POST['nDate']));
      $synopsis = trim(mysqli_real_escape_string($conn, $_POST['synopsis']));

      // cover photo
      $name = $_FILES['photo'] ['name'];
      $size = $_FILES['photo'] ['size'];
      $type = $_FILES['photo'] ['type'];
      $temp = $_FILES['photo'] ['tmp_name'];

      // move to folder
      move_uploaded_file($temp, "img/" .$name);

      // confirm that the event is not in the system
      $sql_c = "SELECT * FROM notices";
        $results = mysqli_query($conn, $sql_c );
        
        while($fetch = mysqli_fetch_assoc($results)) {
          $noticeTitle = $fetch['notice_title'];

          if($nTitle === $noticeTitle) {
            die('event already exist');
         }
         elseif(empty($nTitle)) {
          die('please enter all the details');
         }
            
        }

        $add_sql = "INSERT INTO notices (photo, notice_type, notice_title,  notice_date, synopsis) VALUES ('$name', '$nType ', '$nTitle', '$nDate', '$synopsis')";
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
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Notices</a></li>
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
              <h2 class="mb-0 text-nowrap mr-3">Manage Notices</h2>
              <div class="border-top w-100 border-primary d-none d-sm-block"></div>
            <div>
                <a class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block" href="#" data-toggle="modal" data-target="#addNotice">add notice</a>
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

  $sql_f = "SELECT * FROM notices";
  $results_f = mysqli_query($conn, $sql_f );

    while($row = mysqli_fetch_assoc($results_f)) {
      $cPhoto = $row['photo'];
      $cType = $row['notice_type'];
      $cTitle = $row['notice_title'];
      $cDate = $row['notice_date'];
      $cSynopsis = $row['synopsis'];


      ?>
      <!-- event -->      
      <div class="col-sm-6 col-md-3 mb-4">
        <div class="card border-1 rounded-1 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="img/<?php echo $cPhoto; ?>" alt="event thumb" style="height: 180px;">
            <div class="card-date"><span>21</span><br>December</div>
          </div>
          <div class="bdy pl-2">
            <!-- location -->
            <a href="event-single.html" class="m-0">  
              <h6 class="card-title text-capitalize text-underline mt-2" style="text-decoration: underlined;"><?php echo $cTitle; ?></h6>
            </a>
            <p style="font-style: italic; font-size: 11px;" class="text-light p-1"><?php echo $cSynopsis; ?>....</p>

            <ul class="list-inline text-center mb-1">
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
<div class="modal fade" id="addNotice" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content rounded-1 border-0 py-3">
            <div class="modal-header border-0">
                <h4 class="mb-3 text-center"><a class="h3 text-primary text-center font-secondary" href="@@page-link">Add new notice</a></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-3">
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">cover photo</h6>
                    </div> 
                    <div class="pt-4">
                      <h6 class="ml-2 text-capitalize">notice type</h6>
                    </div>
                    <div class="pt-3">
                      <h6 class="ml-2 text-capitalize">notice title</h6>
                    </div>
                    <div class="pt-4 ">
                      <h6 class="ml-2 text-capitalize">date</h6>
                    </div>
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">synopsis</h6>
                    </div> 
                  </div>
                  <div class="col-8">
                    <form action="notices.php" method="POST" enctype="multipart/form-data">
                      <input type="file" name="photo" class="mt-2" style="height: 40px;">           
                      <select name="nType" id="" class="form-control border-primary mt-2">
                        <option value="Internal">Internal events</option>
                        <option value="External">External events</option>
                        <option value="Educational">Educational events</option>
                        <option value="Motivational">Motivational events</option>
                        <option value="Debate Sessions">Debate Sessions</option>
                        <option value="Club events ">Club events</option>
                        <option value="games / sports">Games & Sports</option>
                        <option value="Music">Music events</option>
                        <option value="Academic">Academic events</option>
                        <option value="Exams">Exams events</option>
                        <option value="Graduation">Graduation events</option>
                        <option value="Political">Political events</option>  
                        <option value="Enviromental">Enviromental events</option>                      
                        <option value="Culture & Religion">Culture & Religion</option>
                      </select>
                      <input type="text" name="nTitle" class="form-control border-primary mt-2"style="height: 40px;">
                      <input type="date" name="nDate" class="form-control border-primary mt-2"style="height: 40px;">
                      <textarea class="form-control border-primary mt-2" name="synopsis" style="height: 100px;"></textarea>
                      <button type="submit" class="btn btn-primary btn-block mt-2 p-1" name="addNotice"style="height: 30px;">Add</button>
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