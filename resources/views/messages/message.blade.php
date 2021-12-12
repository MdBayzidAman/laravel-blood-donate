
 @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
     @endforeach
 @endif
 
@if(session()->has('success'))
    <div class="alert alert-success" style="color: green;font-weight: bold;">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-danger" style="color: red;font-weight: bold;">
        {{ session()->get('warning') }}
    </div>
@endif