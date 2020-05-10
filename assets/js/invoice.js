$(document).ready(function() {
    // $('#add_items_form')[0].reset();

    $('#item_category').change(function() {
        $('#item_code option').remove();
        $('#item_name option').remove();
        let cat_id = $('#item_category :selected').val();
        $.ajax({
            type: 'get',
            url: base_url + 'invoice/invoice/get_category_wise_products',
            async: false,
            dataType: 'json',
            data: {cat_id: cat_id},
            success: function (response) {
                for(i=0; i < response.length; i++) {
                    $('#item_code').append('<option value="'+ response[i].id +'" data-price="'+ response[i].price +'">'+ response[i].code +'</option>');
                    $('#item_name').append('<option value="'+ response[i].id +'" data-price="'+ response[i].price +'">'+ response[i].name +'</option>');
                    $('#item_price').val(response[i].price);
                }
            },
        });
    });

    $('#item_name').change(function() {
        let id = $('#item_name option:selected').val();
        let price = $('#item_name option:selected').data('price');
        console.log(price);
        $('#item_price').val(price);
        $('#item_code').val(id)
    });

    $('#item_code').change(function() {
        let id = $('#item_code option:selected').val();
        let price = $('#item_code option:selected').data('price');
        $('#item_price').val(price);
        $('#item_name').val(id)
    });

    // calculate subtotal
    $('#item_price, #item_quantity, #item_discount, #item_tax').on('change paste keyup', function() {
        let unit_price = $('#item_price').val();
        let quantity = $('#item_quantity').val();
        let discount = $('#item_discount').val();
        let tax = $('#item_tax').val();
        let total = 0.00;

        if(quantity != "") {
            total = (unit_price * quantity) - ((unit_price * quantity) * (discount / 100));
            total = parseFloat(total).toFixed(2);
        }
        $('#item_subtotal').val(total);
    });

    $('#add_item').click(function() {
        let count = $('#invoice_lines >tr').length;
        let product_code = $('#item_code option:selected').text();
        let product = $('#item_name option:selected').text();
        let product_id = $('#item_name option:selected').val();
        let price = $('#item_price').val();
        let quantity = $('#item_quantity').val();
        let discount = $('#item_discount').val();
        let tax = $('#item_tax').val();
        let subtotal = $('#item_subtotal').val();
        let row = "";
        row += '<tr>' +
               '<td class="text-right"><input type="hidden" class="form-control" id="invoice_product_category">'+product_code+'</td>' +
               '<td class="text-left"><input type="hidden" class="form-control" id="invoice_product" name="line[]" value="'+product_id+'">'+product+'</td>' +
               '<td class="text-right"><input type="text" class="form-control" id="invoice_unit_price" name="line[]" placeholder="0.00" value="'+price+'"></td>' +
               '<td class="text-right"><input type="text" class="form-control" id="invoice_quantity" name="line[]" placeholder="0.00" value="'+quantity+'"></td>' +
               '<td></td>' +
               '<td class="text-right"><input type="text" class="form-control" id="invoice_discount" name="line[]" placeholder="0.00" value="0.00" value="'+discount+'"></td>' +
               '<td class="text-right"><input type="text" class="form-control" id="invoice_tax" name="line[]" placeholder="0.00" value="15" value="'+tax+'"></td>' +
               '<td class="text-right"><input type="text" class="form-control invoice_total" id="invoice_total" name="line[]" placeholder="0.00" readonly value="'+subtotal+'"></td>' +
               '<td><button type="button" class="btn btn-sm btn-danger" id="delete_line"><i class="fa fa-trash"></i></button></td>'
               '</tr>';
        $('#invoice_lines').append(row);
    });

    $('#invoice_lines').on('change paste keyup', '#invoice_unit_price, #invoice_quantity, #invoice_discount, #invoice_tax', function () {
        let unit_price = $(this).closest("tr").find('#invoice_unit_price').val();
        let quantity = $(this).closest("tr").find('#invoice_quantity').val();
        let discount = $(this).closest("tr").find('#invoice_discount').val();
        let tax = $(this).closest("tr").find('#invoice_tax').val();
        let total = 0.00;

        if(quantity != "") {
            total = (unit_price * quantity) - ((unit_price * quantity) * (discount / 100));
            total = parseFloat(total).toFixed(2);
        }
        $(this).closest("tr").find('#invoice_total').val(total);

        let total_untax = 0;
        let total_tax = 0;
        let total_discount = 0;
        let total_sum = 0;

        $("#invoice_lines tr").each(function () {
            let up = $(this).find('#invoice_unit_price').val();
            let qty = $(this).find('#invoice_quantity').val();
            let dis = $(this).find('#invoice_discount').val();
            let ta = $(this).find('#invoice_tax').val();
            let sub = $(this).find('#invoice_total').val();
            let tot = up * qty;

            total_untax += parseFloat(tot);
            total_tax += (parseFloat(ta) * tot) / 100;
            total_discount += (parseFloat(dis) * tot) / 100;
            total_sum += parseFloat(tot) + ((parseFloat(ta) * tot) / 100) - ((parseFloat(dis) * tot) / 100);
        });
        $("#sub_total").val(total_untax.toFixed(2));
        $("#tax").val(total_tax.toFixed(2));
        $("#tax_amount").val(total_discount.toFixed(2));
        $("#total_amount").val(total_sum.toFixed(2));
    });

    $('#invoice_lines').on('click', '#delete_line', function() {
        $(this).closest("tr").remove();
    });
});
