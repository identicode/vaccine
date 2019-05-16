@extends('layouts.app')

{{-- HTML Title --}}
@section('html-title')

@endsection


{{-- VENDOR CSS --}}
@section('css-top')
<link href="{{asset('vendor/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('vendor/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendor/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />
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
	<div class="col-sm-10">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Lost and Found</b></h4>
            <p class="text-muted font-13 m-b-30">
                
            </p>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Date Reported</th>
                    <th>Owner's Name</th>
                    <th>Contact Number</th>
                    <th>Dogs's Name</th>
                    <th>Breed</th>
                    <th>Date Lost</th>
                    <th>Date Found</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($lafs as $laf)
                        <tr>
                            <td>{{ $laf->date_report }}</td>
                            <td>{{ $laf->dog->owner->name }}</td>
                            <td>{{ $laf->dog->owner->cp }}</td>
                            <td><a href="#" onclick="showImage('{{ $laf->dog->img }}')">{{ $laf->dog->name }}</a></td>
                            <td>{{ $laf->dog->breed }}</td>
                            <td>{{ $laf->date_lost }}</td>
                            <td>{{ $laf->date_found }}</td>
                            <td>
                                @if($laf->date_found == '')
                                    <button onclick="lostF('{{ $laf->id }}')" class="btn btn-icon btn-xs waves-effect btn-primary m-b-5"><i class="mdi mdi-magnify"></i> Mark as Found</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-2 col-xs-4 m-t-20">
        <div class="demo-box">
            <h4 class="header-title m-t-0">Lost/Found Graph</h4>
            
            <div id="pie-chart"></div>
        </div>
    </div>


</div>


  <!-- DOG IMAGE Modal-->
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

<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap.js')}}"></script>

<script type="text/javascript" src="{{ asset('vendor/d3/d3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/c3/c3.min.js') }}"></script>
@endsection

{{-- Js Script --}}
@section('js-bot')
<script type="text/javascript">
$(document).ready(function () {
	$('#datatable').dataTable();
});

function showImage(src){
  $("#dog-img").attr("src", '{{ asset('img/dogs') }}/'+src);
  $("#modal-dog-image").modal('show');
}

function lostF(id)
{
    swal({
        title: "Are you sure?",
        text: "Mark this as found?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-warning',
        confirmButtonText: "Yes, mark it!",
        closeOnConfirm: false
    }, function () {
        window.location = '/lost-and-found/'+id;
    });
}


!function($) {
    "use strict";

    var ChartC3 = function() {};

    ChartC3.prototype.init = function () {
        
        
        //Pie Chart
        c3.generate({
             bindto: '#pie-chart',
            data: {
                columns: [
                    ['Found - {{ $count['found'] }}', {{ $count['found'] }}],
                    ['Lost - {{ $count['lost'] }}', {{ $count['lost'] }}]
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