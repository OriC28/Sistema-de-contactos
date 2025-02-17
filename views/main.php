<?php
/**
 * Main View
 *
 * This file represents the main page of the Contact System. It displays a list of contacts
 * with options to add new contacts, search, filter, and paginate through the list.
 * The page includes a table for displaying contact data and interactive elements for
 * managing the contact list.
 *
 * @package    ClientAPI\Views
 * @author     Genesys Alvarado <gnesyuwu@gmail.com>
 * @version    1.0.0
 * @license    MIT
 */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to the external CSS file with a cache-busting query string -->
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    <title>Contact System</title>
</head>
<body>
    <!-- Header section -->
    <header>
        <h1>Contact System</h1>
    </header>

    <!-- Main content section -->
    <main>
        <!-- Container for the "Add Contact" button -->
        <section class="container">
            <div class="button-add">
                <span>
                    <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/plus-math.png" alt="add"/>
                </span>
                <a href="form.php">Add contact</a>
            </div>
        </section>

        <!-- Container for search and filter bars -->
        <section class="search-container">
            <!-- Search bar -->
            <div class="search-bar">
                <input id="input-search" type="search" placeholder="Search...">
                <button id="search-icon">
                    <img width="25" height="25" src="https://img.icons8.com/fluency-systems-filled/30/search.png" alt="search"/>
                </button>
            </div>

            <!-- Filter bar -->
            <section class="filter-bar">
                <div id="filter-label">
                    <span>
                        <img width="25" height="25" src="https://img.icons8.com/forma-regular/30/filter.png" alt="filter"/>
                    </span>
                    <label for="">Filter by:</label>
                </div>

                <!-- Container for filter buttons -->
                <div id="filter-buttons-container">
                    <button id="nameFilter" class="button-filter" onclick="toggleSelection(this)">Names</button>
                    <button id="rolFilter" class="button-filter" onclick="toggleSelection(this)">Rol</button>
                    <button id="companyFilter" class="button-filter" onclick="toggleSelection(this)">Company</button>
                </div>

                <!-- Script to handle filter button selection -->
                <script>
                    /**
                     * Toggles the selection state of a filter button.
                     *
                     * @param {HTMLElement} element The filter button element.
                     */
                    function toggleSelection(element) {
                        var options = document.querySelectorAll('.button-filter');
                        options.forEach(function(option) {
                            option.classList.remove('selected');
                        });
                        element.classList.add('selected');
                    }
                </script>
            </section>

            <!-- Warning message container -->
            <div class="warning"></div>
        </section>

        <!-- Container for the contacts table -->
        <section class="table-container">
            <table id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Names</th>
                        <th>Surnames</th>
                        <th>Company name</th>
                        <th>Rol</th>
                        <th>E-mail</th>
                        <th>Phone Number</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <!-- Table body where contact data will be inserted dynamically -->
                <tbody id="tbody"></tbody>
            </table>

            <!-- Pagination controls -->
            <div class="pagination">
                <button id="prev">
                    <img width="15" height="15" src="https://img.icons8.com/ios-glyphs/30/less-than.png" alt="left"/>
                </button>
                <label id="pageInfo"></label>
                <button id="next">
                    <img width="15" height="15" src="https://img.icons8.com/ios-glyphs/30/more-than.png" alt="right"/>
                </button>
            </div>
        </section>
    </main>

    <!-- Footer section -->
    <footer>
        <p></p>
    </footer>

    <!-- Include jQuery library for client-side scripting -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
            crossorigin="anonymous"></script>
    <!-- Include custom JavaScript for dynamic functionality -->
    <script src="../assets/js/scripts.js"></script>
</body>
</html>
