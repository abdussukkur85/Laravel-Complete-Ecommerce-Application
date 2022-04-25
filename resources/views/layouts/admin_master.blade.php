@extends('layouts.admin_app')

@section('app_content')
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
@endsection