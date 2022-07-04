<div class="box-body">
    <div class="form-group col-sm-6">
        <label class="required" for="std_id">Name</label>
        <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="emp_id" id="emp_id" required>
            @foreach($employees as $value => $class)
                <option value="{{ $class -> employee_code }}"  {{ old('employee_name') == $value ? 'selected' : '' }} name="emp_id" >{{ $class -> employee_name }}</option>
            @endforeach
        </select>
        @if($errors->has('class'))
            <div class="invalid-feedback">
                {{ $errors->first('class') }}
            </div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('salary_basic', 'Lương cơ bản', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('salary_bonus', 'Tiền khen thưởng', $errors) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::normalInput('salary_cms', 'Hoa Hồng', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('salary_yt', 'BHYT', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('salary_xh', 'BHXH', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('salary_tn', 'BHTN', $errors) !!}
    </div>

</div>
