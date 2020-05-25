<!DOCTYPE html>
<html lang="zxx">
  <head>    
    <?php
        include('upperLinks.php');
    ?>
  </head>

  <body> 
    <?php

        session_start();
        //connect to db
        include('conn.php');

        if(isset($_POST['login'])) {
            //$userName = trim(mysqli_real_escape_string($conn, $_POST['userName']));
            $userEmail = trim(mysqli_real_escape_string($conn, $_POST['email']));
            $userPassword = trim(mysqli_real_escape_string($conn, $_POST['loginPassword']));

            $sql = " SELECT * FROM system_users";
            $option = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($option)) {
                $e = $row['email'];
                $p = $row['password'];
                $u = $row['user_level'];

                 //echo $u;
                if($userEmail === $e AND $userPassword === $p) {
                    if($u == 'admin') {
                        ?>
                            <script>
                                alert('Welcome Admin!!!');
                            </script>
                        <?php
                        header('location: dashboard.php');
                    }
                    else if($u == 'User') {
                        ?>
                            <script>
                                alert('Welcome Admin!!!');
                            </script>
                        <?php
                        header('location: userDashboard.php');

                    }
                    

                    
                }
            }


           
        }

    ?>

    <div class="row bg-white mt-5">
    </div>
    <div class="row bg-white mt-4">
    </div>

    <!-- adminLogin -->
    <div class="row mt-5 py-5">
        <div class="col-3"></div>
                            
        <div class="col-6 py-4 card card-sm border-primary rounded-1 hover-shadow">
            <div class="card-title border-0 text-center">
                <h3 style="color: #ffbc3b;">Sign In</h3>
                </div>
                <div class="card-body">
                    <form action="index.php" method = "POST" class="row">
                        <div class="col-1"></div>                            
                        <div class="col-10">
                            <input type="email" class="form-control mb-1 rounded-3 text-muted border-primary" id="loginName" name="email" placeholder="Email*" style="height: 50px;">
                        </div>
                        <div class="col-1 m-0"></div>
                                                    
                        <div class="col-1"> </div>                           
                        <div class="col-10">
                            <input type="password" class="form-control mb-2 rounded-3 text-muted border-primary" id="loginPassword" name="loginPassword" placeholder="Password*" style="height: 50px;">
                        </div>
                        <div class="col-1"></div>                           
                        
                        <div class="col-1"></div>
                        <div class="col-10">
                            <button type="submit" class="btn btn-primary btn-block p-1" style="height: 30px;" name="login"><span class="font-weight-bold">Login</span></button>
                        </div>
                        <div class="col-1"></div>                           
                    </form>
                </div>
            </div>   
        </div>

        <div class="col-3"></div>
        
    </div>
    <!-- end of adminLogin -->


    <?php
        include('lowerLinks.php');
    ?>

  </body>
</html>