@extends('layouts.app')

{{-- HTML Title --}}
@section('html-title')

@endsection


{{-- VENDOR CSS --}}
@section('css-top')
<link href="{{asset('vendor/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('vendor/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- CUSTOM CSS --}}
@section('css-bot')

@endsection

{{-- Page Title --}}
@section('page-title')
Owner
@endsection

{{-- Bread Crumb --}}
@section('breadcrumb')

@endsection


{{-- Main Content --}}
@section('main-content')
<div class="row">
	<div class="col-sm-7">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Owner List</b></h4>
            <p class="text-muted font-13 m-b-30">
                
            </p>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th># of Dogs</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@php($x = 1)
                	@foreach($owners as $owner)
                	<tr>
                		<td>{{ $x++ }}</td>
                		<td>{{ $owner->name }}</td>
                		<td>{{ $owner->brgy->name }} - {{ $owner->purok->name }}</td>
                		<td>{{ $owner->cp }}</td>
                		<td>{{ $owner->dog->count() }}</td>
                		<td>
                			<button onclick="editOwner('{{ $owner->id }}','{{ $owner->name }}', '{{ $owner->cp }}', '{{ $owner->bday }}')" class="btn btn-icon btn-xs waves-effect btn-warning m-b-5"> <i class="fa fa-pencil"></i> Edit</button>
                            <button onclick="deleteOwner('{{ $owner->id }}')" class="btn btn-icon btn-xs waves-effect btn-danger m-b-5"> <i class="fa fa-trash-o"></i> Delete</button>
                		</td>
                	</tr>
                	@endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Add Owner</b></h4>
            <p class="text-muted font-13 m-b-30"></p>
            <form method="POST" action="/owner">
            	@csrf
            <div class="form-row">
		        <div class="form-group col-md-12">
		            <label for="book-name"><strong>Name:</strong></label>
		            <input type="text" class="form-control" id="book-name" placeholder="Name" name="name" value="" required>
		        </div>
			</div>

			<div class="form-row">
		        <div class="form-group col-md-12">
		            <label for="book-name"><strong>Contact Number:</strong></label>
		            <input type="text" class="form-control" id="book-name" placeholder="Contact Number" name="cp" value="" required>
		        </div>
			</div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="book-name"><strong>Birthday:</strong></label>
                    <input type="date" class="form-control" id="book-name" placeholder="Contact Number" name="bday" value="" required>
                </div>
            </div>

			<div class="form-row">
		        <div class="form-group col-md-12">
		            <label for="book-name"><strong>Address:</strong></label>
		            <select class="form-control select2" name="address" required>
	                    @foreach($puroks as $purok)
	                    <option value="{{ $purok->id }}___{{ $purok->brgy->id }}">Brgy. {{ $purok->brgy->name }} - {{ $purok->name }}</option>
	                    @endforeach
                	</select>
		        </div>
			</div>

			<div class="form-row">
		        <div class="form-group col-md-12">
		            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
		        </div>
			</div>
		</form>
           
        </div>
    </div>
</div>

<form method="POST" action="/owner/update">
<div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Owner Details</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-name" class="control-label">Name</label>
                            @csrf
                            <input name="edit_id" type="hidden" id="edit-id" value="">
                            <input name="edit_name" type="text" value="" class="form-control" id="edit-name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-cp" class="control-label">Contact Number</label>
                            <input name="edit_cp" type="text" value="" class="form-control" id="edit-cp" placeholder="Contact Number">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-bday" class="control-label">Birthday</label>
                            <input name="edit_bday" type="date" value="" class="form-control" id="edit-bday" placeholder="Birthday">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Address</label>
                            <select class="form-control select3" name="edit_address" required>
                                <option value="">Select Address</option>
                                @foreach($puroks as $purok)
                                <option value="{{ $purok->id }}___{{ $purok->brgy->id }}">{{ $purok->brgy->name }} - {{ $purok->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
</form>
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
	$(".select3").select2();
});

function deleteOwner(id)
{
    swal({
        title: "Delete this owner profile?",
        text: "You will not be able to recover this information!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-warning',
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        window.location = '/owner/delete/'+id;
    });
}

function editOwner(id, name, cp, bday)
{
    $('#edit-id').val(id);
    $('#edit-name').val(name);
    $('#edit-cp').val(cp);
    $('#edit-bday').val(bday);
    $('#modal-edit').modal('toggle');
}
    
</script>
@endsection