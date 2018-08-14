<?php
/**
 * Created by PhpStorm.
 * User: Derick Oduor
 * Date: 8/1/2018
 * Time: 6:30 PM
 */
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
    <script src="http://localhost/sportssystem/index.php/../assets/js/feather.min.js"></script>
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
                        <span data-feather="user"></span>
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
                        <a class="nav-link" href="http://localhost/SportsSystem/index.php/Admin/Events">
                            <span data-feather="trending-up"></span>
                            Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/SportsSystem/index.php/Admin/Patrons">
                            <span data-feather="users"></span>
                            Patrons(Games-in-charge)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/SportsSystem/index.php/Admin/Games">
                            <span data-feather="activity"></span>
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
                        <a class="nav-link active" href="http://localhost/SportsSystem/index.php/Admin/Budget">
                            <span data-feather="layers"></span>
                            Budget
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/SportsSystem/index.php/Admin/profile">
                            <span data-feather="edit"></span>
                            My Profile
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
                <h1 class="h2">Budgets</h1>
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
            <!--<div class="d-flex">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Game:&nbsp;<a href="#"><?php //echo $game;?></a></li>
              <li class="list-group-item">Date joined:&nbsp;<span><?php //echo $date_joined;?></span></li>
              <li class="list-group-item">Approval status:&nbsp;<span><?php //echo $approved;?></span></li>
              <li class="list-group-item">Phone: &nbsp;<span><?php //echo $phone;?></span></li>
              <li class="list-group-item">E-mail address:&nbsp;<span><?php //echo $email;?></span></li>
              <li class="list-group-item">Year of admission:&nbsp;<span><?php //echo $year_admitted;?></span></li>
            </ul>

          </div>-->
            <?php
            print_r($budget_past);
            echo '<div style="text-align:center;"><h3>Budget for Past Events</h3></div>';
            $i=0;
            $keys=array();
            $keys=array_keys($budget_past);
            print_r($keys);
            echo '<br/>';
            echo count($budget_past).'<br/>';
            $i=0;
            foreach($budget_past as $b){
              print_r($b);
              echo $budget_past[$i].'<-value';
              echo '<br/>';
              $i++;
            }
            foreach($budget_past as $b){
              print_r(array_keys($budget_past));
              echo $i.' '.$keys[$i].'Array size->'.count($b).'<br/>';

              if(isset($b[$keys[$i]])){
                echo $b[$keys[$i]]->event_name;
              }
              print_r($b);
              echo '<br/>
              <table class="table table-striped table-bordered">';
              foreach($b as $b_){
                echo '<tr><td>'.$b_->budget_name.'</td><td>'.$b_->budget_value.'</td></tr>';
              }
              echo '</table>';
              $i++;
            }
            echo '<br/>';
            //print_r($budget_upcoming);
            echo '<div style="text-align:center;"><h3>Budget for Upcoming Events</h3></div>';
            /*if(isset($res)){
                if(count($res)>0){
                   $event_id=$event_name=$prepared_by=$prepared_by_id=$budget_name=$budget_value=$total_budget=$date_submitted=$approval_status='';
                   unset($_SESSION['event_ids']);
                   if(isset($_SESSION['event_ids'])){
                       $exists=false;
                       foreach ($res as $r){
                           //$event_id=
                           $count=0;
                           foreach($_SESSION['event_ids'] as $e_i){
                               echo $count;
                                if($e_i==$r->event_id){
                                    echo 'found<br/>';
                                    $exists=true;
                                    break;
                                }else{
                                    echo $r->event_id;
                                    array_push($_SESSION['event_ids'],$r->event_id);
                                }
                                $count++;
                           }
                       }
                       if($exists==false){

                       }
                   }else{
                       $_SESSION['event_ids']=array();
                       $event_ids=array();
                       $count=0;
                       foreach($res as $r){
                           $_SESSION['event_ids']=array($r->event_id);
                           $event_ids[$count]=$r->event_id;
                           $count++;
                       }
                   }
                   print_r($_SESSION['event_ids']);
                    echo '<br/>';
                   print_r($event_ids);
                   $count=0;
                   foreach($event_ids as $e){
                       try{
                           throw new Exception();
                           if($event_ids[$count]==$event_ids[$count+1]){
                               unset($event_ids[$count]);
                           }elseif($count<=count($event_ids)){
                               //$count++;
                           }
                           $count++;
                       }catch (Exception $e){
                            echo $e->getMessage();
                       }

                   }
                    echo '<br/>';
                    print_r($event_ids);
                   unset($_SESSION['event_id']);
                }else{}
            }else{}*/
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

    /*
        font-family: 'Dancing Script', cursive;

        font-family: 'Kaushan Script', cursive;

        font-family: 'Nanum Pen Script', cursive;

        font-family: 'Oleo Script', cursive;

        font-family: 'PT Sans', sans-serif;

        font-family: 'Prompt', sans-serif;

    /*
</style>