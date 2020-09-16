<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-8">
			<div class="box">
				<div class="box-header"></div>
				<div class="box-body"></div>
				<div class="box-footer"></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box">
				<div class="box-header">Channelings</div>
				<form action="<?php base_url(); ?>channels/add_channel" method="post">
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
						<div class="form-group">
							<label>Appointment Number</label>
							<input type="text" class="form-control" name="appointment_number" id="appointment_number" readonly>
						</div>
					</div>


				<div class="box-footer">
					<button type="reset" class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$('#doctor_name, #schedule_date').on('change', function () {
				let doctor_name = $('#doctor_name').val();
				let schedule_date = $('#schedule_date').val();

				if(doctor_name && schedule_date) {
					$.ajax({
						type: 'post',
						url: base_url + 'channels/Channels/create_appointment', <!-- controller folder, controller name, function name -->
						async: false,
						dataType: 'json',
						data: {'doctor_name': doctor_name, 'schedule_date': schedule_date}, <!-- key, value -->
						success: function (response) {
							if(response == false) {
								$('#appointment_number').val('1');
							}
							else {
								$('#appointment_number').val(parseInt(response[0]['appointment_number']) + 1);
							}
						},
					});
				}

			})
		});
	</script>
</section>

