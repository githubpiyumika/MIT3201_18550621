@extends('layouts.app')

@section('content')
<div class="bg_color_2">
    <div class="container margin_60_35">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card  mb-5 mt-5">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body pb-5">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a
                            href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection