@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('employee::salaries.title.salaries') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('employee::salaries.title.salaries') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.employee.salary.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('employee::salaries.button.create salary') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.employee.salary.export') }}" method="GET" enctype="multipart/form-data">
                    <a class="btn btn-warning" href="{{ route('admin.employee.salary.export') }}">Export Employee Salary Data</a>
                </form>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Chức vụ</th>
                                <th>Lương cơ bản</th>
                                <th>Tiền khen thưởng</th>
                                <th>Hoa Hồng</th>
                                <th>BHYT</th>
                                <th>BHXH</th>
                                <th>BHTN</th>
                                <th>Tổng</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($salaries)): ?>
                            <?php foreach ($salaries as $salary): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}">
                                        {{ $salary->employees->employee_name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}">
                                        {{ $salary->employees->employee_job}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}">
                                        {{ $salary->salary_basic }} USD
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}">
                                        {{ $salary->salary_bonus}} USD
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}">
                                        {{ $salary->salary_cms }} USD
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}">
                                        {{ $salary->salary_yt }} USD
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}">
                                        {{ $salary->salary_xh }} USD
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}">
                                        {{ $salary->salary_tn }} USD
                                    </a>
                                </td>
                                @if(isset($salary))
                                        <?php $total = $salary -> salary_basic + $salary -> salary_bonus + $salary -> salary_cms  - $salary->salary_yt - $salary->salary_xh - $salary -> salary_tn ?>
                                        <td>
                                            <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}">
                                                {{ $total }} USD
                                            </a>
                                        </td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.employee.salary.edit', [$salary->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.employee.salary.destroy', [$salary->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
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
        <dd>{{ trans('employee::salaries.title.create salary') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.employee.salary.create') ?>" }
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
