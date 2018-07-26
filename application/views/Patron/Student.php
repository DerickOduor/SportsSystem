<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!--<script src="http://localhost/sportssystem/index.php/../js/jquery.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap.min.css"/>-->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <title>Sports System</title>
</head>
<body>
    <header role="banner" class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <a class="navbar-brand" href="http://localhost/SportsSystem/">Sports System</a>
        <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-right"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="navbar-inverse side-collapse in">
          <nav role="navigation" class="navbar-collapse pull-right">
            <ul class="nav navbar-nav">
              <li class="active"><a href="http://localhost/SportsSystem/index.php/Patron"><span class="fa fa-home"></span>&nbsp;Home</a></li>
              <li><a href="#"><span class="fa fa-globe"></span>&nbsp;Notifications</a></li>
              <li><a href="#"><span class="fa fa-user"></span>&nbsp;<?php echo $this->session->userdata('patron_logged')?></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <div class="main">
      <div class="row">
        <div class="col-md-2">
          <span style="cursor:pointer" onclick="openNav()" id="menu" class="fa fa-bars">Side Menu</span>
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/Students">Students</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/ApproveStudents">Approve Students</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/Events">Events</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/NewEvent">New event</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/Messages">Messages</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/SelectStudents">Select students</a></li>
          </div>
        </div>
        <div class="col-md-10">
          <div id="content">
            <div class="container" id="welcome">
              Welcome back!&nbsp;<?php echo $this->session->userdata('patron_logged')?>
            </div>
          </div>
        </div>
      </div>
      <!--<li><a href="http://localhost/SportsSystem/index.php/Admin/Games">Games</a></li>-->
      <!--<a href="http://localhost/SportsSystem/index.php/Admin/Games"class="btn btn-info">Games</a>-->

    </div>
</body>
</html>
<script type="text/javascript">
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}  
$(document).ready(function() {   
    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
    sideslider.click(function(event){
        $(sel).toggleClass('in');
        $(sel2).toggleClass('out');
    });
});
</script>
<style type="text/css">
body {
          padding-top: 50px;
          position: relative;
          font-family: tahoma;
      }
      
      pre {
          tab-size: 8;
      }
      .main{
        margin-top: 10px;
        font-family: tahoma;
      }
      @media screen and (max-width: 768px) {
          .side-collapse-container{
            width:100%;
            position:relative;
            left:0;
            transition:left .4s;
          }
          .side-collapse-container.out{
            left:200px;
          }
          .side-collapse {
            top:50px;
            bottom:0;
            left:0;
            width:200px;
            position:fixed;
            overflow:hidden;
            transition:width .4s;
          }
          .side-collapse.in {
             width:0;
          }
          .input-group{
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
          }
      } 
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    margin-top: 50px;
}

.sidenav li a,.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 18px;
    color: #818181;
    display: block;
    transition: 0.3s;
}
.sidenav li{
  list-style: none;
  padding: 8px 8px 8px 32px;
  display: block;
  border-bottom: 1px rgb(255,255,255,0.5) solid;
}

.sidenav a:hover,.sidenav li a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
#menu{
  margin-left: 15px;
  margin-top: 25px;
  padding-top: 55px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}            
</style>
