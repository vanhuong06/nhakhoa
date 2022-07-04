<div class="box-body">
        <div class="form-group col-sm-6">
            <input value="{{$payment->patientss-> patient_name }}"   name="patient_id" disabled >
        </div>
        <div class="form-group col-sm-6">
            <input value="{{$payment->doctorss-> doctor_name }}"   name="doctor_id" disabled >
         </div>
        <div class="form-group col-sm-6">
            <label class="required" for="std_id">Phuong thuc thanh toan</label>
            <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="payment_method" id="doctor_id" required>
                <option value="">-- Payment Method --</option>
                <option value="Cash">Cash</option>
                <option value="CreditCard">Credit Card</option>
                <option value="{{$payment->payment_status}}">{{$payment->payment_status}}</option>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label class="required" for="std_id">Status</label>
            <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="payment_status" id="doctor_id" required>
                <option value="">-- Payment Status --</option>
                <option value="Complete">Complete</option>
                <option value="Pending">Pending</option>
            </select>
        </div>
</div>
