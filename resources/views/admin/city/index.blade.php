@extends('admin.layout.master')

@section('title','Admin | City List')

@push('per_page_css')
    <link rel="stylesheet" href="{{ asset('/') }}admin/datatable/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}admin/datatable/css/ajax_libs_twitter-bootstrap_4.5.2_css_bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/') }}admin/datatable/css/datatable_css_responsive.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}admin/datatable/css/datatable_css_buttons.dataTables.min.css">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">City List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">City List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="text-right">
                            <a href="{{route('admin.city.create')}}" class="btn btn-info dynamic-modal-md">+ Add City</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header mb-3">
                                <h3 class="card-title">City List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped datatable-data no-wrap" width="100%" id="datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>City</th>
                                            <th>City Ascii</th>
                                            <th>State Id</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@push('per_page_js')
    <script src="{{ asset('admin') }}/datatable/js/js_jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/datatable/js/js_dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/datatable/js/responsive_2.2.9_js_dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/datatable/js/buttons_2.2.2_js_dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/datatable/js/buttons_2.2.2_js_buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/datatable/js/buttons_2.2.2_js_buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/datatable/js/ajax_libs_pdfmake_0.1.53_vfs_fonts.js"></script>
    <script src="{{ asset('admin') }}/datatable/js/ajax_libs_pdfmake_0.1.53_pdfmake.min.js"></script>
    <script src="{{ asset('admin') }}/datatable/js/ajax_libs_jszip_3.1.3_jszip.min.js"></script>
    <script src="{{ asset('admin') }}/datatable/js/datatables.init.js"></script>
    <script src="{{asset('admin')}}/build/js/ajax_form_submit.js"></script>
    <script src="{{ asset('admin') }}/build/js/sweetalert.min.js"></script>

    <script>
     $('.datatable-data').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('admin.city.data')}}",
        order: [
            [0, 'Desc']
        ],
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'city',
                name: 'city'
            },
            {
                data: 'city_ascii',
                name: 'city_ascii'
            },
            {
                data: 'state_id',
                name: 'state_id'
            },
            {
                data: 'county_name',
                name: 'county_name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
            },
        ]
    });
</script>
@endpush
