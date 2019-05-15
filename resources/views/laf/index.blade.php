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
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/croppie/croppie.css') }}">
@endsection

{{-- Page Title --}}
@section('page-title')
Lost and Found
@endsection

{{-- Bread Crumb --}}
@section('breadcrumb')

@endsection


{{-- Main Content --}}
@section('main-content')
<div class="row">
	<div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Lost and Found</b></h4>
            <p class="text-muted font-13 m-b-30">
                
            </p>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Owner's Name</th>
                    <th>Contact Number</th>
                    <th>Dogs's Name</th>
                    <th>Breed</th>
                    <th>Date Lost</th>
                    <th>Date Reported</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($lafs as $laf)
                        <tr>
                            <td></td>
                            <td>{{ $laf->owner }}</td>
                            <td>{{ $laf->cp }}</td>
                            <td><a href="javascript:void(0)" onclick="showImage('{{ $laf->image }}')" title="View Image">{{ $laf->dog }}</a></td>
                            <td>{{ $laf->breed }}</td>
                            <td>{{ $laf->lost }}</td>
                            <td>{{ $laf->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Add Lost Dog</b></h4>
            <p class="text-muted font-13 m-b-30"></p>
            <div class="row">
            	<div class="col-sm-6">
            		<form method="POST" action="/lost-and-found">
            			@csrf
					    <div class="form-row">
					        <div class="form-group col-md-6">
					            <label for="book-name"><strong>Owner's Name:</strong></label>
					            <input type="text" class="form-control" id="book-name" placeholder="Owner's Name" name="owner" value="{{ old('owner') }}" required>
					        </div>
					        <div class="form-group col-md-6">
					            <label for="book-author"><strong>Contact Number:</strong></label>
					            <input type="text" class="form-control" id="book-author" placeholder="Contact Number" name="cp" value="{{ old('cp') }}" required>
					        </div>
						</div>

            			<div class="form-row">
					        <div class="form-group col-md-6">
					            <label for="book-name"><strong>Dog Name:</strong></label>
					            <input type="text" class="form-control" id="book-name" placeholder="Dog's Name" name="dog" value="{{ old('dog') }}" required>
					        </div>
					        <div class="form-group col-md-6">
					            <label for="book-author"><strong>Breed:</strong></label>
					            <input type="text" class="form-control" id="book-author" placeholder="Breed" name="breed" value="{{ old('breed') }}" required>
					        </div>
						</div>

						<div class="form-row">
					        <div class="form-group col-md-12">
					            <label for="book-name"><strong>Date Lost</strong></label>
					            <input type="date" name="lost" class="form-control" value="{{ old('lost') }}">
					        </div>
						</div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="book-name"><strong>Image</strong></label>
                                <input required type="hidden" id="crop-image" value="" name="image">
                                <input required type="file" name="upload_image" id="upload_image" accept="image/*" data-buttonbefore="true" class="filestyle">
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
    </div>
</div>

<!-- Modal Image Cropper -->
<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload & Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-12 text-center">
        <div id="image_demo"></div>
       </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success crop_image">Crop</button>
        </div>
     </div>
    </div>
</div><!-- /.modal -->

  <!-- BOOK IMAGE Modal-->
  <div class="modal fade" id="modal-dog-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="text-center">
              <img id="dog-img" src="{{ asset('img/bg-pattern.png') }}" width="300px" height="300px" class="rounded" alt="...">
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection


{{-- VENDOR JS --}}
@section('js-top')
<script src="{{ asset('vendor/croppie/croppie.min.js') }}"></script>
<script src="{{ asset('vendor/croppie/exif.js') }}"></script>


<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{ asset('vendor/select2/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
@endsection

{{-- Js Script --}}
@section('js-bot')
<script type="text/javascript">
$(document).ready(function () {
	$('#datatable').dataTable();
	$(".select2").select2();

    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width:150,
            height:150,
            type:'square' //circle
        },
        boundary:{
            width:300,
            height:300
        }
    });

    $('#upload_image').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function(){
          console.log('jQuery bind complete');
        });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function(event){
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport',
            format: 'jpeg'
        }).then(function(response){
            console.log(response);
            $('#crop-image').val(response);
            $('#uploadimageModal').modal('toggle');
        })
    });
});

function showImage(src){
  $("#dog-img").attr("src", '{{ asset('img/losts') }}/'+src);
  $("#modal-dog-image").modal('show');
}

function deleteDog(id)
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
        window.location = '/site/delete/'+id;
    });
}
</script>
@endsection