<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kiddos Lens - Product: <?php echo ($product['product_name']); ?></title>

<!-- Bootstrap -->
<link href="/tp2/Public/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom -->
<link href="/tp2/Public/css/custom.css" rel="stylesheet">

</head>

<body>


  <div class="container"><!-- header starts -->
  
    <div class="header"><!-- header starts -->
      <span class="logo"><a href="<?php echo U('Index/index');?>"><img src="/tp2/Public/img/logo.png"></a></span>
      <div class="logo-right">
        <ul>
          <li><a href="">About Us</a></li>
          <li><a href="">Shopping Guidelines</a></li>
        </ul>
      </div>
    </div><!-- header ends -->
  
  
    <nav class="navbar navbar-default"><!-- navbar starts -->
      <div class="container-fluid">
        <!-- responsible toggle for mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><!-- nav link container -->
          <ul class="nav navbar-nav"><!-- 1st link list -->
            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Prime Lens</a></li><!-- 1st link list item -->
            <li><a href="#">Zoom Lens</a></li><!-- 1st link list item -->
            <li><a href="#">Telephoto Lens</a></li><!-- 1st link list item -->
            <li><a href="#">Special Lens</a></li><!-- 1st link list item -->
          </ul><!-- 1st link list -->
          <form class="navbar-form navbar-left" role="search" action="<?php echo U('Product/search');?>" method="post"><!-- Search form -->
            <div class="form-group">
              <input type="text" class="form-control" name="searchword" placeholder="Search">
            </div>
            <input type="submit" class="btn btn-default" value="Find">
          </form>
          <ul class="nav navbar-nav navbar-right"><!-- 1st link list -right- -->
            
            <?php if($name): ?><li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hi, <?php echo ($name); ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo U('User/viewProfile');?>">My Profile</a></li>
                <li><a href="<?php echo U('Product/viewCart');?>">My Cart</a></li>
                <li><a href="<?php echo U('Order/orderList');?>">My Orders</a></li>
              </ul>
            </li><!-- 1st link list item -->
            <li><a href="<?php echo U('Product/viewCart');?>"><span class="glyphicon glyphicon-shopping-cart cart-logo" aria-hidden="true"></span></a></li><!-- 1st link list item -->
            <li><a href="<?php echo U('User/logout');?>">Sign Out</a></li><!-- 1st link list item -->
            <?php else: ?>
            <li><a href="<?php echo U('User/login');?>">Sign IN</a></li><!-- 1st link list item -->
            <li><a href="<?php echo U('User/register');?>">Register</a></li><!-- 1st link list item --><?php endif; ?>

          </ul><!-- 1st link list -right- -->  
        </div><!-- nav link container --> 
      </div>
    </nav><!-- navbar ends -->
  
  
    <div class="row"><!-- main content starts -->
    
      <div class="col-lg-3 product-img"><!-- col -->
        <a href="#" class="thumbnail">
      	  <img src="img/holder300x200.jpg" alt="...">
        </a>
      </div><!-- col -->

    
      <div class="col-lg-6"><!-- col -->
        <h3><?php echo ($product['product_name']); ?></h3>
        <p><?php echo ($product['brand']); ?></p>
        <p><?php echo ($product['model']); ?></p>
        <p>Release date: <?php echo ($product['release_date']); ?></p>
        <p><span class="lead">CDN$<mark><?php echo ($product['price']); ?></mark></span></p>
        <hr>
        <p><strong>Product Availability:</strong></p>
        <div class="alert alert-success" role="alert">On stock, ships in 3 business day.</div>
        <p><strong>Special Offers:</strong></p>
        <div class="alert alert-info" role="alert">No recent offers.</div>
        <hr>
        <p><strong>Product category:</strong></p>
        <p>
          <?php if(is_array($product['category'])): foreach($product['category'] as $key=>$vo): ?><span class="label label-default"><?php echo ($vo); ?> Lens</span>&nbsp;<?php endforeach; endif; ?>
        </p>
      </div><!-- col -->
      
      <div class="col-lg-3 product-panel"><!-- col -->
         <ul class="list-group">
  		   <li class="list-group-item add-cart-wrapper">
             <p>Like this lens, click this</p>
             <a class="btn-lg btn-primary add-cart" href="<?php echo U('Product/addCart',array('productId'=>$product['id']));?>" 
             tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="">Add to Cart</a>
           </li>
           <li class="list-group-item">
             <p>Or directly place order for this lens</p>
             <a class="btn-lg btn-primary" href="<?php echo U('Order/directOrder', array('productId'=>$product['id']));?>">Direct to order</a>
           </li>
         </ul>
      </div><!-- col -->

    </div><!-- main content ends -->
  
  
    <div class="row">
      
      <div class="col-lg-12" role="tabpanel"><!-- col -->
        <hr>
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#overview" aria-controls="overview" data-toggle="tab" role="tab">Overview</a></li>
  		  <li role="presentation"><a href="#specifications" aria-controls="specifications" data-toggle="tab" role="tab">Specifications</a></li>
  		  <li role="presentation"><a href="#compatibility" aria-controls="compatibility" data-toggle="tab" role="tab">Compatibility</a></li>
          <li role="presentation"><a href="#accessories" aria-controls="accessories" data-toggle="tab" role="tab">Accessories</a></li>
		</ul> 
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="overview">Overview</div>
          <div role="tabpanel" class="tab-pane" id="specifications">Specifications</div>
          <div role="tabpanel" class="tab-pane" id="compatibility">Compatibility</div>
          <div role="tabpanel" class="tab-pane" id="accessories">Accessories</div>
        </div>  
      </div><!-- col -->

    </div>
  
  
    <footer class="footer">
      <p class="text-center">Kiddo's Lens 2015 - Featured by Sony</p>
    </footer>
  
  </div><!-- container ends -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/tp2/Public/js/bootstrap.min.js"></script>


<script>
	
	$(document).ready(function() {
        
		function addCartHandler(e){
			e.preventDefault();
			var url = $(this).attr('href');
			var target = $(this);
			//console.log(url);
			$.post(url, {request: 1}, function(data, statusTxt){
				if(data.status == '0') {
					target.attr('title', 'Something happened!').attr("data-content", data.info).attr("data-placement", "left");
					target.popover('show');
					return false;
				}
				//console.log(data);
				target.attr('title', 'Success!').attr("data-content", data.info).attr("data-placement", "left");
				target.popover('show');
				$("span.cart-logo").css('color', '#F60');
			}, "json");
		}
		
		$('a.add-cart').bind('click', addCartHandler);
		
    });
	
</script>


</body>
</html>