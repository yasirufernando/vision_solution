<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Patients</h3>
					<div class="text-right">
						<button class="btn bg-purple" data-toggle="modal" data-target="#add_patient_modal">Add New Patient
						</button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
							<th>Patient Name</th>
							<th>Email</th>
							<th>Mobile Number</th>
							<th>Nic</th>
							<th>Create Date</th>
							<th>Status</th>
						</tr>
						<?php foreach ($patients as $patient) { ?>
							<tr>
								<td><?php echo $patient->first_name.' '.$patient->last_name; ?></td>
								<td><?php echo $patient->email; ?></td>
								<td><?php echo $patient->mobile; ?></td>
								<td><?php echo $patient->nic; ?></td>
								<td><?php echo $patient->create_date; ?></td>
								<td><?php echo $patient->status; ?></td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="add_patient_modal" ">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<div clas="modal-title">Create New Patient</div>
		</div>
		<form action="<?php base_url(); ?>Patients/add_patient" method="post">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" id="first_name"
								   placeholder="Patient First Name" data-validation="required">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" id="last_name"
								   placeholder="Patient Last Name" data-validation="required">
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
							<label>Mobile</label>
							<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Patient Mobile" data-validation="number" pattern="[0-9]{9,11}" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Patient NIC</label>
							<input type="text" class="form-control" name="nic" id="nic" placeholder="NIC" pattern="[0-9]{9}[x|X|v|V]|[0-9]{11}[x|X|v|V]" title="Contain 10 or 12 character" required >
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


