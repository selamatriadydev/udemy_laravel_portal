@extends('front.layout.app')

@section('title', $page_contact ? $page_contact->contact_title : 'Contact')

@push('style')
    <style>

        #form_contact_loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.75);
            z-index: 10000;
        }
        .form_contact_spinner.form_contact_loading {
            display: none;
            padding: 50px;
            text-align: center;
        }
        #form_contact_spinner_primary {
            border-color: #FFCC00 #ccc #ccc !important;
        }
        .form_contact_spinner.form_contact_loading:before {
            content: "";
            height: 90px;
            width: 90px;
            margin: -15px auto auto -15px;
            position: absolute;
            top: calc(50% - 45px);
            left: calc(50% - 45px);
            border-width: 8px;
            border-style: solid;
            border-color: #FFCC00 #ccc #ccc;
            border-radius: 100%;
            animation: rotation_contact_form .7s infinite linear;
        }
        @keyframes rotation_contact_form {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(359deg);
            }
        }
    </style>
@endpush

@section('main_content') 
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page_contact ? $page_contact->contact_title : 'Contact' }}</li>
        </ol>
    </nav>
</div>
<!-- Contact Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">{{ $page_contact ? $page_contact->contact_title : 'Contact' }}</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <div class="mb-4">
                        <div class="mb-4">
                            @if ($page_contact)
                                {!! $page_contact->contact_detail !!}
                            @endif
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-4 map">
                            @if ($page_contact)
                                {!! $page_contact->contact_map !!}
                            @endif
                        </div>
                    </div>
                    <h6 class="text-uppercase font-weight-bold mb-3">Contact Us</h6> 
                    <div id="message_form_contact"></div>
                    <div id="form_contact_loader" class="form_contact_spinner form_contact_loading"></div>
                    
                    <form method="POST" action="{{ route('contact_form_submit') }}" class="contact_form_ajax">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control p-4" name="name" value="{{ old('name') }}" placeholder="Your Name" />
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address *</label>
                                    <input type="email" class="form-control p-4" name="email" placeholder="Your Email" value="{{ old('email') }}" />
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea class="form-control" rows="4" name="message" placeholder="Message" >{{ old('message') }}</textarea>
                            <span class="text-danger error-text message_error"></span>
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact End -->
@endsection

@push('script')
    <script>
        (function($){
            $('.contact_form_ajax').on('submit', function(event){
                event.preventDefault();
                $('#form_contact_loader').show();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function(){
                        $(form).find('span.error-text').text('');
                        $('#message_form_contact').html('');
                    },
                    success: function(data){
                        $('#form_contact_loader').hide();
                        if(data.code == 0){
                            $.each(data.error_message, function(prefix, val){
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            })
                        }else if(data.code == 1){
                            $(form)[0].reset();
                            $('#message_form_contact').html('<div class="alert alert-success" role="alert">'+data.success_message+'</div>  ')
                        }else{
                            $(form)[0].reset();
                            $('#message_form_contact').html('<div class="alert alert-success" role="alert">'+data.success_message+'</div>  ')
                        }
                    }
                })
            })
        })(jQuery);
        
    </script>
@endpush
