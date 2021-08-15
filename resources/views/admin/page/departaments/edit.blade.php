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
			<h2 style="text-align: center; margin: 30px;">{{ ucwords($dep->name) }}</h2>
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
<form method="POST" action="{{ route('admin.departaments.update', $dep->id) }}">{{ method_field('PUT') }}{{ csrf_field() }}
<table class="table table-hover1 table-bordered">
	<thead>
		<tr>
			<th class="col-sm-4">Edit</th>
			<th>Info</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Dep id: *</td>
			<td><input type="text" class="form-control" name="dep_id" value="{{ old('dep_id') ? old('dep_id') : $dep->dep_id }}" required></td>
		</tr>
		<tr>
			<td>Name: *</td>
			<td><input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $dep->name }}" required></td>
		</tr>
		<tr>
			<td>Info: *</td>
			<td><input type="text" class="form-control" name="info" value="{{ old('info') ? old('info') : $dep->info }}" required></td>
		</tr>
	</tbody>
</table>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>