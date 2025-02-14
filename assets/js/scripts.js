$(document).ready(function()
{
    let currentPage = 1; 
    let totalPages = 1; 

    // Function to load the data of the current page
    function loadPage(page)
    {
        $.ajax({
            url: `http://localhost/Sistema de contactos/routes/routes.php?page=${page}`,
            type: 'GET',
            dataType: 'json',
            success: function(response)
            {
                // Update table
                let template = '';
                let data = response.clients;
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
                                <button class="delete-button" type="button">Delete</button>
                                <button class="edit-button" type="button"><a href="#">Edit</a></button>
                            </div>
                        </td>
                    </tr>`;
                });
                // Add data into table body
                $('#tbody').html(template);

                // Update the pagination controllers 
                totalPages = response.totalPages;
                currentPage = response.currentPage;
                $('#pageInfo').text(`${currentPage}/${totalPages}`);

                // Enable/disable pagination buttons
                $('#prev').prop('disabled', currentPage === 1);
                $('#next').prop('disabled', currentPage === totalPages);
            },
            error: function(xhr, status, error)
            {
                console.error("Error loading data:", error);
            }
        });
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
});