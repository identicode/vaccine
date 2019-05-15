@extends('layouts.app')

{{-- HTML Title --}}
@section('html-title')

@endsection


{{-- VENDOR CSS --}}
@section('css-top')
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
                                                <h3 align="center">SUMMARY OF RABIES VACCINATION IN MUNICIPALITY OF BALER</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <div class="m-h-50"></div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30 table-bordered">
                                                        <thead>
                                                            <tr>
                                                            	<th>Barangay</th>
                                                            	<th>Total Population of Dogs</th>
                                                            	<th>Total of Vaccinated Dogs</th>
                                                            	<th>Total of Non-Vaccinated Dogs</th>
                                                        	</tr>
                                                    	</thead>
                                                        <tbody>
                                                            @foreach($brgys as $brgy)
                                                            @php($dogs = $brgy->dog)
                                                            	<tr>
                                                            		<td>{{ $brgy->name }}</td>
                                                            		<td>{{ $brgy->dog->count() }}</td>
                                                            		<td>{{ $dogs->where('status', '1')->count() }}</td>
                                                            		<td>{{ $dogs->where('status', '2')->count() }}</td>
                                                            	</tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        	<tr>
                                                        		<th>Total</th>
                                                        		<th>{{ $count['dog'] }}</th>
                                                        		<th>{{ $count['vac'] }}</th>
                                                        		<th>{{ $count['non'] }}</th>
                                                        	</tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
@endsection


{{-- VENDOR JS --}}
@section('js-top')
@endsection

{{-- Js Script --}}
@section('js-bot')

@endsection