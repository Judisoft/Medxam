@extends('layouts.app')
<style>
.btn-key{
    background-color: #016A7B;
    color: #fff;
    border: 2px solid #ccc;
    
}
</style>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="bg-top mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="p-2"><a href="{{route('home')}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i></a></div>
                            <div class="p-2"><a href="{{route('index.question')}}" class="btn btn-sm btn-success"><strong>View questions</strong></a></div>
                        </div>
                        @include('notifications')
                        <h1 class="bg-top text-center text-dark text-uppercase" style="font-weight:900;">Add Question</h1>
                    </div>
                    <form action="{{route('post.question')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-floating mb-3">
                            <select class="form-select"  name="subject">
                                <option selected value="">select subject</option>
                                <option value="biology">Biology</option>
                                <option value="chemistry">Chemisty</option>
                                <option value="physics">Physics</option>
                                <option value="general knowledge">General Knowledge</option>
                                <option value="french">French</option>
                                <option value="english">English</option>
                            </select>
                            <small class="text-danger">{{ $errors->first('subject', 'Select a subject') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter topic" name="topic" value="{{old('topic')}}">
                            <label for="floatingInput">Enter topic</label>
                            <small class="text-danger">{{ $errors->first('topic', 'Enter topic') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Enter exam year" name="exam_year" value="{{old('exam_year')}}"">
                            <label for="floatingInput">Enter exam year</label>
                            <small class="text-danger">{{ $errors->first('exam_year', 'Enter exam year') }}</small>
                        </div>
                        <div class="mb-3">
                            <label>Enter Content</label>
                            <textarea class="form-control" cols="8" id="editor1" rows="4" name="content" >{{old('content')}}</textarea>
                            <small class="text-danger">{{ $errors->first('content', 'Type the question body') }}</small>
                        </div>
                        <div class="mb-3">
                            <label>Enter option A</label>
                            <textarea type="text" class="form-control" id="editor2" name="A">{{old('A')}}</textarea>
                            <small class="text-danger">{{ $errors->first('A', 'Enter option A') }}</small>
                        </div>
                        <div class="mb-3">
                            <label>Enter option B</label>
                            <textarea type="text" class="form-control" id="editor3" name="B">{{old('B')}}</textarea>
                            <small class="text-danger">{{ $errors->first('B', 'Enter option B') }}</small>
                        </div>
                        <div class="mb-3">
                            <label>Enter option C</label>
                            <textarea type="text" class="form-control" id="editor4" name="C">{{old('C')}}</textarea>
                            <small class="text-danger">{{ $errors->first('C', 'Enter option C') }}</small>
                        </div>
                        <div class="mb-3">
                            <label>Enter option D</label>
                            <textarea type="text" class="form-control" id="editor5" name="D">{{old('D')}}</textarea>
                            <small class="text-danger">{{ $errors->first('D', 'Enter option D') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="answer">
                                <option selected value="">select the correct answer</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            <label for="floatingSelect">&nbsp;&nbsp;</label>
                            <small class="text-danger">{{ $errors->first('answer', 'Enter answer') }}</small>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload image</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                         <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-block btn-primary p-3" type="button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_scripts')
<script src="{{ asset('js/ckeditor.js') }}" type="text/javascript"></script>
@endsection
