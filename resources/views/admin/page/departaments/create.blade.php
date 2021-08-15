@extends('admin.layouts.app')

@section('title', 'Add a Departament')

@section('page-title', 'Departament')
@section('page-description', 'Add a new departament')

@push('css')
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
<li><a href="{{ url('departaments') }}"><i class="fa fa-users"></i> Departaments</a></li>
<li class="active"><i class="fa fa-building-o"></i>&nbsp; Add Departament</li>
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
		      <form class="form-horizontal" method="POST" action="{{ route('admin.departaments.store') }}">
		      	{{ csrf_field() }}
		      	<div class="box-body">
		      		<div class="form-group m-t-20">
		      			<label for="dep_id" class="col-sm-2 control-label">Dep id: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="dep_id" placeholder="Dep id" type="text" value="{{ old('dep_id') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('dep_id'))
		                        <p class="help-block">
		                            {{ $errors->first('dep_id') }}
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

@push('scr')
<script>
	$('#birthday').datepicker({
		autoclose: true
    })
</script>
@endpush