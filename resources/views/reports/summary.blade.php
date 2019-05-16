@extends('layouts.app')

{{-- HTML Title --}}
@section('html-title')

@endsection


{{-- VENDOR CSS --}}
@section('css-top')
<!-- C3 charts css -->
<link href="{{ asset('vendor/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />
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
    <div class="col-md-10 col-xs-8 m-t-20">
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
    <div class="col-md-2 col-xs-4 m-t-20">
        <div class="demo-box">
            <h4 class="header-title m-t-0">Vaccine Graph</h4>
            
            <div id="pie-chart"></div>
        </div>
    </div>
</div>
@endsection


{{-- VENDOR JS --}}
@section('js-top')
<script type="text/javascript" src="{{ asset('vendor/d3/d3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/c3/c3.min.js') }}"></script>
@endsection

{{-- Js Script --}}
@section('js-bot')
<script type="text/javascript">
!function($) {
    "use strict";

    var ChartC3 = function() {};

    ChartC3.prototype.init = function () {
        
        
        //Pie Chart
        c3.generate({
             bindto: '#pie-chart',
            data: {
                columns: [
                    ['Vaccinated - {{ $count['vac'] }}', {{ $count['vac'] }}],
                    ['Non Vaccinated - {{ $count['non'] }}', {{ $count['non'] }}]
                ],
                type : 'pie'
            },
            color: {
                pattern: ["#4bd396", "#f5707a"]
            },
            pie: {
                label: {
                  show: false
                }
            }
        });

    },
    $.ChartC3 = new ChartC3, $.ChartC3.Constructor = ChartC3

}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.ChartC3.init()
}(window.jQuery);
</script>
@endsection