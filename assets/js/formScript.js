// This script gets all the customer data to add to the form inputs

$(document).ready(function() {
    // Get client id by URL
    const urlParams = new URLSearchParams(window.location.search);
    const clientId = urlParams.get('id');
    if(clientId)
    {
        // Set a request to API to get client's data
        $.ajax({
            url: `http://localhost/Sistema de contactos/routes/routes.php/clients/${clientId}`,
            type: 'GET',
            success: function(client)
            {
                // Set data in each field into form 
                $('#clientId').val(client.id);
                $('#firstName').val(client.firstName);
                $('#lastName').val(client.lastName);
                $('#firstSurname').val(client.firstSurname);
                $('#secondSurname').val(client.secondSurname);
                $('#companyName').val(client.companyName);
                $('#rol').val(client.rol);
                $('#email').val(client.email);
                $('#phone').val(client.phone);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
            }
        });
    }
});