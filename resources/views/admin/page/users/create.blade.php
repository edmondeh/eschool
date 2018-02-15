@extends('admin.layouts.app')

@section('title', 'Create User')

@section('page-title', 'User')
@section('page-description', 'Add a new user')

@push('css')
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
<li><a href="{{ url('users') }}"><i class="fa fa-users"></i> Users</a></li>
<li class="active"><i class="fa fa-user"></i> Create User</li>
@endsection

@section('content')
<div class="row">
		  <div class="col-xs-12">
		    <div class="box box-primary">
		      <div class="box-header with-border">
		        <h3 class="box-title">Create user</h3>
		        <div class="box-tools pull-right">
		          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
		            <i class="fa fa-minus"></i>
		          </button>
		          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
		            <i class="fa fa-times"></i>
		          </button>
		        </div>
		      </div>
		      <form class="form-horizontal" method="POST" action="{{ route('admin.users.store') }}">
		      	{{ csrf_field() }}
		      	<div class="box-body">
		      		<div class="form-group m-t-20">
		      			<label for="name" class="col-sm-2 control-label">Name: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="name" placeholder="Name" type="text" value="{{ old('name') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('name'))
		                        <p class="help-block">
		                            {{ $errors->first('name') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="email" class="col-sm-2 control-label">Email: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="email" placeholder="Email" type="email" required>
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
		      			<label for="roles" class="col-sm-2 control-label">Roles: *</label>
		      			<div class="col-sm-9">
		      				<select class="form-control select2" multiple="multiple" required="" name="roles[]">
		      					@foreach($roles as $role)
		      					<option value="{{ $role->name }}">{{ $role->name }}</option>
		      					@endforeach
		      				</select>
		      				<p class="help-block"></p>
		                    @if($errors->has('roles'))
		                        <p class="help-block">
		                            {{ $errors->first('roles') }}
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
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
@endpush