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

    $rooms = DB::table('rooms')->whereBetween('room_size', [3, 4])->get();
    $rooms = DB::table('rooms')->whereNotBetween('room_size', [1, 3])->get();

    $rooms = DB::table('rooms')->whereIn('id', [1, 2, 3])->get();
    $rooms = DB::table('rooms')->whereNotIn('id', [1, 2, 3])->get();

    $rooms = DB::table('rooms')->whereNull('room_size')->get();
    $rooms = DB::table('rooms')->whereNotNull('room_size')->get();

    $rooms = DB::table('rooms')->whereDate('created_at', '2023-11-30')->get();
    $rooms = DB::table('rooms')->whereDay('created_at', '28')->get();
    $rooms = DB::table('rooms')->whereMonth('created_at', '11')->get();
    $rooms = DB::table('rooms')->whereYear('created_at', '2023')->get();
    $rooms = DB::table('rooms')->whereTime('created_at', '14:23:56')->get();
    dump($rooms);
    return view('welcome');
});
