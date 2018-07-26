<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$game="";
if(empty($this->session->userdata('admin_logged'))){
  redirect('http://localhost/SportsSystem/index.php/Admin');
}else{
  if(count($res)>0){
    foreach ($res as $r) {
      $game=$r->name;
    }
    }else{
      echo "No games found!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php base_url('index.php')?>css/bootstrap.min.css"/>
    <script src="<?php base_url('index.php')?>js/bootstrap.js"></script>
    <script src="<?php base_url('index.php')?>js/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

    <script src="http://localhost/sportssystem/index.php/../js/jquery.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.min.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap-reboot.min.css"/>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap-grid.min.css"/>

    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../fonts/RobotoCondensed-BoldItalic.ttf"/>


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
              <li><a href="http://localhost/SportsSystem/index.php/Admin"><span class="glyphicon glyphicon-login"></span>&nbsp;Home</a></li>
              <li class="active"><a href="http://localhost/SportsSystem/index.php/Admin"><span class="glyphicon glyphicon-login"></span>&nbsp;<?php echo $game ?></a></li>
              <li><a href="http://localhost/SportsSystem/index.php/Admin/Logout"><span class="glyphicon glyphicon-login"></span>&nbsp;<?php echo $this->session->userdata("admin_logged")?></a></li>  
              <li><a href="http://localhost/SportsSystem/index.php/Admin/Logout"><span class="glyphicon glyphicon-login"></span>&nbsp;Logout</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!--<nav class="navbar navbar-inverse fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="http://localhost:8080/">SOMS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="http://localhost:8080/"><span class="fa fa-home"></span>&nbsp;Home <span class="sr-only">(current)</span></a>
              </li>
          </ul>
      </div>
  </nav>-->

    <div class="main">
      <div class="row">
        <div class="col-md-2">
          <span style="cursor:pointer" onclick="openNav()" id="menu" class="fa fa-bars">Side Menu</span>
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <li><a href="http://localhost/SportsSystem/index.php/Admin/Games">Games</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Admin/Events">Events</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Admin/Patrons">Patrons</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Admin/Games">Students</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Admin/Games">Finance</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Admin/Games">Reports</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Admin/Games">Budget</a></li>
          </div>
        </div>
        <div class="col-md-8">
          <div>
            abcd
          </div>
        </div>
        <div class="col-md-2" style="background: green;">d</div>
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
          padding-top: 0px;
          position: relative;
          font-family: tahoma;
    background: #F5F5F5;
    overflow-x: hidden; 
      }
      
      pre {
          tab-size: 8;
      }
      .main{
        margin-top: 50px;
        font-family: tahoma;
        width: 100%;
          line-height: 100%;
      }
      #v_n{
        background: #E0E0E0;
        overflow-y: scroll;
        overflow-x: hidden;
        height: 625px; 
        padding-top: 40px;
        position: relative;
        width: 100%;
      }
      #v_n ul{
        list-style: none;
      }
      #v_n ul li{
        display: block;
        padding: 5px;
      }
      #v_n ul li a{
        padding-left: 25px;
        padding-right: 30px;
        padding-top: 5px;
        padding-bottom: 5px;
        font-size: 13px;
        color: #212121;
        left: -20;
      }
      #v_n ul li a:hover{
        background: #212121;
        color: #E0E0E0;
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
          .main{
            padding: 5px;
          }
          #v_n{
            width:100%;
            background: #E0E0E0; 
            overflow-y: hidden;
            overflow-x: hidden;
            height: 80px;
            padding-top: 5px;
            border: 0.8px #757575 solid;
            border-radius: 5px;
            margin: 3px;
          }
          #v_n ul{
            list-style: none;
          }
          #v_n ul li{
            display: inline-block;
          }
          #v_n ul li a{
            padding: 5px;
            font-size: 12px;
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
