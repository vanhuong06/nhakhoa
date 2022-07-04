@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('employee::times.title.times') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('employee::times.title.times') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.employee.time.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('employee::times.button.create time') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body col-sm-6">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Mã Nhân Viên</th>
                                <th>Nhân viên</th>
                                <th>Ngày điểm danh</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($times)): ?>
                            <?php foreach ($times as $time): ?>
                            <tr>
                                <th>
                                    <a href="{{ route('admin.employee.time.edit', [$time->id]) }}">
                                        {{ $time->employees->employee_code }}
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('admin.employee.time.edit', [$time->id]) }}">
                                        {{ $time->employees->employee_name }}
                                    </a>
                                </th>
                                <td>
                                    <a href="{{ route('admin.employee.time.edit', [$time->id]) }}">
                                        {{ $time->attendance_time }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.employee.time.edit', [$time->id]) }}">
                                        {{ $time->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.employee.time.edit', [$time->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.employee.time.destroy', [$time->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
                <div class="box-body ">
                    <div class="table-responsive col-sm-12">
{{--                        <h1>Tổng số giờ đi làm của nhân viên</h1>--}}
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>

                                <th>Tên Nhân Viên</th>
                                <th>Số ngày làm</th>
                                <th>Tổng giờ làm việc</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <?php if (isset($test)): ?>
                            <?php foreach ($test as $time): ?>
                            <tr>
                                <?php if (isset($test1)): ?>
                                <?php foreach ($test1 as $time1): ?>
                                <?php if (($time1->id) === $time->emp_id ): ?>
                                     <td>{{$time1 -> employee_name}}</td>
                                <?php endif; ?>
                                 <?php endforeach; ?>
                                  <?php endif; ?>
                                <td>  {{$time->total_time }}</td>
                                <td>  {{$time->total_time * 8}}</td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>

                            </tr>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
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
        <dd>{{ trans('employee::times.title.create time') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.employee.time.create') ?>" }
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
