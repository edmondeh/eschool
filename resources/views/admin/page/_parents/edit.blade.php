<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<div>
	 <div class="col-md-12">
			<h2 style="text-align: center; margin: 30px;">{{ $parents->first_name }} {{ $parents->last_name }}</h2>
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
<form method="POST" action="{{ route('admin.parents.update', $parents->id) }}">{{ method_field('PUT') }}{{ csrf_field() }}
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
			<td><input type="text" class="form-control" name="first_name" value="{{ old('first_name') ? old('firs_name') : $parents->first_name }}" required></td>
		</tr>
		<tr>
			<td>Last name: *</td>
			<td><input type="text" class="form-control" name="last_name" value="{{ old('last_name') ? old('last_name') : $parents->last_name }}" required></td>
		</tr>
		<tr>
			<td>Profession: *</td>
			<td><input type="text" class="form-control" name="profession" value="{{ old('profession') ? old('profession') : $parents->profession }}" required></td>
		</tr>
		<tr>
			<td>Phone: *</td>
			<td><input type="text" class="form-control phone" name="phone" value="{{ old('phone') ? old('phone') : $parents->phone }}" required></td>
		</tr>
		<tr>
			<td>Adress: *</td>
			<td><input type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : $parents->address }}" required></td>
		</tr>
		<tr>
			<td>Gender: *</td>
			<td>
                <select name="gender" class="form-control" required>
                    <option value="{{ old('gender') ? old('gender') : $parents->gender }}">{{ $parents->gender }}</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </td>
		</tr>
		<tr>
			<td>Date: *</td>
			<td><div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="birthday" name="birthday" value="{{ old('birthday') ? old('birthday') : $parents->birthday }}" data-date-format="yyyy-mm-dd" required>
                </div>
			</td>
		</tr>
		<tr>
			<td>Email: *</td>
			<td><input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $parents->email }}" required></td>
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
			<td>Photo: *</td>
			<td><input type="text" class="form-control" name="photo" value="{{ old('photo') ? old('photo') : $parents->photo }}" required></td>
		</tr>
		<tr>
			<td>Profile: *</td>
			<td><input type="text" class="form-control" name="profile" value="{{ old('profile') ? old('profile') : $parents->profile }}" required></td>
		</tr>
	</tbody>
</table>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>