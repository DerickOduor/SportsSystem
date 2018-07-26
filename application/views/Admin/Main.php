<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

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
	<title>LeGrand-</title>
</head>
<body>
	<header role="banner" class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
      	<a class="navbar-brand" href="http://localhost/legrand/admin/main">Le Grand</a>
        <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="navbar-inverse side-collapse in">
          <nav role="navigation" class="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="http://localhost/legrand/admin/main"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
              <li><a href="http://localhost/legrand/admin/orders"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Orders</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-globe"></span>&nbsp;Notifications</a></li>
              <li><a href="http://localhost/legrand/admin/profile"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $this->session->userdata('name');?></a></li>
              <li><a href="http://localhost/legrand/admin/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>          
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <div class="container main">

    <?php 
    if(empty($res)){
    	echo '<div class="container">There seems to be no products in your database.<br/>
    			You can however add a new one <a href="http://localhost/legrand/admin/new_product">here</a></div>';
    }else{
    ?>
    <div class="container">
    	<div class="row">
    		<div class="container col-md-2">
    			<a href="http://localhost/legrand/admin/new_product"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Product</button></a>
    		</div>
    		<div class="input-group col-md-3">
      			<input type="text" class="form-control" id="product_name"placeholder="Search for..."required/>
      			<span class="input-group-btn">
        			<button class="btn btn-info" type="button"id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
      			</span>
    		</div>	
    	</div>
    	<div class="product_rows">
    		<div class="error"></div>
    		<table class="table table-responsive table-bordered" id="products">
    			<tr><th>Image</th><th>Id</th><th>Name</th><th>Quantity</th><th><span class="glyphicon glyphicon-usd"></span>&nbsp;Price</th><th><span class="glyphicon glyphicon-tag"></span>&nbsp;Tag</th><th>Gender</th><th><span class="glyphicon glyphicon-edit"></span>&nbsp;Action</th></tr>
    		
    			<?php
    			foreach($res as $r){
    			?>
    				<tr><td><?php echo anchor(base_url('images/'.$r->picture),img(array('width'=>'50','height'=>'30','src'=>'images/'.$r->picture)))
    			?></td><td><?php echo $r->id?></td><td><?php echo $r->name?></td><td><?php echo $r->quantity?></td><td><?php echo $r->price?></td><td><?php echo $r->tag?></td><td><?php echo $r->gender?></td><td><a href="http://localhost/legrand/admin/edit_product/<?php echo $r->id?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a></td></tr>
    			<?php	
    			}
    			?>
    		</table>
    	</div>
    </div>
    <?php
    }
    ?></div>
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
    $('#search_btn').on('click',function(){
    	var product_name=$('#product_name').val();
    	//alert(product_name);
    	$.ajax({
    		url:'http://localhost/legrand/admin/search_product',
    		type:'POST',
    		data:{'product_name':product_name},
    		success:function(msg){
    			//alert(msg);
    			if(msg=='No match found'){
    				$('.error').html(msg);
    			}else{
    				$('.product_rows').html(msg);
    			}
    		},
    		error:function(){
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
      }
      
      pre {
          tab-size: 8;
      }
      .main{
      	margin-top: 10px;
      	font-family: tahoma;
      }
      #products{
      	margin-top: 10px;
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
      }	
</style>
