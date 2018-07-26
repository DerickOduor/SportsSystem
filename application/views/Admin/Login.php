<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($this->session->userdata('admin_logged'))){
  redirect('http://localhost/SportsSystem/index.php/Admin');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php base_url('index.php')?>css/bootstrap.min.css"/>
    <script src="<?php base_url('index.php')?>js/bootstrap.js"></script>
    <script src="<?php base_url('index.php')?>js/jquery.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 

    <!--<script src="http://localhost/sportssystem/index.php/../js/jquery.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.min.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap-reboot.min.css"/>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap-grid.min.css"/>-->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <script src="assets/js/jquery-1.11.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/fonts/PT_Sans/PT_Sans-Web-Regular.ttf">
    
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
              <li class="active"><a href="http://localhost/SportsSystem/index.php/Login/Admin"><span class="glyphicon glyphicon-login"></span>&nbsp;Admin Login</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <div class="container main">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form action="http://localhost/SportsSystem/index.php/Admin/Login" method="post"id="loginform">
            <div class="error"></div>
            <div class="form-group">
              <label class="control-label">Username</label>
              <input type="text"name="username"id="username"class="form-control" placeholder="Username"required />
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password"class="form-control"name="password"id="password" placeholder="Password"required />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info"><span class="fa fa-sign-in"></span>&nbsp;<span class="b">Login</span></button>
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
    $('.error').hide();
    $('form').on('submit',function(e){
      e.preventDefault();
      //alert($(this).serialize());
    if ($('#username').val().length == 0) {
      var error = true;
      $('#username').css("border-color", "#D8000C");
      $('#username').css("color", "#D8000C");
    }else{
      $('button').attr({
        'disabled': 'false'
      });
      $('.b').html('Logging in...');
      var u_=$(this).attr('action');
      //var login_details=
      /*$.ajax({
        url:u_,
        method: 'post',
        data: $(this).serialize(),
        success:function(result){
          alert(result);
        },
        error:function(){
          alert("Something went wrong");
        }
      });*/
      $.post(u_, $(this).serialize(), function (result) {
        //and after the ajax request ends we check the text returned
        if (result =='sent') {
          //if the mail is sent remove the submit paragraph
          $('button').removeAttr('disabled');
          $('.b').html('Login');
          window.open('http://localhost/sportssystem/index.php/admin','_self');
          //alert(result);
          $('#cf-submit').remove();
          //and show the mail success div with fadeIn
          $('#mail-success').fadeIn(500);
        } else{
          //alert('Failed');
          $('button').removeAttr('disabled');
          $('.b').html('Login');
          $('.error').html('Incorrect username or password!');
          $('.error').fadeIn('linear',500);
        }
      });
    }
    
    });
});
</script>
<style type="text/css">
body {
          padding-top: 50px;
          position: relative;
          font-family: tahoma;
          background: rgb(0,0,0,0.8);
          background-image: url('http://localhost/sportssystem/index.php/../assets/img/sports/fifa_18_stadium-wallpaper-7680x4320.jpg');
    background-repeat: no-repeat;
    background-size: cover;
          color: #fff;
          width: 100%;
      }
@font-face {
 font-family: 'PT Sans';
 font-style: normal;
 font-weight: 400;
 src: url('../fonts/lato/lato-light.woff2') format('woff2'),url('../fonts/lato/lato-light.eot'), url('../fonts/lato/lato-light.eot?#iefix') format('embedded-opentype'), url('http://localhost/sportssystem/index.php/../assets/fonts/PT_Sans/PT_Sans-Web-Regular.ttf') format('truetype'), url('../fonts/lato/lato-light.svg#latolight') format('svg');
}      
      
      pre {
          tab-size: 8;
      }
      .main{
        margin-top: 80px;
        font-family: tahoma;
        width: 100%;
      }
      .main .row{
        width: 100%;
      }
      #loginform{
        background: rgb(0,0,0,0.3);
        padding: 18px;
        border: 1px #fff solid;
        border-radius: 5px; 
        width: 100%;
      }
      form{
        margin: 7px;
        font-family: 'PT Sans', sans-serif;
      }
      form label{
        color: #fff;
      }
      .error{
        color: red;
        background: #fff;
        padding: 8px;
        text-align: center;
        font-weight: bold;
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
