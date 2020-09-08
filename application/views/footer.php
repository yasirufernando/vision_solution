</div>
<!-- ================== End content =========================== -->

<!-- ================== Start Footer ============================ -->
<footer class="main-footer">
	<strong>Vision Solution Eye Care Hospital &copy; 2020</strong> All rights reserved.
</footer>
<!-- ================== End Footer ============================ -->

<!-- logout modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="logout_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Logout</h4>
			</div>
			<div class="modal-body">
				<span>Are you sure want to logout ?</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"> No</button>
				<a href="<?php echo base_url(); ?>login/login/logout" class="btn btn-success bg-purple"> Yes </a>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
<!--Jquery Validator-->
<script src="<?php echo base_url(); ?>assets/js/jquery-validator.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Bootstrap Notify -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Full Calendar -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/moment.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/fullcalendar/dist/gcal.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		var calendar = $('#calendar').fullCalendar({
			editable: false,
			header: {
				left: 'prev,today,next',
				center: 'title',
				right: 'month,agendaWeek,agendaDay',
			},
			events: base_url + "schedules/schedules/get_schedule",
			selecttable: false,
		})
	});
</script>
<script>
	$(document).ready(function () {
		$('.sidebar-menu').tree();
	})

	$(function () {
		$('#datepicker').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd',
			changeMonth: true,
			changeYear: true,
			todayHighlight: true,
			orientation: 'bottom left',
		})
	});
</script>
<!--// data tables script-->
<!--<script>-->
<!--	$(function () {-->
<!--		$('.data_tables').DataTable({-->
<!--			'paging': true,-->
<!--			// 'lengthChange': true,-->
<!--			// 'searching': true,-->
<!--			// 'ordering': true,-->
<!--			// 'info': true,-->
<!--			// 'autoWidth': false,-->
<!--			// "pageLength": 10,-->
<!--		})-->
<!--	})-->
<!--</script>-->
<script>
	// jquery validate plugin
	$.validate();
</script>

<script>
	function startTime() {
		var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		var ap = "";
		var today = new Date();
		var y = today.getFullYear();
		var m = months[today.getMonth()];
		var d = today.getDate();
		var h = today.getHours();
		var mi = today.getMinutes();
		var s = today.getSeconds();
		if (h > 12) {
			h = h - 12
		}
		;
		h > 12 ? ap = "PM" : ap = "AM";
		m = checkTime(m);
		s = checkTime(s);
		document.getElementById('datetime').innerHTML = d + " " + m + " " + y + " | " + h + ":" + mi + ":" + s + " " + ap;
		var t = setTimeout(startTime, 500);
	}

	function checkTime(i) {
		if (i < 10) {
			i = "0" + i
		}
		;
		return i;
	}
</script>


</body >
</html>


