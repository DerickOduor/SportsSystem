<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php base_url('index.php')?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php base_url('index.php')?>css/fontawesome.min.css"/>
    <script src="<?php base_url('index.php')?>js/bootstrap.js"></script>
    <script src="<?php base_url('index.php')?>js/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> 

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/css/font-awesome.min.css">
  <script src="http://localhost/sportssystem/index.php/../assets/js/jquery-1.11.1.min.js"></script>
  <script src="http://localhost/sportssystem/index.php/../assets/js/bootstrap.min.js"></script>
    
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
              <li class="active"><a href="http://localhost/SportsSystem/index.php/Login/Student"><span class="fa fa-home"></span>&nbsp;Student Login</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <div class="container main">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form action="http://localhost/sportssystem/index.php/student/login" method="post" class="form">
            <div class="form-group" id="error"></div>
            <div class="form-group">
              <label class="control-label">Username</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Username" required/>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info"><span class="b"></span>Login&nbsp;<span class="fa fa-sign-in"></span></button>
            </div>
            <div class="form-group">
              Register <a href="http://localhost/sportssystem/index.php/student/goregister">here</a>
            </div>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
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
    $('#error').hide();
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
      form{
        font-family: 'PT Sans', sans-serif;
        margin-top: 50px;
        padding: 15px;
        border: 1px solid #000;
        border-radius: 5px; 
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
</style>
