<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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

Route::get('/', function () {
    return inertia('Home');
});


Route::get('/users', function () {
    // sleep(3);
    return inertia('Users', [
        'time' => now()->toTimeString(),
        'users' => User::query()
        ->when(Request::input('search'),function ($query,$search){
            $query->where('name','like', "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString()
        ->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,

        ]),
        'filters' =>Request::only(['search']),
        'users2' => User::select(['name'])->get()


    ]);
});


Route::get('/settings', function () {
    return inertia('Settings');
});


Route::post('/logout', function () {
    dd('login user out');
});
