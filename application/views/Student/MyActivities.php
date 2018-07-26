<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if(empty($this->session->userdata('student_logged'))){
  redirect('http://localhost/sportssystem/index.php/login/student');
}/*else{
  $phone=$email=$date_joined=$game=$year_admitted=$approved='';
  foreach($res as $r){
    $phone=$r->phone;
    $email=$r->email;
    $date_joined=$r->date_joined;
    $game=$r->game;
    $year_admitted=$r->year_admitted;
  }
}*/
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

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="http://localhost/sportssystem/index.php/../assets/img/sports/logo.png" height="28px" width="180px;" /></a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="http://localhost/sportssystem/index.php/student/logout">Sign out</a>
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
                  <?php echo $this->session->userdata('student_logged');?><span class="sr-only">(current)</span>
                </a>
              </li>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/sportssystem/index.php/student">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Notifications
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Messages
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/sportssystem/index.php/student/upcomingactivities">
                  <span data-feather="file"></span>
                  Upcoming Activities
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/sportssystem/index.php/student/pastactivities">
                  <span data-feather="shopping-cart"></span>
                  Past Activities 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="http://localhost/sportssystem/index.php/student/myactivities">
                  <span data-feather="users"></span>
                  My Activities
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
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
            <h1 class="h2">My Activities</h1>
            <!--<div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>-->
          </div>
          <div class="w-100">
            <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#" id="upcoming">Upcoming</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="past">Past</a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>-->
            </ul>
            <div class="card" id="upcomingdiv">
              <div class="card-body">
                <?php
                if(count($upcoming)>0){
                ?>
                <table class="table table-dark table-bordered">
                  <tr><th scope="col">Name</th><th scope="col">Location</th>
                  <th scope="col">Start date</th><th scope="col">End date</th><th scope="col">Patron</th><th scope="col">Approval status</th><th scope="col">Action</th></tr>
                <?php 
                foreach($upcoming as $u){
                  echo '<tr><td class="mdl-data-table__cell--non-numeric">'.$u->event_name.'</td><td class="mdl-data-table__cell--non-numeric">'.$u->location.'</td><td class="mdl-data-table__cell--non-numeric">'.$u->event_start_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$u->event_end_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$u->patron_name.'</td>
                  <td class="mdl-data-table__cell--non-numeric">'.$u->approved.'</td><td class="mdl-data-table__cell--non-numeric"><a href=""><span class=""></span>&nbsp;View</a></td></tr>';
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
                if(count($past)>0){
                ?>
                <table class="table table-dark table-bordered">
                  <tr><th scope="col">Name</th><th scope="col">Location</th>
                  <th scope="col">Start date</th><th scope="col">End date</th><th scope="col">Patron</th><th scope="col">Paid</th>
                  <th scope="col">Amount</th><th scope="col">Action</th></tr>
                <?php 
                $paid_amount='';
                foreach($past as $p){
                  if($p->paid_amount!=0){
                    $paid_amount==$p->paid_amount;
                  }else{
                    $paid_amount='-';
                  }
                  echo '<tr><td class="mdl-data-table__cell--non-numeric">'.$p->event_name.'</td><td class="mdl-data-table__cell--non-numeric">'.$p->place.'</td><td class="mdl-data-table__cell--non-numeric">'.$p->event_start_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$p->event_end_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$p->patron_name.'</td><td class="mdl-data-table__cell--non-numeric">'.$p->paid.'</td><td class="mdl-data-table__cell--non-numeric">'.$paid_amount.'</td><td class="mdl-data-table__cell--non-numeric"><a href=""><span class=""></span>&nbsp;View</a></td></tr>';
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
            <?php 
              /*if(!empty($res)){
              ?>
              <table class="table table-dark table-bordered">
                <tr><th scope="col">Name</th><th scope="col">Location</th>
                  <th scope="col">Start date</th><th scope="col">End date</th><th scope="col">Proposer</th><th scope="col">Approval status</th><th scope="col">Action</th></tr>
                <?php 
                foreach($res as $r){
                  echo '<tr><td class="mdl-data-table__cell--non-numeric">'.$r->name.'</td><td class="mdl-data-table__cell--non-numeric">'.$r->place.'</td><td class="mdl-data-table__cell--non-numeric">'.$r->start_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$r->end_date.'</td><td class="mdl-data-table__cell--non-numeric">'.$r->proposer.'</td><td class="mdl-data-table__cell--non-numeric"><a href=""><span class=""></span>&nbsp;View</a></td></tr>';
                }
                ?>
              </table>
              <?php
              }else{
              ?>
              <div class="alert alert-danger"role="alert"><span class="fa fa-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>The are no past activities!</div>
              <?php  
              }*/
              ?>
            
          </div>
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
  $('#pastdiv').hide();
  $('#past').on('click',function(e){
    $('#pastdiv').show();
    $('#upcomingdiv').hide();
    $('#past').addClass('active');
    $('#upcoming').removeClass('active');
  });
  $('#upcoming').on('click',function(e){
    $('#upcomingdiv').show();
    $('#pastdiv').hide();
    $('#upcoming').addClass('active');
    $('#past').removeClass('active');
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
@font-face {
font-family: 'Lato';
font-style: normal;
font-weight: 400;
src: url('../fonts/lato/lato-light-ext.woff2') format('woff2'),url('../fonts/lato/lato-light.eot'), url('../fonts/lato/lato-light.eot?#iefix') format('embedded-opentype'), url('../fonts/lato/lato-light.ttf') format('truetype'), url('../fonts/lato/lato-light.svg#latolight') format('svg');}


@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'), url(fonts/opensans-light.woff2) format('woff2');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(fonts/opensans.woff2) format('woff2');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  src: local('Open Sans Semibold'), local('OpenSans-Semibold'), url(fonts/opensans-semibold.woff2) format('woff2');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(fonts/opensans-bold.woff2) format('woff2');
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