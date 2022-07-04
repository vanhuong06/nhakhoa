@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('employee::departments.title.departments') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('employee::departments.title.departments') }}</li>
    </ol>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />


@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.employee.department.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('employee::departments.button.create department') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="container">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Danh sách phòng ban</label>
                                        </div>
                                        <select class="custom-select" id="select_res">
                                            <option value="Bác sĩ">Bác sĩ</option>
                                            <option value="Y tá">Y tá</option>
                                            <option value="All">All</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="filter" class="btn btn-sm btn-outline-info">Filter</button>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 mb-3">
                                    <!-- Table -->
                                    <div class="table-responsive">
                                        <table class="table table-borderless" id="record_table" style="width:100%;">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Mã Nhân Viên</th>
                                                <th>Chức vụ</th>
                                                <th>Ngày vào công ty</th>
                                                <th>Địa chỉ</th>
                                                <th>Phone</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('employee::departments.title.create department') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <script>
        function fetch(std, res) {
            $.ajax({
                url: "{{ route('admin.employee.department.records') }}",
                type: "GEt",
                data: {
                    res: res
                },
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $('#record_table').DataTable({
                        "data": data.employ,
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        "buttons": [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        "responsive": true,
                        "columns": [{
                            "data": "id",
                            "render": function(data, type, row, meta) {
                                return i++;
                            }
                        },
                            {
                                "data": "employee_name"
                            },
                            {
                                "data": "employee_code",
                                "render": function(data, type, row, meta) {
                                    return `${row.employee_code}`;
                                }
                            },
                            {
                                "data": "employee_job",
                                "render": function(data, type, row, meta) {
                                    return `${row.employee_job}`;
                                }
                            },
                            {
                                "data": "employee_date",
                            },
                            {
                                "data": "employee_address",
                            },
                            {
                                "data": "employee_phone",
                            },
                        ]
                    });
                }
            });
        }
        fetch();



        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var res = $("#select_res").val();
            if ( res === "Bác sĩ") {
                // alert("Bac si");
                $('#record_table').DataTable().destroy();
                fetch(res, 'Bác sĩ');
            } else if (res === "Y tá") {
                // alert("y ta")
                $('#record_table').DataTable().destroy();
                fetch(res, 'Y tá');
            } else if (res === "All"){
                $('#record_table').DataTable().destroy();
                fetch(res, 'All');
            }
        });
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.employee.department.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
