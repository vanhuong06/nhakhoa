<div class="box-body">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="header">
                        <h2><strong>Patients</strong> Information <small>Description text here...</small> </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                {!! Form::normalInput('payment_code', 'Ma Hoa Don', $errors) !!}
                            </div>
                            <div class="col-sm-12">
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
                            <div class="col-sm-12 ">
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
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Payment</strong> Information <small>Description text here...</small> </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="form-group col-sm-12 ">
                                <label class="required" for="date">Date</label>
                                <input min="2022-01-00" max="2022-30-12" name="payment_time" id="date" type="date" class="form-control"  value="{{ date('m/d/Y') }}"/>
                                <p class="help-block"></p>
                                @if($errors->has('date'))
                                    <p class="help-block">
                                        {{ $errors->first('date') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-sm-12 ">
                                <div class="form-group">
                                    <label class="required" for="std_id">Name</label>
                                    <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="payment_amount" id="doctor_id" required>
                                        @foreach($stack as $value)
                                            <option value="{{ $value }}"  {{ old('doctor_code') == $value ? 'selected' : '' }} name="doctor_id" >{{ $value }}</option>
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
                                <label class="required" for="std_id">Phuong thuc thanh toan</label>
                                <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="payment_method" id="doctor_id" required>
                                    <option value="">-- Payment Method --</option>
                                    <option value="Cash">Cash</option>
                                    <option value="CreditCard">Credit Card</option>
                                    <option value="Netbanking">Netbanking</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="required" for="std_id">Status</label>
                                <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="payment_status" id="doctor_id" required>
                                    <option value="">-- Payment Status --</option>
                                    <option value="">Select Status</option>
                                    <option value="Complete">Complete</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

