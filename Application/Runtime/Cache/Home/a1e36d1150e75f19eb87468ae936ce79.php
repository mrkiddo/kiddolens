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
    
      <div class="col-lg-2"><!-- left bar -->
        <ul class="list-group">
  		  <li class="list-group-item"><a href="<?php echo U('Order/orderList');?>">My Orders</a></li>
  		  <li class="list-group-item"><a href="<?php echo U('Product/viewCart');?>">My Cart</a></li>
  		  <li class="list-group-item"><a href="<?php echo U('User/viewProfile');?>">My Profile</a></li>
	    </ul>
      </div><!-- left bar -->
    
    
      <div class="col-lg-10"><!-- right content -->
        <div class="panel panel-default"><!-- panel -->
          <div class="panel-heading">
            <h3 class="panel-title">Review Order</h3>
          </div>
          <div class="panel-body"><!-- panel body -->
            <p>Total Qty: <?php echo ($total['total_qty']); ?></p>
            <p>Total Amount: CND$ <?php echo ($total['total_price']); ?></p>
            <table class="table table-hover">
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
              </tr>
              <?php if(is_array($output)): $i = 0; $__LIST__ = $output;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                <td><a href="<?php echo U('Product/view', array('productId'=>$data['id']));?>"><?php echo ($data['brand']); ?> <?php echo ($data['product_name']); ?></a></td>
                <td>CND $<?php echo ($data['price']); ?></td>
                <td><?php echo ($data['qty']); ?></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div>
              <?php if($direct): ?><a href="<?php echo U('Product/viewCart');?>" class="btn btn-primary">Cancel</a>
              <a href="<?php echo U('Order/addOrder');?>" class="btn btn-success">Place Order</a>
              <?php else: ?>
              <a href="<?php echo U('Product/viewCart');?>" class="btn btn-primary">Back to Cart</a>
              <a href="<?php echo U('Order/addOrder');?>" class="btn btn-success">Place Order</a><?php endif; ?>
            </div>
          </div><!-- panel body -->
        </div><!-- panel -->
      </div><!-- right content -->

    </div><!-- main content ends -->
  
  
    <footer class="footer">
      <p class="text-center">Kiddo's Lens 2015 - Featured by Sony</p>
    </footer>
  
  </div><!-- container ends -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/tp2/Public/js/bootstrap.min.js"></script>


</body>
</html>