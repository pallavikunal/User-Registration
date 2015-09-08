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
                <div class="box-body">
                    Hello {{$userDetail->firstName}},<br/>
                    Thanks for Submitting Details. You can download it from below Link:<br>
                    <a href="{{ URL::route('downloadPDF', $userDetail->id)}}"/>Click Here to Download</a>
                </div><!-- /.box-body -->
                </div>
        </div>
    </div>
</section><!-- /.content -->
@section('page-script')
<script type="text/javascript">
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