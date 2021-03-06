@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('employee::times.title.create time') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.employee.time.index') }}">{{ trans('employee::times.title.times') }}</a></li>
        <li class="active">{{ trans('employee::times.title.create time') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.employee.time.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-bordered table-sm">
                        <thead>
                        <tr>

                            <th>Employee Name</th>
                            <th>Employee Position</th>
                            <th>Employee ID</th>
                            <td>Tổng giờ</td>
                            @php
                                $today = today();
                                $dates = [];

                                for ($i = 1; $i < $today->daysInMonth + 1; ++$i) {
                                    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                }

                            @endphp
                            @foreach ($dates as $date)
                                <th>
                                    {{ $date }}
                                </th>

                            @endforeach

                        </tr>
                        </thead>

                        <tbody>



                        @foreach ($employees as $employee)

                            <input type="hidden" name="emp_id" value="{{ $employee->id }}">

                            <tr>
                                <td>{{ $employee->employee_name }}</td>
                                <td>{{ $employee->employee_job }}</td>
                                <td>{{ $employee->employee_code }}</td>
                                <td>8</td>


                                @for ($i = 1; $i < $today->daysInMonth + 1; ++$i)


                                    @php

                                        $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');

                                        $check_attd = Modules\Employee\Entities\time::query()
                                            ->where('emp_id', $employee->id)
                                            ->where('attendance_time', $date_picker)
                                            ->first();


                                    @endphp
                                    <td>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="check_box"
                                                   name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                                   @if (isset($check_attd))  checked @endif id="inlineCheckbox1" value="1">

                                        </div>
{{--                                                                                <div class="form-check form-check-inline">--}}
{{--                                                                                    <input class="form-check-input" id="check_box"--}}
{{--                                                                                           name="leave[{{ $date_picker }}][{{ $employee->id }}]]" type="checkbox"--}}
{{--                                                                                           @if (isset($check_leave))  checked @endif id="inlineCheckbox2" value="1">--}}

{{--                                                                                </div>--}}

                                    </td>

                                @endfor
                            </tr>
                        @endforeach



                        </tbody>


                    </table>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
            <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.employee.employee.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
        </div>

    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.employee.time.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
