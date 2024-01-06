<?php

use App\Models\Comment;
use App\Models\Room;
use App\Models\User;
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

    // $rooms = Room::where('room_size','>',3)->get();
    // $rooms = Room::get(); //same as all()
    // $rooms = Room::all();

    $users = User::select('name','email')
            ->addSelect(['worst_rating' => Comment::select('rating')
            ->whereColumn('user_id','users.id')
            ->orderBy('rating','asc')
            ->limit(1)
            ])
            ->get()->toArray();
    dump($users);


    return view('welcome');
});
