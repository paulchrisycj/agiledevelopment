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
                        <h1>Drums</h1>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                            <!--                            <button class="btn btn-primary" data-toggle="modal" data-target="#addDrum">Add Drum</button>-->
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table id="drum" class="table table-striped table-bordered dataTable no-footer hover"
                           role="grid"
                           aria-describedby="datatable_info" style="width : 100%">
                        <thead>
                        <tr>
                            <th>Dashboard COLUMN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Use relative path instead of a static path, so both local and live site does not require toggling.
                        //echo $_SERVER['DOCUMENT_ROOT'];
                        //echo $_SERVER['SERVER_NAME'];
                        //echo dirname($_SERVER['SERVER_NAME']);
                        //echo __DIR__ ;


                        //                        $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=showAllDrums" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=showAllDrums";
                        //
                        //                        //                echo "Path called : " . $path;
                        //
                        //                        $response = file_get_contents($path);
                        //                        $response = json_decode($response, true);
                        //                        foreach ($response['results'] as $row) {
                        //                            echo "<tr>";
                        //                            echo "<td>" . $row['drum_entry_id'] . "</td>";
                        //                            echo "<td>" . $row['drum_id'] . "</td>";
                        //                            echo "<td>" . $row['drum_type'] . "</td>";
                        //                            echo "<td>" . $row['drum_diameter'] . "</td>";
                        //                            echo "<td>" . $row['drum_core'] . "</td>";
                        //                            echo "<td>" . $row['drum_colour'] . "</td>";
                        //                            echo "<td>" . $row['total_left'] . "</td>";
                        //                            echo "<td>" . $row['drum_special'] . "</td>";
                        //                            echo "<td>" . $row['drum_status'] . "</td>";
                        //                            echo "<td>" . $row['drum_registered_at'] . "</td>";
                        //                            echo "<td style='font-size: 12px'>" . substr($row['drum_updated_at'], 0, 10) . "</td>";
                        //                            echo "<td><button class='editButton buttonLink' data-toggle='modal' data-target='#editDrum' value='" . $row['drum_entry_id'] . "' id='" . $row['drum_entry_id'] . "'>Edit</button></td>";
                        //                            echo "</tr>";
                        //                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Dashboard COLUMN</th>
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

<!-- Add Drum Modal -->
<div class="modal fade" id="addDrum" role="form">
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Drum</h4>
            </div>
            <!-- Modal Header-->

            <!-- Modal Body-->
            <div class="modal-body">
                <form class="form-horizontal" id="drumForm">
                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="drumID">Drum ID</label>
                            <div class="col-md-9">
                                <input id="drum_id" name="drum_id" type="text" placeholder="#######"
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="type">Type</label>
                            <div class="col-md-9">
                                <select id="drum_type" name="drum_type" class="form-control" style="width: 100%;">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_drum_type" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_drum_type";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="diameter">Size</label>
                            <div class="col-md-9">
                                <select name="drum_diameter" id="drum_diameter" style="width: 100%;">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_drum_diameter" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_drum_diameter";
                                    echo file_get_contents($path);
                                    ?>
                                </select>

                            </div>
                        </div>


                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="core">No. of cores</label>
                            <div class="col-md-9">
                                <select id="drum_core" name="drum_core" style="width: 100%;">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_drum_core" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_drum_core";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group" style="display: none">
                            <label class="col-md-3 control-label" for="flex">No. of flexes</label>
                            <div class="col-md-9">
                                <select id="drum_flex" name="drum_flex" class="form-control">
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
                                <select id="drum_colour" name="drum_colour" style="width: 100%">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_drum_colour" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_drum_colour";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="special">Special</label>
                            <div class="col-md-9">
                                <input id="drum_special" name="drum_special" type="text" placeholder="Special"
                                       class="form-control input-md">
                                <span class="help-block">help</span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="drum_available_length">Length</label>
                            <div class="col-md-9">
                                <input id="drum_available_length" name="drum_length" type="number"
                                       placeholder="length(Meter)"
                                       class="form-control input-md" required>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status">Status</label>
                            <div class="col-md-9">
                                <input id="drum_status" name="drum_status" type="text" placeholder="Status"
                                       class="form-control input-md" required="">
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

<!-- Edit Drum Modal -->
<div class="modal fade" id="editDrum" role="form">
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Drum</h4>
            </div>
            <!-- Modal Header-->

            <!-- Modal Body-->
            <div class="modal-body">
                <form class="form-horizontal" id="drumForm">
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
                            <label class="col-md-3 control-label" for="drumID">Drum ID</label>
                            <div class="col-md-9">
                                <input id="edit_drum_id" name="edit_drum_id" type="text" placeholder="#######"
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="type">Type</label>
                            <div class="col-md-9">
                                <select id="edit_drum_type" name="edit_drum_type" style="width: 100%;">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_drum_type" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_drum_type";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="diameter">Size</label>
                            <div class="col-md-9">
                                <select name="edit_drum_diameter" id="edit_drum_diameter" style="width: 100%;">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_drum_diameter" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_drum_diameter";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="core">No. of cores</label>
                            <div class="col-md-9">
                                <select id="edit_drum_core" name="edit_drum_core" style="width: 100%;">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_drum_core" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_drum_core";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div hidden class="form-group">
                            <label class="col-md-3 control-label" for="flex">No. of flexes</label>
                            <div class="col-md-9">
                                <select id="edit_drum_flex" name="edit_drum_flex" class="form-control">
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
                                <select id="edit_drum_colour" name="edit_drum_colour" style="width: 100%">
                                    <?php
                                    $path = ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/KSLetricMalaysia/includes/server/KSLectricMalaysia.php?action=option_drum_colour" : "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/KSLectricMalaysia.php?action=option_drum_colour";
                                    echo file_get_contents($path);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="special">Special</label>
                            <div class="col-md-9">
                                <input id="edit_drum_special" name="edit_drum_special" type="text" placeholder="Special"
                                       class="form-control input-md">
                                <span class="help-block">help</span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_drum_length">Available Length</label>
                            <div class="col-md-9">
                                <input id="edit_drum_length" name="edit_drum_length" type="number"
                                       placeholder="length(Meter)"
                                       class="form-control input-md" required="">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status">Status</label>
                            <div class="col-md-9">
                                <input id="edit_drum_status" name="edit_drum_status" type="text" placeholder="Status"
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

    <?php
    $path = ($_SERVER['SERVER_NAME'] == "localhost" ? "http://localhost/KSLetricMalaysia" : "http://" . $_SERVER['SERVER_NAME']);
    ?>





    //    Ensure client side script loads after pages is fully loaded
    $(document).ready(function () {
        $('.editButton').click(function () {
            console.log($(this));
            $.ajax({

                url: "<?php echo $path;?>/includes/server/KSLectricMalaysia.php",

                data: {
                    'action': "showOneDrumByID",
                    'id': $(this).val()
                },

                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                },

                success: function (data) {
                    console.log(data['results'][0]['drum_entry_id']);
                    $('#edit_entry_id').val(data['results'][0]['drum_entry_id']);
                    $('#edit_drum_id').val(data['results'][0]['drum_id']).trigger('change.select2');
                    $('#edit_drum_type').val(data['results'][0]['drum_type']).trigger('change.select2');
                    $('#edit_drum_core').val(data['results'][0]['drum_core']).trigger('change.select2');
                    $('#edit_drum_flex').val(data['results'][0]['drum_flex']);
                    $('#edit_drum_colour').val(data['results'][0]['drum_colour']).trigger('change.select2');
                    $('#edit_drum_special').val(data['results'][0]['drum_special']);
                    $('#edit_drum_status').val(data['results'][0]['drum_status']);
                    $('#edit_drum_length').val(data['results'][0]['drum_length']);
                    $('#edit_drum_diameter').val(data['results'][0]['drum_diameter']).trigger('change.select2');

                },

                type: 'POST'
            })
        });

        $('#edit_submit').click(function (e) {
            e.preventDefault();
            $.ajax({

                url: '<?php echo $path?>/includes/server/KSLectricMalaysia.php',

                data: {
                    'action': "updateDrum",
                    'id': $('#edit_entry_id').val(),
                    'drum_id': $('#edit_drum_id').val(),
                    'drum_type': $('#edit_drum_type').val(),
                    'drum_core': $('#edit_drum_core').val(),
                    'drum_colour': $('#edit_drum_colour').val(),
                    'drum_special': $('#edit_drum_special').val(),
                    'drum_status': $('#edit_drum_status').val(),
                    'drum_available_length': $('#edit_drum_length').val(),
                    'drum_diameter': $('#edit_drum_diameter').val()
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

                url: '<?php echo $path;?>/includes/server/KSLectricMalaysia.php',

                data: {
                    'action': "addDrum",
                    'drum_id': $('#drum_id').val(),
                    'drum_type': $('#drum_type').val(),
                    'drum_core': $('#drum_core').val(),
                    'drum_flex': $('#drum_flex').val(),
                    'drum_colour': $('#drum_colour').val(),
                    'drum_special': $('#drum_special').val(),
                    'drum_status': $('#drum_status').val(),
                    'drum_available_length': $('#drum_available_length').val(),
                    'drum_diameter': $('#drum_diameter').val()
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


        $("#drum_type").select2({
            templateResult: formatState
        });

        $("#drum_diameter").select2({
            templateResult: formatState
        });

        $("#drum_core").select2({
            templateResult: formatState
        });

        $("#drum_colour").select2({
            templateResult: formatState
        });

        $('#edit_drum_type').select2({
            templateResult: formatState
        });

        $('#edit_drum_diameter').select2({
            templateResult: formatState
        });

        $('#edit_drum_core').select2({
            templateResult: formatState
        });

        $('#edit_drum_colour').select2({
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
        $('#dashboard').DataTable({
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