<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<div>
	 <div class="col-md-12">
			<h2 style="text-align: center; margin: 30px;">{{ ucwords($suppliers->name) }}</h2>
	 </div>
	 <br>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('admin.inventory.suppliers.update', $suppliers->id) }}" enctype="multipart/form-data">{{ method_field('PUT') }}{{ csrf_field() }}
<table class="table table-hover1 table-bordered">
	<thead>
		<tr>
			<th class="col-sm-4">Edit</th>
			<th>Info</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Name: *</td>
			<td><input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $suppliers->name }}" required></td>
		</tr>
		<tr>
			<td>Phone: *</td>
			<td><input type="text" class="form-control" name="phone" value="{{ old('phone') ? old('phone') : $suppliers->phone }}" required></td>
		</tr>
		<tr>
			<td>Email: *</td>
			<td><input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $suppliers->email }}" required></td>
		</tr>
		<tr>
			<td>Address: *</td>
			<td><input type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : $suppliers->address }}" required></td>
		</tr>
		<tr>
			<td>Contact Person Name: *</td>
			<td><input type="text" class="form-control" name="contact_person_name" value="{{ old('contact_person_name') ? old('contact_person_name') : $suppliers->contact_person_name }}" required></td>
		</tr>
		<tr>
			<td>Contact Person Phone: *</td>
			<td><input type="text" class="form-control" name="contact_person_phone" value="{{ old('contact_person_phone') ? old('contact_person_phone') : $suppliers->contact_person_phone }}" required></td>
		</tr>
		<tr>
			<td>Contact Person Email: *</td>
			<td><input type="text" class="form-control" name="contact_person_email" value="{{ old('contact_person_email') ? old('contact_person_email') : $suppliers->contact_person_email }}" required></td>
		</tr>
		<tr>
			<td>Description: *</td>
			<td><input type="text" class="form-control" name="description" value="{{ old('description') ? old('description') : $suppliers->description }}" required></td>
		</tr>
	</tbody>
</table>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>