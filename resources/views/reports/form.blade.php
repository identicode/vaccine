<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

h1{
	font-family: arial, sans-serif;
}

p{
	font-family: arial, sans-serif;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

</style>
</head>
<body>
<h1 align="center">RABBIES VACCINATION FORM</h1>

<div class="row">

	<div class="col-sm-8">
		<strong>
		<p>Date of Vaccination: <u>{{ date('m/d/Y', time()) }}</u></p>
		<p>Barangay: <u>{{ $brgy->name }}</u></p>
		<p>City/Municipality: <u>Baler</u></p>
		<p>Province: <u>Aurora</u></p>
		</strong>
	</div>

	<div class="col-sm-4">
		<strong>
			<p>Name of Vaccinator: ______________________________</p>
			<p>Contact Number: _________________________________</p>
			<p>Vaccine Brand and Lot No. : ________________________</p>
		</strong>
	</div>

</div>

<table>
	<thead>
		<tr>
			<th rowspan="2">No.</th>
			<th rowspan="2">Name of Owner</th>
			<th colspan="3">Dog's Owner Data</th>
			<th colspan="5">Animal Data</th>
			<th rowspan="2">Signature</th>
		</tr>

		<tr>
			<th>House #</th>
			<th>Date of Birth</th>
			<th>Contact #</th>
			<th>Name of Dog</th>
			<th>Breed</th>
			<th>Age</th>
			<th>Sex</th>
			<th>Color</th>
		</tr>

	</thead>

	<tbody>
		@php($x =1)
		@foreach($dogs as $dog)
		<tr>
			<td>{{ $x++ }}</td>
			<td>{{ $dog->owner->name }}</td>
			<td></td>
			<td>{{ $dog->owner->bday }}</td>
			<td>{{ $dog->owner->cp }}</td>
			<td>{{ $dog->name }}</td>
			<td>{{ $dog->breed }}</td>
			<td>{{ $dog->age }}</td>
			<td>@if($dog->gen == 1) M @else F @endif</td>
			<td>{{ $dog->color }}</td>
			<td></td>
		</tr>
		@endforeach
	</tbody>
</table>
<script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>