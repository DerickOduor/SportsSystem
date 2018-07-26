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
              <li><a href="http://localhost/legrand/admin/profile"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $this->session->userdata('name');?></a></li>
              <li><a href="http://localhost/legrand/admin/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>          
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <div class="container main">
    <?php 
      /*echo $this->session->flashdata('msg');
      echo form_open_multipart();
      echo form_upload('file');
      echo form_submit('upload','Upload');
      echo form_close();*/
      foreach($res as $pi){
          echo $id=$pi->id;
        }
    ?> 
    <form action="http://localhost/legrand/admin/upload_product_pic/<?php echo $id;?>"method="POST"enctype="multipart/form-data"class="form">
      <div class="form-group">
        <input type="file"name="file"class="form-control"/>
      </div>
      <div class="form-group">
        <button type="submit"class="btn btn-success"name="upload">Upload</button>
      </div>
    </form>
    </div>
</body>
</html>
<script type="text/javascript">
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
</style>
