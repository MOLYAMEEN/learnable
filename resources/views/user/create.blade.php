@extends('index')
@section('content')

{{$myvar}}

@if ($errors->any())
<div class ="alert alert-danger">
    <ul>
        @foreach($errors->all() as $errors)
             <li>{{ $errors }}</li>
        @endforeach
   </ul>
</div>
@endif 



<form action="{{ route('user.store') }}" method="post">
@csrf
<input type="text" placeholder="Name" name="name" value="{{  old('name') }}">

<hr/>
<lable for="show">Show Data</lable>
<input type="radio" name="show" value="1" id="show"/>
<hr/>
<lable for="show">Hide Data</lable>
<input type="radio" name="show" value="0" id="show"/>
<hr/>
<lable for="show">Status</lable>

<hr/>
<select name ="status">
    <option value="enable">Enable </option>
    <option value="disable">Disable </option>

</select>
<hr/>
<textarea name="content" placeholder="Content" >  </textarea>


<hr/>

    <input type="submit" value="create"/>
</form>

@endsection
@push('js')
<script>
          alert('you are create a new recorde now')
</script>

@endpush



@prepend('css')
<h5> I  h5 from create </h5>

@endprepend
  
@push('css')
<style>
    h1{ color:red;
    }
    
</style>
<h5> I  h4 from create </h5>

@endpush
