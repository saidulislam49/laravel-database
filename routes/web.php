<?php

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
    $users = DB::table('users')->get();
    $users = DB::table('users')->select()->get();
    $users = DB::table('users')->pluck('email');
    $user = DB::table('users')->where('name', 'Lora Bradtke')->first();
    $user = DB::table('users')->where('name', 'Lora Bradtke')->first()->email;
    $user = DB::table('users')->where('name', 'Lora Bradtke')->value('email');
    $user = DB::table('users')->find(1);

    $comments = DB::table('comments')->select('content')->get();
    $comments = DB::table('comments')->select('content as comment_content')->get();

    $comments = DB::table('comments')->select('user_id')->get();
    $comments = DB::table('comments')->select('user_id')->distinct()->get();
    dump($comments);
    return view('welcome');
});
