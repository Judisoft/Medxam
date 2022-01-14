@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @include('notifications')
                    <h4 class="alert alert-primary text-center text-dark text-uppercase" style="font-weight:500;">Edit Question</h4>
                    <form action="{{route('edit.question', $question)}}" method="PUT" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="subject">
                                <option selected value="{{$question->subject}}">{{$question->subject}}</option>
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
                            <textarea class="form-control" cols="8" id="editor1" rows="4" placeholder="Type question here" id="floatingTextarea2" name="content" >{{$question->content}}</textarea>
                            <small class="text-danger">{{ $errors->first('content', 'Type the question body') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter topic" name="topic" value="{{$question->topic}}">
                            <label for="floatingInput">Enter topic</label>
                            <small class="text-danger">{{ $errors->first('topic', 'Enter topic') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Enter exam year" name="exam_year" value="{{$question->exam_year}}">
                            <label for="floatingInput">Enter exam year</label>
                            <small class="text-danger">{{ $errors->first('exam_year', 'Enter exam year') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="option A" name="A" value="{{$question->A}}">
                            <label for="floatingInput">Enter option A</label>
                            <small class="text-danger">{{ $errors->first('A', 'Enter option A') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="option B" name="B" value="{{$question->B}}">
                            <label for="floatingInput">Enter option B</label>
                            <small class="text-danger">{{ $errors->first('B', 'Enter option B') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="option C" name="C" value="{{$question->C}}">
                            <label for="floatingInput">Enter option C</label>
                            <small class="text-danger">{{ $errors->first('C', 'Enter option C') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="option D" name="D" value="{{$question->D}}">
                            <label for="floatingInput">Enter option D</label>
                            <small class="text-danger">{{ $errors->first('D', 'Enter option D') }}</small>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="answer">
                                <option selected value="{{$question->topic}}">{{$question->topic}}</option>
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
                            <input class="form-control" type="file" id="formFile" name="image" value="{{$question->image}}">
                        </div>
                         <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary" type="button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_scripts')
  <script>
    (function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.17.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('editor1', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 320,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)',
        removeButtons: 'PasteFromWord'
      });
    }());
  </script>
@endsection
