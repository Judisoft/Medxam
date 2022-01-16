@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="d-flex justify-content-center">
                <div style="margin-top: 25%;">
                    <div class="jumbotron-fluid">
                        <h1 class="text-center">Welcome to Medxam Documentation</h1>
                        <div class="d-flex justify-content-center">
                            <div class="p-2">
                                <a href="{{URL::to('register')}}" class="btn btn-lg btn-success"><i class="fas fa-user"></i> Register</a>
                            </div>
                            <div class="p-2">
                                <a href="{{URL::to('login')}}" class="btn btn-lg btn-outline-success"><i class="fas fa-lock"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
