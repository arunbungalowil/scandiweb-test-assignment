$(document).ready(function() {
    $('#delete-product-btn').click(function() {
        var ids = [];
        $('.delete-checkbox:checked').each(function() {
            ids.push($(this).val());
        });

        $.ajax({
            url: '/deleteproducts',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ ids: ids }),
            success: function(response) {
                // console.log('Raw Response:', response);  
                if (response.success) {
                    location.reload(); 
                   
                } else {
                    $('#error-message').text('Failed to delete products: ' + (response.error || 'Unknown error')).show();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error-message').text('AJAX Error: ' + textStatus + ' - ' + errorThrown).show();
            }
        });
    });
});
