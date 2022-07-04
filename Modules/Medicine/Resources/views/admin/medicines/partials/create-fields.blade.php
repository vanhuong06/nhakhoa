<div class="box-body">
    <div class="form-group col-sm-6">
        {!! Form::normalInput('medicine_code', 'Mã Thuoc', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('medicine_name', 'Ten Thuoc', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::normalInput('medicine_price', 'Gia Thuoc', $errors) !!}
    </div>
    <div class="form-group col-sm-6">
        <label class="required" for="date">Date</label>
        <input min="2022-01-00" max="2022-30-12" name="medicine_date" id="date" type="date" class="form-control"  value="{{ date('m/d/Y') }}"/>
        <p class="help-block"></p>
        @if($errors->has('date'))
            <p class="help-block">
                {{ $errors->first('date') }}
            </p>
        @endif
    </div>
    <div class="form-group col-sm-12">
        {!! Form::normalInput('medicine_option', 'Thanh Phan', $errors) !!}
    </div>
</div>

</div>
