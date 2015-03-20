<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome <?php echo $name; ?></title>
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
 

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"> <img alt="Charisma Logo" src="<?php echo base_url();?>/images/crystal.png" class="hidden-xs"/>
                <span>Crystal Clear Dry Cleaners</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right theme-container animated tada">
               <a href="<?php echo base_url();?>index.php/admin/login/logout"><button class="btn btn-default">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">Logout</span>
                </button></a>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
               <a href="http://www.crystalclear-drycleaners.co.uk/crystalclear/"> <button class="btn btn-default">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs">Visit Site</span>
                </button></a>
            </div>
    
        </div>
    </div>
<div class="ch-container">

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Orders</h2>
		
        <div class="box-icon">
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>

        </div>

    </div>
    <div class="box-content">
    <form id="myform" method="post" action="<?php echo base_url();?>/index.php/admin/operations/order" onSubmit="return chkform();" >
    <table id="table1" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
		<th>Items(Please Refer to Items Table Below for Reference)</th>
		<th>Quantities</th>
		<th>Total Amount in Pounds</th>
		<th>Date Ordered</th>
		<th>Date Completed (Pending if not completed otherwise Date will be here)</th>
		<th>Edit</th>
		<th>Select All <br> <input type="checkbox" id="selectall"></th>
		
    </tr>
    </thead>
    	
    <tbody>

	<?php foreach($orders as $value): ?>
    <tr>
        <td> <?php echo $value['id'];?></td>
        <td class="center"> <?php echo $value['name'];?></td>
        <td class="center"> <?php echo $value['email'];?></td>
		 <td class="center"> <?php echo $value['phone'];?></td>
		  <td> <?php echo $value['address'];?></td>
		   <td> <?php echo $value['items'];?></td>
		    <td> <?php echo $value['quantity'];?></td>
			 <td class="center"> <?php echo $value['total'];?></td>
			  <td class="center" > <?php echo $value['datein'];?></td>
			  <?php if($value['dateout']=='') {?> 
        <td class="center">
            <span id="pending" class="label-warning label label-default">Pending</span>
        </td>
		<?php } else if($value['dateout']!='') { ?>
		<td class="center" id="pending"> <?php echo $value['dateout'];?></td>
		<?php } ?>
		<td>
<a class="btn btn-info" href="<?php echo base_url();?>/index.php/admin/operations/editorder/<?php echo $value['id'];?>"><i class="glyphicon glyphicon-edit icon-white"></i>Edit</a>
		</td>
		 <td class="center">
		 
		 <input class="checkbox1" type="checkbox" id="chk"  name="all[]" value="<?php echo $value['id'];?>" >
		
       </td>
		
    </tr>
	<?php endforeach; ?>
	 
    </tbody>
    
    </table>
		 <input type="submit" class="btn btn-danger" name="button" value="Delete">
		 <input type="submit" class="btn btn-success" name="button" value="Mark Complete">
		 </form>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
	
	<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i>Item Table</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                       
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Name</th>
                            <th>Price in pounds</th>
							<th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                      <?php foreach($items as $value): ?>
					   <tr>
        <td> <?php echo $value['id'];?></td>
        <td class="center"> <?php echo $value['name'];?></td>
        <td class="center"> <?php echo $value['price'];?></td>
		<td>            <a class="btn btn-info" href="<?php echo base_url();?>/index.php/admin/operations/edititems/<?php echo $value['id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="<?php echo base_url();?>/index.php/admin/operations/deleteitems/<?php echo $value['id'];?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
		</tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                       <a class="btn btn-success" href="<?php echo base_url();?>/index.php/admin/operations/additems">
                <i class="glyphicon glyphicon-plus icon-white"></i>
                Add Items
            </a>
                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->
   
   <script>
   $(document).ready(function() {
    $('#selectall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
   </script>
   <script>
   function chkform()
   {
   var chk=$('.checkbox1:checkbox:checked').map(function () {
          var $item = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find("#pending")     // Gets a descendent with class="nr"
                       .text();
               return $item;			   
  }).get();
  //alert(chk);
  var i=0;
  while( i < chk.length)
  {
   //alert(chk[i]);
   if(chk[i]!='Pending')
   {
   alert('STOP! Could not perform the operation as there are orders checked which are already complete');
   return false;
   break;
   }
   i++;
  }
 }
   </script>
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