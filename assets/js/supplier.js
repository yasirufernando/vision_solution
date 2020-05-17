$(document).ready(function() {
    $('#supplier_city').change(function() {
		let city = $(this).val();
		$.ajax({
			type: 'get',
			url: base_url + 'suppliers/supplier/get_postal_code',
			async: false,
			dataType: 'json',
			data: {'city': city},
			success: function (response) {
				$('#supplier_postal_code').val(response[0]['postcode']);
			},
		});
    });

    function set_post_code() {
		let city = $('#update_supplier_city').val();
		$.ajax({
			type: 'get',
			url: base_url + 'suppliers/supplier/get_postal_code',
			async: false,
			dataType: 'json',
			data: {'city': city},
			success: function (response) {
				if(response[0]) {
					$('#update_supplier_postal_code').val(response[0]['postcode']);
				}
			},
		});
	}
	set_post_code();

	$('#update_supplier_city').change(function() {
		let city = $(this).val();
		$.ajax({
			type: 'get',
			url: base_url + 'suppliers/supplier/get_postal_code',
			async: false,
			dataType: 'json',
			data: {'city': city},
			success: function (response) {
				$('#update_supplier_postal_code').val(response[0]['postcode']);
			},
		});
	});
});
