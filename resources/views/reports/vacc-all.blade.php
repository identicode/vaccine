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

@endsection

{{-- Page Title --}}
@section('page-title')
Reports
@endsection

{{-- Bread Crumb --}}
@section('breadcrumb')
<li>
Reports
</li>
@endsection


{{-- Main Content --}}
@section('main-content')
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-center">
                                                <h3 align="center">LIST OF VACCINATED DOGS</h3>
                                                <h4 align="center">ALL BARANGAY</h5>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <div class="m-h-50"></div>

                                        <div class="row hidden-print">
                                            <div class="col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="book-name"><strong>Select Barangay:</strong></label>
                                                        <select class="form-control brgy-select" name="owner" required onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                                <option value="/reports/nvacc/0">See All</option>
                                                                @foreach($brgys as $brgy)
                                                                    <option value="/reports/vacc/{{ $brgy->id }}">Brgy. {{ $brgy->name }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="pull-right">
                                                    <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30 table-bordered">
                                                        <thead>
                                                            <tr>
                                                            	<th>Barangay</th>
                                                                <th>Name of Owner</th>
                                                                <th>Number of Dog</th>
                                                        	</tr>
                                                    	</thead>
                                                        <tbody>
                                                            @foreach($owners as $owner)
                                                                @if($owner->dog->count() != 0)
                                                                <tr>
                                                                    <td>Brgy. {{ $owner->brgy->name }}</td>
                                                                    <td>{{ $owner->name }}</td>
                                                                    <td>{{ $owner->dog->count() }}</td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>

                        </div>
@endsection


{{-- VENDOR JS --}}
@section('js-top')
<script src="{{ asset('vendor/select2/js/select2.min.js') }}" type="text/javascript"></script>
@endsection

{{-- Js Script --}}
@section('js-bot')
<script type="text/javascript">
    $(document).ready(function () {
        $(".brgy-select").select2();
    });
</script>
@endsection