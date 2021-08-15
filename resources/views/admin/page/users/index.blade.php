@extends('admin.layouts.app')

@section('title', 'Users')

@section('page-title', 'Users')
@section('page-description', 'All users')

@push('css')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
  <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
@endpush

@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-users"></i> Users</a></li>
@endsection

@push('add-new')
<div class="">
    		<a class="btn btn-success m-t-10" href="{{ url('/admin/users/create') }}" role="button">Add User</a>
		</div>
@endpush

@section('content')
<div class="row">
		  <div class="col-xs-12">
		    <div class="box box-primary">
		      <div class="box-header with-border">
		        <h3 class="box-title">All users</h3>
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
		        <table class="table table-bordered table-hover datatable dt-select">
		          <thead>
		            <tr>
		              <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
		              <!-- <th width="6%">#</th> -->
		              <th width="6%"></th>
		              <th>Name</th>
		              <th>Email</th>
		              <th>Role</th>
		              <th width="20%">More</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach($users as $user)<tr data-entry-id="{{ $user->id }}">
		              <td></td>
		           	  <!-- <td>{{ $user->id }}</td> -->
		              <td><img class="img-circle img-size" src="{{ $user->getFirstMediaUrl('avatars') ? $user->getFirstMediaUrl('avatars') : asset('storage/avatar/images.png') }}" alt="{{ $user->first_name }} {{ $user->last_name }}"></td>
		              <td>{{ $user->first_name }} {{ $user->last_name }}</td>
		              <td>{{ $user->email }}</td>
		              <td>@foreach ($user->roles()->pluck('name') as $role) <span class="label label-success label-many">{{ $role }}</span>@endforeach</td>
		              <td>
		              	<a onclick="showAjaxModal('{{ url('/') }}/admin/users/{{ $user->id }}/edit');" class="btn btn-xs btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
		              	<form method="POST" action="{{ url('/') }}/admin/users/{{ $user->id }}" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm(&#039;Are you sure?&#039;);">
										{{ method_field('delete') }}
										{{ csrf_field() }}
		              		<button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
		              	</form>
		              </td>
		            </tr>
		            @endforeach
<!-- 		          <tfoot>
  <tr>
    <th></th>
    <th>#</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>More</th>
  </tr>
</tfoot> -->
		        </table>
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
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/select.bootstrap4.min.js"></script>
@endpush
@push('scr')
<script>
  $(function () {
    $('.datatable1').DataTable({
    	select: true
	})
  })
  window._token = '{{ csrf_token() }}';
  window.route_mass_crud_entries_destroy = '{{ url('') }}/admin/users_mass_destroy';
</script>
@endpush