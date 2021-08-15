<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<div>
	 <div class="col-md-12">
			<h2 style="text-align: center; margin: 30px;">{{ $user->name }}</h2>
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
<form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">{{ method_field('PUT') }}{{ csrf_field() }}
<table class="table table-hover1 table-bordered">
	<thead>
		<tr>
			<th class="col-sm-4">Edit</th>
			<th>Info</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>First name: *</td>
			<td><input type="text" class="form-control" name="first_name" value="{{ old('first_name') ? old('first_name') : $user->first_name }}" required></td>
		</tr>
		<tr>
			<td>Last name: *</td>
			<td><input type="text" class="form-control" name="last_name" value="{{ old('last_name') ? old('last_name') : $user->last_name }}" required></td>
		</tr>
		<tr>
			<td>Email: *</td>
			<td><input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}" required></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" class="form-control" name="password"></td>
		</tr>
		<tr>
			<td>Confirm password: </td>
			<td><input type="password" class="form-control" name="password_confirmation"></td>
		</tr>
		<tr>
			<td>Role: *</td>
			<td>
				<select class="form-control select2" multiple="multiple" required="" name="roles[]">
					@if (old('roles'))
						@foreach (old('roles') as $role)
						<option selected="" value="{{ $role }}">{{ $role }}</option>
						@endforeach
					@else
						@foreach ($roles as $role)
						<option {{ true == $role1->has($role) ? 'selected' : ''}} value="{{ $role }}">{{ $role }}</option>
						@endforeach
					@endif
				</select>
			</td>
		</tr>
		<tr>
			<td>Image: *</td>
			<td><input type="file" class="form-control" name="avatar" id="avatar"></td>
		</tr>
	</tbody>
</table>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>