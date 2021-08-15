<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<div>
	 <div class="col-md-12">
			<h2 style="text-align: center; margin: 30px;">{{ ucwords($grades->name) }}</h2>
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
<form method="POST" action="{{ route('admin.grades.update', $grades->id) }}" enctype="multipart/form-data">{{ method_field('PUT') }}{{ csrf_field() }}
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
			<td><input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $grades->name }}" required></td>
		</tr>
		<tr>
			<td>Grade point: *</td>
			<td><input type="text" class="form-control" name="point" value="{{ old('point') ? old('point') : $grades->point }}" required></td>
		</tr>
		<tr>
			<td>Mark From: *</td>
			<td><input type="text" class="form-control" name="mark_from" value="{{ old('mark_from') ? old('mark_from') : $grades->mark_from }}" required></td>
		</tr>
		<tr>
			<td>Mark upto: *</td>
			<td><input type="text" class="form-control" name="mark_upto" value="{{ old('mark_upto') ? old('mark_upto') : $grades->mark_upto }}" required></td>
		</tr>
		<tr>
			<td>Info: *</td>
			<td><input type="text" class="form-control" name="info" value="{{ old('info') ? old('info') : $grades->info }}" required></td>
		</tr>
	</tbody>
</table>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>