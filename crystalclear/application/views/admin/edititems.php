<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="<?php echo base_url();?>/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>/css/charisma-app.css" rel="stylesheet">

    <link href='<?php echo base_url();?>/css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url();?>/css/animate.min.css' rel='stylesheet'>
	<script src="<?php echo base_url();?>/bower_components/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
	<script>
$(document).ready(function () {

    $('#updateform').validate({ // initialize the plugin
        rules: {
            cname: {
                required: true,
            },

			  cphone: {
                required: true,
                number: true
            },
	
			
        }
    });
	});
	</script>
 

</head>
<body>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Form Elements</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
			<?php foreach($edata as $value): ?>
                <form role="form" id="updateform" method="post" action="<?php echo base_url();?>/index.php/admin/operations/updateitems/<?php echo $value['id']?>">
				  <div class="form-group">
                        <label for="exampleInputEmail1">Item Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="cname" value="<?php echo $value['name']?>">
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="cphone" value="<?php echo $value['price']?>">
                  
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
				<?php endforeach; ?>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->
<!-- external javascript -->

<script src="<?php echo base_url();?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="<?php echo base_url();?>/js/jquery.cookie.js"></script>
<!-- calender plugin -->

<!-- data table plugin -->
<script src='<?php echo base_url();?>/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url();?>/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url();?>/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->

<!-- library for making tables responsive -->
<script src="<?php echo base_url();?>/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->

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