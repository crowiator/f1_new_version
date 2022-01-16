@include('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<div class="container">
    <h1>Races</h1>
    <a href="javascript:void(0)" class="btn btn-secondary" id="createNewRace" style="float:right">Add Race</a>
    <table class="table table-bordered data-table table-responsive-sm">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Place</th>
            <th>Circle</th>
            <th>Date</th>
            <th>Time</th>
            <th>Winner</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="raceForm" name="raceForm" class="form-horizontal">
                        <input type="hidden" name="race_id" id="race_id">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                   value=""
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2" class="form-label">Place</label>
                            <input type="text" class="form-control" id="place" name="place" placeholder="Enter place"
                                   value="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput3" class="form-label">Circle</label>
                            <input type="text" class="form-control" id="circle" name="circle" placeholder="Enter circle"
                                   value="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput4" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Enter date"
                                   value=""
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput5" class="form-label">Time</label>
                            <input type="time" class="form-control" id="time" name="time" placeholder="Enter time"
                                   value=""
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput6" class="form-label">Winner</label>
                            <input type="text" class="form-control" id="winner" name="winner" placeholder="Enter Winner"
                                   value="" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('races.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'place', name: 'place'},
                {data: 'circle', name: 'circle'},
                {data: 'date', name: 'date'},
                {data: 'time', name: 'time'},
                {data: 'winner', name: 'winner'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        //create new race
        $("#createNewRace").click(function () {
            $("#race_id").val('');
            $("#raceForm").trigger("reset");
            $("#modalHeading").html("Add Race");
            $('#ajaxModel').modal('show');
        });

        $("#saveBtn").click(function (e) {
            e.preventDefault();
            $(this).html('Save');

            $.ajax({
                data: $("#raceForm").serialize(),
                url: "{{ route('races.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $("#raceForm").trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error', data);
                    $("#saveBtn").html('Save');
                }
            });
        });
        $('body').on('click', '.deleteRace', function () {
            var race_id = $(this).data("id");
            confirm("Are you want to delete this race");
            $.ajax({
                type: "DELETE",
                url: "{{ route('races.store') }}" + '/' + race_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error', data);
                }
            })
        });

        $('body').on('click', '.editRace', function () {
            var race_id = $(this).data('id');
            $.get("{{route('races.index')}}" + "/" + race_id + "/edit", function (data) {
                $("modalHeading").html("Edit Student");
                $('#ajaxModel').modal('show');
                $("#race_id").val(data.id);
                $("#name").val(data.name);
                $("#place").val(data.place);
                $("#circle").val(data.circle);
                $("#date").val(data.date);
                $("#time").val(data.time);
                $("#winner").val(data.winner);
            });
        });


    });
</script>





