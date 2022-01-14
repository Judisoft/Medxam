@if ($errors->any())
<div class="alert alert-danger alert-dismissable margin5">
  <strong>Please check the form below for errors</strong>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissable margin5">
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissable margin5">
     <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissable margin5">
     <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissable margin5">
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('msg'))
    <div class="alert alert-danger alert-dismissable margin5">
         <strong>{{ $message }}</strong>
    </div>
@endif