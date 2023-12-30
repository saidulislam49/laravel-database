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

    $rooms = DB::table('rooms')->get();
    $rooms = DB::table('rooms')->where('price', 234)->get();
    $rooms = DB::table('rooms')->where('price', '>', 500)->get();
    $rooms = DB::table('rooms')->where([
        ['room_size', 2],
        ['price', '>', 500]
    ])->get();

    $rooms = DB::table('rooms')
        ->where('room_size', 2)
        ->orWhere('price', '>', 600)
        ->get();
    dump($rooms);

    $rooms = DB::table('rooms')
    ->where('price', 500)
    ->orWhere(function ($query) {
        $query->where('room_size', '>', 1)
        ->where('room_size', '<', 3);
    })->get();
    return view('welcome');
});