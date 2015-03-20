<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Crystal Clear Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The styles -->
    <link id="bs-css" href="<?php echo base_url();?>/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>/css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url();?>/css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>/js/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->


</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Crystal Clear Admin Side</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/admin/login/loging" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>
                      <?php if (isset($validate)){?>
                      <span class="add-on"><i class="icon-eye-close"></i><b><?php echo $validate;?></b></span>
                      <?php } ?>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->



<!-- library for cookie management -->
<script src="<?php echo base_url();?>/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<!-- data table plugin -->
<script src='<?php echo base_url();?>/js/jquery.dataTables.min.js'></script>


<!-- notification plugin -->
<script src="<?php echo base_url();?>/js/jquery.noty.js"></script>

<!-- star rating plugin -->
<script src="<?php echo base_url();?>/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url();?>/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url();?>/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url();?>/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url();?>/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url();?>/js/charisma.js"></script>


</body>
</html>
