@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="d-flex justify-content-center">
                <div style="margin-top: 25%;">
                    <div class="jumbotron-fluid">
                        <h1 class="text-center">{{Auth::user()->name}} | Medxam Documentation</h1>
                        <div class="d-flex justify-content-center">
                            <div class="p-2">
                                <a href="{{route('index.question')}}" class="btn btn-lg btn-success"> View questions</a>
                            </div>
                            <div class="p-2">
                                <a href="{{route('post.question')}}" class="btn btn-lg btn-success"> Add Question(s)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
