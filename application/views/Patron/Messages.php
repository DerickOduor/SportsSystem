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
    <script src="http://localhost/sportssystem/index.php/../assets/js/jquery-1.11.1.min.js"></script>
    <script src="http://localhost/sportssystem/index.php/../assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    
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
            <!--<li><a href="http://localhost/SportsSystem/index.php/Patron/NewEvent">New event</a></li>-->
            <li><a href="http://localhost/SportsSystem/index.php/Patron/Messages">Messages</a></li>
            <li><a href="http://localhost/SportsSystem/index.php/Patron/SelectStudents">Select students</a></li>
          </div>
        </div>
        <div class="col-md-10">
          <div id="content">
            <div><h1>Messages</h1></div>
            <div class="" id="welcome">
              <ul class="nav nav-tabs">
                <li class="active" id="patron"><a href="#">Patron<span class="material-icons mdl-badge mdl-badge--overlap" data-badge="1">account_box</span></a></li>
                <li id="students"><a href="#">Students<span class="material-icons mdl-badge mdl-badge--overlap" data-badge="1">account_box</span></a></li>
              </ul>
              <div id="patron_msg" class="demo-card-wide mdl-card mdl-shadow--2dp">
                <?php 
                if(count($res)==0){
                  echo 'No messages';
                }else{
                  foreach($res as $r){
                    if($r->sender_type=='patron'&& $r->status=='no'){
                      echo'<div class="mdl-shadow--2dp" id="msg"  style="width:100%;text-align:right;"><div id="in_msg" style="border:1px solid #000;border-radius:8px;width: 200px;float:right"><div>'.$r->message.'</div><div style="font-size:12px;">'.$r->date_sent.' <span class="fa fa-check"></span></div></div></div>';  
                    }else if($r->sender_type=='patron'&& $r->status=='yes'){
                      echo'<div class="mdl-shadow--2dp" id="msg"  style="width:100%;text-align:right;"><div id="in_msg" style="border:1px solid #000;border-radius:8px;width: 200px;float:right"><div>'.$r->message.'</div><div style="font-size:12px;">'.$r->date_sent.' <span class="fa-stack text-success"><i class="fa fa-check fa-stack-1x" style="margin-left:4px"></i><i class="fa fa-check fa-inverse fa-stack-1x" style="margin-left:-3px;"></i><i class="fa fa-check  fa-stack-1x" style="margin-left:-4px"></i></span></div></div></div>';  
                    }elseif($r->sender_type=='admin'){
                      echo'<div class="mdl-shadow--2dp" id="msg" style="width:100%;text-align:left;float:left"><div id="in_msg" style="background: rgb(0,0,0,0.7);border-radius:8px;width: 200px;color: #fff;float:left"><div>'.$r->message.'</div><div style="font-size:12px;">'.$r->date_sent.'</div></div></div>';  
                    } 
                  }
                }
                ?>
                <!--<span class="fa-stack text-success">
    <i class="fa fa-check fa-stack-1x" style="margin-left:4px"></i>
    <i class="fa fa-check fa-inverse fa-stack-1x" style="margin-left:-3px;"></i>
    <i class="fa fa-check  fa-stack-1x" style="margin-left:-4px"></i>
</span>-->
                
                <div class="sent_msg">  
                </div>
                <br/>
                <div class="status" style="text-align: center;">
                  <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                </div>
                <div style="">
                  <form action="http://localhost/sportssystem/index.php/patron/send_admin_msg" method="post" style="float: right;" id="patron_msg_form">
                    <div class="mdl-textfield mdl-js-textfield">
                      <input class="mdl-textfield__input" type="text" name="message" id="input_msg" required />
                      <label class="mdl-textfield__label" for="sample1">Type your message here...</label>
                    </div>
                </form>
                </div>
              </div>
              <div  id="students_msg" class="demo-card-wide mdl-card mdl-shadow--2dp">
                <?php 
                if(count($students_msg)==0){
                  echo 'No messages';
                }else{
                  $s_ids=array();
                  $i=0;
                  foreach ($students_msg as $ids) {
                    $j=0;
                    if(count($s_ids)>0){
                      foreach($s_ids as $key){
                        if($key['id']!=$ids->id){
                          $s_ids[$i]=array('id'=>$ids->id,'sender_name'=>$ids->sender,'sender_id'=>$ids->sender_id,'recipient_id'=>$ids->recipient_id,'recipient'=>$ids->recipient,'sender_type'=>$ids->sender_type,'message'=>$ids->message,'date'=>$ids->date_sent);
                        }
                      }
                      print_r($s_ids);echo '   1  <br/>';
                    }else{
                      $s_ids[$i]=array('id'=>$ids->id,'sender_name'=>$ids->sender,'sender_id'=>$ids->sender_id,'recipient_id'=>$ids->recipient_id,'recipient'=>$ids->recipient,'sender_type'=>$ids->sender_type,'message'=>$ids->message,'date'=>$ids->date_sent);
                      print_r($s_ids);echo '   2  <br/>';
                    }
                    $i++;
                  }
                  echo '<ul class="mdl-list">';
                  foreach($s_ids as $key){
                    if($key['sender_type']=='patron'){
                      echo '<li class="mdl-list__item  mdl-list__item--two-line" data="'.$key['recipient_id'].'" id="'.$key['sender_id'].'">
                      <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-avatar">person</i>
                        <span>'.$key['recipient'].'</span>
                        <span class="mdl-list__item-sub-title">'.$key['date'].'</span>
                      </span>
                      <span class="mdl-list__item-secondary-content">
                          <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                          </button>
                      </span>
                      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
                      <li class="mdl-menu__item">Some Action</li>
                      <li class="mdl-menu__item">Another Action</li>
                      <li disabled class="mdl-menu__item">Disabled Action</li>
                      <li class="mdl-menu__item">Yet Another Action</li>
                      </ul>
                      </li>';
                    }elseif($key['sender_type']=='student'){
                      echo '<li class="mdl-list__item  mdl-list__item--two-line" data="'.$key['recipient_id'].'" id="'.$key['sender_id'].'">
                      <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-avatar">person</i>
                        <span>'.$key['sender_name'].'</span>
                        <span class="mdl-list__item-sub-title">'.$key['date'].'</span>
                      </span>
                      <span class="mdl-list__item-secondary-content">
                          <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                          </button>
                      </span>
                      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
                      <li class="mdl-menu__item">Some Action</li>
                      <li class="mdl-menu__item">Another Action</li>
                      <li disabled class="mdl-menu__item">Disabled Action</li>
                      <li class="mdl-menu__item">Yet Another Action</li>
                      </ul>
                      </li>';
                    }
                    /*if($key['name']!=$this->session->userdata('patron_logged') && $key['id']!=$this->session->userdata('patron_id')){*/
                      
                    //}
                  }
                  echo '</ul>';
                }
                ?>
                <div id="item_msg" class="demo-card-wide mdl-card mdl-shadow--2dp">abc</div>
              </div>
              <!--<div  id="students_msg" class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                  <h2 class="mdl-card__title-text">Welcome</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Mauris sagittis pellentesque lacus eleifend lacinia...
                </div>
                <div class="mdl-card__actions mdl-card--border">
                  <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Get Started
                  </a>
                </div>
                <div class="mdl-card__menu">
                  <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                    <i class="material-icons">share</i>
                  </button>
                </div>
              </div>-->

<!--<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="#scroll-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
      <a href="#scroll-tab-2" class="mdl-layout__tab">Tab 2</a>
      <a href="#scroll-tab-3" class="mdl-layout__tab">Tab 3</a>
      <a href="#scroll-tab-4" class="mdl-layout__tab">Tab 4</a>
      <a href="#scroll-tab-5" class="mdl-layout__tab">Tab 5</a>
      <a href="#scroll-tab-6" class="mdl-layout__tab">Tab 6</a>
    </div>
  </header>
  <main class="mdl-layout__content">
    <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
      <div class="page-content">Tab 1</div>
    </section>
    <section class="mdl-layout__tab-panel" id="scroll-tab-2">
      <div class="page-content">Tab 2</div>
    </section>
    <section class="mdl-layout__tab-panel" id="scroll-tab-3">
      <div class="page-content">Tab 3</div>
    </section>
    <section class="mdl-layout__tab-panel" id="scroll-tab-4">
      <div class="page-content"></div>
    </section>
    <section class="mdl-layout__tab-panel" id="scroll-tab-5">
      <div class="page-content"></div>
    </section>
    <section class="mdl-layout__tab-panel" id="scroll-tab-6">
      <div class="page-content"></div>
    </section>
  </main>
</div>-->
              <?php 
              
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

    get_new_messages();
    setInterval(get_new_messages,10000);

    get_new_st_messages();
    setInterval(get_new_st_messages,10000);
    function get_new_messages(){
      var count=0;
      $.ajax({
        url: 'http://localhost/sportssystem/index.php/patron/get_unread_msg',
        method: 'post',
        data: {'get':'yes'},
        success: function(result){
          $('#patron a span').attr('data-badge',result);
        },
        error: function(){
          alert('Something went wrong!');
        }
      });
    }

    function get_new_st_messages(){
      var count=0;
      $.ajax({
        url: 'http://localhost/sportssystem/index.php/patron/get_unread_student_msg',
        method: 'post',
        data: {'get':'yes'},
        success: function(result){
          $('#students a span').attr('data-badge',result);
        },
        error: function(){
          alert('Something went wrong!');
        }
      });
    }

    $('#students_msg').fadeOut('slow');
    $('#patron').on('click',function(e){
      $('#patron_msg').fadeIn('slow');
      $('#students_msg').fadeOut('slow');
      $(this).addClass('active');
      $('#students').removeClass('active');
    });
    $('#students').on('click',function(e){
      $('#patron_msg').fadeOut('slow');
      $('#students_msg').fadeIn('slow');
      $(this).addClass('active');
      $('#patron').removeClass('active');
    });
    $('.sent_msg,.status').hide();
    $('#patron_msg_form').on('submit',function(e){
      e.preventDefault();
      //alert($(this).serialize());
      $('.status').show();
      var u_=$(this).attr('action');
      var m=$(this).attr('method');
      $.ajax({
        url: u_,
        method: m,
        data: $(this).serialize(),
        success: function(result){
          $('.status').hide();
          $('#input_msg').val('');
          window.open('http://localhost/sportssystem/index.php/patron/messages','_self');
        },
        error: function(){
          alert('Something went wrong!');
        }
      });
    });
    $('#item_msg').hide();
    $('ul.mdl-list li').click(function(){
      //alert($(this).attr('data')+' '+$(this).attr('id'));
      $.ajax({
        url: 'http://localhost/sportssystem/index.php/patron/get_st_message',
        method: 'post',
        data: {'sender_id':$(this).attr('id'),'recipient_id':$(this).attr('data')},
        success: function(result){
          alert(result);
        },
        error: function(){
          alert('Something went wrong!');
        }
      });
    });
});
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
      table{
        margin-top: 30px;
        width: 100%;
        font-family: 'PT Sans', sans-serif;
      }
      h1{
        font-size: 18px;
        text-align: center;
       font-family: 'PT Sans', sans-serif;
      }
      #patron_msg,#students_msg{
        height: 500px;
        overflow-y: scroll;
      }
      #msg{
        padding: 5px;
      }
      #in_msg{
        padding: 15px;
      }
      .mdl-list li: hover{
        cursor: pointer;
        background: #6e6e6e;
      }
.demo-card-wide.mdl-card {
  width: 100%;
  font-family: 'PT Sans', sans-serif;
  padding: 5px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: url('../assets/demos/welcome_card.jpg') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
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
