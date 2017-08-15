@extends('layouts.website')

@section('style')

@endsection

@section('content')
    <!-- main -->
    <section id="main" class="clearfix contact-us">
        <div class="container">

            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{ route('homepage') }}">Home</a></li>
                <li>Contact</li>
            </ol><!-- breadcrumb -->
            <h2 class="title">Contact Us</h2>

            <div class="corporate-info">
                <div class="row">
                    <!-- contact-info -->
                    <div class="col-sm-4">
                        <div class="contact-info">

                            <h2>Contact Info</h2>
                            <address>
                                <p><strong>Adress: </strong>{{Cache::get('settings_contact_address')}}</p>
                                <p><strong>Phone:</strong> <a href="#">{{Cache::get('settings_contact_phone')}}</a></p>
                                <p><strong>Email: </strong><a href="#">{{Cache::get('settings_contact_email')}}</a></p>
                            </address>

                            <ul class="social">
                                <li><a href="https://facebook.com/ryansreferrals" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://instagram.com/ryansreferrals" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                {{--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
                            </ul>
                        </div>
                    </div><!-- contact-info -->

                    <!-- feedback -->
                    <div class="col-sm-8">
                        <div class="feedback">
                            <h2>Send Us Your Feedback</h2>
                            <div id="result" class="">

                            </div>

                            <form id="contact-form" class="contact-form" name="contact-form" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name" minlength="3">
                                        </div>
                                        <div>
                                            <span id="message_name"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email">
                                        </div>
                                        <div>
                                            <span id="message_email"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="subject" id="subject" class="form-control" required="required" placeholder="Subject" minlength="3">
                                        </div>
                                        <div>
                                            <span id="message_subjectd"></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" required="required" class="form-control" rows="7" placeholder="Message" minlength="3" maxlength="500"></textarea>
                                        </div>
                                        <div>
                                            <span id="message_message"></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn">Submit Your Message</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- feedback -->
                </div><!-- row -->
            </div>

            <!-- gmap -->
            <div id="gmap"></div>
        </div><!-- container -->
    </section><!-- main -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            var form = $('#contact-form'), formFieldsMessage = ['name', 'email', 'subject', 'message', ];

            form.submit(function(e){
                e.preventDefault();

                sendEmail();
            });

            function sendEmail(){
                $.ajax({
                    url : '{{route('contactpage')}}',
                    type : 'POST',
                    data : getFormData(),
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    success : function(response){
                        $('#result').addClass('alert alert-success');
                        $('#result').html(response);
                        /*closeForm();
                        refreshTable();*/
                    },
                    error : function(xhr){
                        if(xhr.status === 422){
                            setErrors(xhr.responseJSON);
                        } else {
                            alert('We could not send the email. Please use the contact details from this page');
                        }
                    }
                })
            }

            function getFormData(){
                var data = {};

                data['name'] = $('#name').val();
                data['email'] = $('#email').val();
                data['subject'] = $('#subject').val();
                data['message'] = $('#message').val();

                return data;
            }

            function setErrors(errors){
                $.each(formFieldsMessage, function(idx,val){
                    if(errors[val]){
                        $('#message_'+val).html(errors[val]);
                    } else if(errors[val] === undefined){
                        $('#message_'+val).html('<i class="zmdi zmdi-check">OK</i>');
                    }
                });
            }
        })
    </script>
@endsection
