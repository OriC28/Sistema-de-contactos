// This script uses the API

$(document).ready(function()
{
    let currentPage = 1; 
    let totalPages = 1; 
    let url = "";
    // Function to load the data of the current page
    function loadPage(page)
    {
        $.ajax({
            url: `http://localhost/Sistema de contactos/routes/routes.php?page=${page}`,
            type: 'GET',
            dataType: 'json',
            success: function(response)
            {
                // Update the pagination controllers 
                totalPages = response.totalPages;
                currentPage = response.currentPage;
                updateTable(response.clients);
                updatePagination(totalPages, currentPage);
            }
        });
    }

    function updateTable(data){
        // Update table
        let template = '';
        data.forEach(client => {
            template += `
            <tr>
                <td>${client.id}</td>
                <td>${client.firstName} ${client.lastName}</td>
                <td>${client.firstSurname} ${client.secondSurname}</td>
                <td>${client.companyName}</td>
                <td>${client.rol}</td>
                <td>${client.email}</td>
                <td>${client.phone}</td>
                <td>
                    <div class="options">
                        <button class="edit-button" type="button" data-client-id="${client.id}">Edit</a></button>
                        <button class="delete-button" type="button">Delete</button>
                    </div>
                </td>
            </tr>`;
        });
         // Add data into table body
         $('#tbody').html(template);
    }
    function updatePagination(totalPages, currentPage){
        $('#pageInfo').text(`${currentPage}/${totalPages}`);

        // Enable/disable pagination buttons
        $('#prev').prop('disabled', currentPage === 1);
        $('#next').prop('disabled', currentPage === totalPages);
}         

    // Load first page on startup
    loadPage(currentPage);

    // Handle click on "Previous"
    $('#prev').on('click', function()
    {
        if(currentPage > 1)
        {
            loadPage(currentPage - 1);
        }
    });

    // Handle click on "Next"
    $('#next').on('click', function()
    {
        if(currentPage < totalPages)
        {
            loadPage(currentPage + 1);
        }
    });
    // Function to delete a row in the table
    $(document).on('click', '.delete-button', function(event) 
    {
        if(confirm("Are you sure you want to delete it?"))
        {
            event.preventDefault();
            let element = $(this).closest('tr');
            let id = $(element).find('td').first().text();
            let url = `http://localhost/Sistema de contactos/routes/routes.php/clients/${id}`;
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(result)
                {   
                    // Load all pages if a row was deleted
                    loadPage(currentPage); 
                },
                error: function(xhr, status, error)
                {
                    console.error(`Error deleting client with ID ${id}:`, error);
                }
            });
        }
    });
    // Redirect to client if he clicked edit button
    $(document).on('click', '.edit-button', function(event)
    {   // Get client's id
        let id = $(this).data('client-id'); 
        window.location.href = `http://localhost/Sistema de contactos/views/form.php?id=${id}`;
    });
    // Check if the client will add or update data
    $('#client-form').submit(function(e) {
        method = '';
        e.preventDefault();
        const postData = {
            firstName: $('#firstName').val(),
            lastName: $('#lastName').val(),
            firstSurname: $('#firstSurname').val(),
            secondSurname: $('#secondSurname').val(),
            companyName: $('#companyName').val(),
            rol: $('#rol').val(),
            email: $('#email').val(),
            phone: $('#phone').val()
        };
        const clientId = $('#clientId').val();
    
        if (clientId) {
            urlBack = "http://localhost/Sistema de contactos/views/main.php";
            // Edition mode
            url = `http://localhost/Sistema de contactos/routes/routes.php/clients/${clientId}`;
            method = 'PUT';
        } else {
            // Creation mode
            url = `http://localhost/Sistema de contactos/routes/routes.php/clients`;
            method = 'POST';
        }
        $.ajax({
            url: url,
            type: method,
            contentType: 'application/json',
            data: JSON.stringify(postData),
            success: function(response) {
                if(method === 'PUT'){
                    window.location.href = urlBack;
                }else{
                    if(confirm('Client created successfully. Do you want to create anymore?')){
                        $('#client-form').trigger('reset'); 
                       
                    }else{
                        window.location.href = urlBack;
                    }
                }
                // Clean errors messages
                $('.warning p').text(''); 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
                if (jqXHR.responseText) {
                    try {
                        // Transformt to JSON format
                        const response = JSON.parse(jqXHR.responseText);
                       
                        if (response.errors) {
                            // Show errors in form
                            showFormErrors(response.errors);
                        }
                    } catch (e) {
                        console.error('Error, can not parse to response.', e);
                    }
                }
            }
        });
    });
    // Show all errors for each field
    function showFormErrors(errors)
    {
        // Clean errors messages previous
        $('.warning p').text(''); 

        for (const field in errors)
        {   // Get the fields
            if (errors.hasOwnProperty(field)) {
                const fieldErrors = errors[field]; 
                let errorMessage = '';

                for (const errorType in fieldErrors)
                {   // Get each error type
                    if (fieldErrors.hasOwnProperty(errorType))
                    {
                        // Get only the first error
                        errorMessage = fieldErrors[errorType]; 
                        break; 
                    }
                }
                // Add each error in his field 
                $(`#${field}`).closest('.input-section').find('.warning p').text(errorMessage);
            }
        }
    }
});