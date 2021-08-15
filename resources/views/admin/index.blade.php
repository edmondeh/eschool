@extends('admin.layouts.app') 

@section('title', 'Admin Dashboard') 

@section('page-title', 'Dashboard') 
@section('page-description', 'Control panel') 

@section('breadcrumb')
<li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
@endsection 

@section('content')
<section class="content">
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-green">
						<div class="inner">
							<h3>{{ $count['students'] }}</h3>
							<p>Students</p>
						</div>
						<div class="icon">
							<i class="ion ion-person"></i>
						</div>
						<a href="{{ url('admin/students') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-red">
						<div class="inner">
							<h3>{{ $count['professors'] }}</h3>
							<p>Professors</p>
						</div>
						<div class="icon">
							<i class="icon ion-person-stalker"></i>
						</div>
						<a href="{{ url('admin/professors') }}" class="small-box-footer">
		              More info <i class="fa fa-arrow-circle-right"></i>
		            </a>
					</div>
				</div>
			</div>
		</section>
@endsection