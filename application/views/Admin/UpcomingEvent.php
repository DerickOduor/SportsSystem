<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if(empty($this->session->userdata('admin_logged'))){
  redirect('http://localhost/sportssystem/index.php/login/student');
}
?>
<?php 
          $event_name=$proposer=$event_id=$proposer_id=$start_date=$end_date=$budget=$location=$event_poster=$n_p_s=$p_s=$event_type=$approval_status='';
          foreach($upcomingevent as $u){
            $event_name=$u->name;
            $event_id=$u->id;
            $proposer=$u->proposer;
            $proposer_id=$u->proposer_id;
            $start_date=$u->start_date;
            $end_date=$u->end_date;
            //$budget=$u->budget;
            $location=$u->place;
            $event_poster=$u->event_poster;
            $n_p_s=$u->no_of_participation_sports;
            $p_s=$u->participating_sports;
            $event_type=$u->event_type;
            $approval_status=$u->approval_status; 
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
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
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
            <h1 class="h2">Event:&nbsp;<?php echo $event_name;?></h1>
          </div>  
          <div class="w-100">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/sportssystem/index.php/Admin/Events">Events</a></li>
                <li class="breadcrumb-item active"><?php echo $event_name;?></li>
              </ol>
            </nav>
             <div class="">
              <div class="row">
                <div class="col-4 d-flex">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Proposed by:&nbsp;<a href="#"><?php echo $proposer;?></a></li>
                    <li class="list-group-item">Start date:&nbsp;<span><?php echo $start_date;?></span></li>
                    <li class="list-group-item">End date:&nbsp;<span><?php echo $end_date;?></span></li>
                    <li class="list-group-item">Location: &nbsp;<span><?php echo $location;?></span></li>
                    <!--<li class="list-group-item">Budget:&nbsp;Kshs.<span><?php echo $budget;?></span></li>-->
                    <li class="list-group-item">No. of teams:&nbsp;<span><?php echo $n_p_s;?></span></li>
                    <li class="list-group-item">Teams:&nbsp;<span><?php echo $p_s;?></span></li>
                    <li class="list-group-item">Event type:&nbsp;<span><?php echo $event_type;?></span></li>
                    <li class="list-group-item">Approval status:&nbsp;<span><?php echo $approval_status;?></span></li>
                    <?php 
                    if($approval_status=='pending'){
                      echo '<li class="list-group-item"><a href="http://localhost/SportsSystem/index.php/Admin/verifyAdmin/'.$event_id.'/accept" class="btn btn-outline-success" data="'.$event_id.'" id="approve_btn" data-toggle="modal" data-target="#LoginApprove">Approve&nbsp;<span class="fa fa-check" style="color:green;"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://localhost/SportsSystem/index.php/Admin/verifyAdmin/'.$event_id.'/reject" class="btn btn-outline-warning" data="'.$event_id.'" id="reject_btn" data-toggle="modal" data-target="#LoginReject">Reject</a></li>';
                    }elseif($approval_status=='rejected'){
                      echo '<li class="list-group-item"><a href="http://localhost/SportsSystem/index.php/Admin/verifyAdmin/'.$event_id.'/accept" class="btn btn-outline-success" data="'.$event_id.'" id="approve_btn" data-toggle="modal" data-target="#LoginApprove">Approve&nbsp;<span class="fa fa-check" style="color:green;"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;</li>';
                    }else{
                      echo '<li class="list-group-item"><a href="http://localhost/SportsSystem/index.php/Admin/verifyAdmin/'.$event_id.'/reject" class="btn btn-outline-warning" data="'.$event_id.'" id="reject_btn" data-toggle="modal" data-target="#LoginReject">Cancel&nbsp;<span class="fa fa-trash" style="color: yellow;" style="color:green;"></span></a>&nbsp;&nbsp;&nbsp;<a href="http://localhost/SportsSystem/index.php/Admin/PrepareBudget" id="budget_btn" data-toggle="modal" data-target="#BudgetDiv" class="btn btn-outline-info"><span data-feather="edit-3"></span>&nbsp;Prepare / View Budget</a></li>';
                      echo '<li class="list-group-item"><a href="http://localhost/SportsSystem/index.php/Admin/conclude_event/'.$event_id.'" class="btn btn-outline-success" data="'.$event_id.'" id="conclude_btn">Conclude Event&nbsp;<span class="fa fa-check" style="color:green;"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;</li>';
                    }
                    ?>
                  </ul>

                </div>
                <div class="col-8 d-flex">
                  <img src="http://localhost/sportssystem/index
                  .php/../uploads/<?php echo $event_poster;?>" class="img-fluid" alt="Responsive image">
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
<div class="modal fade" id="LoginApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Enter your credentials to approve!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/SportsSystem/index.php/Admin/verifyAdmin" method="post" id="approval_form" data="">
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" id="a_username" placeholder="Username" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="a_password" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-outline-info"><span class="b">Submit</span>&nbsp;<span class="fa fa-send"></span></button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="LoginReject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Enter your credentials to reject!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/SportsSystem/index.php/Admin/verifyAdmin" method="post" id="reject_form" data="">
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" id="r_username" placeholder="Username" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="r_password" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-outline-info"><span class="b">Submit</span>&nbsp;<span class="fa fa-send"></span></button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="BudgetDiv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#" id="prepare_budget">Prepare budget</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="show_event_budget">Budget</a>
            </li>
          </ul>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="http://localhost/SportsSystem/index.php/Admin/PrepareBudget" method="post" id="budget_form" data="">
          <div id="budget_error"></div>
          <input type="hidden" name="event_id" value="<?php echo($event_id);?>"/>
          <input type="hidden" name="event_name" value="<?php echo($event_name);?>"/>
          <div class="form-control row">
            <button class="col-sm-5 col-form-label btn btn-outline-info" id="new_field"><span class="fa fa-plus"></span>&nbsp;Create new field</button>
          </div>
          <div id="new_fields" style="padding-top: 10px;"></div>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-outline-success"><span class="b">Submit</span>&nbsp;<span class="fa fa-send"></span></button>
            </div>
          </div>
        </form>
        <div id="event_budget">
          <?php 
          if(isset($event_budget_desc)){
            if(count($event_budget_desc)){
            echo '<ul class="list-group list-group-flush">';
                    $prepared_by=$date_submitted=$prepared_by_id=$total_budget=$event_id_budget='';
                    foreach($event_budget_desc as $e){
                      $prepared_by_id=$e->prepared_by_id;
                      $prepared_by=$e->prepared_by;
                      $date_submitted=$e->date_submitted;
                      $total_budget=$e->total_budget;
                      $event_id_budget=$e->event_id;
                    }
                    echo '<li class="list-group-item">Prepared by:&nbsp;'.$prepared_by.'</li>
                        <li class="list-group-item">Date submitted:&nbsp;'.$date_submitted.'</li>
                        <li class="list-group-item">Prepared by:&nbsp;<a href="#">'.$prepared_by.'</a></li>';
                    foreach($event_budget_desc as $e_b){
                      echo '<li class="list-group-item">'.$e_b->budget_name.':&nbsp;'.$e_b->budget_value.'</li>';
                    }    
            echo '</ul>';
            echo '<div class="container"><a href="http://localhost/sportssystem/index.php/admin/discard_event_budget/'.$event_id_budget.'" class="btn btn-outline-warning">Discard&nbsp;<span class="fa fa-trash"></span></a></div>';   
            }else{
              echo '<div class="alert alert-danger"role="alert"><span class="fa fa-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>Budget is not yet prepared</div>';
            }   
          }else{
              echo '<div class="alert alert-danger"role="alert"><span class="fa fa-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>Budget is not yet prepared</div>';
          } 
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
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
  $('#pastdiv,#event_budget').hide();
  $('#prepare_budget').click(function(){
    $(this).addClass('active');
    $('#show_event_budget').removeClass('active');
    $('#budget_form').show();
    $('#event_budget').hide();
  });
  $('#show_event_budget').click(function(){
    $(this).addClass('active');
    $('#prepare_budget').removeClass('active');
    $('#budget_form').hide();
    $('#event_budget').show();
  });
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
  $('#approve_btn').on('click',function(e){
    e.preventDefault();
    $('#approval_form').attr('action',$(this).attr('href'));
  });
  $('#reject_btn').on('click',function(e){
    e.preventDefault();
    $('#reject_form').attr('action',$(this).attr('href'));
  });
  $('#budget_btn').on('click',function(e){
    e.preventDefault();
  });
  var clicks=0;
  $('#new_field').on('click',function(e){
    e.preventDefault();
    clicks++;
    $('#new_fields').append('<div class="form-group row" id="'+clicks+'"><input type="text" class="col-sm-5 form-control" name="budget_names[]" id="budget_name" placeholder="Budget Name" required /><div class="col-sm-6"><input type="text" name="budget_values[]" class="form-control" id="budget_value" placeholder="Budget Value" required></div><div class="col-sm-1"><a href="#" id="remove_field#"'+clicks+' class="rm_click" data-value="'+clicks+'"><span aria-hidden="true">&times;</span></a></div></div>');
    $('.rm_click').on('click',function(e){
      e.preventDefault();
      var rm_div=$(this).attr('data-value');
      $('div#'+rm_div).remove();
      //$('div#'+rm_div).hide();
    });

  });
  $('#budget_form').on('submit',function(e){
    //e.preventDefault();
    //alert($(this).serialize());
    $.ajax({
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: $(this).serialize(),
      success: function(result){
        $('#budget_error').html(result);
      },
      error: function(){
        alert('Something went wrong!');
      }
    });
  });
  $('#approval_form').on('submit',function(e){
    
  });
  $('#reject_form').on('submit',function(e){
    
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

.modal{
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