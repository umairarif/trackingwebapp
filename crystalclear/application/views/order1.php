
<!DOCTYPE HTML>
<html>
<head>
<title>Crystal Dry Cleaners::Order</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Baumans' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {

    $('#orderform').validate({ // initialize the plugin
        rules: {
            userName: {
                required: true,
            },
            userEmail: {
                required: true,
                email: true
            },
			  userPhone: {
                required: true,
                number: true
            },
			  userAddress: {
                required: true,
            },
			 'selectitems[]': {
                required: true,
            },
        }
    });
	 $('#trackform').validate({ // initialize the plugin
        rules: {
            trackid: {
                required: true,
				number: true
            },
          
        }
    });


});
</script>
</head>
<body>
  <div class="header">
  	 <div class="header_top">
	        <div class="wrap">		
		 		<div class="logo">
						<a href="<?php echo base_url();?>index.html"><img src="<?php echo base_url();?>images/crystal.png" alt="Crystal Dry Cleaners" style="width:292px;height:92px" ></a>
					</div>	
					 <div class="menu">
					    <ul>
							<li><a href="<?php echo base_url();?>/index.html">Home</a></li>
							<li><a href="<?php echo base_url();?>/pricing.html">Pricing</a></li>
							<li><a href="<?php echo base_url();?>/services.html">Services</a></li>
							<li><a href="<?php echo base_url();?>/about.html">About</a></li>
							<li><a href="<?php echo base_url();?>/contact.html">Contact</a></li>
                            <li class="active"><a href="<?php echo base_url();?>index.php/order/orderfirst">Order Now</a></li>
							<div class="clear"></div>
						</ul>
					 </div>						
	    		 <div class="clear"></div>
	        </div>
	    </div>
	</div>		
      <div class="main">
	 	<div class="wrap">
	 		 <div class="section group">				
				<div class="col span_1_of_3">
					<div class="contact_info">
			    	 	<h3>Track Your Order</h3>
			    	 		 <div class="contact-form1">
							   <form id="trackform" action="javascript:track();">
					    	<div>
						    	<span><label>TRACKING ID</label></span>
						    	<span><input id="tid" name="trackid" type="text" class="textbox"></span>
						    </div>
							<button class="mybutton">Track</button>
							<div>
							</div>
							<div>
							</div>
							<h3 id="trackid"></h3>
							 <div>
							 <span><label for="tid"></label></span>
							 </div>
							 <div>
							 <span><label for="name"></label></span>
							 </div>
							 <div>
							 <span><label for="phone"></label></span>
							 </div>
							 <div>
							 <span><label for="email"></label></span>
							 </div>
							 <div>
							 <span><label for="status"></label></span>
							 </div>
							</form>
							 </div>
							 
      				</div>
      			
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Book Your Order</h3>
					    <form id="orderform" method="post" action="orderbook">
					    	<div>
						    	<span><label>FULL NAME</label></span>
						    	<span><input name="userName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>VALID E-MAIL</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
                            <div>
						    	<span><label>CONTACT NUMBER</label></span>
						    	<span><input name="userPhone" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>ADDRESS</label></span>
						    	<span><textarea name="userAddress"> </textarea></span>
						    </div>
						    <div>
						    	<span><label>CHOOSE MULTIPLE LAUNDRY ITEMS (CTRL+select(windows)/COMMAND+select(MAC))</label></span>
						    	<span><select name="selectitems[]" multiple>
								<?php foreach($items as $l): ?>
                                      <option value="<?php echo $l['id'] ?>"><?php echo $l['name'] ?></option>
									  <?php endforeach; ?>
                                      </select></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="o1" class="mybutton" value="Next"></span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
	 	  </div>
      </div>
     <div class="copy-right">
			<div class="wrap">
			 <p class="copy">Crystal Dry Cleaners © All Rights Reseverd</p> <p class="design"> Developed by  <a href="http://imbglobal.com">IMB Global</a></p>
		      <div class="clear"></div>
		</div>	
	</div>
<script>
 function track()
 {
  //var dep=document.getElementsByName('username')[0].value;
  var trackinId = document.getElementById('tid').value;
  //alert(trackinId);
  //var dep = e.options[e.selectedIndex].text;
 $.ajax({
    type: "post",
    url: "<?php echo base_url();?>/index.php/order/ajax_track",
    data: "track"+"="+trackinId,
	dataType: 'json',
    
    success:  function(data){
        var r=JSON.stringify(data);
		//alert(r);
		var js_array = jQuery.parseJSON(r);
		jQuery("#trackid").html("TRACKING INFORMATION"); 
		if(js_array!="")
		{
			$.each(js_array , function(idx,obj) {
            jQuery("label[for='tid']").html("TRACKING ID: "+obj.TrackID);
			jQuery("label[for='name']").html("NAME: "+obj.name);
			jQuery("label[for='phone']").html("PHONE: "+obj.phone);
			jQuery("label[for='email']").html("EMAIL: "+obj.email);
			if(obj.dateout=='')
			jQuery("label[for='status']").html("STATUS: IN PROCESS");
			else
			jQuery("label[for='status']").html("STATUS: COMPLETED");
			
			 });
			//document.getElementById('team').innerHTML=data;
		
         }  
		 else
		 {
		  jQuery("label[for='tid']").html("ERROR! TRACKING ID NOT FOUND");
		  jQuery("label[for='name']").html("");
		  jQuery("label[for='phone']").html("");
		  jQuery("label[for='email']").html("");
		  jQuery("label[for='status']").html("");
		 }        
    }
});
}
</script>
</body>

</html>

