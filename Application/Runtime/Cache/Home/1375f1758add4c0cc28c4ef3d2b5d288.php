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
          <form class="navbar-form navbar-left search-form" role="search" action="<?php echo U('Product/search');?>" method="post"><!-- Search form -->
            <div class="form-group">
              <input type="text" class="form-control" name="searchword" placeholder="Search">
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
    
      <div class="col-lg-3 cat-left filter">
        <h4>Filter by</h4>
        <div class="checkbox">
 		 <label>
           <input type="checkbox" class="check-mount" id="a-mount" name="mount" value="a-mount">
           A-Mount Lens
         </label>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" class="check-mount" id="e-mount" name="mount" value="e-mount">
           E-Mount Lens
         </label><hr>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" class="check-type" id="prime" name="len-mutex" value="prime">
           Prime Lens
         </label>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" class="check-type" id="zoom" name="len-mutex" value="zoom">
           Zoom Lens
         </label>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" class="check-type" id="telephoto" value="telephoto">
           Telephoto Lens
         </label><hr>
       </div>
        <div class="checkbox">
 		 <label>
    	   <input type="checkbox" class="check-type" name="price-mutex" id="priceAsc" value="price-asc" aria-label="">
           Price: Low to High
         </label>
        </div>
        <div class="checkbox">
 		 <label>
    	   <input type="checkbox" class="check-type" name="price-mutex" id="priceDesc" value="price-desc" aria-label="">
           Price: High to Low
         </label>
        </div>
      </div>

    
      <div class="col-lg-9 item-wrapper"><!-- item wrapper -->

        <div class="cat-info">
          <h3 class="search-title">Category: E-Mount Lens</h3>
          <div class="alert alert-info" role="alert"><strong class="item-num">10</strong> Lens in total.</div>
        </div>

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

<script src="/tp2/Public/js/handlebars.js"></script>
<script src="/tp2/Public/js/handlebars-jquery.js"></script>
<script id="productTmpl" type="text/x-handlebars-template">
	{{#each products}}
		<div class="col-lg-3 cat-item" mount="{{mount}}">
          <div class="thumbnail">
            <img src="img/holder242x200.jpg" width="100%" alt="">
            <div class="caption">
              <p class="product-name"><a href="{{product_link}}">{{product_name}}</a></p>
              <p>{{brand}}</p>
              <p>CDN ${{price}}</p>
              <p class="text-center"><a href="" class="btn btn-primary btn-sm"> + Add to Cart</a></p>
            </div>
          </div>
        </div>
	{{/each}}
</script>
<script>
	
	$(document).ready(function() {
		
		function filterPressHandler(e) {
			//clear the checked status for mutex checkbox
			//console.log($(this).prop('checked'));
			if($(this).prop('checked') == false) {
				$(this).prop("checked", false);
				return false;
			}
			
			if($(this).attr('name') == 'mount') {
				$('input[name="mount"]').prop('checked', false);
			}
			if($(this).attr('name') == 'len-mutex') {
				$('input[name="len-mutex"]').prop('checked', false);
			}
			if($(this).attr('name') == 'price-mutex') {
				$('input[name="price-mutex"]').prop('checked', false);
			}
			//activate the checked status
			$(this).prop('checked', true);
	        //output the checkbox result
			var value = new Array();
			var mount = "";
			mount = $("input.check-mount[type='checkbox']:checked").val();
			if(mount == undefined) {
				mount = '0';
			}
			$("input.check-type[type='checkbox']:checked").each(function(){
				value.push($(this).val());
			});
			if(value.length == 0) {
				value.push('');
			}
			console.log(mount);
			console.log(value);
			
			var url = $('form.search-form').attr('action');
			$.post(url, {
				mount: mount,
				type: value
			}, function(data, statusTxt){
				if(data.status == '1') {
					console.log(data);
					$("div.item-wrapper").html("");
					var template = $("#productTmpl").template(data).appendTo("div.item-wrapper");
					//deal with checkbox status when data successfully loaded
					console.log(data.query);
					mount = data.query.mount;
					type = data.query.type;
					$("#"+ mount).prop("checked", true);
					for(i = 0; i<type.length; i++) {
						console.log(type[i]);
						$("#"+ type[i]).prop("checked", true);
					}
				}
			}, "json");
			
		}
        
		$(".filter input[type='checkbox']").bind('change', filterPressHandler);
		
		//test
		//var value = new Array();
		//value.push('zoom');
		//value.push('telephoto');
		
		/*
		var url = $('form.search-form').attr('action');
		$.post(url, {
			mount: '0',
			type: ['zoom']
		}, function(data, statusTxt){
			if(data.status == '1') {
				console.log(data);
				$("div.item-wrapper").html("");
				var template = $("#productTmpl").template(data).appendTo("div.item-wrapper");
				//deal with checkbox status when data successfully loaded
				console.log(data.query);
				mount = data.query.mount;
				type = data.query.type;
				$("#"+ mount).prop("checked", true);
				for(i = 0; i<type.length; i++) {
					console.log(type[i]);
					$("#"+ type[i]).prop("checked", true);
				}
			}
		}, "json");
		*/
		
    });
	
</script>



</body>
</html>