@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('invoice::invoices.title.invoices') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('invoice::invoices.title.invoices') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.invoice.invoice.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('invoice::invoices.button.create invoice') }}
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
                                <th>Ma Benh Nhan</th>
                                <th>Ngay Thanh Toan</th>
                                <th>Gia</th>
                                <th>Hinh Thuc</th>
                                <th>Dich Vu Dieu Tri</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($invoices)): ?>
                            <?php foreach ($invoices as $invoice): ?>
                            <tr>
                                <th>
                                    <a href="{{ route('admin.invoice.invoice.edit', [$invoice->id]) }}">
                                       HD {{ $invoice->payment_code }}
                                    </a>
                                </th>
                                <td>
                                    <a href="{{ route('admin.invoice.invoice.edit', [$invoice->id]) }}">
                                       BN {{ $invoice->patient_id}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.invoice.invoice.edit', [$invoice->id]) }}">
                                         {{ $invoice->created_at}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.invoice.invoice.edit', [$invoice->id]) }}">
                                        {{ $invoice->payment_amount}} USD
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.invoice.invoice.edit', [$invoice->id]) }}">
                                        {{ $invoice->payment_method}}
                                    </a>
                                </td>
{{--                                <td>--}}
{{--                                    <a href="{{ route('admin.invoice.invoice.edit', [$invoice->id]) }}">--}}
{{--                                        {{ $invoice->patientss->patient_treaments}}--}}
{{--                                    </a>--}}
{{--                                </td>--}}
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.invoice.invoice.edit', [$invoice->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.invoice.invoice.destroy', [$invoice->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>
                                    <p>Doanh Thu Theo Ngày - {{$today}} - {{$invoice_sum}} USD </p>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <p>Doanh Thu Theo Tháng - {{$monthCurrent}} - {{$month_sum}} USD </p>
                                </th>
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
        <dd>{{ trans('invoice::invoices.title.create invoice') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.invoice.invoice.create') ?>" }
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
