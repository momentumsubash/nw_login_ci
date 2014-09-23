<div class="content">
	<h2>Welcome Back, <?php echo $this->session->userdata('username'); ?>!</h2>
     <p>this is members section..</p>
	<h4><?php echo anchor('login/logout', 'Logout'); ?></h4>


</div>