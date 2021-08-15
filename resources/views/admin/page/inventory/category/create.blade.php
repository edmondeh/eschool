@extends('admin.layouts.app')

@section('title', 'Add a Inventory Category')

@section('page-title', 'Inventory Category')
@section('page-description', 'Add a new Inventory Category')


@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
<li><a href="{{ url('admin/inventory') }}"><i class="fa fa-graduation-cap"></i> Inventory</a></li>
<li><a href="{{ url('admin/inventory/category') }}"><i class="fa fa-graduation-cap"></i> Inventory Categories</a></li>
<li class="active">&nbsp; Add Inventory Category</li>
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
		      <form class="form-horizontal" method="POST" action="{{ url('admin/inventory/category') }}" enctype="multipart/form-data">
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
		      			<label for="description" class="col-sm-2 control-label">Description: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="description" placeholder="Description" type="text" value="{{ old('description') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('description'))
		                        <p class="help-block">
		                            {{ $errors->first('description') }}
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