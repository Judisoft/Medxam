@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="d-flex justify-content-center">
                <div class="p-3">
                    <a href="{{URL::to('questions/create')}}" class="btn btn-lg btn-success"><i class="fas fa-plus"></i> Add Question(s)</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
