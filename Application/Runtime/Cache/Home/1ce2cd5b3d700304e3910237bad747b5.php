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
    
      <div class="col-lg-12">
        <div class="alert alert-info" role="alert">
          <p class="text-right">Hi, <a href="#"><?php echo ($name); ?></a> | <a href="<?php echo U('User/logout');?>">Sign Out</a></p>
        </div>
      </div>

      <div class="col-lg-4 guildline">
        <div class="well">
          <h4>Profile guidelines</h4><hr>
          <p>All the fields are required.</p>
          <p>The profile will be used for</p>
          <ul>
            <li>order placement</li>
            <li>shipment information</li>
            <li>no need to submit your info again when shopping</li>
          </ul>
          <p>Privacy</p>
          <ul>
            <li>all your information will be kept secretly</li>
            <li>your information only used for online shopping</li>
          </ul>
        </div>
      </div>

    
<div class="col-lg-8"><!-- form wrapper -->
        <form class="form-horizontal" action="<?php echo U('User/addProfile');?>" method="post">
          <div class="form-group login-hint">
            <h2> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo ($message['user_name']); ?> - New Profile</h2>
            <div class="alert alert-success" role="alert"><?php echo ($message['hint']); ?></div>
          </div>
          <div class="form-group">
            <label for="firstbame" class="col-md-3 col-sm-2 control-label">First Name</label>
            <div class="col-md-9 col-sm-10">
              <input type="text" class="form-control" name="first_name" id="firstname" placeholder="First Name" maxlength="25">
            </div>
          </div>
          <div class="form-group">
            <label for="familyname" class="col-md-3 col-sm-2 control-label">Family Name</label>
            <div class="col-md-9 col-sm-10">
              <input type="text" class="form-control" name="last_name" id="familyname" placeholder="Family Name" maxlength="25">
            </div>
          </div>
          <div class="form-group">
            <label for="title" class="col-md-3 col-sm-2 control-label">Title</label>
            <div class="col-md-9 col-sm-10">
              <select id="title" name="title">
                <option value="na">-Please Choose one-</option>
                <option value="mr">Mr.</option>
                <option value="miss">Miss</option>
                <option value="mrs">Mrs.</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-md-3 col-sm-2 control-label">Address</label>
            <div class="col-md-9 col-sm-10">
              <input type="text" class="form-control" name="address" id="address" placeholder="Street No. and Stree Name" maxlength="100">
            </div>
          </div>
          <div class="form-group">
            <label for="city" class="col-md-3 col-sm-2 control-label">City</label>
            <div class="col-md-9 col-sm-10">
              <input type="text" class="form-control" name="city" id="city" placeholder="City" maxlength="50">
            </div>
          </div>
          <div class="form-group">
            <label for="province" class="col-md-3 col-sm-2 control-label">Province</label>
            <div class="col-md-9 col-sm-10">
              <select name="province" id="province">
                <option value="NA">-Please choose one-</option>
                <option value="AB">Alberta</option>
                <option value="BC">British Columbia</option>
                <option value="MB">Manitoba</option>
                <option value="NB">New Brunswick</option>
                <option value="NL">Newfoundland and Labrador</option>
                <option value="NS">Nova Scotia</option>
                <option value="ON">Ontario</option>
                <option value="PE">Prince Edward Island</option>
                <option value="QC">Quebec</option>
                <option value="SK">Saskatchewan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="postalcode" class="col-md-3 col-sm-2 control-label">Postal Code</label>
            <div class="col-md-9 col-sm-10">
              <input type="text" class="form-control" name="postal_code" id="postalcode" placeholder="Postal Code" maxlength="6">
            </div>
          </div>
          <div class="form-group">
            <label for="daytimephone" class="col-md-3 col-sm-2 control-label">Daytime Phone #</label>
            <div class="col-md-9 col-sm-10">
              <input type="text" class="form-control" name="phone" id="daytimephone" placeholder="Daytime Phone Number" maxlength="15">
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label for="creditcardtype" class="col-md-3 col-sm-2 control-label">Credit Card Type</label>
            <div class="col-md-9 col-sm-10">
              <select name="credit_card_type" id="creditcardtype">
                <option value="NA">-Please choose one-</option>
                <option value="MA">Master Card</option>
                <option value="VI">Visa Card</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="creditcardnumber" class="col-md-3 col-sm-2 control-label">Credit Card #</label>
            <div class="col-md-9 col-sm-10">
              <input type="text" class="form-control" name="credit_card_number" id="creditcardnumber" placeholder="Credit Card Number" maxlength="16">
            </div>
          </div>
          <p class="text-right">* Please fill out all the blanks.</p>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9 col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-primary" value="Submit">
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



</body>
</html>