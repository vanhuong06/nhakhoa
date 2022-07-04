<div class="box-body">
    <div class="form-group col-sm-6">
        {!! Form::normalInput('employee_code', 'Mã Nhân viên', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('employee_address', 'Địa chỉ', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('employee_name', 'Tên Nhân Viên', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('employee_phone', 'SĐT', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        <label class="required" for="date">Ngày vào công ty</label>
        <input min="2022-01-00" max="2022-30-12" name="employee_date" id="date" type="date" class="form-control"  value="{{ date('m/d/Y') }}"/>
        <p class="help-block"></p>
        @if($errors->has('date'))
            <p class="help-block">
                {{ $errors->first('date') }}
            </p>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('employee_job', 'Chức vụ', $errors) !!}
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="required" for="std_id">Rank</label>
            <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="employee_rank" id="medicine_id" required>
                    <option value="1"  name="medicine_id" >1</option>
                    <option value="2"  name="medicine_id" >2</option>
            </select>
        </div>
    </div>
</div>
