	<div class="container">
			<script type="text/javascript">
				$(function () {
					$('#datetimepicker1').datetimepicker({
						pickTime: false
					});
					$('#datetimepicker2').datetimepicker({
						pickTime: false
					});
					$('#datetimepicker3').datetimepicker({
						pickTime: false
					});
				});
			</script>
		<div class="form-group pickdates">
			<div class="row">
					<div class='col-sm-4'>
						<div class='input-group date' id='datetimepicker1'>
							<input type='text' class="form-control" data-date-format="YYYY-MM-DD" placeholder="From" name="startDate"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='input-group date' id='datetimepicker2'>
							<input type='text' class="form-control" data-date-format="YYYY-MM-DD" placeholder="To" name="endDate"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='input-group date' id='datetimepicker3'>
							<input type='text' class="form-control" data-date-format="YYYY-MM-DD" placeholder="As of" name="asOfDate"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
			</div>	
			<div class="row">
				<div class="col-sm-4">
					<input type='text' class="form-control" placeholder="Agency Code" name="agencyCode"/>
				</div>
				<div class="col-sm-4">
					<input type='text' class="form-control" placeholder="Report Type" name="reportType"/>
				</div>
				<div class="col-sm-4">
					<input type='text' class="form-control" placeholder="Show Paid" name="showPaid"/>
				</div>			
			</div>
			<input type="submit" value="Submit" id="submit" name="submit" class="btn btn-success">
		</div>
		<div class="widget-body innerAll inner-2x">
			<!-- Table -->
			<table class="table table-striped table-responsive swipe-horizontal table-primary">
			<?php //print_r($DocumentElement['HealthCareAssistant']); ?>
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Patient's Name</th>
						<th>Patient's Code</th>
						<th>Report Type</th>
						<th>Date Start</th>
						<th>Date End</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>

					<!-- Table row -->

					<?php foreach ($DocumentElement['HealthCareAssistant'] as $item):?>	
					<tr class="gradeA">
						<td><?php echo $item['PTName'];?></td>
						<td><?php echo $item['PTCode'];?></td>
						<td><?php echo $item['ReportType'];?></td>
						<td><?php echo $item['DateStart'];?></td>
						<td><?php echo $item['DateEnd'];?></td>
					</tr>
					<?php endforeach; ?>
					<!-- Table row -->
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
			<!-- // Table END -->
		</div>
	</div>