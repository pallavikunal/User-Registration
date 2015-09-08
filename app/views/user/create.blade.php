@extends('layouts.base')

@section('content')
<section class="content-header">
    <h1>
        User Registration 
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">&nbsp;</div><!-- /.box-header -->
                <!-- form start -->
                <?php $rule = ['firstName' => 'required|max:100|alpha', 'lastName' => 'required|max:100|alpha', 'dateOfBirth' => 'required|date',
                    'identifyType' => 'required', 'identifyNumber' => 'required|regex:/^[0-9\-]*$/|max:20', 'issuedDate' => 'required|date', 
                    'validUpto' => 'required|date', 'address' => 'required|regex:/^[a-zA-Z0-9\. ]*$/|max:500',
                    'permanentAddress' => 'required|regex:/^[a-zA-Z0-9\. ]*$/|max:500','contactNumber' => 'required|numeric', 'degree' => 'required'] ?>
                {{ Form::open(array('route' => 'store'), $rule) }}               
                <div class="box-body">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        {{ Form::text('firstName',null,['class' => 'form-control', 'id'=> 'name','placeholder' => "Enter First Name"]) }}
                        <p class='text-red'>{{ $errors->first('firstName') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        {{ Form::text('lastName',null,['class' => 'form-control', 'id'=> 'lastName','placeholder' => "Enter Last Name"]) }}
                        <p class='text-red'>{{ $errors->first('lastName') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="dof">Date Of Birth</label>
                        {{ Form::text('dateOfBirth',null,['class' => 'form-control', 'id'=> 'dateOfBirth','placeholder' => "Select Date Of Birth"]) }}                     
                        <p class='text-red'>{{ $errors->first('dateOfBirth') }}</p>
                    </div>

                    <div class="form-group">
                        <label for="identifyType">Identify type</label>
                        {{Form::select('identifyType', array('' => 'Select Identify Type   ','1' => 'Pan card no.', '2' => 'passport no', '3' => 'Govt issued card'), null, ['class' => 'form-control', 'id'=> 'identifyType'])}}
                        <p class='text-red'>{{ $errors->first('identifyType') }}</p>
                    </div>

                    <div class="form-group">
                        <label for="identifyNumber">Identify Number</label>
                        {{ Form::text('identifyNumber',null,['class' => 'form-control', 'id'=> 'identifyNumber','placeholder' => "Identify Number"]) }}
                        <p class='text-red'>{{ $errors->first('identifyNumber') }}</p>
                    </div>               
                    <div class="form-group">
                        <label for="identifyIssueDate">Identity </label></br>
                        <div class="input-daterange input-group" id="datepicker">
                            {{ Form::text('issuedDate',null,['class' => 'input-sm form-control', 'id'=> 'issuedDate','placeholder' => "Select Issue date"]) }}                            
                            <span class="input-group-addon">to</span>
                            {{ Form::text('validUpto',null,['class' => 'input-sm form-control', 'id'=> 'validUpto','placeholder' => "Select Valid upto"]) }}                            
                        </div>
                    </div>    

                    <div class="form-group">
                        <label for="Address">Communication Address</label>
                        {{ Form::textarea('address',null,['class' => 'form-control', 'id'=> 'address', 'rows' => 5 , 'cols' => 10,'placeholder' => "Enter Communication Address"]) }}
                        <p class='text-red'>{{ $errors->first('address') }}</p>
                        <!--System accept only alphanumerical space & .-->
                    </div>

                    <div class="form-group">
                        <label for="permanentAddress">Permanent Address</label>
                        {{ Form::textarea('permanentAddress',null,['class' => 'form-control', 'id'=> 'permanentAddress', 'rows' => 5 , 'cols' => 10,'placeholder' => "Enter permanent Address" ]) }}
                        <p class='text-red'>{{ $errors->first('permanentAddress') }}</p>
                        <!--System accept only alphanumerical space & .-->
                    </div>

                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        {{ Form::text('contactNumber',null,['class' => 'form-control', 'id'=> 'contactNumber','placeholder' => "Enter Contact Number"]) }}
                        <p class='text-red'>{{ $errors->first('contactNumber') }}</p>
                    </div> 

                    <div class="form-group">
                        <label for="degree">Highest Education/Degree</label>
                        {{ Form::select('degree',$degree,null,['class' => 'form-control', 'id'=> 'degree']) }}
                        <p class='text-red'>{{ $errors->first('degree') }}</p>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::submit('Submit' , array('class' => 'btn btn-primary')) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section><!-- /.content -->
@section('page-script')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.laravel.js') }}"></script>
<script type="text/javascript">
$('form').validate();
$(function () {
    $('#dateOfBirth').datepicker({
        endDate: new Date(),
        format: "dd/mm/yyyy"
    });
    $('#validUpto').datepicker({
        startDate: new Date(),
        format: "dd/mm/yyyy"
    });
    $('.input-daterange').datepicker({
        todayBtn: true,
        format: "dd/mm/yyyy"
    });

    $(document).on('change', "#country", function () {
        var _self = $(this);
        var data = {"country": _self.val(),
            "type": CONFIG.get('COUNTRY_STATE')}
        var res = executeAjaxRequest(_self, data);
        $('#state').replaceWith(res);
    });
});
</script>
@stop
@stop