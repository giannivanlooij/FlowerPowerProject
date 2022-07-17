<?php
    include_once "../../includes/databasehandler-include.php"
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="../../css/employees/employees.css" rel="stylesheet" />

<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">ID</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Naam</th>
                                        <th scope="col">Beschrijving</th>
                                        <th scope="col">Prijs</th>
                                        <th class="text-center" scope="col">Voorraad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // function that fetches table data from the database
                                        include_once '../../includes/products-include.php';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                    
                                   