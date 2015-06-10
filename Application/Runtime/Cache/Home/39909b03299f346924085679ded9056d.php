<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ($title); ?></title>

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
          <form class="navbar-form navbar-left" role="search"><!-- Search form -->
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Find</button>
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
            <li><a href="<?php echo U('Product/viewCart');?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li><!-- 1st link list item -->
            <li><a href="<?php echo U('User/logout');?>">Sign Out</a></li><!-- 1st link list item -->
            <?php else: ?>
            <li><a href="<?php echo U('User/login');?>">Sign IN</a></li><!-- 1st link list item -->
            <li><a href="<?php echo U('User/register');?>">Register</a></li><!-- 1st link list item --><?php endif; ?>

          </ul><!-- 1st link list -right- -->  
        </div><!-- nav link container --> 
      </div>
    </nav><!-- navbar ends -->
  
  
    <div class="row"><!-- main content starts -->
    
      <div class="col-lg-3 cat-left">
        <h4>Filter by</h4>
        <div class="checkbox filter">
 		 <label>
           <input type="checkbox" id="a-mount" value="">
           A-Mount Lens
         </label>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" id="e-mount" value="">
           E-Mount Lens
         </label><hr>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" id="prime" value="">
           Prime Lens
         </label>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" id="zoom" value="">
           Zoom Lens
         </label>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" id="telephoto" value="">
           Telephoto Lens
         </label>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" value="">
           Special Lens
         </label><hr>
        </div>
        <div class="radio">
 		 <label>
    	   <input type="radio" name="price-asc" id="" value="price-asc" aria-label="">
           Price: Low to High
         </label>
        </div>
        <div class="radio">
 		 <label>
    	   <input type="radio" name="price-desc" id="" value="price-desc" aria-label="">
           Price: High to Low
         </label>
        </div>
      </div>

    
      <div class="col-lg-9 item-wrapper"><!-- item wrapper -->
        <div class="cat-info">
          <h3>Category: <?php echo ($message['title']); ?> Lens</h3>
          <div class="alert alert-info" role="alert"><strong><?php echo ($message['num']); ?></strong> Lens in total.</div>
        </div>
        
		<?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="col-lg-3 cat-item"><!-- product item -->
          <div class="thumbnail">
            <img src="/tp2/Public/img/holder242x200.jpg" width="100%" alt="...">
            <div class="caption">
              <p class="item-name"><a href="<?php echo U('Product/view', array('productId'=>$data['id']));?>"><?php echo ($data["product_name"]); ?></a></p>
              <p><?php echo ($data["brand"]); ?></p>
              <p>CDN $<?php echo ($data["price"]); ?></p>
              <p class="text-center"><a href="<?php echo U('Product/addCart', array('productId'=>$data['id']));?>" class="btn btn-primary btn-sm"> + Add to Cart</a></p>
            </div>
          </div>
        </div><!--  product item --><?php endforeach; endif; else: echo "" ;endif; ?>
      </div><!-- item wrapper -->

    </div><!-- main content ends -->
  
  
    <footer class="footer">
      <p class="text-center">Kiddo's Lens 2015 - Featured by Sony</p>
    </footer>
  
  </div><!-- container ends -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/tp2/Public/js/bootstrap.min.js"></script>

<script>
</script>



</body>
</html>