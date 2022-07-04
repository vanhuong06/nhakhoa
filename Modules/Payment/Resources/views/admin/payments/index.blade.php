@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('payment::payments.title.payments') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('payment::payments.title.payments') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.payment.payment.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('payment::payments.button.create payment') }}
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
                                <th>Ma Hoa Don</th>
                                <th>Ten Benh nhan</th>
                                <th>Ten Bac Si</th>
                                <th>Ngay tao bill</th>
                                <th>Tong Tien</th>
                                <th>Trang Thai</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($payments)): ?>
                            <?php foreach ($payments as $payment): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.payment.payment.edit', [$payment->id]) }}">
                                        {{ $payment->payment_code }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.payment.payment.edit', [$payment->id]) }}">
                                        {{ $payment->patientss->patient_name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.payment.payment.edit', [$payment->id]) }}">
                                        {{ $payment->doctorss->doctor_name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.payment.payment.edit', [$payment->id]) }}">
                                        {{ $payment->payment_time}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.payment.payment.edit', [$payment->id]) }}">
                                        {{ $payment->payment_amount  }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.payment.payment.edit', [$payment->id]) }}">
                                        {{ $payment->payment_status }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.payment.payment.edit', [$payment->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.payment.payment.destroy', [$payment->id]) }}"><i class="fa fa-trash"></i></button>
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
        <dd>{{ trans('payment::payments.title.create payment') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.payment.payment.create') ?>" }
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
