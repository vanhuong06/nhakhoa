@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('patient::patients.title.patients') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('patient::patients.title.patients') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.patient.patient.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('patient::patients.button.create patient') }}
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
                                <th>STT</th>
                                <th>Ma Benh Nhan</th>
                                <th>Ten Benh Nhan</th>
                                <th>Ngay sinh</th>
                                <th>Loai Dich vu</th>
                                <th>Dia chi</th>
                                <th>Phone</th>
                                <th>Tổng tiền điều trị</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($patients)): ?>
                            <?php foreach ($patients as $patient): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.patient.patient.edit', [$patient->id]) }}">
                                        {{ $patient->id}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.patient.patient.edit', [$patient->id]) }}">
                                        {{ $patient->patient_code }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.patient.patient.edit', [$patient->id]) }}">
                                        {{ $patient->patient_name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.patient.patient.edit', [$patient->id]) }}">
                                        {{ $patient->patient_dob }}
                                    </a>
                                </td>
                                <td>
                                    @foreach(array($patient->patient_treaments) as $value)
                                        {{$value }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.patient.patient.edit', [$patient->id]) }}">
                                        {{ $patient->patient_address }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.patient.patient.edit', [$patient->id]) }}">
                                        {{ $patient->patient_phone}}
                                    </a>
                                </td>

                                <?php   $test = json_decode($patient->patient_amount, true);
                                $sum = array_sum($test); ?>
                                <?php ?>
                                <td>
                                    <?php if(isset($sum)): ?>
                                    <a href="{{ route('admin.patient.patient.edit', [$patient->id]) }}">
                                        {{$sum }} USD
                                    </a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.patient.patient.edit', [$patient->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.patient.patient.destroy', [$patient->id]) }}"><i class="fa fa-trash"></i></button>
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
        <dd>{{ trans('patient::patients.title.create patient') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.patient.patient.create') ?>" }
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
