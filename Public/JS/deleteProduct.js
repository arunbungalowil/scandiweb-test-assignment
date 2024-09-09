$(document).ready(function() {
    $('#delete-product-btn').click(function() {
        var ids = [];
        $('.delete-checkbox:checked').each(function() {
            ids.push($(this).val());
        });

        if (ids.length === 0) {
            alert("No products selected for deletion.");
            return;
        }
        $.ajax({
            url: '/deleteproducts',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ ids: ids }),
            success: function(response) {
                console.log('Raw Response:', response);  
                if (response.success) {
                    location.reload(); 
                } else {
                    alert('Failed to delete products: ' + (response.error || 'Unknown error'));
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error:', textStatus, errorThrown); // Log details of the error
                alert('An error occurred while sending the request: ' + textStatus);
            }
        });
    });
});
