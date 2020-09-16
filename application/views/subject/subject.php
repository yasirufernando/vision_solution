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
				<div class="box-header"></div>
				<form action="<?php base_url(); ?>subject/create_subject" method="post">
					<div class="box-body">
						<div class="form-group">
							<label>Doctor Subject</label>
							<select class="form-control" name="doctor_subject" id="doctor_subject" data-validation="required">
								<option selected disabled>
									Select One
								</option>
								<?php foreach ($subjects as $subject ) { ?>  <!--left for controller key right for suitable one doctor -->
									<option value="<?php echo $subject->id ?>"><?php echo $subject->doctor_subject ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Color</label>
							<input type="color" class="form-control" name="doctor_color" id="doctor_color">
						</div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
				<div class="box-footer"></div>
			</div>
		</div>
	</div>
</section>
