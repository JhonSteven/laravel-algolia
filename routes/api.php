<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\User;
use App\Post;
use App\QuranText;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users',function(Request $request){
    return User::search($request->search)->query(function ($builder) {
        $builder->with('posts');
    })->get();
});

Route::get('quran',function(Request $request){
    return QuranText::search($request->search)->get();
});

Route::get('quran-mysql',function(Request $request){
    $quran = QuranText::where('text','like','%'.$request->search.'%')->get();
    return response()->json($quran, 200, [], JSON_UNESCAPED_UNICODE);
});