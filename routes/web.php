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

    // $result = DB::table('reservations')
    //     ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
    //     ->join('users', 'reservations.user_id', 'users.id')
    //     ->where('user_id', '>', 2)
    //     ->where('room_id', '=', 3)
    //     ->get();

    // it is not working
    // $result = DB::table('reservations')
    //     ->join('rooms', function ($join) {
    //         $join->on('reservations.room_id', '=', 'rooms.id')
    //             ->where('room_id', '>', 3);
    //     })
    //     ->join('users', function ($join) {
    //         $join->on('reservations.user_id', '=', 'users.id')
    //             ->where('user_id', '>', 1);
    //     })
    //     ->get();

    // $rooms = DB::table('rooms')->where('id', '>', 3);
    // $users = DB::table('users')->where('id', '>', 1);
    // $result = DB::table('reservations')
    //     ->joinSub($rooms, 'rooms', function ($join) {
    //         $join->on('reservations.room_id', '=', 'rooms.id');
    //     })
    //     ->joinSub($users, 'users', function ($join) {
    //         $join->on('reservations.user_id', '=', 'users.id');
    //     })
    //     ->get();

    // $result = DB::table('rooms')
    //     ->leftJoin('reservations', 'rooms.id', '=', 'reservations.room_id')
    //     ->leftJoin('cities', 'reservations.city_id', '=', 'cities.id')
    //     ->selectRaw('room_size, price, cities.name, count(reservations.id) as reservations_count')
    //     ->groupBy('room_size', 'price', 'cities.name')
    //     ->orderByRaw('count(reservations.id) DESC')
    //     ->get();

    $result = DB::table('rooms')
        ->crossJoin('cities')
        ->leftJoin('reservations', function ($join) {
            $join->on('rooms.id', '=', 'reservations.room_id')
                ->on('cities.id', '=', 'reservations.city_id');
        })
        ->selectRaw('count(reservations.id) as reservations_count, cities.name')
        ->groupBy('cities.name')
        ->orderByRaw('count(reservations.id) DESC')
        ->get();



    dump($result);


    return view('welcome');
});