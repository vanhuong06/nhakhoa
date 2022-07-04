<div class="box-body">
    <div class="form-group col-sm-12">
        {!! Form::normalInput('manages_code', 'Mã Đơn Thuoc', $errors) !!}
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="std_id">Patient</label>
            <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                @foreach($patientss as $value => $class)
                    <option value="{{ $class -> patient_code }}"  {{ old('patient_code') == $value ? 'selected' : '' }} name="patient_id" >{{ $class -> patient_name }}</option>
                @endforeach
            </select>
            @if($errors->has('class'))
                <div class="invalid-feedback">
                    {{ $errors->first('class') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-sm-6 ">
        <div class="form-group">
            <label class="required" for="std_id">Doctor</label>
            <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="doctor_id" id="doctor_id" required>
                @foreach($doctorss as $value => $class)
                    <option value="{{ $class -> doctor_code }}"  {{ old('doctor_code') == $value ? 'selected' : '' }} name="doctor_id" >{{ $class -> doctor_name }}</option>
                @endforeach
            </select>
            @if($errors->has('class'))
                <div class="invalid-feedback">
                    {{ $errors->first('class') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="std_id">Medicine</label>
            <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="medicine_id" id="medicine_id" required>
                @foreach($mediciness as $value => $class)
                    <option value="{{ $class -> medicine_code }}"  {{ old('medicine_code') == $value ? 'selected' : '' }} name="medicine_id" >{{ $class -> medicine_name }}</option>
                @endforeach
            </select>
            @if($errors->has('class'))
                <div class="invalid-feedback">
                    {{ $errors->first('class') }}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group col-sm-6">
        <label class="required" for="date">Date</label>
        <input min="2022-01-00" max="2022-30-12" name="manages_date" id="date" type="date" class="form-control"  value="{{ date('m/d/Y') }}"/>
        <p class="help-block"></p>
        @if($errors->has('date'))
            <p class="help-block">
                {{ $errors->first('date') }}
            </p>
        @endif
    </div>
</div>
