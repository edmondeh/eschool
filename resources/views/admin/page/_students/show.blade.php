<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<div>
	<div class="col-md-12 m-t-20">
		<img class="profile-user-img img-responsive img-circle" src="{{ $student->getFirstMediaUrl('avatars') ? $student->getFirstMediaUrl('avatars') : asset('storage/avatar/images.png') }}" alt="{{ $student->first_name }} {{ $student->last_name }}">
	</div>
	<div class="col-md-12">
		<h2 style="text-align: center; margin: 30px; font-weight: 300;">{{ $student->first_name }} {{ $student->last_name }}</h2>
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
					<td class="tbl_row">{{ $student->first_name }} {{ $student->last_name }}</td>
				</tr>
				<tr>
					<td>Parent Name: </td>
					<td class="tbl_row">{{ $student->parent_name }}</td>
				</tr>
				<tr>
					<td>Departament: </td>
					<td class="tbl_row">{{ $student->sections->classes->departaments->name }}</td>
				</tr>
				<tr>
					<td>Classes: </td>
					<td class="tbl_row">{{ $student->sections->classes->name }}</td>
				</tr>
				<tr>
					<td>Sections: </td>
					<td class="tbl_row">{{ $student->sections->name }}</td>
				</tr>
				<tr>
					<td>Phone: </td>
					<td class="tbl_row">{{ $student->phone }}</td>
				</tr>
				<tr>
					<td>Address: </td>
					<td class="tbl_row">{{ $student->address }}</td>
				</tr>
				<tr>
					<td>Gender: </td>
					<td class="tbl_row">{{ ucwords($student->gender) }}</td>
				</tr>
				<tr>
					<td>Birthday: </td>
					<td class="tbl_row">{{ date_format(date_create($student->birthday), "d M Y") }}</td>
				</tr>
				<tr>
					<td>Email: </td>
					<td class="tbl_row">{{ $student->email }}</td>
				</tr>
				<tr>
					<td>Bio: </td>
					<td class="tbl_row">{{ $student->bio }}</td>
				</tr>
				<tr>
					<td>Created at: </td>
					<td class="tbl_row">{{ date_format($student->created_at, "d M Y H:i:s") }}</td>
				</tr>
				<tr>
					<td>Last updated at: </td>
					<td class="tbl_row">{{ date_format($student->updated_at, "d M Y H:i:s") }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>