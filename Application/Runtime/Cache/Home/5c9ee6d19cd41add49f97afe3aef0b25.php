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
  
  
  
    <div class="row"><!-- main content starts -->
    
    
      <div class="col-md-6 col-md-offset-3"><!-- form wrapper -->
        <form class="form-horizontal" action="<?php echo U('User/login');?>" method="post" id="login">
          <div class="form-group login-hint">
            <h2>Member - Sign IN</h2>
            <div class="alert alert-success" role="alert" id="loginInfo"><?php echo ($hint["info"]); ?></div>
          </div>
          <div class="form-group" id="userNameWrapper">
            <label for="username" class="col-md-3 col-sm-2 control-label">User Name</label>
            <div class="col-md-9 col-sm-10">
              <input type="type" class="form-control" name="username" id="username" placeholder="User Name">
            </div>
          </div>
          <div class="form-group" id="passwordWrapper">
            <label for="password" class="col-md-3 col-sm-2 control-label">Password</label>
            <div class="col-md-9 col-sm-10">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9 col-sm-offset-2 col-sm-10">
              <label>
                <input type="checkbox"> Remember me
              </label>
            </div>
          </div>
          <p class="text-right">* Not a member yet? You can <a href="<?php echo U('User/register');?>">register here</a>.</p>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9 col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-primary" value="Sign IN">
            </div>
          </div>
        </form>
      </div><!-- form wrapper --> 

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
	$(document).ready(function() {
		var userNameFlag = '0';
		
        $('#username').bind("blur", function(){
			var userName = $('#username').val();
			//console.log(txt);
			var url = $('#login').attr('action');
			//console.log(url);
			$.post(url, {
				type: '1',
				value: userName
			}, function(data, textStatus){
				//console.log(data);
				//alert(data);
				
				if($('#username').val().length == 0) {
					//alert('fuck');
					$('#username').next().remove();
					$('#userNameWrapper').removeClass('has-feedback');
					$('#userNameWrapper').removeClass('has-success');
					$('#userNameWrapper').removeClass('has-error');
					$('#loginInfo').removeClass('alert-danger');
					$('#loginInfo').addClass('alert-success');
					$('#loginInfo').html('You can login here.');
					return false;
				}
				
				if(data.status == '1') {
					userNameFlag = '1';
					$('#username').next().remove();
					$('#userNameWrapper').removeClass('has-feedback');
					$('#userNameWrapper').removeClass('has-error');
					$('#userNameWrapper').addClass('has-success');
					$('#userNameWrapper').addClass('has-feedback');
					$('#username').after('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
					$('#loginInfo').removeClass('alert-danger');
					$('#loginInfo').addClass('alert-success');
					$('#loginInfo').html('You can login here.');
				}
				else {
					userNameFlag = '0';
					$('#username').next().remove();
					$('#userNameWrapper').removeClass('has-feedback');
					$('#userNameWrapper').removeClass('has-success');
					$('#userNameWrapper').addClass('has-error');
					$('#userNameWrapper').addClass('has-feedback');
					$('#username').after('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
					$('#loginInfo').removeClass('alert-success');
					$('#loginInfo').addClass('alert-danger');
					$('#loginInfo').html(data.msg);
				}
			}, "json");
		});
		
		$('#password').bind("blur", function(){
			var password = $('#password').val();
			var url = $('#login').attr('action');
			$.post(url, {
				type: '2',
				usern: $('#username').val(),
				passwd: password
			}, function(data, textStatus){
				
				if($('#password').val().length == 0) {
					//alert('fuck');
					$('#password').next().remove();
					$('#passwordWrapper').removeClass('has-feedback');
					$('#passwordWrapper').removeClass('has-success');
					$('#passwordWrapper').removeClass('has-error');
					$('#loginInfo').removeClass('alert-danger');
					$('#loginInfo').addClass('alert-success');
					$('#loginInfo').html('You can login here.');
					return false;
				}
				
				if((data.status == '1') && (userNameFlag =='1')) {
					//console.log('yse');
					$('#password').next().remove();
					$('#passwordWrapper').removeClass('has-feedback');
					$('#passwordWrapper').removeClass('has-error');
					$('#passwordWrapper').addClass('has-success');
					$('#passwordWrapper').addClass('has-feedback');
					$('#password').after('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
					$('#loginInfo').removeClass('alert-danger');
					$('#loginInfo').addClass('alert-success');
					$('#loginInfo').html('It is ready! Press Enter or click Sign IN button.');
				}
				else {
					//console.log('no');
					$('#password').next().remove();
					$('#passwordWrapper').removeClass('has-feedback');
					$('#passwordWrapper').removeClass('has-success');
					$('#passwordWrapper').addClass('has-error');
					$('#passwordWrapper').addClass('has-feedback');
					$('#password').after('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
					$('#loginInfo').removeClass('alert-success');
					$('#loginInfo').addClass('alert-danger');
					$('#loginInfo').html(data.msg);
				}
			}, "json");
		});
    });
</script>



</body>
</html>