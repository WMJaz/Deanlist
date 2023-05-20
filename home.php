<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="Emil John Q. Magcanta">
   <title>Home | Dean's List Application System - CCS</title>
   <link rel="icon" href="./img/ccslogo.png" type="image/icon type">
    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="https://kit.fontawesome.com/529e4c40ff.css" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<!-- header section starts  -->
<section class="header">
			<a href="home.php" class="logo" img src="ccslogo.png" width ="50" height = "50">Dean's List Application System</a>
   <nav class="navbar">
      <a href="#home">Home</a>
      <a href="#features">Features</a>
      <a href="#about">About</a>
      <a href="#courses">Courses</a>
      <a href="#team">Team</a>
      <a href="#contact">Contact us</a>
      <a href="./login/login.php"><button class="btn btn-outline-success btn-login">Login</button></a>
   </nav>
   <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!-- header section ends -->
<!-- home section starts  -->
<section class="home" id="home">
   <div class="swiper home-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide slide" style="background: linear-gradient(45deg,
            rgba(98, 156, 148, 0.75),
            rgba(19, 115, 104, 0.75)),
            url('img/ccsbg.png'); background-position: center;
            background-size: cover;
            background-repeat: no-repeat;">
            <div class="content">
                <h3 style="font-weight:500">Announcement </h3>
                <span style="font-size: 2.5rem; font-weight:500; color:var(--white);" >A student with excellent grades in all academic subjects shall receive recognition through inclusion in the Dean’s List at the end of every semester of each school year.</span>
               <a href="./login/login.php" class="btn">Apply Now</a>
            </div>
         </div>
         <div class="swiper-slide slide" style="background: linear-gradient(45deg,
            rgba(98, 156, 148, 0.75),
            rgba(19, 115, 104, 0.75)),
            url('img/banner-2.jpg'); background-position: center;
            background-size: cover;
            background-repeat: no-repeat;">
            <div class="content">
                <h3 style="font-weight:500">Announcement</h3>
                <span style="font-size: 2.5rem; font-weight:500; color:var(--white)">Submission of form is available from April 11, 2023 to May 11, 2023 at 8:30am until 4:00pm only.</span>
               <a href="./login/login.php" class="btn">Apply Now</a>
            </div>
         </div>
         <div class="swiper-slide slide" style="background: linear-gradient(45deg,
            rgba(98, 156, 148, 0.75),
            rgba(19, 115, 104, 0.75)),
            url('img/csbuilding.jpg'); background-position: center;
            background-size: cover;
            background-repeat: no-repeat;">
            <div class="content">
                <h3 style="font-weight:500">Announcement</h3>
                <span style="font-size: 2.5rem; font-weight:500; color:var(--white)">Submit yours now and be part of CCS Dean's List!</span>
               <a href="./login/login.php" class="btn">Apply Now</a>
            </div>
         </div>
         
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
   </div>
</section>
<!-- home section ends -->
<!-- services section starts  -->
<section class="services" id="features">
   <h1 class="heading-title" style="font-weight:500"> Features</h1>
   <div class="box-container">
   <div class="box">
      <i class="fas fa-box" style="font-size:60px;color: white;"></i>
         <h3>Dashboard</h3>
      </div>
      <div class="box">
      <i class="fas fa-edit" style="font-size:60px;color: white;"></i>
         <h3>Application</h3>
      </div>
      <div class="box">
      <i class="fas fa-user-check" style="font-size:60px;color: white;"></i>   
         <h3>Dean's Listers</h3>
      </div>
      <div class="box">
      <i class="fas fa-users" style="font-size:60px;color: white;"></i>
         <h3>Faculty</h3>
      </div>
      <div class="box">
      <i class="fas fa-book-reader" style="font-size:60px;color: white;"></i>
         <h3>Courses</h3>
      </div>
     
   </div>
</section>
<!-- services section ends -->
<!-- home about section starts  -->
<h1 class="heading-title" id ="about" style="font-weight:500">About the System</h1>
<section class="home-about" id="about">

   <div class="content">
      
      <p align="justify" style="font-size: 2.3rem; font-weight:200">Dean's list Application System is an online Web Application, where it brings the process of
         dean's list transaction into online form. Managing dean's list forms could be a challenge
         because of the paperworks and processes. As we propose a more convenient way of doing these tasks.</p>
      <center><a href="about.php" class="btn">See more</a></center>
   </div>
</section>
   

<h1 class="heading-title" id ="courses" style="font-weight:500">Courses</h1>

   
<section class="home-about" >
   
   <br>
   <br>
   
   <div class="content">
      <h2>BS in Computer Science</h2>
      <p align="justify" style="font-size:1.8rem; font-weight:200">
         Bachelor of Science in Computer Science (BSCS) is a four-year program that includes the study of 
         computing concepts and theories, algorithmic foundations, and new developments in computing. 
         The program includes the study of the standards and practices in Software Engineering. It prepares 
         students to acquire skills and disciplines required for designing, writing, and modifying software components, 
         modules, and applications that comprise software solutions.</p>
         <center><img src="images/CSBG.jpg" alt="" width="510" height= "510"><center>
   </div>
   <br><div class="content">
      <h2>BS in Information Technology</h2>
      <p align="justify" style="font-size:1.8rem; font-weight:200">
         Bachelor of Science in Information Technology (BSIT) is a four-year program that prepares students to be IT 
         professionals who are able to perform installation, operation, development, maintenance and administration of 
         computer applications. The goal of the program is to gear up students as "information technologists" who can 
         assist individuals and organizations in solving problems using information technology (IT) techniques.<br><br></p>
         <center><img src="images/ITBG.jpg" alt="" width="510" height= "510"><center>
   </div>
   <br>
   <br>
   
   
</section>
<!-- home about section ends -->


<!-- home packages section starts  -->
<section class="home-packages" id="team">
   <h1 class="heading-title" style="font-weight:500"> Our Team </h1>
   <div class="box-container">
      <div class="box">
         <div class="image">
            <br><center><img src="./img/josh.png" alt="" width="100" height="100"></center>
         </div>
         <div class="content">
            <h3>Joshua Yasil</h3>
            <p>Project Manager</p>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <br><center><img src="./img/bush.png" alt=""></center>
         </div>
         <div class="content">
            <h3>Bushra Adjaluddin</h3>
            <p>Quality Assurance</p>
         </div>
      </div>
      
      <div class="box">
         <div class="image">
            <br><center><img src="./img/ejaypogi.png" alt="" height="10"></center>
         </div>
         <div class="content">
            <h3>Emil John Magcanta</h3>
            <p>Lead Developer</p>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <br><center><img src="./img/hamja.png" alt="" height="10"></center>
         </div>
         <div class="content">
            <h3>Abdulasis Hamja</h3>
            <p>Business Analyst</p>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <br><center><img src="./img/denise.png" alt="" height="10"></center>
         </div>
         <div class="content">
            <h3>Denise Vonn Gerzon</h3>
            <p>UX Designer</p>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <br><center><img src="./img/daph.png" alt="" height="10"></center>
         </div>
         <div class="content">
            <h3>Abdar Talib</h3>
            <p>UI Designer</p>
         </div>
      </div>
   </div>
</section>
<!-- home packages section ends -->
<!-- home offer section starts  -->
<section class="home-offer">
   <div class="content">
      
   </div>
</section>
<!-- home offer section ends -->
<!-- footer section starts  -->
<section class="footer" id=contact>
   <div class="box-container">
      <div class="box">
         <h3>quick links</h3>
         <a href="#home"> <i class="fas fa-angle-right"></i> Home</a>
         <a href="#about"> <i class="fas fa-angle-right"></i> About</a>
         <a href="#team"> <i class="fas fa-angle-right"></i> Team</a>
         <a href="#contact"> <i class="fas fa-angle-right"></i>Contact us</a>
      </div>
      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> Ask questions</a>
         <a href="#team"> <i class="fas fa-angle-right"></i> About us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> Privacy Policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> Terms of use</a>
      </div>
      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> 01-234 </a>
         <a href="#"> <i class="fas fa-phone"></i> 56-789 </a>
         <a href="#"> <i class="fas fa-envelope"></i> xt202001281@wmsu.edu.ph </a>
         <a href="#"> <i class="fas fa-map"></i> Zamboanga City, Ph 7000 </a>
      </div>
      <div class="box">
         <h3>follow us</h3>
         <a href="https://www.facebook.com/emiljohn.magcanta.5"> <i class="fab fa-facebook-f"></i> Facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
         <a href="https://github.com/McSing29"> <i class="fab fa-github"></i> Github </a>
      </div>
   </div>
   
   <div  class="credit"> &copy; Developed by <span>Group 6 XD</span> | All Rights Reserved! <p class="float-end"><br><a href="#" style="color:var(--white);">Back to top</a></p></div>
</section>
<!-- footer section ends -->
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- custom js file link  -->
<script src="js/scripts.js"></script>
</body>
</html>