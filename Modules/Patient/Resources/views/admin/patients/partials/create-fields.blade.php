<title>Laravel Multiple Select Dropdown with Checkbox Example - ItSolutionStuff.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<style type="text/css">
    .dropdown-toggle{
        height: 40px;
        width: 400px !important;
    }
</style>
<div class="box-body">
    {!! Form::normalInput('patient_code', 'Mã BN', $errors) !!}
    {!! Form::normalInput('patient_name', 'Tên BN', $errors) !!}
    <div class="form-group">
        <label class="required" for="date">Date of Birth</label>
        <input min="2022-01-00" max="2022-30-12" name="patient_dob" id="patient_dob" type="date" class="form-control"  value="{{ date('Y/m/d')}}"/>
        <p class="help-block"></p>
        @if($errors->has('date'))
            <p class="help-block">
                {{ $errors->first('date') }}
            </p>
        @endif
    </div>
    <div class="test">
        <label><strong>Điều trị :</strong></label><br/>
        <select class="selectpicker" multiple data-live-search="true" name="patient_treaments[]">
            <option value="Nhổ răng khôn">Nhổ răng khôn</option>
            <option value="Chữa tuỷ răng">Chữa tuỷ răng</option>
            <option value="Niềng răng">Niềng răng</option>
            <option value="Trồng răng">Trồng răng</option>
            <option value="Khám định kì">Khám định kì</option>
        </select>
    </div>
    <div class="test">
        <label><strong>Giá</strong></label><br/>
        <select class="selectpicker" multiple data-live-search="true" name="patient_amount[]">
            <option value="100">Nhổ răng khôn - 100 USD</option>
            <option value="200">Chữa tuỷ răng - 200 USD</option>
            <option value="300">Niềng răng - 300 USD</option>
            <option value="400">Trồng răng -400 USD</option>
            <option value="500">Khám định kì - 500 USD</option>
        </select>
    </div>
    {!! Form::normalInput('patient_address', 'Địa chỉ', $errors) !!}
    {!! Form::normalInput('patient_phone', 'SĐT', $errors) !!}
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
