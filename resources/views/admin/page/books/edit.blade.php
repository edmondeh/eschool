<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<div>
	 <div class="col-md-12">
			<h2 style="text-align: center; margin: 30px;">{{ ucwords($books->name) }}</h2>
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
<form method="POST" action="{{ route('admin.books.update', $books->id) }}" enctype="multipart/form-data">{{ method_field('PUT') }}{{ csrf_field() }}
<table class="table table-hover1 table-bordered">
	<thead>
		<tr>
			<th class="col-sm-4">Edit</th>
			<th>Info</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Book id: *</td>
			<td><input type="text" class="form-control" name="book_id" value="{{ old('book_id') ? old('book_id') : $books->book_id }}" required><input type="hidden" name="b_id" value="{{ $books->id }}"></td>
		</tr>
		<tr>
			<td>Name: *</td>
			<td><input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $books->name }}" required></td>
		</tr>
		<tr>
			<td>Author: *</td>
			<td><input type="text" class="form-control" name="author" value="{{ old('author') ? old('author') : $books->author }}" required></td>
		</tr>
		<tr>
			<td>Description: *</td>
			<td><input type="text" class="form-control" name="description" value="{{ old('description') ? old('description') : $books->description }}" required></td>
		</tr>
		<tr>
			<td>Price: *</td>
			<td>
			<div class="input-group">
				<span class="input-group-addon">$</span>
				<input type="text" class="form-control" name="price" placeholder="Price" value="{{ old('price') ? old('price') : $books->price }}" required>
				<!-- <span class="input-group-addon">.00</span> -->
			</div></td>
		</tr>
		<tr>
			<td>Departament: *</td>
			<td>
				<select class="form-control" name="dep_id" onchange="select_class(this.value)" required>
  					@foreach($deps as $dep)
  					<option {{ $dep->id == $books->classes->dep->id ? 'selected' : '' }} value="{{ $dep->id }}">{{ $dep->name }}</option>
  					@endforeach
  				</select>
			</td>
		</tr>
		<tr>
			<td>Class: *</td>
			<td>
				<div id="select_class">
					<select class="form-control" name="class_id" required>
						@if(old('class_id'))
	  					@foreach($classes as $class)
						<option {{ $class->id == old('class_id') ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
	  					@endforeach
	  					@else
						@foreach($classes as $class)
						<option {{ $class->id == $books->classes->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
	  					@endforeach
	  					@endif
	  				</select>
	  			</div>
			</td>
		</tr>
		<tr>
			<td>Section: *</td>
			<td>
				<div id="select_section">
					<select class="form-control" name="section_id" required>
	  					@if(old('section_id'))
	  					@foreach($sections as $section)
						<option {{ $section->id == old('section_id') ? 'selected' : '' }} value="{{ $section->id }}">{{ $section->name }}</option>
	  					@endforeach
	  					@else
						@foreach($sections as $section)
						<option {{ $section->id == $books->sections->id ? 'selected' : '' }} value="{{ $section->id }}">{{ $section->name }}</option>
	  					@endforeach
	  					@endif
	  				</select>
	  			</div>
			</td>
		</tr>
		<tr>
			<td>File: *</td>
			<td><input type="file" class="form-control" name="file" id="file"></td>
		</tr>
	</tbody>
</table>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>