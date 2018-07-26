<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if(empty($this->session->userdata('patron_logged'))){
  redirect('http://localhost/SportsSystem/index.php/patron');
}
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
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">


    <!--<script src="http://localhost/sportssystem/index.php/../js/jquery.js"></script>
    <script src="http://localhost/sportssystem/index.php/../js/bootstrap.js"></script>
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../css/bootstrap.min.css"/>-->

    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/css/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="http://localhost/sportssystem/index.php/../assets/css/jquery-ui.theme.min.css">
    <script src="http://localhost/sportssystem/index.php/../assets/js/jquery-1.11.1.min.js"></script>
    <script src="http://localhost/sportssystem/index.php/../assets/js/jquery-ui.min.js"></script>
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
              <li><a href="http://localhost/SportsSystem/index.php/Patron"><span class="fa fa-home"></span>&nbsp;Home</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="fa fa-globe"></span>&nbsp;Notifications&nbsp;<span class="caret"></span>
                </a>
                <ul class="dropdown-menu"></ul> 
              </li>
              <li><a href="#"><span class="fa fa-user"></span>&nbsp;<?php echo $this->session->userdata('patron_logged')?></a></li>
              <li><a href="http://localhost/sportssystem/index.php/patron/logout"><span class="fa fa-sign-out"></span>&nbsp;Logout</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <div class="main">
      <div class="row container">
        <div class="col-md-2">
          <span style="cursor:pointer" onclick="openNav()" id="menu" class="fa fa-bars">Side Menu</span>
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/Students">Students</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/ApproveStudents">Approve Students</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/Events">Events</a></li>
            <li class="active"><a href="http://localhost/SportsSystem/index.php/Patron/NewEvent">New event</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/Messages">Messages</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/SelectStudents">Select students</a></li>
          </div>
        </div>
        <div class="col-md-10">
          <div id="content">
            <div class="container" id="welcome">
              <?php 
              if(empty($this->session->userdata('file_uploaded'))){
              ?>
              <form action="http://localhost/sportssystem/index.php/patron/upload_event_pic"method="POST"enctype="multipart/form-data"class="form" id="pic_upload">
                <div class="form-group">
                  <input type="file"name="file"class="form-control" required/>
                </div>
                <div class="form-group">
                  <button type="submit"class="btn btn-info"name="upload"><span class="fa fa-cloud-upload"></span>&nbsp;Upload</button>
                </div>
              </form>
              <?php
              }else{
              ?>
              <div class="alert alert-warning"role="alert"><span class="sr-only">Error:</span>Fill in the event details!</div>
              <div class="row container">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <form action="http://localhost/sportssystem/index.php/patron/add_event_details" method="post" class="form" id="event_details">
                    <div class="form-group">
                      <label class="control-label">Event name</label>
                      <input type="text" name="event_name" placeholder="Event name" id="event_name" class="form-control" required />
                    </div>
                    <div class="form-group">
                      <label class="control-label">Start date</label>
                      <input type="text" name="start_date" placeholder="Start date" id="start_date" class="form-control" required />
                    </div>
                    <div class="form-group">
                      <label class="control-label">End date</label>
                      <input type="text" name="end_date" placeholder="End date" id="end_date" class="form-control" required />
                    </div>
                    <div class="form-group">
                      <label class="control-label">Budget</label>
                      <input type="text" name="budget" placeholder="Budget(Kshs.)" id="budget" class="form-control" required />
                    </div>
                    <div class="form-group">
                      <label class="control-label">Event type</label>
                      <select name="event_type" placeholder="event_type" id="event_type" class="form-control" required>
                        <option></option>
                        <option>single sports</option>
                        <option>double sports</option>
                        <option>multiple sports</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Location</label>
                      <input type="text" name="location" placeholder="Location" id="location" class="form-control" required />
                    </div>
                    <div class="form-group">
                      <label class="control-label">No. of participating sports</label>
                      <input type="text" name="n_p_s" placeholder="No. of participating Sports" id="n_p_s" class="form-control" required />
                    </div>
                    <div class="form-group">
                      <label class="control-label">Participating sports</label>
                      <input type="text" name="sports" placeholder="Participating sports" id="sports" class="form-control" required />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-info"><span class="fa fa-check"></span>&nbsp;<span class="b">Submit</span></button>
                    </div>
                  </form>
                </div>
                <div class="col-md-4"></div>
              </div>
              <?php  
              }
              ?>
              
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

    check_unapproved_students();

    function check_unapproved_students(){
      $.ajax({
        url: 'http://localhost/sportssystem/index.php/patron/check_unapproved_students',
        method: 'post',
        data: {'check':'yes'},
        success: function(result){
          //alert(result);
        },
        error: function(){
          alert('Something went wrong!');
        }
      });
    }

    $('#event_details').on('submit',function(e){
      //e.preventDefault();
      //alert('s');
      if ($('#event_name').val().length == 0) {
        var error = true;
        $('#event_name').css("border-color", "#D8000C");
        $('#event_name').css("color", "#D8000C");
      }else if ($('#start_date').val().length == 0) {
        var error = true;
        $('#start_date').css("border-color", "#D8000C");
        $('#start_date').css("color", "#D8000C");
      }else if ($('#end_date').val().length == 0) {
        var error = true;
        $('#end_date').css("border-color", "#D8000C");
        $('#end_date').css("color", "#D8000C");
      }else if ($('#budget').val().length == 0) {
        var error = true;
        $('#budget').css("border-color", "#D8000C");
        $('#budget').css("color", "#D8000C");
      }else if ($('#location').val().length == 0) {
        var error = true;
        $('#location').css("border-color", "#D8000C");
        $('#location').css("color", "#D8000C");
      }else if ($('#n_p_s').val().length == 0) {
        var error = true;
        $('#n_p_s').css("border-color", "#D8000C");
        $('#n_p_s').css("color", "#D8000C");
      }else if ($('#sports').val().length == 0) {
        var error = true;
        $('#sports').css("border-color", "#D8000C");
        $('#sports').css("color", "#D8000C");
      }else{
        $('button').attr({
          'disabled': 'false'
        });
        $('.b').html('Submiting...');
        var u_=$(this).attr('action');
      //alert($(this).serialize());
        $.post(u_, $(this).serialize(), function (result) {
          if (result =='success') {
            $('button').removeAttr('disabled');
            $('.b').html('Submit');
            window.open('http://localhost/sportssystem/index.php/patron/NewEvent','_self');
          //alert(result);
          } else{
          //alert('Failed');
            $('button').removeAttr('disabled');
            $('.b').html('Submit');
            $('.error').html('Incorrect username or password!');
            $('.error').fadeIn('linear',500);
          }
        });
      }
    });

    /*$('#event_details').on('submit',function(){
      e.preventDefault();
      alert($(this).serialize());
      if ($('#event_name').val().length == 0) {
        var error = true;
        $('#event_name').css("border-color", "#D8000C");
        $('#event_name').css("color", "#D8000C");
      }else if ($('#start_date').val().length == 0) {
        var error = true;
        $('#start_date').css("border-color", "#D8000C");
        $('#start_date').css("color", "#D8000C");
      }else if ($('#end_date').val().length == 0) {
        var error = true;
        $('#end_date').css("border-color", "#D8000C");
        $('#end_date').css("color", "#D8000C");
      }else if ($('#budget').val().length == 0) {
        var error = true;
        $('#budget').css("border-color", "#D8000C");
        $('#budget').css("color", "#D8000C");
      }else if ($('#location').val().length == 0) {
        var error = true;
        $('#location').css("border-color", "#D8000C");
        $('#location').css("color", "#D8000C");
      }else if ($('#n_p_s').val().length == 0) {
        var error = true;
        $('#n_p_s').css("border-color", "#D8000C");
        $('#n_p_s').css("color", "#D8000C");
      }else if ($('#sports').val().length == 0) {
        var error = true;
        $('#sports').css("border-color", "#D8000C");
        $('#sports').css("color", "#D8000C");
      }else{
        $('button').attr({
          'disabled': 'false'
        });
        $('.b').html('Submiting...');
        var u_=$(this).attr('action');
      //alert($(this).serialize());
        /*$.post(u_, $(this).serialize(), function (result) {
          if (result =='success') {
            $('button').removeAttr('disabled');
            $('.b').html('Login');
            window.open('http://localhost/sportssystem/index.php/patron/events','_self');
          //alert(result);
          } else{
          //alert('Failed');
            $('button').removeAttr('disabled');
            $('.b').html('Submit');
            $('.error').html('Incorrect username or password!');
            $('.error').fadeIn('linear',500);
          }
        });*/
      //}
    //});
});
/*
 $(document).ready(function() {
  $("#tblData tr:has(td)").click(function() {
    $(this).fadeOut(500, function() {
      $(this).remove();
    });
  });
});
*/
</script>
<style type="text/css">
body {
          padding-top: 50px;
          position: relative;
          font-family: tahoma;
          width: 100%;
      }
      
      pre {
          tab-size: 8;
      }
      .main{
        margin-top: 10px;
        font-family: tahoma;
        width: 100%;
      }
      .col-md-10{
        width: 768px;
      }
      form{
        font-family: 'PT Sans', sans-serif;
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
