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
                        <h1>Reservations</h1>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
<!--                            <button class="btn btn-primary" data-toggle="modal" data-target="#addSlot">Add Slot</button>-->
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table id="slot" class="table table-striped table-bordered dataTable no-footer hover"
                           role="grid"
                           aria-describedby="datatable_info" style="width : 100%">
                        <thead>
                        <tr>
                            <th>Venue Name</th>
                            <th>Slot Date</th>
                            <th>Slot Start Time</th>
                            <th>Slot End Time</th>
                            <th>Reserved By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //                         Use relative path instead of a static path, so both local and live site does not require toggling.
                        //                        echo $_SERVER['DOCUMENT_ROOT'];
                        //                        echo $_SERVER['SERVER_NAME'];
                        //                        echo dirname($_SERVER['SERVER_NAME']);
                        //                        echo __DIR__ ;

                        $path = "http://localhost/agiledevelopment/includes/server/index.php?action=showAllBooking";
                        //                echo "Path called : " . $path;
                        $response = file_get_contents($path);
                        $response = json_decode($response, true);
                        foreach ($response['results'] as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['venue_name'] . "</td>";
                            echo "<td>" . $row['slot_date'] . "</td>";
                            echo "<td>" . $row['slot_start_time'] . "</td>";
                            echo "<td>" . $row['slot_end_time'] . "</td>";
                            echo "<td>" . $row['user_name'] . "</td>";
                            echo "<td width='150'><button class='btn btn-primary editButton' data-toggle='modal' data-target='#editReservation' value='" . $row['booking_id'] . "' id='" . $row['booking_id'] . "'>Edit</button>";
                            echo "<button class='btn btn-primary cancelReservation' data-toggle='modal' data-target='' value='" . $row['venue_id'] . "' id='" . $row['booking_id'] . "'>Cancel</button></td>";//                                echo "<td style='font-size: 12px'>" . substr($row['slot_updated_at'], 0, 10) . "</td>";
//                                echo "<td><button class='editButton buttonLink' data-toggle='modal' data-target='#editSlot' value='" . $row['slot_entry_id'] . "' id='" . $row['slot_entry_id'] . "'>Edit</button></td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Venue Name</th>
                            <th>Slot Date</th>
                            <th>Slot Start Time</th>
                            <th>Slot End Time</th>
                            <th>Reserved By</th>
                            <th>Action</th>
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

<!-- Add Slot Modal -->
<div class="modal fade" id="addSlot" role="form">
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Slot</h4>
            </div>
            <!-- Modal Header-->

            <!-- Modal Body-->
            <div class="modal-body">
                <form class="form-horizontal" id="slotForm">
                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slot_venue">Slot Venue</label>
                            <div class="col-md-9">
                                <select id="slot_venue" name="slot_venue" class="form-control" style="width: 100%;">
                                    <?php
                                    $path = "http://localhost/agiledevelopment/includes/server/index.php?action=showAllVenue";
                                    $result = file_get_contents($path);
                                    $result = json_decode($result, true);
                                    foreach($result['results'] as $row){
                                        echo "<option value='" . $row['venue_id'] . "'>Name: " . $row['venue_name'] . " - Capacity: " . $row['venue_capacity'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slot_date">Slot Date</label>
                            <div class="col-md-9">
                                <input id="slot_date" name="slot_date" type="date" placeholder=""
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slot_start_time">Slot Start Time</label>
                            <div class="col-md-9">
                                <input id="slot_start_time" name="slot_start_time" type="time" placeholder=""
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slot_end_time">Slot End Time</label>
                            <div class="col-md-9">
                                <input id="slot_end_time" name="slot_end_time" type="time" placeholder=""
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

<!-- Edit Slot Modal -->
<div class="modal fade" id="editReservation" role="form">
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Slot</h4>
            </div>
            <!-- Modal Header-->

            <!-- Modal Body-->
            <div class="modal-body">
                <form class="form-horizontal" id="slotForm">
                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_booking_id">Booking ID</label>
                            <div class="col-md-9">
                                <input id="edit_booking_id" name="edit_booking_id" type="text" placeholder="#######"
                                       disabled="true" class="form-control input-md" required="true">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slotID">Slot ID</label>
                            <div class="col-md-9">
                                <input id="edit_slot_id" name="edit_slot_id" type="text" placeholder="#######"
                                       disabled="true" class="form-control input-md" required="true">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_slot_venue">Slot Venue</label>
                            <div class="col-md-9">
                                <select id="edit_slot_venue" name="edit_slot_venue" class="form-control" style="width: 100%;">
                                    <?php
//                                    $path = "http://localhost/agiledevelopment/includes/server/index.php?action=showAllVenue";
//                                    $result = file_get_contents($path);
//                                    $result = json_decode($result, true);
//                                    foreach($result['results'] as $row){
//                                        echo "<option value='" . $row['venue_id'] . "'>Name: " . $row['venue_name'] . " - Capacity: " . $row['venue_capacity'] . "</option>";
//                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_slot_date">Slot Date</label>
                            <div class="col-md-9">
                                <input id="edit_slot_date" name="edit_slot_date" type="date" placeholder=""
                                       disabled="true" class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_slot_start_time">Slot Start Time</label>
                            <div class="col-md-9">
                                <input id="edit_slot_start_time" name="edit_slot_start_time" type="time" placeholder=""
                                       disabled="true" class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_slot_end_time">Slot End Time</label>
                            <div class="col-md-9">
                                <input id="edit_slot_end_time" name="edit_slot_end_time" type="time" placeholder=""
                                       disabled="true" class="form-control input-md" required="true">
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

    var optionString = "";

    //    Ensure client side script loads after pages is fully loaded
    $(document).ready(function () {
        $('.editButton').click(function () {
            console.log($(this));
            $.ajax({
                url: "<?php echo base_url(); ?>/includes/server/index.php",

                data: {
                    'action': 'showOneBookingByID',
                    'booking_id': $(this).val()
                },

                error: function(xhr, status, error){
                    alert(xhr.responseText);
                },

                success: function(data){
                    $('#edit_booking_id').val(data['results'][0]['booking_id']);
                    $('#edit_slot_id').val(data['results'][0]['slot_id']);
                    $('#edit_slot_date').val(data['results'][0]['slot_date']);
                    $('#edit_slot_start_time').val(data['results'][0]['slot_start_time']);
                    $('#edit_slot_end_time').val(data['results'][0]['slot_end_time']);
                    optionString = "<option value='" + data['results'][0]['slot_id'] + "'>Name: " + data['results'][0]['venue_name'] + " - Capacity: " + data['results'][0]['venue_capacity'] + "</option>";
                    $.ajax({
                        url: "<?php echo base_url(); ?>/includes/server/index.php",

                        data: {
                            'action': 'showAllUnreservedSimilarSlots',
                            'slot_date': data['results'][0]['slot_date'],
                            'slot_start_time': data['results'][0]['slot_start_time'],
                            'slot_end_time': data['results'][0]['slot_end_time']
                        },

                        error: function(xhr, status, error){
                            alert(xhr.responseText);
                        },

                        success: function(data){
                            data['results'].forEach(amendOptionString);
                            console.log(optionString);
                            $('#edit_slot_venue').html(optionString);
                        },

                        type: 'POST'
                    })
                    console.log(data);
                    $('#edit_slot_venue').val(data['results'][0]['slot_id']).trigger('change.select2');
                },

                type: 'POST'
            })
        });

        function amendOptionString(item, index){
            console.log(item);
            optionString = optionString + "<option value='" + item['slot_id'] + "'>Name: " + item['venue_name'] + " - Capacity: " + item['venue_capacity'] + "</option>"
        }

        $('#edit_submit').click(function (e) {
            e.preventDefault();
            $.ajax({

                url: '<?php echo base_url() ?>/includes/server/index.php',

                data: {
                    'action': "updateBookingVenue",
                    'booking_id': $('#edit_booking_id').val(),
                    'booking_slot_id': $('#edit_slot_venue').val()
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

        $('.cancelReservation').click(function(e){
            e.preventDefault();
            var r = confirm("Are you sure you want to cancel this slot?");
            if(r == true){
                $.ajax({
                    url: '<?php echo base_url(); ?>/includes/server/index.php',

                    data: {
                        'action': "cancelBooking",
                        'booking_id': $(this).val()
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
            }
        });
        $('#add_submit').click(function (e) {
            e.preventDefault();
            $.ajax({

                url: 'http://localhost/agiledevelopment/includes/server/index.php',

                data: {
                    'action': "addSlot",
                    'venue_id': $('#slot_venue').val(),
                    'slot_date': $('#slot_date').val(),
                    'slot_start_time': $('#slot_start_time').val(),
                    'slot_end_time': $('#slot_end_time').val()
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


        $("#slot_venue").select2({
            templateResult: formatState
        });

        $("#slot_diameter").select2({
            templateResult: formatState
        });

        $("#slot_core").select2({
            templateResult: formatState
        });

        $("#slot_colour").select2({
            templateResult: formatState
        });

        $('#edit_slot_type').select2({
            templateResult: formatState
        });

        $('#edit_slot_diameter').select2({
            templateResult: formatState
        });

        $('#edit_slot_core').select2({
            templateResult: formatState
        });

        $('#edit_slot_colour').select2({
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
        $('#slot').DataTable({
            scrollX: true,
            // order: [[10, "asc"]],
            // columnDefs: [
            //     {
            //         "targets": [0],
            //         "visible": false
            //     }
            // ],
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
