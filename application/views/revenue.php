	<div class="widget-body innerAll inner-2x">
		<!-- Table -->
		<table class="table table-striped table-responsive swipe-horizontal table-primary">
		<?php // print_r($DocumentElement['HealthCareAssistant']); ?>
			<!-- Table heading -->
			<thead>
				<tr>
					<th>Patient's Name</th>
					<th>Patient's Code</th>
					<th>Intake Code</th>
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
					<td><?php echo $item['patientname'];?></td>
					<td><?php echo $item['patientcode'];?></td>
					<td><?php echo $item['intakecode'];?></td>
					<td><?php echo $item['begindate'];?></td>
					<td><?php echo $item['enddate'];?></td>
				</tr>
				<?php endforeach; ?>
				<!-- Table row -->
				
			</tbody>
			<!-- // Table body END -->
			
		</table>
		<!-- // Table END -->
	</div>