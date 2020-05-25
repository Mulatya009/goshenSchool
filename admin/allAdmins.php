<?php
    //database connection
    $conn = mysqli_connect('localhost', 'root', '', 'goshendb');

        //test connection
        if($conn) {
            //print('connected');
        }else{
            exit('connection failed');
        }

    //database selection
    $db_select = mysqli_select_db($conn, 'goshendb');

        //test selection
        if(!$db_select) {
            die('db not selected');
        }else{
            //echo('selected');
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
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">System Users</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
            </ul>
            <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
        </div>
    </div>
    </section>
    <!-- /page title -->

    <!-- admins -->
    <section class="section-sm">
        <div class="container">
            <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title justify-content-between">
                <h2 class="mb-0 text-nowrap mr-3">Users</h2>
                <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                <div>
                    <a href="courses.php" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see all</a>
                </div>
                </div>
            </div>
            </div>  
        <!-- course list -->
        <div class="row justify-content-center">
        <script>
            let year = new Date().getFullYear();
        </script>
        <!-- course item -->

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

                <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="card p-0 border-primary rounded-0 hover-shadow">
                        <img class="card-img-top rounded-0" style="height: 300px;" src="img/<?php echo $dp; ?>" alt="course thumb">
                        <div class="card-body">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>               
                            <script>                        
                                document.write(year);
                            </script>
                            </li>
                            <li class="list-inline-item">
                            <a class="text-color text-capitalize" href="#"><?php echo $uLevel; ?></a>
                            </li>
                        </ul>
                            <a href="course-single.php">
                                <p class="h4 card-title text-capitalize"><?php echo $fName; ?> <?php echo $lName; ?></p>
                            </a>
                            <a href="#" class="float-right" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-dribbble text-primary"></i>
                            </a>
                         <div class="dropdown-menu navbar-dropdown" aria-labelledby="elipsisDropdown">
                            <a class="dropdown-item" href="edit.html">
                                <i class="ti-pencil text-primary mr-2 text-success" style="margin-top: 4.1px;"></i>
                                <span style="font-size: 12px;">edit user</span>
                            </a>
                            <div class="dropdown-divider"></div>  
                                <a class="dropdown-item form-inline" href="#">
                                <i class="ti-trash text-primary mr-2 text-danger" style="margin-top: 4.1px;"></i>
                                <span style="font-size: 12px;">delete user</span>
                            </a>
                        </div>
                            <a href="course-single.php" class="btn btn-primary btn-sm">view profile</a>
                            <a href="#" class="float-right"></a>
                            <!-- <a href="#" class="float-right"><i class="ti-trash text-primary"></i></a> -->
                            <!-- <a href="#" class="float-right"><i class="ti-pencil text-primary"></i></a> -->
                            
                        </div>
                    </div>
                </div>

                 <?php
             }
        ?>
   
    </section>
    
    <!-- /courses -->
    <!-- end of admins -->

    <!-- footer -->
    <?php
        include('footer.php');
    ?>

    <?php
        include('lowerLinks.php');
    ?>

  </body>
</html>