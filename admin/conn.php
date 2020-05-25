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