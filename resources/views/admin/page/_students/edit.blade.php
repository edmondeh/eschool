<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>$('select').selectpicker();</script>

<div>
	<div class="col-md-12 m-t-20">
		<img class="profile-user-img img-responsive img-circle" src="{{ $student->getFirstMediaUrl('avatars') ? $student->getFirstMediaUrl('avatars') : asset('storage/avatar/images.png') }}" alt="{{ $student->first_name }} {{ $student->last_name }}">
	</div>
	 <div class="col-md-12">
			<h2 style="text-align: center; margin: 30px;">{{ $student->first_name }} {{ $student->last_name }}</h2>
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
<form method="POST" action="{{ route('admin.students.update', $student->id) }}" enctype="multipart/form-data">{{ method_field('PUT') }}{{ csrf_field() }}
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
			<td><input type="text" class="form-control" name="first_name" value="{{ old('first_name') ? old('firs_name') : $student->first_name }}" required></td>
		</tr>
		<tr>
			<td>Last name: *</td>
			<td><input type="text" class="form-control" name="last_name" value="{{ old('last_name') ? old('last_name') : $student->last_name }}" required></td>
		</tr>
		<tr>
			<td>Parent name: *</td>
			<td><input type="text" class="form-control" name="parent_name" value="{{ old('parent_name') ? old('parent_name') : $student->parent_name }}" required></td>
		</tr>
		<tr>
			<td>Departament: *</td>
			<td>
				<select class="form-control" name="dep_id" onchange="select_class(this.value)" required>
  					@foreach($deps as $dep)
  					<option {{ $dep->id == $student->sections->classes->dep->id ? 'selected' : '' }} value="{{ $dep->id }}">{{ $dep->name }}</option>
  					@endforeach
  				</select>
			</td>
		</tr>
		<tr>
			<td>Class: *</td>
			<td>
				<div id="select_class">
					<select class="form-control" name="class_id" required>
	  					@foreach($classes as $class)
	  					<option {{ $class->id == $student->sections->classes->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
	  					@endforeach
	  				</select>
	  			</div>
			</td>
		</tr>
		<tr>
			<td>Section: *</td>
			<td>
				<div id="select_section">
					<select class="form-control" name="section_id" required>
	  					@foreach($sections as $section)
	  					<option {{ $section->id == $student->sections->id ? 'selected' : '' }} value="{{ $section->id }}">{{ $section->name }}</option>
	  					@endforeach
	  				</select>
	  			</div>
			</td>
		</tr>
		<tr>
			<td>Phone: *</td>
			<td><input type="text" class="form-control phone" name="phone" value="{{ old('phone') ? old('phone') : $student->phone }}" required></td>
		</tr>
		<tr>
			<td>Adress: *</td>
			<td><input type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : $student->address }}" required></td>
		</tr>
		<tr>
			<td>Gender: *</td>
			<td>
                <select name="gender" class="form-control" required>
                    <option {{ 'male' == $student->gender ? 'selected' : '' }} value="Male">Male</option>
                    <option {{ 'female' ==$student->gender ? 'selected' : '' }} value="Female">Female</option>
                </select>
            </td>
		</tr>
		<tr>
			<td>Date: *</td>
			<td><div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="birthday" name="birthday" value="{{ old('birthday') ? old('birthday') : $student->birthday }}" data-date-format="yyyy-mm-dd" required>
                </div>
			</td>
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
			<td>Photo: *</td>
			<td><input type="file" class="form-control" name="avatar" id="avatar"></td>
		</tr>
		<tr>
			<td>Bio: *</td>
			<td><input type="text" class="form-control" name="bio" value="{{ old('bio') ? old('bio') : $student->bio }}" required></td>
		</tr>
	</tbody>
</table>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>