<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<div>
	<div class="col-md-12">
		<h2 style="text-align: center; margin: 30px;">{{ $subjects->name }}</h2>
	</div>
	<br>
</div>
<div>
	<div class="col-md-121" style="padding: 15px;">
		<table class="table table-hover1 table-bordered">
			<thead>
				<tr>
					<th class="col-sm-4">Col</th>
					<th>Info</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Departament: </td>
					<td>{{ ucwords($subjects->classes->dep->name) }}</td>
				</tr>
				<tr>
					<td>Class: </td>
					<td>{{ ucwords($subjects->class->name) }}</td>
				</tr>
				<tr>
					<td>Section: </td>
					<td>{{ ucwords($subjects->sec->name) }}</td>
				</tr>
				<tr>
					<td>Name: </td>
					<td>{{ ucwords($subjects->name) }}</td>
				</tr>
				<tr>
					<td>Teacher: </td>
					<td>@if($subjects->teach) {{ ucwords($subjects->teach->first_name) }} {{ ucwords($subjects->teach->last_name) }} @else No teacher asigned @endif</td>
				</tr>
				<tr>
					<td>Info: </td>
					<td>{{ ucwords($subjects->info) }}</td>
				</tr>
				<tr>
					<td>Created at: </td>
					<td>{{ date_format($subjects->created_at, "d M Y H:i:s") }}</td>
				</tr>
				<tr>
					<td>Last updated at: </td>
					<td>{{ date_format($subjects->updated_at, "d M Y H:i:s") }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>