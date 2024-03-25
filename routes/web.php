<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ExampleController;
/*enum Section:string
{
case Phone ='phone';
case Computer ='computer';
case Device ='device';
}*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
     
});*/
 
Route::get('/', function () {
    return view('index');
     
});




//user=>(r->Read)index Get | name:user.index
//user/{ID}=>(r->Read) Get | name:user.show
//user/create=>(c->create) Get | name:user.create
//user=>(c->create)POST | name:user.store
//user/{id}/edit=>(u->update)Get | name:user.edit
//user/{id}=>(u->update)PUT METHODE | name:user.update
//user/{id}=>(u->DELETE)delete METHODE | name:user.destory
Route::resource('user','ExampleController');

//مع تعريف الايادي الذ تم حذفه
Route::delete('user/force/delete/{user}',
'ExampleController@forceDelete')->name('user.forceDelete');

Route::post('user/restore/{user}',
'ExampleController@restore')->name('user.restore');

Route::get('user/create/{user}',
'ExampleController@create')->name('user.create');

Route::get('query/builder/get',function(){
    $posts =\DB::table('posts')->delete();
        return $posts;
});

Route::get('/', function () {
    return view('welcome');
     
});

Auth::routes(['verify'=>true]);//يستخدم في عمليه التحقق من الايميل

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('set/session',function ()//عشان تكون دائم معانا السيشون 
{
session(['test'=>['i am Test Value from session  ','value','value3']]);
 

});

Route::get('get/session',function ()//وهنا عشان نجيبالقيمه السيت الذي من الاوله
{
  session()->push('test.items','item1');//يعني ضيف لي قيمه جديده
if (session ()->exists('test'))
{
return session('test');
}
});

Route::get('send/demo',function (){//ارسال البريد الالكتروني بشكل افتراضي
   Mail::to('test@laravel.com')->send(new App\Mail\DemoMail);

});

