$(document).ready(function() {
    $('#customer_city').change(function() {
		let city = $(this).val();
		$.ajax({
			type: 'get',
			url: base_url + 'customers/customer/get_postal_code',
			async: false,
			dataType: 'json',
			data: {'city': city},
			success: function (response) {
				$('#customer_postal_code').val(response[0]['postcode']);
			},
		});
    });

    function set_post_code() {
		let city = $('#update_customer_city').val();
		$.ajax({
			type: 'get',
			url: base_url + 'customers/customer/get_postal_code',
			async: false,
			dataType: 'json',
			data: {'city': city},
			success: function (response) {
				if(response[0]) {
					$('#update_customer_postal_code').val(response[0]['postcode']);
				}
			},
		});
	}
	set_post_code();

	$('#update_customer_city').change(function() {
		let city = $(this).val();
		$.ajax({
			type: 'get',
			url: base_url + 'customers/customer/get_postal_code',
			async: false,
			dataType: 'json',
			data: {'city': city},
			success: function (response) {
				$('#update_customer_postal_code').val(response[0]['postcode']);
			},
		});
	});
});
