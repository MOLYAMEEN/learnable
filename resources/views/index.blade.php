

 @include('Layouts.header') 
 @includewhen(true,'Layouts.message') 
@yield('content')
 @include('Layouts.footer') 

{{$myvar}}
