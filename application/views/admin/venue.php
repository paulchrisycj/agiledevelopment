<!--Loadinf new CSS -->
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/fixedcolumns/3.2.4/css/fixedColumns.dataTables.min.css" rel="stylesheet"
      type="text/css"/>

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <!--<div class="x_panel">-->
                <div class="page-title">
                    <div class="title_left">
                        <h1>Venues</h1>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addVenue">Add Venue</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table id="venue" class="table table-striped table-bordered dataTable no-footer hover"
                           role="grid"
                           aria-describedby="datatable_info" style="width : 100%">
                        <thead>
                        <tr>
                            <th>Venue ID</th>
                            <th>Venue Name</th>
                            <th>Venue Capacity</th>
                            <th>Venue Location</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
//                         Use relative path instead of a static path, so both local and live site does not require toggling.
//                        echo $_SERVER['DOCUMENT_ROOT'];
//                        echo $_SERVER['SERVER_NAME'];
//                        echo dirname($_SERVER['SERVER_NAME']);
//                        echo __DIR__ ;

                            $path = "http://localhost/agiledevTemplate/includes/server/index.php?action=showAllVenue";
                            //                echo "Path called : " . $path;
                            $response = file_get_contents($path);
                            $response = json_decode($response, true);
                            foreach ($response['results'] as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['venue_id'] . "</td>";
                                echo "<td>" . $row['venue_name'] . "</td>";
                                echo "<td>" . $row['venue_capacity'] . "</td>";
                                echo "<td>" . $row['venue_location'] . "</td>";
//                                echo "<td style='font-size: 12px'>" . substr($row['venue_updated_at'], 0, 10) . "</td>";
//                                echo "<td><button class='editButton buttonLink' data-toggle='modal' data-target='#editVenue' value='" . $row['venue_entry_id'] . "' id='" . $row['venue_entry_id'] . "'>Edit</button></td>";
                                echo "</tr>";
                                }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Venue ID</th>
                            <th>Venue Name</th>
                            <th>Venue Capacity</th>
                            <th>Venue Location</th>
                        </tr>
                        </tfoot>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- Add Venue Modal -->
<div class="modal fade" id="addVenue" role="form">
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Venue</h4>
            </div>
            <!-- Modal Header-->

            <!-- Modal Body-->
            <div class="modal-body">
                <form class="form-horizontal" id="venueForm">
                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="venue_name">Venue Name</label>
                            <div class="col-md-9">
                                <input id="venue_name" name="venue_name" type="text" placeholder=""
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="venue_capacity">Venue Capacity</label>
                            <div class="col-md-9">
                                <input id="venue_capacity" name="venue_capacity" type="number" placeholder=""
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="venue_location">Venue Location</label>
                            <div class="col-md-9">
                                <input id="venue_location" name="venue_location" type="text" placeholder=""
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="submit"></label>
                            <div class="col-md-4">
                                <button id="add_submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Edit Venue Modal -->
<div class="modal fade" id="editVenue" role="form">
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Venue</h4>
            </div>
            <!-- Modal Header-->

            <!-- Modal Body-->
            <div class="modal-body">
                <form class="form-horizontal" id="venueForm">
                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_entry_id">Entry ID</label>
                            <div class="col-md-9">
                                <input id="edit_entry_id" name="edit_entry_id" type="text" placeholder="#######"
                                       disabled='true' class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="venueID">Venue ID</label>
                            <div class="col-md-9">
                                <input id="edit_venue_name" name="edit_venue_name" type="text" placeholder="#######"
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="type">Type</label>
                            <div class="col-md-9">
                                <select id="edit_venue_type" name="edit_venue_type" style="width: 100%;">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_venue_type" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_venue_type";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="diameter">Size</label>
                            <div class="col-md-9">
                                <select name="edit_venue_diameter" id="edit_venue_diameter" style="width: 100%;">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_venue_diameter" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_venue_diameter";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="core">No. of cores</label>
                            <div class="col-md-9">
                                <select id="edit_venue_core" name="edit_venue_core" style="width: 100%;">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_venue_core" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_venue_core";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div hidden class="form-group">
                            <label class="col-md-3 control-label" for="flex">No. of flexes</label>
                            <div class="col-md-9">
                                <select id="edit_venue_flex" name="edit_venue_flex" class="form-control">
                                    <option></option>
                                    <option value='2'>2c</option>
                                    <option value='3'>3c</option>
                                    <option value='4'>4c</option>
                                    <option value='5'>5c</option>
                                    <option value='6'>6c</option>
                                    <option value='7'>7c</option>
                                    <option value='8'>8c</option>
                                    <option value='9'>9c</option>
                                    <option value='10'>10c</option>
                                    <option value='12'>12c</option>
                                    <option value='18'>18c</option>
                                    <option value='21'>21c</option>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="colour">Colour</label>
                            <div class="col-md-9">
                                <select id="edit_venue_colour" name="edit_venue_colour" style="width: 100%">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_venue_colour" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_venue_colour";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="special">Special</label>
                            <div class="col-md-9">
                                <input id="edit_venue_special" name="edit_venue_special" type="text" placeholder="Special"
                                       class="form-control input-md">
                                <span class="help-block">help</span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_venue_length">Available Length</label>
                            <div class="col-md-9">
                                <input id="edit_venue_length" name="edit_venue_length" type="number"
                                       placeholder="length(Meter)"
                                       class="form-control input-md" required="">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status">Status</label>
                            <div class="col-md-9">
                                <input id="edit_venue_status" name="edit_venue_status" type="text" placeholder="Status"
                                       class="form-control input-md" required="">
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="submit"></label>
                            <div class="col-md-9">
                                <button id="edit_submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<button id="example"></button>

<script>


    //    Ensure client side script loads after pages is fully loaded
    $(document).ready(function () {
        $('.editButton').click(function () {
            console.log($(this));
            $.ajax({

                url: "<?php echo $path;?>/includes/server/KSLectricMalaysia.php",

                data: {
                    'action': "showOneVenueByID",
                    'id': $(this).val()
                },

                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                },

                success: function (data) {
                    console.log(data['results'][0]['venue_entry_id']);
                    $('#edit_entry_id').val(data['results'][0]['venue_entry_id']);
                    $('#edit_venue_name').val(data['results'][0]['venue_name']).trigger('change.select2');
                    $('#edit_venue_type').val(data['results'][0]['venue_type']).trigger('change.select2');
                    $('#edit_venue_core').val(data['results'][0]['venue_core']).trigger('change.select2');
                    $('#edit_venue_flex').val(data['results'][0]['venue_flex']);
                    $('#edit_venue_colour').val(data['results'][0]['venue_colour']).trigger('change.select2');
                    $('#edit_venue_special').val(data['results'][0]['venue_special']);
                    $('#edit_venue_status').val(data['results'][0]['venue_status']);
                    $('#edit_venue_length').val(data['results'][0]['venue_length']);
                    $('#edit_venue_diameter').val(data['results'][0]['venue_diameter']).trigger('change.select2');

                },

                type: 'POST'
            })
        });

        $('#edit_submit').click(function (e) {
            e.preventDefault();
            $.ajax({

                url: '<?php echo $path?>/includes/server/KSLectricMalaysia.php',

                data: {
                    'action': "updateVenue",
                    'id': $('#edit_entry_id').val(),
                    'venue_name': $('#edit_venue_name').val(),
                    'venue_type': $('#edit_venue_type').val(),
                    'venue_core': $('#edit_venue_core').val(),
                    'venue_colour': $('#edit_venue_colour').val(),
                    'venue_special': $('#edit_venue_special').val(),
                    'venue_status': $('#edit_venue_status').val(),
                    'venue_available_length': $('#edit_venue_length').val(),
                    'venue_diameter': $('#edit_venue_diameter').val()
                },

                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                },

                success: function (data) {
                    alert("Successfully updated!");
                    console.log(data);
                },

                type: 'POST'
            })
        });
        $('#add_submit').click(function (e) {
            e.preventDefault();
            $.ajax({

                url: 'http://localhost/agiledevTemplate/includes/server/index.php',

                data: {
                    'action': "addVenue",
                    'venue_name': $('#venue_name').val(),
                    'venue_location': $('#venue_location').val(),
                    'venue_capacity': $('#venue_capacity').val()
                },

                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                },

                success: function (data) {
                    alert("Successfully updated!");
                    console.log(data);
                },

                type: 'POST'
            })
        });//End of document ready.
    });
</script>

<script>

    $(document).ready(function () {


        $("#venue_type").select2({
            templateResult: formatState
        });

        $("#venue_diameter").select2({
            templateResult: formatState
        });

        $("#venue_core").select2({
            templateResult: formatState
        });

        $("#venue_colour").select2({
            templateResult: formatState
        });

        $('#edit_venue_type').select2({
            templateResult: formatState
        });

        $('#edit_venue_diameter').select2({
            templateResult: formatState
        });

        $('#edit_venue_core').select2({
            templateResult: formatState
        });

        $('#edit_venue_colour').select2({
            templateResult: formatState
        });
    });

    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = $(
            '<span>' + state.text + '</span>'
        );

        return $state;
    };


    jQuery.fn.filterByText = function (textbox) {
        return this.each(function () {
            var select = this;
            var options = [];
            $(select).find('option').each(function () {
                options.push({
                    value: $(this).val(),
                    text: $(this).text()
                });
            });
            $(select).data('options', options);

            $(textbox).bind('change keyup', function () {
                var options = $(select).empty().data('options');
                var search = $.trim($(this).val());
                var regex = new RegExp(search, "gi");

                $.each(options, function (i) {
                    var option = options[i];
                    if (option.text.match(regex) !== null) {
                        $(select).append(
                            $('<option>').text(option.text).val(option.value)
                        );
                    }
                });
            });
        });
    };

    $(document).ready(function () {
        $('#venue').DataTable({
            scrollX: true,
            order: [[10, "asc"]],
            columnDefs: [
                {
                    "targets": [0],
                    "visible": false
                }
            ],
            fixedColumns: {
                leftColumns: 1
            },
            dom: 'TlBfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    title: 'DRUM LIST'
                },
                'excelHtml5',
                'copyHtml5'
            ],
            "oTableTools": {
                "aButtons": [
                    {
                        "sExtends": "copy",
                        "sButtonText": "Copy to clipboard",
                        "oSelectorOpts": {
                            page: 'current'
                        }
                    }
                ]
            },
            'order': []
        });  // End of DataTable
    });


</script>


<script>


</script>