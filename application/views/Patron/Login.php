<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sports System</title>

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Kaushan+Script|Nanum+Pen+Script|Oleo+Script|PT+Sans:400,400i,700,700i|Prompt:100,100i,300i,400,400i,500,700i" rel="stylesheet">

    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/fonts/PT_Sans/PT_Sans-Web-Regular.ttf">
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/bootstrap_4/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/css/font-awesome.min.css">
    <script src="http://localhost/sportssystem/index.php/../assets/js/jquery-1.11.1.min.js"></script>
    <script src="http://localhost/sportssystem/index.php/../assets/js/bootstrap_4/bootstrap.min.js"></script>
  </head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="http://localhost/sportssystem/"><img src="http://localhost/sportssystem/index.php/../assets/img/sports/logo.png" height="28px" width="180px;" /></a>
      <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#"><span class="fa fa-sign-in"></span>&nbsp;Patron Login</a>
        </li>
      </ul>
    </nav>

    <div class="container main">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div>
            <form action="http://localhost/sportssystem/index.php/patron/login" method="post" class="form">
              <div class="form-group">
                <label class="control-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required/>
              </div>
              <div class="form-group">
                <label class="control-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-info"><span class="fa fa-sign-in"></span>&nbsp;<span class="b">Login</span></button>
              </div>
            </form>
          </div>
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
      if ($('#username').val().length == 0 || $('#username').val().indexOf('@') == '-1') {
        var error = true;
        $('#username').css("border-color", "#D8000C");
        $('#username').css("color", "#D8000C");
      }else if ($('#password').val().length == 0) {
        var error = true;
        $('#password').css("border-color", "#D8000C");
        $('#password').css("color", "#D8000C");
      }else{
        $('button').attr({
          'disabled': 'false'
        });
        $('.b').html('Logging in...');
        var u_=$(this).attr('action');
      //alert($(this).serialize());
        $.post(u_, $(this).serialize(), function (result) {
          if (result =='sent') {
            $('button').removeAttr('disabled');
            $('.b').html('Login');
            window.open('http://localhost/sportssystem/index.php/patron','_self');
          //alert(result);
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
  font-size: .875rem;
}

.main{
  font-family: 'PT Sans', sans-serif;
  margin-top: 87px;
}

form{
  
}

.sidebar-sticky{
  font-family: 'PT Sans', sans-serif;
}

.list-group-flush li span{
  color: blue;
}

.feather {
  width: 16px;
  height: 16px;
  vertical-align: text-bottom;
}

/*
 * Sidebar
 */

.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
  }
}

.sidebar .nav-link {
  font-weight: 500;
  color: #333;
}

.sidebar .nav-link .feather {
  margin-right: 4px;
  color: #999;
}

.sidebar .nav-link.active {
  color: #007bff;
}

.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: inherit;
}

.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}

/*
 * Content
 */

[role="main"] {
  padding-top: 48px; /* Space for fixed navbar */
}

/*
 * Navbar
 */

.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: 1rem;
  background-color: rgba(0, 0, 0, .25);
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
}

.navbar .form-control {
  padding: .75rem 1rem;
  border-width: 0;
  border-radius: 0;
}

.form-control-dark {
  color: #fff;
  background-color: rgba(255, 255, 255, .1);
  border-color: rgba(255, 255, 255, .1);
}

.form-control-dark:focus {
  border-color: transparent;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
}

/*
 * Utilities
 */

.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }
@font-face {
 font-family: 'PT Sans';
 font-style: normal;
 font-weight: 400;
 src: url('../fonts/lato/lato-light.woff2') format('woff2'),url('../fonts/lato/lato-light.eot'), url('../fonts/lato/lato-light.eot?#iefix') format('embedded-opentype'), url('http://localhost/sportssystem/index.php/../assets/fonts/PT_Sans/PT_Sans-Web-Regular.ttf') format('truetype'), url('../fonts/lato/lato-light.svg#latolight') format('svg');
}

/*
    font-family: 'Dancing Script', cursive;

    font-family: 'Kaushan Script', cursive;

    font-family: 'Nanum Pen Script', cursive;

    font-family: 'Oleo Script', cursive;

    font-family: 'PT Sans', sans-serif;

    font-family: 'Prompt', sans-serif;

/*
</style>