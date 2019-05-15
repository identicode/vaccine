@extends('layouts.app')

{{-- HTML Title --}}
@section('html-title')

@endsection


{{-- VENDOR CSS --}}
@section('css-top')
<!-- DataTables -->
<link href="{{asset('vendor/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('vendor/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- CUSTOM CSS --}}
@section('css-bot')

@endsection

{{-- Page Title --}}
@section('page-title')
Purok
@endsection

{{-- Bread Crumb --}}
@section('breadcrumb')
<li>
	Settings
</li>
<li>
	Purok
</li>
@endsection


{{-- Main Content --}}
@section('main-content')
<div class="row">
    <div class="col-sm-7">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Purok List</b></h4>
            <p class="text-muted font-13 m-b-30">
                
            </p>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="50%">Name</th>
                    <th width="50%">Brgy. Name</th>
                    <th align="center">Action</th>
                </tr>
                </thead>


                <tbody>
                	@foreach($puroks as $purok)
                        <tr>
                            <td>{{ $purok->name }}</td>
                            <td>{{ $purok->brgy->name }}</td>
                            <td>
                                <button onclick="editPurok('{{ $purok->id }}', '{{ $purok->name }}')" class="btn btn-icon btn-xs waves-effect btn-warning m-b-5"> <i class="fa fa-pencil"></i> Edit</button>
                                <button onclick="deletePurok('{{ $purok->id }}')" class="btn btn-icon btn-xs waves-effect btn-danger m-b-5"> <i class="fa fa-trash-o"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Add Purok</b></h4>
            <hr>
            <form method="POST" action="/settings/purok">
            	@csrf
            <div class="form-group">
                <label for="brgy-name">Select Baranggay</label>
                <select class="form-control select2" name="brgy" required>
                    @foreach($brgys as $brgy)
                    <option value="{{ $brgy->id }}">{{ $brgy->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brgy-name">Purok Name</label>
                <input type="text" name="name" class="form-control" id="brgy-name" placeholder="Purok Name">
            </div>
            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
        	</form>
        </div>
    </div>
</div>

<div id="edit-purok-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Edit Purok</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="/settings/purok">
                    @method('PUT')
                    @csrf
                <div class="form-group">
                    <label for="brgy-name">Purok Name</label>
                    <input type="hidden" name="pid" class="form-control" id="edit-purok-id">
                    <input type="text" name="name" class="form-control" id="edit-purok-name" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


{{-- VENDOR JS --}}
@section('js-top')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{ asset('vendor/select2/js/select2.min.js') }}" type="text/javascript"></script>

@endsection

{{-- Js Script --}}
@section('js-bot')
<script type="text/javascript">
$(document).ready(function () {
	$('#datatable').dataTable();
    $(".select2").select2();
});

function editPurok(id, name)
{
    $('#edit-purok-id').val(id);
    $('#edit-purok-name').val(name);
    $('#edit-purok-modal').modal('show');
}

function deletePurok(id)
{
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this information!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-warning',
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        window.location = '/settings/purok/delete/'+id;
    });
}
</script>
@endsection