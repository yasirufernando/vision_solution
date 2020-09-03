<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-8">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Schedules</h3>
				</div>
				<div class="box-body">
					<div id="calendar"></div>
				</div>
				<div class="box-footer"></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Schedules</h3>
				</div>
				<form action="<?php base_url(); ?>" method="post">
					<div class="box-body">
						<div class="form-group">
							<label>Doctor Name</label>
							<select class="form-control" name="doctor_name" id="doctor_name" data-validation="required">
								<option selected disabled>
									Select One
								</option>
								<?php foreach ($doctors as $doctor ) { ?>  <!--left for controller key right for suitable one doctor -->
									<option value="<?php echo $doctor->id ?>"><?php echo $doctor->salutation.$doctor->first_name.' '.$doctor->last_name  ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="Date" class="form-control" name="schedule_date" id="schedule_date">
						</div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" class="btn btn-primary">Schedule</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>
