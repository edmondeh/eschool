@extends('admin.layouts.app')

@section('title', 'Profile')

@section('page-title', 'Profile')
@section('page-description', 'Change profile info and password')

@push('css')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
  <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
@endpush

@section('breadcrumb')
<li><a href="{{ url('admin/profile') }}"><i class="fa fa-user"></i> Profile</a></li>
@endsection

@section('content')
<div class="row">
		  <div class="col-xs-12">
		    <div class="box box-primary">
		      <div class="box-header with-border">
		        <h3 class="box-title">Profile</h3>
		        <div class="box-tools pull-right">
		          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
		            <i class="fa fa-minus"></i>
		          </button>
		          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
		            <i class="fa fa-times"></i>
		          </button>
		        </div>
		      </div>
		      <div class="box-body">
		        
		      </div>
		      <!-- <div class="box-footer">
		      </div> -->
		    </div>
		    <div class="modal fade" id="modal_ajax">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">{{ config('app.name') }}</h4>
                    </div>
                    <div class="modal-body-1">
                    <div class="modal-body" style="height:auto; overflow:auto;">
                    </div><!-- 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                  </div>
              	  </div>
                </div>
            </div>
		  </div>
		</div>
@endsection

@push('scripts')
@endpush
@push('scr')
@endpush