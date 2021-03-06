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

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
  
  <div class="container"><!-- container starts -->
    
    <div class="header">
    
      <span class="logo"><a href=""><img src="/tp2/Public/img/logo.png"></a></span>
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
    
    <div class="row"><!-- jumbotron row-->
      
      <div class="col-lg-8"><!-- col -->
        <div class="jumbotron" style="background-image: url(/tp2/Public/img/fe5518_fit.png);"><!-- jumbotron -->
          <h2>Zeiss Sonnar T* FE 55 F1.8</h2>
          <h3>New Arrival E-Mount lens</h3>
          <h4>SEL55F18Z</h4>
          <p>Waiting for too long! The engraved name <strong>Sonnar</strong>, shine like the sun.</p>
          <p class="jumbotron-botton"><a class="btn btn-primary btn-lg" href="<?php echo U('Product/view', array('productId'=>'1'));?>" role="button">Learn more</a></p>
        </div><!-- jumbotron -->
      </div><!-- col -->
      
      <div class="col-lg-4"><!-- col -->
        <div class="list-group"><!-- list group -->
          <a href="#" class="list-group-item"><!-- list group item -->
            <h4 class="list-group-item-heading">Boxing week deal</h4>
            <p class="list-group-item-text"><strong>From 26th Dec to 5th Jan</strong></p>
            <p class="list-group-item-text">Many E-Mount lens have up to 30% discount.</p>
            <p class="list-group-item-text">Possiblity of longer warranty.</p>
          </a> 
          <a href="#" class="list-group-item"><!-- list group item -->
            <h4 class="list-group-item-heading">New release lens pre-order</h4>
            <p class="list-group-item-text">Coming up more than 6 new lens will be release in 2015.</p>
            <p class="list-group-item-text">Zeiss FE Disgonal T* 35mm F1.4</p>
            <p class="list-group-item-text">Sony FE 90mm F1.8 G Marco</p> 
          </a>
          <a href="#" class="list-group-item"><!-- list group item -->
            <h4 class="list-group-item-heading">Discover lens combination</h4>
            <p class="list-group-item-text">Protect the lens</p>
            <p class="list-group-item-text">Lens maintanence and cleaning</p>
          </a>
          <a href="#" class="list-group-item"><!-- list group item -->
            <h4 class="list-group-item-heading">Kiddo's Cafe</h4>
          </a>
        </div><!-- list group -->
      </div><!-- col -->
      
    </div><!-- jumbotron row-->
    
    <div class="row">
      <div class="col-lg-3">
        <div class="thumbnail">
          <img src="/tp2/Public/img/a-mount_lens_sm.jpg" width="100%" alt="A-Mount Lens">
          <div class="caption">
            <h3>A-Mount Lens</h3>
            <p>Accurate and efficient lens for your most difficult tasks, for Sony DSLR cameras.</p>
            <p class="more-button"><a href="<?php echo U('Product/category', array('mount'=>'a-mount', 'type'=>'0'));?>" class="btn btn-primary" role="button">Discover</a></p>
          </div>
        </div>
      </div>
    
      <div class="col-lg-3">
        <div class="thumbnail">
          <img src="/tp2/Public/img/e-mount_lens_sm.jpg" width="100%" alt="E-Mount Lens">
          <div class="caption">
            <h3>E-Mount Lens</h3>
            <p>Highly electronic and intelligent lens specifically built for Sony Mirrorless cameras.</p>
            <p class="more-button"><a href="<?php echo U('Product/category', array('mount'=>'e-mount', 'type'=>'0'));?>" class="btn btn-primary" role="button">Discover</a></p>
          </div>
        </div>
      </div>
    
      <div class="col-lg-3">
        <div class="thumbnail">
          <img src="/tp2/Public/img/holder242x200.jpg" width="100%" alt="Accessories">
          <div class="caption">
            <h3>Accessories</h3>
            <p>Extend availability and enhance your lens' function, fulfill all their potentials.</p>
            <p class="more-button"><a href="#" class="btn btn-primary" role="button">Discover</a></p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3">
        <div class="thumbnail">
          <img src="/tp2/Public/img/holder242x200.jpg" width="100%" alt="Cleanners">
          <div class="caption">
            <h3>Cleanners</h3>
            <p>We prepare specific cleaning kits and tools to suit your needs for lens daily maintenance.</p>
            <p class="more-button"><a href="#" class="btn btn-primary" role="button">Discover</a></p>
          </div>
        </div>
      </div>
      
    </div><!-- row ends -->
    
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