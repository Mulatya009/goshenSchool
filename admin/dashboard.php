<?php
  include('conn.php');

  $users = "SELECT * FROM system_users";
  $uc = mysqli_query($conn,  $users);
  $un = mysqli_num_rows($uc);
    // echo $un;

  $teachers = "SELECT * FROM teacher";
  $tc = mysqli_query($conn,  $teachers);
  $tn = mysqli_num_rows($tc);
    //echo $tn;  

  $events = "SELECT * FROM events";
  $ec = mysqli_query($conn,  $events);
  $en = mysqli_num_rows($ec);
    //echo $en;
    
  $notices = "SELECT * FROM notices";
  $nc = mysqli_query($conn,  $notices);
  $nn = mysqli_num_rows($nc);
    //echo $nn; 
  
  $courses = "SELECT * FROM courses";
  $cc = mysqli_query($conn,  $courses);
  $cn = mysqli_num_rows($cc);
    //echo $cn;

  $blogs = "SELECT * FROM blogs";
  $bc = mysqli_query($conn,  $blogs);
  $bn = mysqli_num_rows($bc);
    //echo $bn;

  $gallery = "SELECT * FROM gallery";
  $gc = mysqli_query($conn,  $gallery);
  $gn = mysqli_num_rows($gc);
    //echo $gn;

  $gallery = "SELECT * FROM gallery";
  $gc = mysqli_query($conn,  $gallery);
  $gn = mysqli_num_rows($gc);
    //echo $gn;
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
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Super Admin </a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
            </ul>
            <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
        </div>
    </div>
    </section>
    <!-- /page title --> 

      <section class="section-sm">
        <div class="container">
          <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title justify-content-between">
                <h2 class="mb-0 text-nowrap mr-3">Categories</h2>
                <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                <div>
                    <a href="#" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">Dashboard</a>
                </div>
              </div>
            </div>
          </div> 
        </section>


            <section>
              <div class="row">
                <div class="col-md-2">
                  <ul class="text-light">
                    <li class="list-inline-item">
                      <a class="text-color" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-tachometer"><b> Dashboard </b></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                      
                        <span style="font-size: 13px;" class="text-uppercase m-2 mx-4 fa fa-files-o"><b> manage content </b> <span class="fa fa-arrow-right"></span></span>                      </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="text-color ml-1" href="#" style="font-size: 12px;" style="font-size: 12px;"><i class="ti-facebook text-primary mr-2"></i> Events</a>
                          <div class="dropdown-divider"></div>
                            <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-twitter-alt text-primary mr-2"></i>  Teachers</a>
                          <div class="dropdown-divider"></div>
                            <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-google text-primary mr-2"></i>  Notices</a>
                          <div class="dropdown-divider"></div>
                            <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-linkedin text-primary mr-2"></i> Courses</a> 
                          <div class="dropdown-divider"></div>
                            <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-linkedin text-primary mr-2"></i> Blogs</a> 
                          <div class="dropdown-divider"></div>
                            <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-linkedin text-primary mr-2"></i> Gallery</a> 
                          </div>
                        </a>

                        <div class="dropdown-divider"></div>

                      
                        <span style="font-size: 13px;" class="text-uppercase m-2 mx-4 fa fa-users"><b> manage users </b> <span class="fa fa-arrow-right"></span></span>
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
                        </a>

                        <div class="dropdown-divider"></div>
                        
                      
                        <span style="font-size: 13px;" class="text-uppercase m-2 mx-4 fa fa-line-chart"> <b> analysis </b><span class="fa fa-arrow-right"></span></span></a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="text-color ml-1" href="#" style="font-size: 12px;" style="font-size: 12px;"><i class="ti-facebook text-primary mr-2"></i> Facebook</a>
                          <div class="dropdown-divider"></div>
                            <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-twitter-alt text-primary mr-2"></i>  Twitter</a>
                          <div class="dropdown-divider"></div>
                            <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-google text-primary mr-2"></i>  Google</a>
                          <div class="dropdown-divider"></div>
                            <a class="text-color ml-1" href="#" style="font-size: 12px;"><i class="ti-linkedin text-primary mr-2"></i>  Linkedin</a> 
                          </div>
                        </a>
                      
                    </li>  
                  </ul>
                </div>

                <div class="col-md-9">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b><?php echo $un; ?></b></h2>
                        <p class="text-center">REG USERS</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small><a href="admins.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b class=""><?php echo $tn; ?></b></h2>
                        <p class="text-center pt-0">TEACHERS</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="teachers.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b class=""><?php echo $en; ?></b></h2>
                        <p class="text-center">EVENTS</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="events.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b class=""><?php echo $nn; ?></b></h2>
                        <p class="text-center">NOTICES</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="notices.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                </div>
                <br>
                <div class="row">
                  <div class="col-sm-3" style="height: 100px;">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b><?php echo $cn; ?></b></h2>
                        <p class="text-center">COURSES</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="courses.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b class=""><?php echo $bn; ?></b></h2>
                        <p class="text-center">BLOGS</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="blogs.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b class=""><?php echo $gn; ?></b></h2>
                        <p class="text-center">GALLERY</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="galery.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b class="">4</b></h2>
                        <p class="text-center">NOTICES</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="manage_brands.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                </div>
                <br>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b class="">17</b></h2>
                        <p class="text-center">SUBSCRIBERS</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="manage_subscribers.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b class="">5</b></h2>
                        <p class="text-center">QUERIES</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="manage_queries.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="card card-sm border-primary rounded-1 hover-shadow">
                      <div class="card-body">
                        <h2 class="text-center"><b class="">2</b></h2>
                        <p class="text-center">TESTIMONIALS</p>
                      </div>
                      <div class="card-footer text-center"><small>FULL DETAILS </small> <a href="manage_testimonials.php"><span class="fa fa-arrow-right"></span></a></div>
                    </div>
                  </div>
                </div>
                </div>

              <div class="col-md-1"></div>
            </div>
          </section>
          <br><br>
    <!-- footer -->
    <?php
        include('footer.php');
    ?>

    <?php
        include('lowerLinks.php');
    ?>

  </body>
</html>