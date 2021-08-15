@extends('admin.layouts.app')

@section('title', 'Add a Grade')

@section('page-title', 'Grade')
@section('page-description', 'Add a new Grade')


@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
<li><a href="{{ url('admin/grades') }}"><i class="fa fa-graduation-cap"></i> Grades</a></li>
<li class="active">&nbsp; Add Grade</li>
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
		      <form class="form-horizontal" method="POST" action="{{ route('admin.grades.store') }}" enctype="multipart/form-data">
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
	                <div class="form-group m-t-20">
		      			<label for="point" class="col-sm-2 control-label">Grade point: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="point" placeholder="Grade point" type="text" value="{{ old('point') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('point'))
		                        <p class="help-block">
		                            {{ $errors->first('point') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group m-t-20">
		      			<label for="mark_from" class="col-sm-2 control-label">Mark From: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="mark_from" placeholder="Mark From" type="text" value="{{ old('mark_from') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('mark_from'))
		                        <p class="help-block">
		                            {{ $errors->first('mark_from') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group m-t-20">
		      			<label for="mark_upto" class="col-sm-2 control-label">Mark Upto: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="mark_upto" placeholder="Mark Upto" type="text" value="{{ old('mark_upto') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('mark_upto'))
		                        <p class="help-block">
		                            {{ $errors->first('mark_upto') }}
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