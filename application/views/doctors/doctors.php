<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Doctors</h3>
					<div class="text-right">
						<button class="btn bg-purple" data-toggle="modal" data-target="#add_doctor_modal">Add New Doctor
						</button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
							<th>Doctor Name</th>
							<th>Email</th>
							<th>Street</th>
							<th>Address 2</th>
							<th>City</th>
							<th>Postal Cord</th>
							<th>District</th>
							<th>Province</th>
							<th>Create Date</th>
							<th>Status</th>
						</tr>
						<?php foreach ($doctors as $doctor) { ?> <!--left for doctor controller key right for suitable one doctor -->
							<tr>
								<td><?php echo $doctor->first_name; ?></td>
								<td><?php echo $doctor->email; ?></td>
								<td><?php echo $doctor->street; ?></td>
								<td><?php echo $doctor->address_two; ?></td>
								<td><?php echo $doctor->city; ?></td>
								<td><?php echo $doctor->postal; ?></td>
								<td><?php echo $doctor->district; ?></td>
								<td><?php echo $doctor->province; ?></td>
								<td><?php echo $doctor->create_date; ?></td>
								<td><?php echo $doctor->status; ?></td>

							</tr>
						<?php } ?>
					</table>
				</div>
				<div class="box-footer"></div>
			</div>
		</div>
	</div>
</section>

<!-- Start Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_doctor_modal" ">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<div clas="modal-title">Create New Doctor</div>
		</div>
		<form action="<?php base_url(); ?>doctors/add_doctor" method="post">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" id="first_name"
								   placeholder="Doctor First Name" data-validation="required">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" id="last_name"
								   placeholder="Last Name" data-validation="required">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Email Address</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" data-validation="email" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Street</label>
							<input type="text" class="form-control" name="street" id="street" placeholder="Street" data-validation="required" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Address 2</label>
							<input type="text" class="form-control" name="address_two" id="address_two" placeholder="Address Two" data-validation="required" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>City</label>
							<select class="form-control" name="city" id="city">
								<option selected disabled>
									Select One
								</option>
								<?php foreach ($cities as $city){ ?> <!--left for controller key right for suitable one city -->
									<option><?php echo $city->name_en ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Postal Cord</label>
							<input type="text" class="form-control" name="postal" id="postal" placeholder="Postal Cord" readonly >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>District</label>
							<select class="form-control" name="district" id="district">
								<option selected disabled>
									Select One
								</option>
								<?php foreach ($districts as $district) { ?>  <!--left for controller key right for suitable one district -->
									<option><?php echo $district->name_en ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Province</label>
							<select class="form-control" name="province" id="province">
								<option selected disabled>
									Select One
								</option>
								<?php foreach ($provinces as $province) { ?>  <!--left for controller key right for suitable one province -->
									<option><?php echo $province->name_en ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-primary">Create</button>
			</div>
		</form>
	</div>
</div>
</div>

<!-- End Modal -->

<script>
	$(document).ready(function(){
		$('#city').change(function () {
			let city = $(this).val();
			$.ajax({
				type: 'get',
				url: base_url + 'doctors/Doctors/get_postal_code', <!-- controller folder, controller name, function name -->
				async: false,
				dataType: 'json',
				data: {'city': city}, <!-- key, value -->
				success: function (response) {
					$('#postal').val(response[0]['postcode']);
				},
			});
		});
	});

</script>
