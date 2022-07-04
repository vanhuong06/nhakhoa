<div class="box-body">
    <div class="form-group">
        <label class="required" for="std_id">Name</label>
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
    <div class="form-group">
        <label class="required" for="date">Date</label>
        <input min="2022-01-00" max="2022-30-12" name="appointment_time" id="date" type="date" class="form-control"  value="{{ date('m/d/Y') }}"/>
        <p class="help-block"></p>
        @if($errors->has('date'))
            <p class="help-block">
                {{ $errors->first('date') }}
            </p>
        @endif

    </div>
</div>
