@extends('layouts.master')

@section('title', 'New Rent')
@section('extraStyle')
    <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />
    <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/bootstrap-datepicker/datepicker3.css" />

@endsection
@section('content')
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li><a href="{{URL::Route('rent.index')}}">Rented List</a></li>
                <li class="active">Create</li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <section>
                <div class="section-body">
                    <!-- BEGIN HORIZONTAL FORM -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form form-validate floating-label"
                                  novalidate="novalidate"
                                  action="{{URL::route('rent.store')}}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                <div class="card">
                                    <div class="card-head style-primary">
                                        <header>Add New Rent</header>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            {{ csrf_field() }}
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            {!! Form::select('projectType', ['' => '', 'Commerical' => 'Commerical','Residential' =>'Residential', 'Residential & Commerical' => 'Residential & Commerical'], null, ['id' => 'projectType' ,'class' => 'form-control select2-list', 'required' => 'required']) !!}
                                                            <label for="projectType">Project Type</label>
                                                            <p class="help-block">select project type</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <select id="projects_id" class="form-control select2-list" name="projects_id" required>
                                                                <option value=""></option>
                                                            </select>
                                                            <label for="projects_id">Project</label>
                                                            <p  id="projects_id-error" class="help-block">select a project</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <select id="flats_id" class="form-control select2-list" name="flats_id" required>
                                                                <option value=""></option>
                                                            </select>
                                                            <label for="flats_id">Flat</label>
                                                            <p  id="flats_id-error" class="help-block">select a flat</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            {!! Form::select('customers_id', $customers, null, ['id' => 'customers_id' ,'class' => 'form-control select2-list', 'required' => 'required']) !!}
                                                            <label for="customers_id">Customer</label>
                                                            <p  id="customers_id-error" class="help-block">select a customer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control datepicker" value="{{$today->format('d/m/Y')}}" name="entryDate" required>
                                                            <label for="dateOfEntry">Rent date</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control datepicker2" value="" name="deedStart" required>
                                                            <label for="deedStart">Period start month</label>
                                                        </div>
                                                    </div> <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control datepicker2" value="" name="deedEnd" required>
                                                            <label for="deedEnd">Period end month</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <input type="text" readonly class="form-control" id="rentNo" value="{{$rentNo}}" name="rentNo" required>
                                                            <label for="rentNo">Rent No</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number" id="rentAmount" class="form-control" min="0" name="rent" data-rule-number="true" required>
                                                            <label for="rentAmount">Rent amount</label>
                                                            <p class="help-block">Numbers only</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number"  id="rentAmountPerSft" class="form-control" min="0" name="perSftRent" data-rule-number="true" required>
                                                            <label for="rentAmount">Per Sft. rent</label>
                                                            <p class="help-block">Rent per Sft.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number" id="securityMoney" class="form-control" min="0" name="securityMoney" data-rule-number="true" required>
                                                            <label for="securityMoney">Security money</label>
                                                            <p class="help-block">Numbers only</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number" id="serviceCharge" class="form-control" min="0" name="serviceCharge" data-rule-number="true" required>
                                                            <label for="serviceCharge">Service Charge</label>
                                                            <p class="help-block">Numbers only</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="number" id="advanceMoney" class="form-control" min="0" value="0.00" name="advanceMoney" data-rule-number="true" required>
                                                            <label for="advanceMoney">Advance TK</label>
                                                            <p class="help-block">Numbers only</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="number" id="monthlyDeduction" class="form-control" min="0" value="0.00" name="monthlyDeduction" data-rule-number="true" required>
                                                            <label for="monthlyDeduction">Deduction Advance TK</label>
                                                            <p class="help-block">Numbers only</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="number" id="monthlyDeductionTax" class="form-control" value="0.00" min="0" name="monthlyDeductionTax" data-rule-number="true" required>
                                                            <label for="monthlyDeductionTax">Deduction Tax TK</label>
                                                            <p class="help-block">Numbers only</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="number" id="utilityCharge" class="form-control" min="0" value="0.00" name="utilityCharge" data-rule-number="true" required>
                                                            <label for="utilityCharge">Utility Charge</label>
                                                            <p class="help-block">Numbers only</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="number" id="delayCharge" class="form-control" min="0" value="0.00" name="delayCharge" data-rule-number="true">
                                                            <label for="delayCharge">Delay Charge</label>
                                                            <p class="help-block">Numbers only</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="description"  name="note" rows="1"  maxlength="1000"></textarea>
                                                            <p class="help-block">description</p>
                                                            <label for="description">Remarks</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-content">
                                                                    <input type="file" class="form-control" name="deedPaper">
                                                                </div>
                                                                <span class="input-group-addon"><i class="fa fa-2x fa-file-image-o info"></i></span>
                                                            </div>
                                                            <label>Deed paper(pdf,image)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-content">
                                                                    <input type="file" class="form-control" name="othersPaper">
                                                                </div>
                                                                <span class="input-group-addon"><i class="fa fa-2x fa-file info"></i></span>
                                                            </div>
                                                            <label>Others paper(pdf,image)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card" id="flatInfo">
                                                    <div class="card-head style-info">
                                                        <header>Flat Information</header>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-divided">
                                                            <ul class="list-divided">
                                                                <li><strong>size</strong>&nbsp;&nbsp;<span class="opacity-90" id="size"></span>Sft.</li>
                                                                <li><strong>parking</strong>&nbsp;&nbsp;<span class="opacity-90" id="parking"></span></li>
                                                            </ul>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card" id="customerInfo">
                                                    <div class="card-head style-info">
                                                        <header>Customer Information</header>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-divided">
                                                            <ul class="list-divided">
                                                                <li><strong>Permanent Addrees</strong><br/><span class="opacity-90" id="parmanentAddress"></span></li>
                                                                <li><strong>Contact Person</strong><br/><span class="opacity-90" id="contactPerson"></span></li>
                                                                <li><strong>Contact Person Mobible</strong><br/><span class="opacity-90" id="contactPersonCellNo"></span></li>
                                                            </ul>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div><!--end .card-body -->
                                    <div class="card-actionbar">
                                        <div class="card-actionbar-row">
                                            <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-add-circle-outline"></i> Create</button>
                                        </div>
                                    </div>
                                </div><!--end .card -->
                            </form>
                        </div><!--end .col -->
                    </div><!--end .row -->
                    <!-- END HORIZONTAL FORM -->
                </div>
            </section>
        </div>

    </section>

@endsection

@section('extraScript')
    <script src="{{url('/')}}/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="{{url('/')}}/assets/js/libs/select2/select2.min.js"></script>
    <script src="{{url('/')}}/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{url('/')}}/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

    <script type="text/javascript">

        $( document ).ready(function() {
            $('#menubarToggler').trigger('click');

            $('select').select2();
            $('#projectType').change(function () {
                $("#flats_id").empty();
                $('#flats_id').select2();
                $.getJSON("/project-by-type/"+$(this).val(),function (response) {
                    if(response.length){
                        $("#projects_id").empty();
                        var option = '<option value=""></option>';
                        $("#projects_id").append(option);
                        $.each(response,function (index,project) {
                            var option = '<option value="'+project.id+'">'+project.value+'</option>';
                            $("#projects_id").append(option);
                        });

                    }
                    else {
                        $("#projects_id").empty();
                        var option = '<option value=""></option>';
                        $("#projects_id").append(option);
                    }
                    $('#projects_id').select2();
                });
            });
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight : true

            });
            $('.datepicker2').datepicker({
                format: 'mm-yyyy',
                viewMode: "months",
                minViewMode: "months",
                autoclose: true,
                todayHighlight : true

            });

            $('#projects_id').change(function () {
                $.getJSON("/flats-by-project/"+$(this).val(),function (response) {
                    if(response.length){
                        $("#flats_id").empty();
                        var option = '<option value=""></option>';
                        $("#flats_id").append(option);
                        $.each(response,function (index,flat) {
                            var option = '<option value="'+flat.id+'">'+flat.value+'</option>';
                            $("#flats_id").append(option);
                        });
                    }
                    else {
                        $("#flats_id").empty();
                        var option = '<option value=""></option>';
                        $("#flats_id").append(option);
                    }
                    $('#flats_id').select2();
                });
            });

            $('#flats_id').change(function () {
                $.getJSON("/flat/"+$(this).val(),function (response) {
                    if(response.id){
                        $('#size').text(response.size);
                        window.flatSize = response.size;
                        if(response.parking=="Yes"){
                            $('#parking').text(response.parkingNo);
                        }
                        else{
                            $('#parking').text('No');
                        }
                    }
                    else {
                        $('#size').text('');
                        $('#parking').text('');

                    }
                });
            });

            $('#customers_id').change(function () {
                $.getJSON("/customer-ajax/"+$(this).val(),function (response) {
                    if(response.id){
                        $('#parmanentAddress').text(response.permanentAddress);
                        $('#contactPerson').text(response.contactPerson);
                        $('#contactPersonCellNo').text(response.contactPersonCellNo);
                    }
                    else {
                        $('#parmanentAddress').text('');
                        $('#contactPerson').text('');
                        $('#contactPersonCellNo').text('');

                    }
                });
            });
            $('#rentAmount').on('input propertyChange paste',function(){
               var amount = parseFloat($(this).val());
               $('#rentAmountPerSft').val((amount/window.flatSize).toFixed(2));
            });
            $('form').submit(function (e) {
                e.preventDefault();
                var isValid = true;
                //validation
                if(!$('#projectType').val()){
                    isValid = false;
                    $('#projectType').parent().addClass('has-error');
                    $('#projectType').focus();
                }
                else{
                    $('#projectType').parent().removeClass('has-error');
                }
                if(!$('#projects_id').val()){
                    isValid = false;
                    $('#projects_id').parent().addClass('has-error');
                    $('#projects_id').focus();
                }
                else{
                    $('#projects_id').parent().removeClass('has-error');
                }

                if(!$('#flats_id').val()){
                    isValid = false;
                    $('#flats_id').parent().addClass('has-error');
                    $('#flats_id').focus();
                }
                else{
                     $('#flats_id').parent().removeClass('has-error');
                }
                if(!$('#customers_id').val()){
                    isValid = false;
                    $('#customers_id').parent().addClass('has-error');
                    $('#customers_id').focus();
                }
                else{
                     $('#customers_id').parent().removeClass('has-error');
                }
                if(!$('#rentAmountPerSft').val()){
                    isValid = false;
                    $('#rentAmountPerSft').parent().addClass('has-error');
                    $('#rentAmountPerSft').focus();
                }
                else{
                     $('#rentAmountPerSft').parent().removeClass('has-error');
                }
                //validation end
                if(isValid){
                    this.submit();
                }

            });
        });
    </script>
@endsection
