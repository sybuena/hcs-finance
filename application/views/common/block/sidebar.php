<!-- Menu Toggle Button -->
<button type="button" class="btn btn-navbar">
	<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
</button>
<!-- // Menu Toggle Button END -->

<!-- Sidebar Profile -->
<span class="profile center">
	<img src="<?php echo base_url().'assets/img/logo.png' ?>" id="login-logo" style="width: 100%"/>
</span>
<!-- // Sidebar Profile END -->

<!-- Menu -->
<ul>
	<li class="hasSubmenu">
		<a data-toggle="collapse" href="#menu_dashboard" class=""><i class="fa fa-dashboard fa-lg"></i> <span>Dashboard</span><span class="fa fa-chevron-down"></span></a>
		<ul class="collapse" id="menu_dashboard">
			<li class=" active"><a href="">Default</a></li>
			<li class=""><a href="/home/ar_aging">AR_Aging</a></li>
			<li class=""><a href="/home/revenue">Revenue</a></li>
			<li class=""><a href="">Overview</a></li>
		</ul>
	</li>

	<!-- Components Submenu Level 2 -->
	<li class="hasSubmenu">
		<a href=" #menu_components_forms" data-toggle="collapse"><i class="fa fa-bar-chart-o fa-lg"></i> Report 1<span class="fa fa-chevron-down"></span></a>
		<ul class="collapse" id="menu_components_forms">
			<li class=""><a href="">Sample link <span class="badge badge-primary fix">4</span></a></li>
			<li class=""><a href="">Sample link <span class="badge badge-primary fix">4</span></a></li>
			<li class=""><a href="">Sample link </a></li>
		</ul>
	</li>

	<li class="hasSubmenu">
		<a href=" #menu_components_tables" data-toggle="collapse"><i class="fa fa-list-alt fa-lg"></i> Report 2<span class="fa fa-chevron-down"></span></a>
		<ul class="collapse" id="menu_components_tables">
			<li class=""><a href="">Tables</a></li>
			<li class=""><a href="">Responsive Tables</a></li>
			<li class=""><a href="">Pricing tables <span class="badge badge-primary fix">4</span></a></a></li>
		</ul>
	</li>


</ul>

<div class="clearfix"></div>
<!-- // Menu END -->
