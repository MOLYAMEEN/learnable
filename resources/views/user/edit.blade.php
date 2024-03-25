@extends('index')
@section('content')

<form action="{{ route('user.update',['user'=>$test->id]) }}" method="post">
@csrf
@method('put')
    
    <input type="text" placeholder="Name" name="name" value="{{ $test-> name}}" >
<hr/>
<lable for="show">Show Data</lable>
<input type="radio" name="show" value="1" @checked( $test->show == 1 ) id="show"/>
<hr/>
<lable for="show">Hide Data</lable>
<input type="radio" name="show" value="0"  @checked($test->show == 0 )  id="show"/>
<hr/>
<lable for="show">Status</lable>

<hr/>
<select name ="status">
    <option @selected( $test->status == 'enable') value="enable" >Enable </option>
    <option @selected ($test->status == 'disable')  value="disable"  >Disable </option>

</select>
<hr/>
<textarea name="content" placeholder="Content">{{ $test->content }}</textarea>
<input type="submit" value="update"/>
    <input type="submit" value="create"/>
</form>

@endsection