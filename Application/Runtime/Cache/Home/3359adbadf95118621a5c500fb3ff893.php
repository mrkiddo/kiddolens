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
    
      <div class="col-lg-4 guildline">
        <div class="well">
          <h4>Register guidelines</h4><hr>
          <p>All the fields are required.</p>
          <p>User name needs to be</p>
          <ul>
            <li>between 6 to 20 characters</li>
            <li>valid English letters (Upper or lower)</li>
            <li>numbers, hyphens and underscores</li>
            <li>combination of above, but cannnot start with numbers, hyphens and underscores</li>
          </ul>
          <p>Password needs to be</p>
          <ul>
            <li>between 6 to 12 characters</li>
            <li>retype password should be confirmed</li>
          </ul>
          <p>E-mail</p>
          <ul>
            <li>please provide valid e-mail</li>
            <li>for order comfirmaiton, shipment notification and retrieve forgotten password</li>
            <li>subscript for newsletters and events, if you like</li>
          </ul>
        </div>
      </div>

    
      <div class="col-lg-8">
        <h3>Member Register</h3><hr>     
        <form class="" action="<?php echo U('User/register');?>" method="post" id="registerForm">
          <div class="alert alert-info" role="alert" id="info"><?php echo ($message['hint']); ?></div>
          <div class="form-group" id="userNameWrapper">
            <label for="inputUserName">User Name</label>
            <input type="text" class="form-control" name="name" id="inputUserName" placeholder="Enter user name" aria-describedby="helpUsername">
            <span id="helpUsername" class="help-block"></span>
          </div>
          <div class="form-group" id="emailWrapper">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control" name="mail" id="inputEmail" placeholder="Enter email">
            <span id="helpEmail" class="help-block"></span>
          </div>
          <div class="form-group" id="passwordWrapper1">
            <label for="inputPassword1">Password</label>
            <input type="password" class="form-control" name="password1" id="inputPassword1" placeholder="Password">
            <span id="helpPasword" class="help-block"></span>
          </div>
          <div class="form-group" id="passwordWrapper2">
            <label for="inputPassword2">Retype Password</label>
            <input type="password" class="form-control" name="password2" id="inputPassword2" placeholder="Retype Password">
          </div>
           <input type="submit" class="btn btn-primary" value="Register">
        </form> 
      </div>

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
		
		$('#inputUserName').bind("keyup", function(){
			//console.log('key press');
			var txt = $('#inputUserName').val();
			//console.log(txt);
			var length = txt.length;
			//console.log(length);
			if(length < 6 || length > 20) {
				//console.log('User name needs to contain 6 to 20 characters.');
				$('#info').html('User name should between 6 to 20 characters.');
			}
			else {
				$('#info').html('Fill out the form to register as a member.');
			}
		});
        
		$('#inputUserName').bind("blur", function(){
			var txt = $('#inputUserName').val();
			var reg2 = /^[A-Za-z]+[A-Za-z0-9_-]+[A-Za-z0-9]$/;
			if(!reg2.test(txt)) {
				if(txt.length == 0) {
					$('#info').html('Fill out the form to register as a member.');
					$('#userNameWrapper').removeClass("has-error");
					$('#userNameWrapper').removeClass("has-success");
					$('#info').removeClass("alert-danger");
					$('#info').addClass("alert-info");
					return false;
				}
				$('#info').html('User name only accepts letters, numbers, _ and -.');
				return false;
			}
			else {
				$('#info').html('Fill out the form to register as a member.');
			}
			
			var url = $('#registerForm').attr("action");
			
			$.post(url, {
				type: 'username',
				value: txt
			}, function(data, textStatus){
				
				if(data.status == '1') {
					$('#info').html('Fill out the form to register as a member.');
					$('#userNameWrapper').removeClass("has-error");
					$('#userNameWrapper').addClass("has-success");
				}
				else {
					if(txt.length == 0) {
						$('#info').html('Fill out the form to register as a member.');
					}
					
					$('#info').removeClass("alert-info");
					$('#info').addClass("alert-danger");
					$('#info').html(data.msg);
					$('#userNameWrapper').removeClass("has-success");
					$('#userNameWrapper').addClass("has-error");
				}
			}, "json");
			
		});
		
		$('#inputEmail').bind("blur", function(){
			var txt = $('#inputEmail').val();
			var reg = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
			if(!reg.test(txt)) {
				if(txt.length == 0) {
					$('#info').html('Fill out the form to register as a member.');
					$('#emailWrapper').removeClass("has-error");
					$('#emailWrapper').removeClass("has-success");
					$('#info').removeClass("alert-danger");
					$('#info').addClass("alert-info");
					return false;
				}
				$('#info').html('Invalid email address. Please try again.');
				return false;
			}
			else {
				$('#info').html('Fill out the form to register as a member.');
			}
			
			var url = $('#registerForm').attr("action");
			
			$.post(url, {
				type: 'email',
				value: txt
			}, function(data, textStatus){
				
				if(data.status == '1') {
					$('#info').html('Fill out the form to register as a member.');
					$('#emailWrapper').removeClass("has-error");
					$('#emailWrapper').addClass("has-success");
				}
				else {
					if(txt.length == 0) {
						$('#info').html('Fill out the form to register as a member.');
					}
					
					$('#info').removeClass("alert-info");
					$('#info').addClass("alert-danger");
					$('#info').html(data.msg);
					$('#emailWrapper').removeClass("has-success");
					$('#emailWrapper').addClass("has-error");
				}
			}, "json");
		});
		
		$('#inputPassword1').bind("blur", function(){
			var txt = $('#inputPassword1').val();
			var length = txt.length;
			if((length < 6 || length > 20) && length != 0) {
				$('#info').html('Password should between 6 to 20 characters.');
				$('#passwordWrapper1').removeClass("has-success");
				$('#passwordWrapper1').addClass("has-error");
			}
			if(length == 0) {
				$('#passwordWrapper1').removeClass("has-success");
				$('#passwordWrapper1').removeClass("has-error");
				$('#info').html('Fill out the form to register as a member.');
			}
		});
		
		$('#inputPassword2').bind("keyup", function(){
			var txt = $('#inputPassword2').val();
			var ref = $('#inputPassword1').val();
			if(txt != ref) {
				$('#info').html('Two passwords not match. Please try again');
				$('#info').removeClass("alert-info");
				$('#info').addClass("alert-danger");
				$('#passwordWrapper2').removeClass("has-success");
				$('#passwordWrapper2').addClass("has-error");
			}
			else {
				$('#passwordWrapper2').removeClass("has-error");
				$('#passwordWrapper2').addClass("has-success");
				$('#info').removeClass("alert-danger");
				$('#info').addClass("alert-info");
				$('#info').html('Fill out the form to register as a member.');
			}
		});
		
    });
</script>



</body>
</html>