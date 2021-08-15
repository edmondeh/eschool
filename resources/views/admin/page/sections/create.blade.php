@extends('admin.layouts.app')

@section('title', 'Add a Section')

@section('page-title', 'Section')
@section('page-description', 'Add a new Section')

@push('css')
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
<li><a href="{{ url('sections') }}"><i class="fa fa-graduation-cap"></i> Sections</a></li>
<li class="active">&nbsp; Add Section</li>
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
		      <form class="form-horizontal" method="POST" action="{{ route('admin.sections.store') }}">
		      	{{ csrf_field() }}
		      	<div class="box-body">
		      		<div class="form-group m-t-20">
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
		      		<div class="form-group">
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
		      			<label for="teacher_id" class="col-sm-2 control-label">Teacher: *</label>
		      			<div class="col-sm-9">
		      				<select class="form-control" name="teacher_id" required>
		      					<option value="{{ old('teacher_id') }}">Select teacher</option>
		      					@foreach($teachs as $teach)
		      					<option value="{{ $teach->id }}">{{ $teach->first_name }} {{ $teach->last_name }}</option>
		      					@endforeach
		      				</select>
		      				<p class="help-block"></p>
		                    @if($errors->has('teacher_id'))
		                        <p class="help-block">
		                            {{ $errors->first('teacher_id') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="info" class="col-sm-2 control-label">Info: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="info" placeholder="Info" type="text" value="{{ old('info') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('info'))
		                        <p class="help-block">
		                            {{ $errors->first('info') }}
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