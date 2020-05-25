<?php

  session_start();

    include('conn.php');

    if(isset($_POST['addGallery'])) {
     $gTitle= trim(mysqli_real_escape_string($conn, $_POST['gTitle']));
     $gPlace= trim(mysqli_real_escape_string($conn, $_POST['gPlace']));
     $gDate = trim(mysqli_real_escape_string($conn, $_POST['gDate']));

      //pic1
      $name1 = $_FILES['pic1'] ['name'];
      $size1 = $_FILES['pic1'] ['size'];
      $type1 = $_FILES['pic1'] ['type'];
      $temp1 = $_FILES['pic1'] ['tmp_name'];

      //pic2 
      $name2 = $_FILES['pic2'] ['name'];
      $size2 = $_FILES['pic2'] ['size'];
      $type2 = $_FILES['pic2'] ['type'];
      $temp2 = $_FILES['pic2'] ['tmp_name'];

      //pic3
      $name3 = $_FILES['pic3'] ['name'];
      $size3 = $_FILES['pic3'] ['size'];
      $type3 = $_FILES['pic3'] ['type'];
      $temp3 = $_FILES['pic3'] ['tmp_name'];

      //pic4
      $name4 = $_FILES['pic4'] ['name'];
      $size4 = $_FILES['pic4'] ['size'];
      $type4 = $_FILES['pic4'] ['type'];
      $temp4 = $_FILES['pic4'] ['tmp_name'];

      // move to folder
      move_uploaded_file($temp1, "img/" .$name1);
      move_uploaded_file($temp2, "img/" .$name2);
      move_uploaded_file($temp3, "img/" .$name3);
      move_uploaded_file($temp4, "img/" .$name4);

      // confirm that the event is not in the system
      $sql_c = "SELECT * FROM gallery";
        $results = mysqli_query($conn, $sql_c );
        
        while($fetch = mysqli_fetch_assoc($results)) {
          $picTitle = $fetch['pic_title'];

          if($gTitle === $picTitle) {
            die('gallery already exist');
         }
         elseif(empty($gTitle)) {
          die('please enter all the details');
         }
            
        }

        $add_sql = "INSERT INTO gallery (pic1, pic2, pic3, pic4, pic_title,pic_place, pic_date) VALUES ('$name1', '$name2', '$name3', '$name4', '$gTitle', '$gPlace', '$gDate')";
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
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Gallery</a></li>
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
              <h2 class="mb-0 text-nowrap mr-3">Manage Gallery</h2>
              <div class="border-top w-100 border-primary d-none d-sm-block"></div>
            <div>
                <a class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block" href="#" data-toggle="modal" data-target="#addGallery">add gallery</a>
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

  $sql_f = "SELECT * FROM gallery";
  $results_f = mysqli_query($conn, $sql_f );

    while($row = mysqli_fetch_assoc($results_f)) {
      $cPic1 = $row['pic1'];
      $cPic2 = $row['pic2'];
      $cPic3 = $row['pic3'];
      $cPic4 = $row['pic4'];
      $cTitle = $row['pic_title'];
      $cPlace = $row['pic_place'];

      ?>
        <!-- gallery -->      
      <div class="col-sm-6 col-md-3 mb-4">
        <div class="card border-1 rounded-1 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="img/<?php echo $cPic1; ?>" alt="event thumb" style="height: 180px;">
            <div class="card-date"><span>21</span><br>December</div>
          </div>
          <div class="bdy pl-2">
            <!-- location -->
            <p style="font-size: 13px;"><i class="ti-location-pin text-primary mr-2"></i><?php echo $cPlace; ?>,</p>
            <a href="event-single.html" class="m-0" style="margin-top: px;">
              <h6 class="card-title text-capitalize text-underline"><?php echo $cTitle; ?></h6>
            </a>

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
         <!-- gallery -->      
      <div class="col-sm-6 col-md-3 mb-4">
        <div class="card border-1 rounded-1 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="img/<?php echo $cPic2; ?>" alt="event thumb" style="height: 180px;">
            <div class="card-date"><span>21</span><br>December</div>
          </div>
          <div class="bdy pl-2">
            <!-- location -->
            <p style="font-size: 13px;"><i class="ti-location-pin text-primary mr-2"></i><?php echo $cPlace; ?>,</p>
            <a href="event-single.html" class="m-0" style="margin-top: px;">
              <h6 class="card-title text-capitalize text-underline"><?php echo $cTitle; ?></h6>
            </a>

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
         <!-- gallery -->      
      <div class="col-sm-6 col-md-3 mb-4">
        <div class="card border-1 rounded-1 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="img/<?php echo $cPic3; ?>" alt="event thumb" style="height: 180px;">
            <div class="card-date"><span>21</span><br>December</div>
          </div>
          <div class="bdy pl-2">
            <!-- location -->
            <p style="font-size: 13px;"><i class="ti-location-pin text-primary mr-2"></i><?php echo $cPlace; ?>,</p>
            <a href="event-single.html" class="m-0" style="margin-top: px;">
              <h6 class="card-title text-capitalize text-underline"><?php echo $cTitle; ?></h6>
            </a>

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
         <!-- gallery -->      
      <div class="col-sm-6 col-md-3 mb-4">
        <div class="card border-1 rounded-1 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="img/<?php echo $cPic4; ?>" alt="event thumb" style="height: 180px;">
            <div class="card-date"><span>21</span><br>December</div>
          </div>
          <div class="bdy pl-2">
            <!-- location -->
            <p style="font-size: 13px;"><i class="ti-location-pin text-primary mr-2"></i><?php echo $cPlace; ?>,</p>
            <a href="event-single.html" class="m-0" style="margin-top: px;">
              <h6 class="card-title text-capitalize text-underline"><?php echo $cTitle; ?></h6>
            </a>

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
<div class="modal fade" id="addGallery" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content rounded-1 border-0 py-3">
            <div class="modal-header border-0">
                <h4 class="mb-3 text-center"><a class="h3 text-primary text-center font-secondary" href="@@page-link">Add new pictures</a></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-3">
                  <div class="pt-3">
                      <h6 class="ml-2 text-capitalize">pictures</h6>
                    </div>
                    <div class="pt-4">
                      <h6 class="ml-2 text-capitalize"></h6>
                    </div>
                    <div class="pt-3">
                      <h6 class="ml-2 text-capitalize">place</h6>
                    </div>
                    <div class="pt-4 ">
                      <h6 class="ml-2 text-capitalize">picture title</h6>
                    </div>
                    <div class="pt-3 ">
                      <h6 class="ml-2 text-capitalize">picture date</h6>
                    </div> 
                  </div>
                  <div class="col-8">
                    <form action="galery.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-md-6">
                            <input type="file" name="pic1" class="mt-2" style="height: 40px;">
                          </div>
                          <div class="col-md-6">
                            <input type="file" name="pic2" class="mt-2" style="height: 40px;">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                            <input type="file" name="pic3" class="mt-2" style="height: 40px;">
                          </div>
                          <div class="col-md-6">
                            <input type="file" name="pic4" class="mt-2 border-primary" style="height: 40px;">
                          </div>
                      </div>
                      <input type="text" name="gPlace" class="form-control border-primary mt-2"style="height: 40px;">
                      <input type="text" name="gTitle" class="form-control border-primary mt-2"style="height: 40px;">
                      <input type="date" name="gDate" class="form-control border-primary mt-2"style="height: 40px;">
                      <button type="submit" class="btn btn-primary btn-block mt-2 p-1" name="addGallery"style="height: 30px; padding-bottom : 15px;">Add</button>
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