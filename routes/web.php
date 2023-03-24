<?php

use Illuminate\Support\Facades\Route;

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
    if (session()->has('user'))
    {
        $sessions = \App\Models\Session::query()->where('user', session()->get('user'))->get();
        return view('data.view', compact('sessions'));
    }
    else
    {
        return redirect('login');
    }
});

Route::get('add-test', function () {
    if (isset($_REQUEST['user']))
    {
        $user = new \App\Models\Test();
        $user->name = $_REQUEST['user'];
        $user->save();
    }
});

Route::get('find', function () {
    if (isset($_REQUEST['user']))
    {
        $user = \App\Models\Member::query()->where('rfid', ($_REQUEST['user']))->where('active', 1)->first();
        return $user;
    }
});


Route::get('set', function () {
    if (isset($_REQUEST['user']))
    {
        $session = new \App\Models\Session();
        $session->user = $_REQUEST['user'];
        $session->time = $_REQUEST['time'];
        $session->distance = $_REQUEST['distance'];
        $session->save();
    }
});

Route::get('login', function () {
    return view('data.login');
});

Route::post('authenticate', function ()
{
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    if (\App\Models\Member::query()->where('username', $username)->exists())
    {
        $user = \App\Models\Member::query()->where('username', $username)->first();
        if ($password == $user->password)
        {
            session()->put('user', $user->id);
            return redirect('/');
        }
        session()->flash('error', "Invalid credentials");
        return back();
    }
    else
    {
        session()->flash('error', "Invalid credentials");
        return back();
    }
})->name('authenticate');

Route::get('logout', function ()
{
    if (session()->has('user'))
    {
        session()->remove('user');
    }
    return redirect('login');
})->name('logout');


