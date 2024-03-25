@extends('index')
@section('content')

<p>{{ $test->id }}</p>
<p>{{ $test->name }}</p>
<p>{{ $test->content }}</p>
<p>{{ $test->created_at }}</p>
<p>{{ $test-> updated_at}}</p>

@endsection