		</div>
	<!-- // Content END -->

	</div>

	<div class="clearfix"></div>
	<!-- // Sidebar menu & content wrapper END -->

	<div id="footer" class="hidden-print">

		<!--  Copyright Line -->
		<div class="copy">© 2014 <a href="http://www.fusionpl.us/">Fusionplus</a> - All Rights Reserved. </div>
		<!--  End Copyright Line -->

	</div>
	<!-- // Footer END -->

</div>
<!-- // Main Container Fluid END -->
<script type="text/javascript">
$('#submit').click(function() {
	var id = $(this).attr('id');
	var data = {
		'start-date'   : $('input[name="startDate"]').val(),
		'end-date' 	   : $('input[name="endDate"]').val(),
		'as-of-date'   : $('input[name="asOfDate"]').val(),
		'agency-code'  : $('input[name="agencyCode"]').val(),
		'report-type'  : $('input[name="reportType"]').val(),
		'show-paid'    : $('input[name="showPaid"]').val()
	};
	// console.log(data);
	$.ajax({
     type 		: 'POST',
     url 		: '/home/ar_aging', 
     data 		: {'data': data},
     dataType 	: 'json',  
     success 	: function(data){
         
         if(data.error) {
         	// When both field is empty validate red text
	

         } else {
         	location.reload();
         }
     },

     error 		: function(error) {
     	
     }
  });


	return false;
});

</script>

<!-- Global -->
	<script>
	var basePath = '',
		commonPath = '/assets/',
		rootPath = '/',
		DEV = false,
		componentsPath = '/assets/components/';
	
	var primaryColor = '#c94437',
		dangerColor = '#b55151',
		infoColor = '#5cc7dd',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	
	var themerPrimaryColor = primaryColor;
	</script>
	
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/jquery.nicescroll.min.js"></script>
	<script src="/assets/js/breakpoints.js"></script>
	<script src="/assets/js/jquery.flot.js"></script>
	<script src="/assets/js/jquery.flot.resize.js"></script>
	<script src="/assets/js/jquery.flot.tooltip.min.js"></script>
	<script src="/assets/js/flotcharts.common.js"></script>
	<script src="/assets/js/flotchart-simple.init.js"></script>
	<script src="/assets/js/blueimp-gallery.min.js"></script>
	<script src="/assets/js/jquery.blueimp-gallery.min.js"></script>
	<script src="/assets/js/employees.init.js"></script>
	<script src="/assets/js/select2.js"></script>
	<script src="/assets/js/select2.init.js"></script>
	<script src="/assets/js/holder.js"></script>
	<script src="/assets/js/widget-chat.init.js"></script>
	<script src="/assets/js/jquery.easy-pie-chart.js"></script>
	<script src="/assets/js/easy-pie.init.js"></script>
	<script src="/assets/js/twitter.init.js"></script>
	<script src="/assets/js/template-options.js"></script>
	<script src="/assets/js/bootstrap-select.js"></script>
	<script src="/assets/js/bootstrap-select.init.js"></script>
	<script src="/assets/js/jquery.event.move.js"></script>
	<script src="/assets/js/jquery.event.swipe.js"></script>
	<script src="/assets/js/megamenu.js"></script>
	<script src="/assets/js/core.init.js"></script>	

<div id="flotTip" style="display: none; position: absolute; left: 513px; top: 51px;"></div></body></html>