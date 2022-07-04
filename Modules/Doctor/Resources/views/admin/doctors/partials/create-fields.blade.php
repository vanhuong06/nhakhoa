<div class="box-body">
        {!! Form::normalInput('doctor_code', 'Mã BS', $errors) !!}
        {!! Form::normalInput('doctor_name', 'Tên BS', $errors) !!}
    <div class="form-group">
        <label class="required" for="date">Date of Birth</label>
        <input min="2022-01-00" max="2022-30-12" name="doctor_dob" id="doctor_dob" type="date" class="form-control"  value="{{ date('Y/m/d')}}"/>
        <p class="help-block"></p>
        @if($errors->has('date'))
            <p class="help-block">
                {{ $errors->first('date') }}
            </p>
        @endif
    </div>
    {!! Form::normalInput('doctor_address', 'Dia chi', $errors) !!}
    {!! Form::normalInput('doctor_phone', 'Phone', $errors) !!}
    <div class="form-group">
        <label class="required" for="date">Date Work</label>
        <input min="2022-01-00" max="2022-30-12" name="doctor_date" id="doctor_dob" type="date" class="form-control"  value="{{ date('Y/m/d')}}"/>
        <p class="help-block"></p>
        @if($errors->has('date'))
            <p class="help-block">
                {{ $errors->first('date') }}
            </p>
        @endif
    </div>
    <div class="form-group">
        <label class="required" for="start_time">Start time</label>
        <input class="form-control lesson-timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
        @if($errors->has('start_time'))
            <div class="invalid-feedback">
                {{ $errors->first('start_time') }}
            </div>
        @endif

    </div>
    <div class="form-group">
        <label class="required" for="end_time">end time</label>
        <input class="form-control lesson-timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" required>
        @if($errors->has('end_time'))
            <div class="invalid-feedback">
                {{ $errors->first('end_time') }}
            </div>
        @endif

    </div>
</div>
