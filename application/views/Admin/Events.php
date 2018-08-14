<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if(empty($this->session->userdata('admin_logged'))){
  redirect('http://localhost/sportssystem/index.php/login/student');
}
?>
<!doctype html>
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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="http://localhost/sportssystem/index.php/../assets/img/sports/logo.png" height="28px" width="180px;" /></a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="http://localhost/sportssystem/index.php/admin/logout">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <li class="nav-item">
                <a class="nav-link" href="#" id="user">
                  <span data-feather="home"></span>
                  <?php echo $this->session->userdata('admin_logged');?><span class="sr-only">(current)</span>
                </a>
              </li>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/sportssystem/index.php/admin/">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="http://localhost/SportsSystem/index.php/Admin/Events">
                  <span data-feather="file"></span>
                  Events
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/SportsSystem/index.php/Admin/Patrons">
                  <span data-feather="shopping-cart"></span>
                  Patrons(Games-in-charge)
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/SportsSystem/index.php/Admin/Games">
                  <span data-feather="users"></span>
                  Games
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/SportsSystem/index.php/Admin/Finance">
                  <span data-feather="bar-chart-2"></span>
                  Finance
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/SportsSystem/index.php/Admin/Budget">
                  <span data-feather="layers"></span>
                  Budget
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Events</h1>
          </div>  
            <div class="w-100">
              <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Events</li>
              </ol>
            </nav>
            <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#" id="upcoming">Upcoming</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="past">Past</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="new_event">Register event</a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>-->
            </ul>
            <div class="card" id="reg_new_event">
              <div class="card-body">
                <div class="container" id="welcome">
              <?php 
              if(empty($this->session->userdata('file_uploaded'))){
              ?>
              <form action="http://localhost/sportssystem/index.php/admin/upload_event_pic"method="POST"enctype="multipart/form-data"class="form" id="pic_upload">
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
                  <form action="http://localhost/sportssystem/index.php/admin/add_event_details" method="post" class="form" id="event_details">
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
                    <!--<div class="form-group">
                      <label class="control-label">Budget</label>
                      <input type="text" name="budget" placeholder="Budget(Kshs.)" id="budget" class="form-control" required />
                    </div>-->
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
            <div class="card" id="upcomingdiv">
              <div class="card-body">
                <?php
                if(count($upcomingevents)>0){
                ?>
                <table class="table table-dark table-bordered">
                  <tr><th scope="col">Name</th><th scope="col">Location</th>
                  <th scope="col">Start date</th><th scope="col">End date</th><th scope="col">Proposer</th><th scope="col">Approval status</th><th scope="col">Action</th></tr>
                <?php 
                foreach($upcomingevents as $u){
                  echo '<tr><td class="mdl-data-table__cell--non-numeric">'.$u->name.'</td><td class="mdl-data-table__cell--non-numeric">'.$u->place.'</td><td class="mdl-data-table__cell--non-numeric">'.$u->start_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$u->end_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$u->proposer.'</td>
                  <td class="mdl-data-table__cell--non-numeric">'.$u->approval_status.'</td><td class="mdl-data-table__cell--non-numeric"><a href="http://localhost/sportssystem/index.php/admin/upcomingevent/'.$u->id.'"><span class=""></span>&nbsp;View</a></td></tr>';
                }
                ?>  
                </table>
                <?php 
                }else{
                  echo '<div class="alert alert-danger"role="alert"><span class="fa fa-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>You have no upcoming  activities!</div>';
                }
                ?>
              </div>
            </div>
            <div class="card" id="pastdiv">
              <div class="card-body">
                <?php 
                if(count($pastevents)>0){
                ?>
                <table class="table table-dark table-bordered">
                  <tr><th scope="col">Name</th><th scope="col">Location</th>
                  <th scope="col">Start date</th><th scope="col">End date</th><th scope="col">Proposer</th><th scope="col">Action</th></tr>
                <?php 
                $paid_amount='';
                foreach($pastevents as $p){
                  /*if($p->paid_amount!=0){
                    $paid_amount==$p->paid_amount;
                  }else{
                    $paid_amount='-';
                  }*/
                  echo '<tr><td class="mdl-data-table__cell--non-numeric">'.$p->name.'</td><td class="mdl-data-table__cell--non-numeric">'.$p->place.'</td><td class="mdl-data-table__cell--non-numeric">'.$p->start_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$p->end_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$p->proposer.'</td><td class="mdl-data-table__cell--non-numeric"><a href="http://localhost/sportssystem/index.php/admin/pastevent/'.$u->id.'"><span class=""></span>&nbsp;View</a></td></tr>';
                }
                ?>
                </table>
                <?php 
                }else{
                  echo '<div class="alert alert-danger"role="alert"><span class="fa fa-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>You have no past activities</div>';
                }
                ?>
              </div>
            </div>
          </div>
            <?php 
            if(count($upcomingevents)>0){
              
            }else{
              echo '<div class="alert alert-danger" role="alert">
                    There are no events to display
                  </div>';
            }
            ?>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
<script>
$(function(){
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
      }/*else if ($('#budget').val().length == 0) {
        var error = true;
        $('#budget').css("border-color", "#D8000C");
        $('#budget').css("color", "#D8000C");
      }*/else if ($('#location').val().length == 0) {
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
            window.open('http://localhost/sportssystem/index.php/admin/Events','_self');
          //alert(result);
          } else{
          //alert('Failed');
            $('button').removeAttr('disabled');
            $('.b').html('Submit');
            $('.error').html('Incorrect details! Try again.');
            $('.error').show('linear',500);
          }
        });
      }
    });
  $('#pastdiv,#reg_new_event').hide();
  $('#past').on('click',function(e){
    $('#pastdiv').show();
    $('#upcomingdiv,#reg_new_event').hide();
    $('#past').addClass('active');
    $('#upcoming').removeClass('active');
    $('#new_event').removeClass('active');
  });
  $('#upcoming').on('click',function(e){
    $('#upcomingdiv').show();
    $('#pastdiv,#reg_new_event').hide();
    $('#upcoming').addClass('active');
    $('#past').removeClass('active');
    $('#new_event').removeClass('active');
  });
  $('#new_event').on('click',function(e){
    $('#reg_new_event').show();
    $('#pastdiv,#upcomingdiv').hide();
    $('#new_event').addClass('active');
    $('#past').removeClass('active');
    $('#upcoming').removeClass('active');
  });
});     
</script>
  </body>
</html>
<style type="text/css">
  body {
  font-size: .875rem;
}

main{
  font-family: 'PT Sans', sans-serif;
}

.sidebar-sticky,form{
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