	<!-- header 
   ================================================== -->
   <header class="short-header">   

   	<div class="gradient-block"></div>	

   	<div class="row header-content">

   		<div class="logo">
	         <a href="index.html">Author</a>
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation sf-menu">
					<li <?php echo ($this->uri->segment(1) == '') ? 'class="current"' : ""; ?>><a href="<?php echo base_url() ?>" title="">Home</a></li>									
					<li <?php echo ($this->uri->segment(1) == 'about') ? 'class="current"' : ""; ?>><a href="<?php echo base_url() ?>about" title="">About Us</a></li>	
					<li <?php echo ($this->uri->segment(1) == 'contact') ? 'class="current"' : ""; ?>><a href="<?php echo base_url() ?>contact" title="">Contact Us</a></li>	
                    <?php if(!empty($this->session->userdata('uid'))){?>	
						<li class="has-children">Hi, <?php echo $this->session->userdata('username'); ?>
						<ul class="sub-menu">
							<li><a href="<?php echo base_url() ?>logout">Logout</a></li>
						</ul>
						</li>									
					<?php }else{?>					
					<li class="has-children">
						<a title="">Have Account?</a>
						<ul class="sub-menu">
			            <li><a href="<?php echo base_url() ?>login">Login</a></li>
			            <li><a href="<?php echo base_url() ?>register">Register</a></li>
			         </ul>
					</li>	
					<?php }?>
				</ul>
			</nav> <!-- end main-nav-wrap -->

			<div class="search-wrap">
				
				<form role="search" method="get" class="search-form" action="#">
					<label>
						<span class="hide-content">Search for:</span>
						<input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="s" title="Search for:" autocomplete="off">
					</label>
					<input type="submit" class="search-submit" value="Search">
				</form>

				<a href="#" id="close-search" class="close-btn">Close</a>

			</div> <!-- end search wrap -->	

			<div class="triggers">
				<a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
				<a class="menu-toggle" href="#"><span>Menu</span></a>
			</div> <!-- end triggers -->	
   		
   	</div>     		
   	
   </header> <!-- end header -->
