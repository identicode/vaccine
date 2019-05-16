@extends('layouts.app')

{{-- HTML Title --}}
@section('html-title')

@endsection


{{-- VENDOR CSS --}}
@section('css-top')
<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- CUSTOM CSS --}}
@section('css-bot')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/croppie/croppie.css') }}">
@endsection

{{-- Page Title --}}
@section('page-title')
Edit Dog Profile
@endsection

{{-- Bread Crumb --}}
@section('breadcrumb')
<li>
	Site
</li>
<li>
	Edit
</li>
@endsection


{{-- Main Content --}}
@section('main-content')


<div class="row">
	<div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Edit Dog Profile</b></h4>
            <p class="text-muted font-13 m-b-30"></p>
            <div class="row">
            	<div class="col-sm-6">
            		<form method="POST" action="/site/edit">
                        <input type="hidden" name="did" value="{{ $dog->id }}">
            			@csrf
					    <div class="form-row">
					        <div class="form-group col-md-12">
					            <label for="book-name"><strong>Owner:</strong></label>
					            <select class="form-control select2" name="owner" required>
				                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" @if($dog->owner_id == $owner->id) selected @endif>{{ $owner->name }} - Brgy. {{ $owner->brgy->name }}</option>
                                    @endforeach
			                	</select>
					        </div>
						</div>

            			<div class="form-row">
					        <div class="form-group col-md-6">
					            <label for="book-name"><strong>Dog Name:</strong></label>
					            <input type="text" class="form-control" id="book-name" placeholder="Dog's Name" name="name" value="{{ $dog->name }}" required>
					        </div>
					        <div class="form-group col-md-6">
					            <label for="book-author"><strong>Breed:</strong></label>
					            <input type="text" class="form-control" id="book-author" placeholder="Breed" name="breed" value="{{ $dog->breed }}" required>
					        </div>
						</div>

						<div class="form-row">
					        <div class="form-group col-md-6">
					            <label for="book-name"><strong>Birthday:</strong></label>
					            <input type="date" class="form-control" id="book-name" placeholder="Age" name="age" value="{{ $dog->age }}" required>
					        </div>
					        <div class="form-group col-md-6">
					            <label for="book-author"><strong>Gender:</strong></label>
					            <select class="form-control" name="gender">
					            	<option value="1" @if($dog->gender == 1) selected @endif>Male</option>
					            	<option value="2" @if($dog->gender == 2) selected @endif>Female</option>
					            </select>
					        </div>
						</div>

						<div class="form-row">
					        <div class="form-group col-md-6">
					            <label for="book-name"><strong>Vaccine Status</strong></label>
					            <select class="form-control" name="status" required>
				                    <option value="1" @if($dog->status == 1) selected @endif>Vaccinated</option>
				                    <option value="2" @if($dog->status == 2) selected @endif>Not Vaccinated</option>
			                	</select>
					        </div>

					        <div class="form-group col-md-6">
                                <label for="book-name"><strong>Color</strong></label>
                                <input type="text" class="form-control" id="book-name" placeholder="Color" name="color" value="{{ $dog->color }}" required>
                            </div>

						</div>

						<div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="book-name"><strong>Image</strong></label>
                                <input type="hidden" id="crop-image" value="" name="image">
                                <input type="file" name="upload_image" id="upload_image" accept="image/*" data-buttonbefore="true" class="filestyle">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="book-name"><strong>Vaccinated By:</strong></label>
                                <input type="text" class="form-control" id="book-name" value="{{$dog->vaccinated_by}}" placeholder="Vaccinator Name" name="vaccby">
                            </div>
                        </div>

						<div class="form-row">
					        <div class="form-group col-md-12">
					            <button type="submit" class="btn btn-purple waves-effect waves-light">Save Changes</button>
					        </div>
						</div>

            		</form>
            	</div>
            	<div class="col-sm-6">
            		<img id="dog-image-edit" src="{{ asset('img/dogs') }}/{{ $dog->img }}" class="img-thumbnail">
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
@endsection


{{-- VENDOR JS --}}
@section('js-top')
<script src="{{ asset('vendor/select2/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/croppie/croppie.min.js') }}"></script>
<script src="{{ asset('vendor/croppie/exif.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
@endsection

{{-- Js Script --}}
@section('js-bot')
<script type="text/javascript">
$(document).ready(function () {
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
            $('#crop-image').val(response);
            $("#dog-image-edit").attr("src", response);
            $('#uploadimageModal').modal('toggle');
        })
    });


});

</script>
@endsection