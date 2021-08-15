<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<div>
	<div class="col-md-12">
		<h2 style="text-align: center; margin: 30px;">{{ $suppliers->name }}</h2>
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
					<td>Name: </td>
					<td>{{ ucwords($suppliers->name) }}</td>
				</tr>
				<tr>
					<td>Phone: </td>
					<td>{{ ucwords($suppliers->phone) }}</td>
				</tr>
				<tr>
					<td>Email: </td>
					<td>{{ ucwords($suppliers->email) }}</td>
				</tr>
				<tr>
					<td>Address: </td>
					<td>{{ ucwords($suppliers->address) }}</td>
				</tr>
				<tr>
					<td>Contact Person Name: </td>
					<td>{{ ucwords($suppliers->contact_person_name) }}</td>
				</tr>
				<tr>
					<td>Contact Person Phone: </td>
					<td>{{ ucwords($suppliers->contact_person_phone) }}</td>
				</tr>
				<tr>
					<td>Contact Person Email: </td>
					<td>{{ ucwords($suppliers->contact_person_email) }}</td>
				</tr>
				<tr>
					<td>Description: </td>
					<td>{{ ucwords($suppliers->description) }}</td>
				</tr>
				<tr>
					<td>Created at: </td>
					<td>{{ date_format($suppliers->created_at, "d M Y H:i:s") }}</td>
				</tr>
				<tr>
					<td>Last updated at: </td>
					<td>{{ date_format($suppliers->updated_at, "d M Y H:i:s") }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>