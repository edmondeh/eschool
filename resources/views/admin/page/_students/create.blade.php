@extends('admin.layouts.app')

@section('title', 'Add a Student')

@section('page-title', 'Student')
@section('page-description', 'Add a new student')

@push('css')
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
<li><a href="{{ url('students') }}"><i class="fa fa-users"></i> Students</a></li>
<li class="active"><i class="fa fa-user"></i> Add Student</li>
@endsection

@section('content')
<div class="row">
		  <div class="col-xs-12">
		    <div class="box box-primary">
		      <div class="box-header with-border">
		        <h3 class="box-title">@yield('title')</h3>
		        <div class="box-tools pull-right">
		          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
		            <i class="fa fa-minus"></i>
		          </button>
		          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
		            <i class="fa fa-times"></i>
		          </button>
		        </div>
		      </div>
		      <form class="form-horizontal" method="POST" action="{{ route('admin.students.store') }}">
		      	{{ csrf_field() }}
		      	<div class="box-body">
		      		<div class="form-group m-t-20">
		      			<label for="first_name" class="col-sm-2 control-label">First name: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="first_name" placeholder="First name" type="text" value="{{ old('first_name') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('first_name'))
		                        <p class="help-block">
		                            {{ $errors->first('first_name') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="last_name" class="col-sm-2 control-label">Last name: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="last_name" placeholder="Last name" type="text" value="{{ old('last_name') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('last_name'))
		                        <p class="help-block">
		                            {{ $errors->first('last_name') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="parent_name" class="col-sm-2 control-label">Parent name: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="parent_name" placeholder="Parent name" type="text" value="{{ old('parent_name') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('parent_name'))
		                        <p class="help-block">
		                            {{ $errors->first('parent_name') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="dep_id" class="col-sm-2 control-label">Departament: *</label>
		      			<div class="col-sm-9">
		      				<select class="form-control" name="dep_id" onchange="select_class(this.value)" required>
		      					<option value="{{ old('dep_id') }}">Select departament</option>
		      					@foreach($deps as $dep)
		      					<option value="{{ $dep->id }}">{{ $dep->name }}</option>
		      					@endforeach
		      				</select>
		      				<p class="help-block"></p>
		                    @if($errors->has('dep_id'))
		                        <p class="help-block">
		                            {{ $errors->first('dep_id') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="class_id" class="col-sm-2 control-label">Class: *</label>
		      			<div class="col-sm-9" id="select_class">
		      				<select class="form-control" name="class_id" required>
		      					<option value="{{ old('class_id') }}">Select departament first</option>
		      				</select>
		      				<p class="help-block"></p>
		                    @if($errors->has('class_id'))
		                        <p class="help-block">
		                            {{ $errors->first('class_id') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group ">
		      			<label for="section_id" class="col-sm-2 control-label">Section: *</label>
		      			<div class="col-sm-9" id="select_section">
		      				<select name="section_id" class="form-control">
		      					<option value="{{ old('section_id') }}">Select class first</option>
		      				</select>
		      				<p class="help-block"></p>
		                    @if($errors->has('section_id'))
		                        <p class="help-block">
		                            {{ $errors->first('section_id') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="phone" class="col-sm-2 control-label">Phone: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="phone" placeholder="phone" type="text" value="{{ old('phone') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('phone'))
		                        <p class="help-block">
		                            {{ $errors->first('phone') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="address" class="col-sm-2 control-label">Address: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="address" placeholder="Address" type="text" value="{{ old('address') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('address'))
		                        <p class="help-block">
		                            {{ $errors->first('address') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="gender" class="col-sm-2 control-label">Gender: *</label>
		      			<div class="col-sm-9">
		      				<select name="gender" class="form-control" required>
			                    <option {{ old('gender') == 'male' ? 'selected' : '' }} value="male">Male</option>
			                    <option {{ old('gender') == 'female' ? 'selected' : '' }} value="female">Female</option>
			                </select>
		      				<p class="help-block"></p>
		                    @if($errors->has('gender'))
		                        <p class="help-block">
		                            {{ $errors->first('gender') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="birthday" class="col-sm-2 control-label">Birthday: *</label>
		      			<div class="col-sm-9">
		      				<div class="input-group date">
			                  	<div class="input-group-addon">
			                    	<i class="fa fa-calendar"></i>
			                  	</div>
			                  	<input type="text" class="form-control pull-right" id="birthday" name="birthday" value="{{ old('birthday') }}" data-date-format="yyyy-mm-dd" required>
			                </div>
		      				<p class="help-block"></p>
		                    @if($errors->has('birthday'))
		                        <p class="help-block">
		                            {{ $errors->first('birthday') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="email" class="col-sm-2 control-label">Email: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="email" placeholder="Email" type="email" value="{{ old('email') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('email'))
		                        <p class="help-block">
		                            {{ $errors->first('email') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="password" class="col-sm-2 control-label">Password: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="password" placeholder="Password" type="password" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('password'))
		                        <p class="help-block">
		                            {{ $errors->first('password') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="password_confirmation" class="col-sm-2 control-label">Confirm password: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="password_confirmation" placeholder="Confirm password" type="password" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('password_confirmation'))
		                        <p class="help-block">
		                            {{ $errors->first('password_confirmation') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="avatar" class="col-sm-2 control-label">Photo: *</label>
		      			<div class="col-sm-9">
		      				<input type="file" class="form-control" name="avatar" id="avatar">
		      				<p class="help-block"></p>
		                    @if($errors->has('avatar'))
		                        <p class="help-block">
		                            {{ $errors->first('avatar') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="bio" class="col-sm-2 control-label">Bio: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="bio" placeholder="Bio" type="text" value="{{ old('bio') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('bio'))
		                        <p class="help-block">
		                            {{ $errors->first('bio') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
		      	</div>	
		        <div class="box-footer">
		      	  <button onclick="goBack()" class="btn btn-danger">Cancel</button>
                  <button type="submit" class="btn btn-success">&nbsp;Save&nbsp;</button>
		        </div>
		      </form>
		    </div>
		  </div>
		</div>
@endsection

@push('scripts')
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
@endpush

@push('scr')
<script>
	$('#birthday').datepicker({
		autoclose: true
    })
</script>
@endpush