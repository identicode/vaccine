@extends('layouts.app')

{{-- HTML Title --}}
@section('html-title')

@endsection


{{-- VENDOR CSS --}}
@section('css-top')
<!-- DataTables -->
<link href="{{asset('vendor/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('vendor/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

{{-- CUSTOM CSS --}}
@section('css-bot')

@endsection

{{-- Page Title --}}
@section('page-title')
Profile
@endsection

{{-- Bread Crumb --}}
@section('breadcrumb')
<li>
	Settings
</li>
<li>
	Profile
</li>
@endsection


{{-- Main Content --}}
@section('main-content')
<div class="row">
    <div class="col-sm-4">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Information</b></h4>
            <hr>

            <form method="POST" action="/settings/account/profile">
                @csrf
                @php($profileName = explode('___', Auth::user()->name))
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="book-name"><strong>Last Name:</strong></label>
                        <input type="text" class="form-control" id="book-name" placeholder="Last Name" name="lname" value="{{ $profileName[1] }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="book-name"><strong>First Name:</strong></label>
                        <input type="text" class="form-control" id="book-name" placeholder="First Name" name="fname" value="{{ $profileName[0] }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="book-name"><strong>Middle Name:</strong></label>
                        <input type="text" class="form-control" id="book-name" placeholder="Middle Name" name="mname" value="{{ $profileName[2] }}">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Save Changes</button>
                    </div>
                </div>

            </form>

          
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Username</b></h4>
            <hr>
            <form method="POST" action="/settings/account/username">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="book-name"><strong>Username:</strong></label>
                        <input type="text" class="form-control" id="book-name" placeholder="Username" name="username" value="{{ Auth::user()->username }}">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Password</b></h4>
            <hr>
            <form method="POST" action="/settings/account/password">
                @csrf
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="book-name"><strong>Old Password:</strong></label>
                        <input type="password" class="form-control" id="book-name" placeholder="Old Password" name="oldpass" value="" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="book-name"><strong>New Password:</strong></label>
                        <input type="password" class="form-control" id="book-name" placeholder="New Password" name="newpass" value="" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="book-name"><strong>Confirm Password:</strong></label>
                        <input type="password" class="form-control" id="book-name" placeholder="Confirm Password" name="conpass" required>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Save Changes</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


</div>


@endsection


{{-- VENDOR JS --}}
@section('js-top')

@endsection

{{-- Js Script --}}
@section('js-bot')
<script type="text/javascript">



</script>
@endsection