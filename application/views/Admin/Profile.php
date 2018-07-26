<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$tags=array("","Shirts","Trousers","Sweaters");
$gender=array("","Unisex","Male","Female");
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

  <script src="http://localhost/sportssystem/index.php/../js/jquery.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap.css"/>
     
	<title>LeGrand-</title>
</head>
<body>
	<header role="banner" class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
      	<a class="navbar-brand" href="http://localhost/legrand/admin/main">Le Grand</a>
        <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="navbar-inverse side-collapse in">
          <nav role="navigation" class="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="http://localhost/legrand/admin/main"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
              <li><a href="http://localhost/legrand/admin/orders"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Orders</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-globe"></span>&nbsp;Notifications</a></li>
              <li><a href="http://localhost/legrand/index.php/admin/profile"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $this->session->userdata('name');?></a></li>
              <li><a href="http://localhost/legrand/admin/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>          
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <div class="container main">
    
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
