@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('doctor::doctors.title.doctors') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('doctor::doctors.title.doctors') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.doctor.doctor.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('doctor::doctors.button.create doctor') }}
                    </a>
                </div>
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
                                <th>Ten</th>
                                <th>Ma bac si</th>
                                <th>Phone</th>
                                <th>Dia chi</th>
                                <th>Ngay sinh</th>
                                <th>Lich lam viec</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($doctors)): ?>
                            <?php foreach ($doctors as $doctor): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.doctor.doctor.edit', [$doctor->id]) }}">
                                        {{ $doctor->doctor_name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.doctor.doctor.edit', [$doctor->id]) }}">
                                        {{ $doctor->doctor_code }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.doctor.doctor.edit', [$doctor->id]) }}">
                                        {{ $doctor->doctor_phone }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.doctor.doctor.edit', [$doctor->id]) }}">
                                        {{ $doctor->doctor_address }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.doctor.doctor.edit', [$doctor->id]) }}">
                                        {{ $doctor->doctor_dob }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.doctor.doctor.edit', [$doctor->id]) }}">
                                       {{$doctor->start_time}} - {{$doctor->end_time}} {{ $doctor->doctor_date }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.doctor.doctor.edit', [$doctor->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.doctor.doctor.destroy', [$doctor->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
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
        <dd>{{ trans('doctor::doctors.title.create doctor') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.doctor.doctor.create') ?>" }
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
