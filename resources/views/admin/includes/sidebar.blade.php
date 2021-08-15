@inject('request', 'Illuminate\Http\Request')
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <!-- <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"> -->
            <img src="{{ Auth::user()->getFirstMediaUrl('avatars') }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ ucwords(Auth::user()->first_name) }} {{ ucwords(Auth::user()->last_name) }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          <li class="@if(isset($active)) {{ $active == 'dashboard' ? 'active' : '' }} @endif"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          <li class="treeview {{ $request->segment(2) == 'students' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-users"></i> <span>Students</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'students' && $request->segment(3) == null ? 'active active-sub' : '' }}"><a href="{{ url('/admin/students') }}"><i class="fa fa-user" aria-hidden="true"></i> Students</a></li>
              <li class="{{ $request->segment(2) == 'students' && $request->segment(3) == 'create' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/students/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Students</a></li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'professors' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-user"></i> <span>Professors</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'professors' && $request->segment(3) == null ? 'active active-sub' : '' }}"><a href="{{ url('/admin/professors') }}"><i class="fa fa-user" aria-hidden="true"></i> Professor</a></li>
              <li class="{{ $request->segment(2) == 'professors' && $request->segment(3) == 'create' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/professors/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Professors</a></li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'parents' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-user-o"></i> <span>Parents</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'parents' && $request->segment(3) == null ? 'active active-sub' : '' }}"><a href="{{ url('/admin/parents') }}"><i class="fa fa-user-o" aria-hidden="true"></i> Parents</a></li>
              <li class="{{ $request->segment(2) == 'parents' && $request->segment(3) == 'create' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/parents/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Parents</a></li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'departaments' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-building-o"></i> <span>Departaments</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'departaments' && $request->segment(3) == null ? 'active active-sub' : '' }}"><a href="{{ url('/admin/departaments') }}"><i class="fa fa-building" aria-hidden="true"></i> Departaments</a></li>
              <li class="{{ $request->segment(2) == 'departaments' && $request->segment(3) == 'create' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/departaments/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Departaments</a></li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'classes' || $request->segment(2) == 'sections' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span> Classes </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'classes' && $request->segment(3) == null ? 'active active-sub' : '' }}"><a href="{{ url('/admin/classes') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Manage classes </a></li>
              <li class="{{ $request->segment(2) == 'classes' && $request->segment(3) == 'create' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/classes/create') }}"><i class="fa fa-plus"></i> Add Classes</a></li>
              <li class="{{ $request->segment(2) == 'sections' && $request->segment(3) == null ? 'active active-sub' : '' }}"> <a href="{{ url('/admin/sections') }}"> <i class="fa fa-tasks"></i> Manage sections </a> </li>
              <li class="{{ $request->segment(2) == 'sections' && $request->segment(3) == 'create' ? 'active active-sub' : '' }}"> <a href="{{ url('/admin/sections/create') }}"> <i class="fa fa-plus"></i> Add sections </a> </li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'subjects' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-suitcase"></i> <span>Subjects</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'subjects' && $request->segment(3) == null ? 'active active-sub' : '' }}"><a href="{{ url('/admin/subjects') }}"><i class="fa fa-suitcase" aria-hidden="true"></i> Subjects</a></li>
              <li class="{{ $request->segment(2) == 'subjects' && $request->segment(3) == 'create' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/subjects/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Subjects</a></li>
            </ul>
          </li>
          <li class="{{ $request->segment(2) == 'academicsyllabus' ? 'active' : '' }}"> <a href="{{ url('admin/academicsyllabus') }}"> <i class="fa fa-file-text"></i> <span>Academic Syllabus</span> </a> </li>
          <li class="{{ $request->segment(2) == 'studymaterials' ? 'active' : '' }}"> <a href="{{ url('admin/studymaterials') }}"> <i class="fa fa-folder"></i> <span>Study Material</span> </a> </li>
          <li class="treeview {{ $request->segment(2) == 'exams' || $request->segment(2) == 'grades' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Exams</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'exams' ? 'active active-sub' : '' }}"> <a href="{{ url('/admin/exams') }}"> <i class="fa fa-calendar-check-o"></i> All exams </a> </li>
              <li class="{{ $request->segment(2) == 'grades' ? 'active active-sub' : '' }}"> <a href="{{ url('/admin/grades') }}"> <i class="fa fa-plus"></i> Exam grades</a> </li>
              <li> <a href="{{ url('/admin/exams/marks') }}"> <i class="fa fa-plus"></i> Manage marks </a></li>
              <li> <a href="{{ url('/admin/exams/create') }}"> <i class="fa fa-plus"></i> Add Exams</a> </li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'attendance' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Attendance</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'attendance' ? 'active active-sub' : '' }}"> <a href="{{ url('/admin/attendance') }}"> <i class="fa fa-bar-chart"></i> Student Attendance </a> </li>
              <li> <a href="{{ url('/admin/attendance/date') }}"><i class="fa fa-bar-chart" aria-hidden="true"> </i> Attendance by date </a> </li>
              <li> <a href="{{ url('/admin/attendance/report') }}"><i class="fa fa-bar-chart" aria-hidden="true"> </i> Attendance report </a> </li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'books' ? 'active' : '' }}">
            <a href="#"> <i class="fa fa-book" aria-hidden="true"></i> <span> Library </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'books' && $request->segment('3') == null ? 'active active-sub' : '' }}"> <a href="{{ url('/admin/books') }}"> <i class="fa fa-book" aria-hidden="true"></i> Books </a> </li>
              <li class="{{ $request->segment(2) == 'books' && $request->segment('3') == 'create' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/books/create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Add books</a> </li>
              <li><a href="{{ url('/admin/books') }}"> <i class="fa fa-book" aria-hidden="true"></i> Books ?</a> </li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'inventory' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-inbox" aria-hidden="true"></i> <span>Inventory</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'inventory' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/inventory') }}"><i class="fa fa-inbox" aria-hidden="true"></i> Issue Item </a></li>
              <li><a href="{{ url('/admin/inventory/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Item stock </a></li>
              <li><a href="{{ url('/admin/inventory/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Item </a></li>
              <li><a href="{{ url('/admin/inventory/category') }}"><i class="fa fa-plus" aria-hidden="true"></i> Item Category </a></li>
              <li><a href="{{ url('/admin/inventory/suppliers') }}"><i class="fa fa-plus" aria-hidden="true"></i> Item Supplier </a></li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'transport' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-bus"></i> <span>Transport</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(3) == 'routes' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/transport/routes') }}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Routes</a></li>
              <li><a href="{{ url('/admin/transport/vehicle') }}"><i class="fa fa-car" aria-hidden="true"></i> Vehicle </a></li>
              <li><a href="{{ url('/admin/transport/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Assign Vehicle </a></li>
            </ul>
          </li>
          <li class="treeview {{ $request->segment(2) == 'hostel' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-bed"></i> <span>Hostel</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(3) == 'routes' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/transport/routes') }}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Routes</a></li>
              <li><a href="{{ url('/admin/transport/vehicle') }}"><i class="fa fa-car" aria-hidden="true"></i> Vehicle </a></li>
              <li><a href="{{ url('/admin/transport/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Assign Vehicle </a></li>
            </ul>
          </li>

          <li class="treeview {{ $request->segment(2) == 'noticeboard' ? 'active' : '' }}">
            <a href="#"><i class="fa fa-comment"></i> <span>Noticeboard</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'noticeboard' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/noticeboard') }}"><i class="fa fa-comment" aria-hidden="true"></i> Manage noticeboard </a></li>
              <li><a href="{{ url('/admin/noticeboard/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add noticeboard</a></li>
            </ul>
          </li>
          <li class="{{ $request->segment(2) == 'messages' ? 'active active-sub' : '' }}"> <a href="{{ url('/admin/messages') }}"> <i class="fa fa-envelope"></i> <span>Messages</span> <span class="pull-right-container"> <span class="label label-success pull-right">44</span> </span> </a> </li>
          <li class="">
                <a href="javascript:;"> <i class="material-icons">settings</i> <span class="title">Settings</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                  <li> <a href="http://eschool1.dew/admin/settings"> General settings</a> </li>
                  <li> <a href="http://eschool1.dew/admin/session"> Session settings </a> </li>
                  <li> <a href="http://eschool1.dew/admin/notification/settings"> Notification settings </a> </li>
                  <li> <a href="http://eschool1.dew/admin/email/settings"> Email settings </a> </li>
                  <li> <a href="http://eschool1.dew/admin/payment">Payment methods </a> </li>
                  <li> <a href="http://eschool1.dew/admin/backup-restore">Backup / Restore </a> </li>
                  <li> <a href="http://eschool1.dew/admin/languages">Languages </a> </li>
                </ul>
              </li>




          <li class="treeview @if(isset($active)) {{ $active == 'users-m' ? 'active' : '' }} @endif">
            <a href="#"><i class="fa fa-users"></i> <span>User Managment</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/users') }}"><i class="fa fa-user" aria-hidden="true"></i>
 Users</a></li>
              <li><a href="{{ url('/admin/roles') }}"><i class="fa fa-briefcase" aria-hidden="true"></i>
 Roles</a></li>
              <li><a href="{{ url('/admin/permissions') }}"><i class="fa fa-briefcase" aria-hidden="true"></i>
 Permissions</a></li>
            </ul>
          </li>
          <li class="{{ $request->segment(2) == 'profile' ? 'active active-sub' : '' }}"><a href="{{ url('/admin/profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
          <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            <ul class="treeview-menu">
              <li><a href="#">Link in level 2</a></li>
              <li><a href="#">Link in level 2</a></li>
            </ul>
          </li>
        </ul>
      </section>
    </aside>