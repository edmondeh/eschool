@extends('admin.layouts.app')

@section('title', 'Study Material')

@section('page-title', 'Study Material')
@section('page-description', 'All Study Material')

@push('css')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
  <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
@endpush

@section('breadcrumb')
<li><a href="{{ url('admin.studymaterials') }}"><i class="fa fa-classs"></i> Study Material</a></li>
@endsection

@push('add-new')
<div class="">
    		<a class="btn btn-success m-t-10" href="{{ url('/admin/studymaterials/create') }}" role="button">Add Material</a>
		</div>
@endpush

@section('content')
	<section class="content1">
		<div class="row">
		  <div class="col-xs-12">
		    <div class="box box-primary">
		      <div class="box-header with-border">
		        <h3 class="box-title">@yield('page-description')</h3>
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
		              <th>Subject</th>
		              <th>Name</th>
		              <th>Teacher</th>
		              <th>File</th>
		              <th>Info</th>
		              <th width="20%">More</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach($studymaterials as $studymaterial)<tr data-entry-id="{{ $studymaterial->id }}">
		              <td></td>
		              <td>{{ ucwords($studymaterial->sub->name) }}</td>
		              <td>{{ ucwords($studymaterial->name) }}</td>
		              <td>{{ ucwords($studymaterial->teach->first_name) }} {{ ucwords($studymaterial->teach->last_name) }}</td>
		              <td><a href="{{ asset($studymaterial->getMedia('file-material')->last()->getUrl()) }}" class="btn btn-xs btn-success"><i class="fa fa-download"></i> Download</a></td>
		              <td>{{ ucwords($studymaterial->info) }}</td>
		              <td>
		              	<a onclick="showAjaxModal('{{ url('/') }}/admin/studymaterials/{{ $studymaterial->id }}');" class="btn btn-xs btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Info</a>
		              	<a onclick="showAjaxModal('{{ url('/') }}/admin/studymaterials/{{ $studymaterial->id }}/edit');" class="btn btn-xs btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
		              	<form method="POST" action="{{ url('/') }}/admin/studymaterials/{{ $studymaterial->id }}" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm(&#039;Are you sure?&#039;);">
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
                    <div class="modal-body-1" style="height:auto; overflow:auto;">
                    <div class="modal-body" style="height:500px; overflow:auto;">
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
	</section>
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
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
@endpush
@push('scr')
<script>
  $(function () {
    $('.datatable1').DataTable({
    	select: true
	})
  })
  window._token = '{{ csrf_token() }}';
  window.route_mass_crud_entries_destroy = '{{ url('') }}/admin/studymaterials_mass_destroy';
</script>
@endpush