@extends('admin.layouts.app')

@section('title', 'Add a Supplier')

@section('page-title', 'Suppliers')
@section('page-description', 'Add a new Supplier')


@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
<li><a href="{{ url('admin/inventory') }}"><i class="fa fa-graduation-cap"></i> Inventory</a></li>
<li><a href="{{ url('admin/inventory/suppliers') }}"><i class="fa fa-graduation-cap"></i> Suppliers</a></li>
<li class="active">&nbsp; Add Supplier</li>
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
		      <form class="form-horizontal" method="POST" action="{{ url('admin/inventory/suppliers') }}" enctype="multipart/form-data">
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
		      			<label for="phone" class="col-sm-2 control-label">Phone: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="phone" placeholder="Phone" type="text" value="{{ old('phone') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('phone'))
		                        <p class="help-block">
		                            {{ $errors->first('phone') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="email" class="col-sm-2 control-label">Email: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="email" placeholder="Email" type="text" value="{{ old('email') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('email'))
		                        <p class="help-block">
		                            {{ $errors->first('email') }}
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
		      			<label for="contact_person_name" class="col-sm-2 control-label">Contact person name: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="contact_person_name" placeholder="Contact person name" type="text" value="{{ old('contact_person_name') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('contact_person_name'))
		                        <p class="help-block">
		                            {{ $errors->first('contact_person_name') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="contact_person_phone" class="col-sm-2 control-label">Contact person phone: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="contact_person_phone" placeholder="Contact person phone" type="text" value="{{ old('contact_person_phone') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('contact_person_phone'))
		                        <p class="help-block">
		                            {{ $errors->first('contact_person_phone') }}
		                        </p>
		                    @endif
		      			</div>
	                </div>
	                <div class="form-group">
		      			<label for="contact_person_email" class="col-sm-2 control-label">Contact person email: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="contact_person_email" placeholder="Contact person email" type="text" value="{{ old('contact_person_email') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('contact_person_email'))
		                        <p class="help-block">
		                            {{ $errors->first('contact_person_email') }}
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
                  <button type="submit" class="btn btn-success">&nbsp;Create&nbsp;</button>
		        </div>
		      </form>
		    </div>
		  </div>
		</div>
@endsection