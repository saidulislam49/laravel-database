<?php

use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
<<<<<<< HEAD
    $result = DB::table('users')->select()->get();
=======

    $result = DB::table('comments')->skip(3)->take(5)->get();
    $result = DB::table('comments')->offset(4)->limit(5)->get();

>>>>>>> 0ed456c28e98ff27633d18b8505e77ff696bace9
    dump($result);
    return view('welcome');
});
