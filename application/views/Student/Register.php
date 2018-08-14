<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

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
              <li class="active"><a href="http://localhost/SportsSystem/index.php/Login/"><span class="fa fa-plus-sign"></span>&nbsp;Student register</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <div class="container main">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form action="http://localhost/sportssystem/index.php/student/register" method="post" class="form" id="reg_form">
            <div class="form-group" id="error"></div>
            <div class="form-group">
              <label class="control-label">Username</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Username" required/>
            </div>
            <div class="form-group">
              <label class="control-label">Registration no.</label>
              <input type="text" name="regno" id="regno" class="form-control" placeholder="Registration no." required/>
            </div>
            <div class="form-group">
              <label class="control-label">E-mail address</label>
              <input type="text" name="email" id="email" class="form-control" placeholder="E-mail address" required/>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
            </div>
            <div class="form-group">
              <label class="control-label">Confirm password</label>
              <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Re-type password" required/>
            </div>
            <div class="form-group">
              <label class="control-label"></label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required/>
            </div>
            <div class="form-group">
              <label class="control-label"></label>
              <input type="text" name="year_admitted" id="year_admitted" class="form-control" placeholder="Year admitted" required/>
            </div>
            <div class="form-group">
              <label class="control-label">Game</label>
              <select name="game" id="game" class="form-control">
                <option>Select a game</option>
                <?php 
                foreach($res as $r){
                  echo '<option>'.$r->name.'</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info"><span class="b"></span>Submit&nbsp;<span class="fa fa-send"></span></button>
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
    //alert('R'); 
    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
    sideslider.click(function(event){
        $(sel).toggleClass('in');
        $(sel2).toggleClass('out');
    });
    $('#error').hide();
    $('#reg_form').on('submit',function(e){
      e.preventDefault();
      var validation=true;
      alert('S');
      //var filterName='/([a-zA-Z])/';
      if($('#username').val().length==0 || !(/^[a-zA-Z]*$/).test($('#username').val())){
        validation=false;
        $('#username').focus();
        $('#username').css('border','1px solid red');
        return;
      }else{
        validation=true;
        $('#username').css('border','1px solid green');
      }
      if($('#email').val().length==0){
        validation=false;
        $('#email').focus();
        $('#email').css('border','1px solid red');
        return;
      }else{
        validation=true;
        $('#email').css('border','1px solid green');
      }
      if($('#regno').val().length==0){
        validation=false;
        $('#regno').focus();
        $('#regno').css('border','1px solid red');
        return;
      }else{
        validation=true;
        $('#regno').css('border','1px solid green');
      }
      if($('#password').val().length<6 || $('#password').val().length>45){
        validation=false;
        $('#password').focus();
        $('#password').css('border','1px solid red');
        return;
      }else{
        validation=true;
        $('#password').css('border','1px solid green');
      }
      if($('#c_password').val().length==0 || $('#password').val()!=$('#c_password').val()){
        validation=false;
        $('#c_password').focus();
        $('#c_password').css('border','1px solid red');
        return;
      }else{
        validation=true;
        $('#c_password').css('border','1px solid green');
      }
      if($('#phone').val().length!=10 || !(/^[0-9]*$/).test($('#phone').val())){
        validation=false;
        $('#phone').focus();
        $('#phone').css('border','1px solid red');
        return;
      }else{
        validation=true;
        $('#phone').css('border','1px solid green');
      }
      if($('#year_admitted').val().length!=4 || !(/^[0-9]*$/).test($('#year_admitted').val())){
        validation=false;
        $('#year_admitted').focus();
        $('#year_admitted').css('border','1px solid red');
        return;
      }else{
        validation=true;
        $('#year_admitted').css('border','1px solid green');
      }
      if($('#game').val()=='Select a game'){
        validation=false;
        $('#game').focus();
        $('#game').css('border','1px solid red');
        return;
      }else{
        validation=true;
        $('#game').css('border','1px solid green');
      }
      if(validation==true){
        alert(validation);
        var u_=$(this).attr('action');
        var m=$(this).attr('method');

        $.ajax({
          url: u_,
          method: m,
          data: $(this).serialize(),
          success: function(result){
            //alert(result);
            if(result=='success'){
              window.open('http://localhost/sportssystem/index.php/login/student','_self');
            }else{
              alert('Check your details again!');
            }
          },
          error: function(){
            alert('Something went wrong!');
          }
        });
      }else{
        alert(validation);
      }
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
      form{
        font-family: 'PT Sans', sans-serif;
        margin-top: 28px;
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
