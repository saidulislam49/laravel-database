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
    // $pdo = DB::connection()->getPdo();
    // $user = $pdo->query('select * from users')->fetchAll();

    $result = DB::select('select * from users where id =? and name=?',[1, 'Mrs. Rosalind Marquardt I']);
    $result2 = DB::select('select * from users where id =:id',['id'=>1]);
    // DB::insert('insert into users(name, email, password) values(?, ?, ?)',['inserted name','inserted@gmail.com','123456']);
    $result3 = DB::table('users')->select()->get();
    dump($result3);
    return view('welcome');
});