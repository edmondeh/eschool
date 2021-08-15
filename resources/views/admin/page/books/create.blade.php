@extends('admin.layouts.app')

@section('title', 'Add a Book')

@section('page-title', 'Book')
@section('page-description', 'Add a new Book')


@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
<li><a href="{{ url('admin/books') }}"><i class="fa fa-book"></i> Books</a></li>
<li class="active">&nbsp; Add Book</li>
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
		      <form class="form-horizontal" method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
		      	{{ csrf_field() }}
		      	<div class="box-body">
		      		<div class="form-group m-t-20">
		      			<label for="book_id" class="col-sm-2 control-label">Book_id: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="book_id" placeholder="Book id" type="text" value="{{ old('book_id') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('book_id'))
		                        <p class="help-block">
		                            {{ $errors->first('book_id') }}
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
		      			<label for="author" class="col-sm-2 control-label">Author: *</label>
		      			<div class="col-sm-9">
		      				<input class="form-control" name="author" placeholder="Author" type="text" value="{{ old('author') }}" required>
		      				<p class="help-block"></p>
		                    @if($errors->has('author'))
		                        <p class="help-block">
		                            {{ $errors->first('author') }}
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
	                <div class="form-group">
		      			<label for="price" class="col-sm-2 control-label">Price: *</label>
		      			<div class="col-sm-9">
		      				<div class="input-group">
							  	<span class="input-group-addon">$</span>
							  	<input type="text" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}" required>
							  	<!-- <span class="input-group-addon">.00</span> -->
							</div>
		      				<p class="help-block"></p>
		                    @if($errors->has('price'))
		                        <p class="help-block">
		                            {{ $errors->first('price') }}
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
		      			<label for="file" class="col-sm-2 control-label">File: *</label>
		      			<div class="col-sm-9">
		      				<input type="file" class="form-control" name="file" id="file">
		      				<p class="help-block"></p>
		                    @if($errors->has('file'))
		                        <p class="help-block">
		                            {{ $errors->first('file') }}
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