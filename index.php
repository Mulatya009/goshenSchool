<!DOCTYPE html> 
<html>
<head>
	<title>InstaRide</title>
   <link rel="icon" href="car13.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="landing_page.css">

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<style>

   *{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
html{
	font-size: 10px;
}
body{
	font-family: verdane, sans-serif;
}
.header{
	width: 100%;
	height: 100vh;
	font-family: tahoma, sans-serif;
	background: linear-gradient(to right bottom, rgba(73, 74, 67, 0.8), rgba(141, 47, 93, 0.8)), url('car8.jpg') center no-repeat;
	background-size: cover;
	position: relative;
	clip-path: polygon(0 0, 100% 0, 100% 95vh, 0% 100%);
	border-radius: 0% 0% 300% 0%;
	box-shadow: 0 0 200px 0 rgba(73, 74, 67, 0.8);
}
nav{
	width: 80%;
	height: 7rem;
	line-height: 7rem;
	position: absolute;
	top: 2rem;
	left: 50%;
	font-size: 1.4rem;
	transform: translateX(-50%);
	/*text-transform: uppercase;*/
}
.logo-box{
	float: left;
}

nav ul{
	list-style: none;
	float: right;
}
nav ul li{
	display: inline-block;
	padding: 0 1.5rem;
}

nav ul li a{
	text-decoration: none;
	color: #fff; 
}
nav ul li a:hover{
	padding-bottom: .5rem;
	border-bottom: .1rem solid #ffbc3b;
	text-decoration: none;
	color: #ffbc3b;
}

.text-box{
	position: absolute;
	top: 45%;
	left: 50%;
	transform: translate(-50%, -50%);
	font-size: 3rem;
	text-align: center;
}
.primary-heading{
	color: #ffbc3b;
	/*text-transform: uppercase;*/
	margin-bottom: 6rem;
}
.heading-main{
	display: block;
	font-size: 6rem;
	font-weight: 400;
	letter-spacing: 2.5rem;
	margin-right: -3.5rem;
	animation: moveLeft 1s ease-in;
}
#head_topic{
	/*margin-left: 100px;*/
}
#insta{
	/*animation: moveRight 1s ease-in;*/
	font-size: 6rem;
	margin-left: -400px;
	margin-top: 90px;
	letter-spacing: 1.5rem;
	color: #ffbc3b;
	animation: moveLeft 1.5s ease-in;
}
#ride{
	/*animation: moveRight 1s ease-in;*/
	font-size: 6rem;
	margin-top: -130px;
	margin-left: 10px;
	letter-spacing: 1.5rem;
	position: absolute;
	color: #ffbc3b;
	animation: moveRight 1.5s ease-in;
}
.heading-sub{
	display: block;
	font-size: 3.5rem;
	font-weight: 700;
	letter-spacing: 0.75rem;
	/*margin-right: -1.75rem;*/
	animation: moveUp 2s ease-in;
	color: #fff;
	margin-left: -80px;

} 
.btn{
	/*text-transform: uppercase;*/
	text-decoration: none;
	padding: 1.5rem 4rem;
	display: inline-block;
	border-radius: 10rem;
	font-size: 1.3rem;
	margin-left: -100px;
	border: none;
	background-color: #ffbc3b;
	color: #fff;
	transition: all .2s;
	animation: moveUp 2.5s ease-in;
}
.btn:hover{
	transform: translateY(-3px);
	box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
}

@keyframes moveLeft {
	0%{
		opacity: 0;
		transform: translateX(-15rem);
	}
	100%{
		opacity: 1;
		transform: translate(0);
	}
}

@keyframes moveRight {
	0%{
		opacity: 0;
		transform: translateX(15rem);
	}
	100%{
		opacity: 1;
		transform: translate(0);
	}
}

@keyframes moveUp {
	0%{
		opacity: 0;
		transform: translateY(7rem);
	}
	100%{
		opacity: 1;
		transform: translate(0);
	}
}

@keyframes moveDown {
	0%{
		opacity: 0;
		transform: translateY(-8rem);
	}
	100%{
		opacity: 1;
		transform: translate(0);
	}
}

/*arrow*/
#span_arrow{
	font-size: 1.9rem;
	margin-left: 1rem;
	color: #8d2f5d;
}


</style>

<body>
   <header class="header">
      <nav>
         <div class="logo-box"> 
            <a href=""></a>
         </div>
         <ul>
            <li><a href="admin\index.php">Admin Login</a></li>
         </ul>
      </nav> 
      <div class="text-box">
         <h1 class="primary-heading">
            <div id="head_topic">
               <h4 id="insta">Goshen</h4> <br>
                <h4><b id="ride">School</b></h4>
               <!-- <br> -->
               <span class="heading-sub">the school which all should dream of</span>
            </div>
            
         </h1>
         <h5><a href="home.php" class="btn">Get Started <span class="fa fa-long-arrow-right" id="span_arrow"></span></a></h5>
      </div>

   </header>
</body>
</html>