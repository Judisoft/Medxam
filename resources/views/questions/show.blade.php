@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-8 col-lg-9">
            <div class="d-flex justify-content-between">
                <div class="p-2"><a href="{{route('index.question')}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i></a></div>
                <div class="p-2"><a href="{{route('post.question')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add a question</a></div>

            </div>
            <div class="d-flex justify-content-center">
                <div class="card card-body shadow mt-5">
                    <div class="p-3">
                        <h1 class="border-bottom border-top pt-3">{{'#'.$question->id}} &nbsp;{!! $question->content !!}</h1>
                        @if($question->image)
                            <img src="/storage/question_images/{{$question->image}}" class="img-fluid">
                        @endif
                        <div class="d-flex flex-column">
                            <div class="p-2 pt-4">
                                <ul class="list-group list-group-horizontal mb-2">
                                <li class="list-group-item bg-success text-light">A</li>
                                <li class="list-group-item">{!! $question->A !!}</li>
                                </ul>
                            </div>
                            <div class="p-2">
                                <ul class="list-group list-group-horizontal mb-2">
                                <li class="list-group-item bg-success text-light">B</li>
                                <li class="list-group-item">{!! $question->B !!}</li>
                                </ul>
                            </div>
                            <div class="p-2">
                                <ul class="list-group list-group-horizontal mb-2">
                                <li class="list-group-item bg-success text-light">C</li>
                                <li class="list-group-item">{!! $question->C !!}</li>
                                </ul>
                            </div>
                            <div class="p-2">
                                <ul class="list-group list-group-horizontal mb-2">
                                <li class="list-group-item bg-success text-light">D</li>
                                <li class="list-group-item">{!! $question->D !!}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
