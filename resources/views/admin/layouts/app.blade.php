<!--
    
                ________                      __                            __                   
               /        |                    /  |                          /  |                 
               $$$$$$$$/   _______   _______ $$ |____    ______    ______  $$ |                
  ______       $$ |__     /       | /       |$$      \  /      \  /      \ $$ |          ______ 
 /      |      $$    |   /$$$$$$$/ /$$$$$$$/ $$$$$$$  |/$$$$$$  |/$$$$$$  |$$ |         /      |
 $$$$$$/       $$$$$/    $$      \ $$ |      $$ |  $$ |$$ |  $$ |$$ |  $$ |$$ |         $$$$$$/ 
               $$ |_____  $$$$$$  |$$ \_____ $$ |  $$ |$$ \__$$ |$$ \__$$ |$$ |                
               $$       |/     $$/ $$       |$$ |  $$ |$$    $$/ $$    $$/ $$ |              
               $$$$$$$$/ $$$$$$$/   $$$$$$$/ $$/   $$/  $$$$$$/   $$$$$$/  $$/                
                                                                                                    
                                                                                                    
                                                                                                    

            _____      _                 _                                                          _                   _                          
           / ____|    | |               | |                                                        | |                 | |                         
  ______  | (___   ___| |__   ___   ___ | |  _ __ ___   __ _ _ __   __ _  __ _ _ __ ___   ___ _ __ | |_   ___ _   _ ___| |_ ___ _ __ ___    ______ 
 |______|  \___ \ / __| '_ \ / _ \ / _ \| | | '_ ` _ \ / _` | '_ \ / _` |/ _` | '_ ` _ \ / _ \ '_ \| __| / __| | | / __| __/ _ \ '_ ` _ \  |______|
           ____) | (__| | | | (_) | (_) | | | | | | | | (_| | | | | (_| | (_| | | | | | |  __/ | | | |_  \__ \ |_| \__ \ ||  __/ | | | | |         
          |_____/ \___|_| |_|\___/ \___/|_| |_| |_| |_|\__,_|_| |_|\__,_|\__, |_| |_| |_|\___|_| |_|\__| |___/\__, |___/\__\___|_| |_| |_|         
                                                                          __/ |                                __/ |                               
                                                                         |___/                                |___/                                


 -->
 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: {{ Config::get('app.name') }} ● @yield('title') ::</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
  @stack('css')
  <link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-black.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-purple.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/pace/pace.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black1 skin-purple sidebar-mini">
  <div class="wrapper">
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>@yield('page-title')<small>@yield('page-description')</small></h1>
        <ol class="breadcrumb">
          @yield('breadcrumb')
        </ol>
        @stack('add-new')
      </section>
      <section class="content container-fluid">
        @if (\Session::has('flash_message'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ \Session::get('flash_message') }}
          </div>
        @endif
        @include('flash::message')
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
      </section>
    </div>
    @include('admin.includes.footer')
    @include('admin.includes.sidebar-right')
    <div class="control-sidebar-bg"></div>
  </div>
  <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('bower_components/PACE/pace.min.js') }}"></script>
  @stack('scripts')
  <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
  <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
  <script>$('select').selectpicker();</script>
  @stack('scr') 
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>