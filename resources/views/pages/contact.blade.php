@extends('layouts.app')

@section('content')
    <h1 id="page_title">Say Hello!</h1>

    <div class="contact1">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @else
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img src="/images/img-01.png" alt="image">
            </div>

                <form class="contact1-form" action="contact" method="POST">
                    
                    {{ csrf_field() }}

                    <div class="wrap-input1 validate-input" data-validate = "Name is required">
                        <input class="input1" type="text" name="name" required placeholder="Name">
                        <span class="shadow-input1"></span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input1" type="text" name="email" required placeholder="Email">
                        <span class="shadow-input1"></span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate = "Message is required">
                        <textarea class="input1" name="message" placeholder="Message"></textarea>
                        <span class="shadow-input1"></span>
                    </div>

                    <div class="container-contact1-form-btn">
                        <button class="contact1-form-btn">
                            <span>
                                SEND EMAIL
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection