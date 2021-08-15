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
			<h2 style="text-align: center; margin: 30px;">{{ ucwords($academicsyllabus->name) }}</h2>
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
<form method="POST" action="{{ route('admin.academicsyllabus.update', $academicsyllabus->id) }}" enctype="multipart/form-data">{{ method_field('PUT') }}{{ csrf_field() }}
<table class="table table-hover1 table-bordered">
	<thead>
		<tr>
			<th class="col-sm-4">Edit</th>
			<th>Info</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Departament: *</td>
			<td>
				<select class="form-control" name="dep_id" onchange="select_class(this.value)" required>
  					@foreach($deps as $dep)
  					<option {{ $dep->id == $subject->sections->classes->dep->id ? 'selected' : '' }} value="{{ $dep->id }}">{{ $dep->name }}</option>
  					@endforeach
  				</select>
			</td>
		</tr>
		<tr>
			<td>Class: *</td>
			<td>
				<div id="select_class">
					<select class="form-control" name="class_id" required>
	  					<option value="{{ old('class_id') ? old('class_id') : $subject->sections->classes->class_id }}">{{ $subject->sections->classes->name }}</option>
	  				</select>
	  			</div>
			</td>
		</tr>
		<tr>
			<td>Section: *</td>
			<td>
				<div id="select_section">
					<select class="form-control" name="section_id" required>
	  					<option value="{{ old('section_id') ? old('section_id') : $subject->sections->id }}">{{ $subject->sections->name }}</option>
	  				</select>
	  			</div>
			</td>
		</tr>
		<tr>
			<td>Subject: *</td>
			<td>
				<div id="select_subject">
					<select class="form-control" name="subject_id" required>
	  					@foreach($subjects as $subject)
	  					<option {{ $academicsyllabus->subject_id == $subject->id ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
	  					@endforeach
	  				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Name: *</td>
			<td><input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $academicsyllabus->name }}" required></td>
		</tr>
		<tr>
			<td>Teachers: *</td>
			<td>
				<select class="form-control" name="teacher_id" required>
  					<option value="{{ old('teacher_id') ? old('teacher_id') : $academicsyllabus->teacher_id }}">{{ $academicsyllabus->teach->first_name }} {{ $academicsyllabus->teach->last_name }}</option>
  					<option value="">----------------</option>
  					@foreach($teachs as $teach)
  					<option value="{{ $teach->id }}">{{ $teach->first_name }} {{ $teach->last_name }}</option>
  					@endforeach
  				</select>
			</td>
		</tr>
		<tr>
			<td>File: *</td>
			<td><input type="file" class="form-control" name="file" id="file" required></td>
		</tr>
		<tr>
			<td>Info: *</td>
			<td><input type="text" class="form-control" name="info" value="{{ old('info') ? old('info') : $academicsyllabus->info }}" required></td>
		</tr>
	</tbody>
</table>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>