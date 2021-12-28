<section id="content-wrap" class="site-page">
   	<div class="row">
   		<div class="col-twelve">

   			<section>  

					<div class="primary-content">

						<h1 class="entry-title add-bottom">Get In Touch With Us.</h1>	

						<p class="lead">Lorem ipsum Deserunt est dolore Ut Excepteur nulla occaecat magna occaecat Excepteur nisi esse veniam dolor consectetur minim qui nisi esse deserunt commodo ea enim ullamco non voluptate consectetur minim aliquip Ut incididunt amet ut cupidatat.</p> 

						<?php if($this->session->tempdata('success')){?>
							<span class="text-success"><?php echo $this->session->tempdata('success'); ?></span>
						<?php } ?>

						<?php if($this->session->tempdata('error')){?>
							<span class="text-danger"><?php echo $this->session->tempdata('error'); ?></span>
						<?php } ?>
						<form id="cForm" action="javascript:void(0)" method="post" class="cForm">
	  					   <fieldset>

	                     <div class="form-field">
	  						      <input name="name" type="text" id="name" class="full-width" autocomplete="off" placeholder="Your Name">
								  <span class="text-danger"><?php echo form_error('name')?></span>
	                     </div>

	                     <div class="form-field">
	  						      <input name="email" type="email" id="email" class="full-width" autocomplete="off" placeholder="Your Email">
									<span class="text-danger"><?php echo form_error('email')?></span>
	                     </div>

						 <div class="form-field">
	  						      <input name="phone" type="text" id="phone" class="full-width" autocomplete="off" placeholder="Phonenumber" >
									<span class="text-danger"><?php echo form_error('phone')?></span>
	                     </div>

	                     <div class="form-field">
	  						      <input name="subject" type="text" id="subject" class="full-width" autocomplete="off" placeholder="Subject" >
									<span class="text-danger"><?php echo form_error('subject')?></span>
	                     </div>

	                     <div class="message form-field">
	                        <textarea name="message" id="message" class="full-width" autocomplete="off" placeholder="Your Message" ></textarea>
							<span class="text-danger"><?php echo form_error('message')?></span>
	                     </div>

	                     <button type="submit" class="submit button-primary full-width-on-mobile">Submit</button>

	  					   </fieldset>
						</form>

				</section>
   		

			</div> <!-- end col-twelve -->
   	</div> <!-- end row -->		
   </section> <!-- end content -->

   <script>
console.log('1');
			$('#cForm').validate({
				
				rules : {

					name : {
						required : true,
					},
					email : {
						required : true,
						email : true
					},
					phone : {
						required : true
					},
					subject : {
						required : true
					},
					message : {
						required : true
					}
				},
				messages : {
					name : 'Your Name Is Required!',
					email : 'Please Enter Correct Email!',
					phone : 'Your Phonenumber Is Required!',
					subject : 'Subject Is Required!',
					message : 'Message Is Required!'
					
				},
				submitHandler : function(form){
					console.log('2');
					let formData = $('#cForm').serialize();
					console.log(formData);
					$.ajax({
						method: 'post',
						url : '<?php echo base_url() ?>contact/contactForm',
						data : formData,
						dataType: 'json',
						success : function(response){
							
							window.location.href = '<?php echo base_url()?>contact';
							
						}
					})
				}
			})

	
   </script>