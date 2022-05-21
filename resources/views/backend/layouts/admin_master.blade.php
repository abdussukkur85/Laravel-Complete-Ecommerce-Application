@extends('backend.layouts.admin_app')

@section('app_content')
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @includeIf('backend.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @includeIf('backend.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('master_content')
        </div>
        <!-- /.content-wrapper -->

        @includeIf('backend.partials.footer')
    </div>
     <!-- /.Wrapper -->
    
@endsection