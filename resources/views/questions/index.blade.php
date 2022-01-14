@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm">
            <div class="card">
                <div class="card-body" id="quest">
                    <div class="row bg-top mb-3">
                        <div class="col-sm">
                            <a class="btn btn-md btn-success">All <span class="badge">{{$questions->count()}}</span></a>
                        </div>
                        <div class="col-sm">
                            <a>Biology <span class="badge">{{$biology_questions->count()}}</span></a>
                        </div>
                        <div class="col-sm">
                            <a>Chemistry <span class="badge">{{$chemistry_questions->count()}}</span></a>
                        </div>
                        <div class="col-sm">
                            <a>Physics <span class="badge">{{$physics_questions->count()}}</span></a>
                        </div>
                        <div class="col-sm">
                            <a>Gen Know. <span class="badge">{{$general_knowledge_questions->count()}}</span></a>
                        </div>
                        <div class="col-sm">
                            <a>French <span class="badge">{{$french_questions->count()}}</span></a>
                        </div>
                        <div class="col-sm">
                            <a>English <span class="badge">{{$english_questions->count()}}</span></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <a href="{{route('post.question')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Question</a>
                        </div>
                        <div class="col-6">
                            <input id="myInput" type="text" placeholder="Enter keyword to search ...">
                        </div>
                        <div class="col">
                            <a href="{{route('download')}}" class="btn btn-success"><i class="fas fa-download"></i> Download json file</a>
                        </div>
                    </div>
                    <div class="table-responsive border">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Subject</td>
                                    <td>Content</td>
                                    <td>Exam Year</td>
                                    <td>Typed_by</td>
                                    <td>Created_at</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($questions as $question)
                                    <tr class="text-secondary small">
                                        <td>{{$question->id}}</td>
                                        <td class="text-capitalize">{{$question->subject}}</td>
                                        <td>{!! @substr( $question->content, 0 , 500) !!} </td>
                                        <td>{{$question->exam_year}}</td>
                                        <td class="text-capitalize">{{$question->typed_by}}</td>
                                        <td>{{$question->created_at}}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <div class="p-1"><a href="{{route('edit.question', $question)}}" class="btn btn-sm btn-info">Edit</a></div>
                                                <div class="p-1"><a href="#" class="btn btn-sm btn-danger">Delete</a></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection