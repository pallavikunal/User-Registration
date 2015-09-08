<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>User Registration</title></head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span8">

                </div><section class="content-header">
                    <h1>
                        User Details 
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
                                    <div style="margin-top:10px;">
                                        <b>First Name:</b>
                                        {{ ucfirst($userDetail->firstName) }}                       
                                    </div>
                                    <div style="margin-top:10px;">
                                        <strong>last Name:</strong>
                                        {{ ucfirst($userDetail->lastName) }}                       
                                    </div>
                                    <div style="margin-top:10px;">
                                        <strong>Date Of Birth:</strong>
                                         {{ date('F d, Y', strtotime($userDetail->dateOfBirth)) }}                                        
                                    </div>
                                    <div style="margin-top:10px;">
                                        <strong>Identify type:</strong>
                                        @if($userDetail->identity->type == '1')
                                        Pan Card no.
                                        @elseif($userDetail->identity->type == '2')
                                        Passport no.
                                        @else
                                        Govt issued card
                                        @endif                      
                                    </div>
                                    <div style="margin-top:10px;">
                                        <strong>Identity number:</strong>
                                        {{ $userDetail->identity->number }}
                                    </div>
                                    <div style="margin-top:10px;">
                                        <strong>Identity Issue date:</strong>
                                        {{ date('F d, Y', strtotime($userDetail->identity->issueDate)) }} TO {{ date('F d, Y', strtotime($userDetail->identity->validUpto)) }}
                                    </div>
                                    <div style="margin-top:10px;">
                                        <strong>Communication Address:</strong>
                                        {{ $userDetail->communicationAddress }}                       
                                    </div>
                                    <div style="margin-top:10px;">
                                        <strong>Permanent Address:</strong>
                                        {{ $userDetail->permanentAddress }}                       
                                    </div>
                                    <div style="margin-top:10px;">
                                        <strong>Contact Number:</strong>
                                        {{ $userDetail->contactNumber }}                       
                                    </div>
                                    <div style="margin-top:10px;">
                                        <strong>Highest Education/Degree:</strong>
                                        {{ $userDetail->degree->degreeName }}                       
                                    </div>
                                </div>
                            </div>
                        </div>
                </section><!-- /.content -->
            </div>
        </div>
    </body>
<footer>
    </footer>
</html>