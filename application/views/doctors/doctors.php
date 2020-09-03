<!--notification massage for after create a doctor-->
<?php if($this->session->flashdata('alert')) { ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$.notify({
						message: '<?php echo $this->session->flashdata('alert')['massage'] ?>'
					},
					{
						type: '<?php echo $this->session->flashdata('alert')['type'] ?>',
						placement: {
							from: "bottom",
							align: "right"
						},
						animate: {
							enter: 'animated fadeInDown',
							exit: 'animated fadeOutUp'
						},
					});
		});
	</script>
<?php } ?>

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
					<table class="table table-bordered table-responsive data_tables display pageResize" id="doctor_table">
						<tr>
							<th>Doctor Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Create Date</th>
							<th>Status</th>
							<th></th>
						</tr>
						<?php foreach ($doctors as $doctor) { ?> <!--left for doctor controller key right for suitable one doctor -->
							<tr>
								<td><?php echo $doctor->salutation; ?>&nbsp;<?php echo $doctor->first_name; ?></td>
								<td><?php echo $doctor->email; ?></td>
								<td><?php echo $doctor->street.','.$doctor->address_two.',<br>'.$doctor->city.', '.$doctor->postal.',<br>'.$doctor->district.', '.$doctor->province; ?></td>
								<td><?php echo $doctor->create_date; ?></td>
								<td><?php echo $doctor->status; ?></td>
								<td class="text-center">
									<button class="btn btn-primary btn-sm" name="update" type="button" id="doctor_update" data-id="<?php echo $doctor->id; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i>
									</button>
									<button class="btn btn-danger btn-sm" name="delete" id="doctor_delete" data-id="<?php echo $doctor->id; ?>"><i class="fa fa-trash" aria-hidden="true"></i>
									</button>
								<?php if($doctor->status == 0) { ?>
									<form action="<?php base_url(); ?>doctors/active_doctor" method="post" style="display: inline;">
										<input type="hidden" name="id" value="<?php echo $doctor->id; ?>"/>
										<button type="submit" class="btn btn-success btn-sm" name="active" id="doctor_active"><i class="fa fa-check" aria-hidden="true"></i>
										</button>
									</form>
								<?php } ?>
								<?php if($doctor->status == 1) { ?>
									<form action="<?php base_url(); ?>doctors/inactive_doctor" method="post" style="display: inline;">
										<input type="hidden" name="id" value="<?php echo $doctor->id; ?>"/>
										<button class="btn btn-warning btn-sm" name="inactive" id="doctor_inactive"><i class="fa fa-times" aria-hidden="true"></i>
										</button>
									</form>
								<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<div class="box-footer"></div>
			</div>
		</div>
	</div>
</section>

<!-- Start create Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_doctor_modal" ">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<div clas="modal-title">Create New Doctor</div>
		</div>
		<form action="<?php base_url(); ?>doctors/add_doctor" method="post">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Salutation</label>
							<select class="form-control" name="salutation" id="salutation" data-validation="required">
								<option disabled selected>Select Salutation</option>
								<option value="Rev.">Rev.</option>
								<option value="Mr.">Mr.</option>
								<option value="Mrs.">Mrs.</option>
								<option value="Miss.">Miss.</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" id="first_name"
								   placeholder="Doctor First Name" data-validation="custom" data-validation-regexp="^([A-Za-z]+)$">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" id="last_name"
								   placeholder="Last Name" data-validation="custom" data-validation-regexp="^([A-Za-z]+)$">
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
							<select class="form-control" name="city" id="city" data-validation="required">
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
							<select class="form-control" name="district" id="district" data-validation="required">
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
							<input type="text" class="form-control" name="province" id="province" placeholder="Province" readonly >
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
<!-- End create Modal -->

<!-- Start update Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="update_doctor_modal" ">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<div clas="modal-title">Update a Doctor</div>
		</div>
		<form action="<?php base_url(); ?>doctors/update_doctor" method="post">
			<input type="hidden" name="id" id="update_id"/>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Salutation</label>
							<select class="form-control" name="salutation" id="update_salutation" data-validation="required">
								<option disabled selected>Select Salutation</option>
								<option value="Rev.">Rev.</option>
								<option value="Mr.">Mr.</option>
								<option value="Mrs.">Mrs.</option>
								<option value="Miss.">Miss.</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" id="update_first_name"
								   placeholder="Doctor First Name" data-validation="custom" data-validation-regexp="^([A-Za-z]+)$">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" id="update_last_name"
								   placeholder="Last Name" data-validation="custom" data-validation-regexp="^([A-Za-z]+)$">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Email Address</label>
							<input type="email" class="form-control" name="email" id="update_email" placeholder="Email Address" data-validation="email" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Street</label>
							<input type="text" class="form-control" name="street" id="update_street" placeholder="Street" data-validation="required" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Address 2</label>
							<input type="text" class="form-control" name="address_two" id="update_address_two" placeholder="Address Two" data-validation="required" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>City</label>
							<select class="form-control" name="city" id="update_city" data-validation="required">
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
							<input type="text" class="form-control" name="postal" id="update_postal" placeholder="Postal Cord" readonly >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>District</label>
							<select class="form-control" name="district" id="update_district" data-validation="required">
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
							<input type="text" class="form-control" name="province" id="update_province" placeholder="Province" readonly >
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>
</div>
</div>
<!-- End update Modal -->
<!-- Start Delete Modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="delete_doctor_modal" ">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<div clas="modal-title"></div>
		</div>
		<div class="modal-body">Do you want to delete a doctor?</div>
		<div class="modal-footer">
			<form action="<?php echo base_url('doctors/Doctors/delete_doctor') ?>" method="post" style="display: inline">
				<input type="hidden" name="delete_id" id="delete_id"/>
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			<button type="submit" class="btn btn-default">Cancel</button>
		</div>

	</div>
</div>
</div>
<!-- End Delete Modal -->
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

	$(document).ready(function(){
		$('#district').change(function () {
			let district = $(this).val();
			$.ajax({
				type: 'get',
				url: base_url + 'doctors/Doctors/get_province',
				async: false,
				dataType: 'json',
				data: {'district' : district},
				success: function (response) {
					$('#province').val(response[0]['name_en']);
				},
			});
		});
		$('#doctor_table').on('click','#doctor_update',function () {

			let id=$(this).attr('data-id');

			$.ajax({
				type:'post',
				url: base_url + 'doctors/Doctors/update_doctors',
				async: false,
				dataType: 'json',
				data:{'id' : id},
				success: function (response) {
					$('#update_id').val(response[0]['id']);
					$('#update_salutation').val(response[0]['salutation']);
					$('#update_first_name').val(response[0]['first_name']);
					$('#update_last_name').val(response[0]['last_name']);
					$('#update_street').val(response[0]['street']);
					$('#update_address_two').val(response[0]['address_two']);
					$('#update_postal').val(response[0]['postal']);
					$('#update_email').val(response[0]['email']);
					$('#update_city').val(response[0]['city']);
					$('#update_district').val(response[0]['district']);
					$('#update_province').val(response[0]['province']);
					$('#update_doctor_modal').modal('show');
				}
			});
		});

		$('#doctor_table').on('click','#doctor_delete',function () {
			let id=$(this).attr('data-id');
			$('#delete_id').val(id);


			$('#delete_doctor_modal').modal('show');
		});
	});
</script>
