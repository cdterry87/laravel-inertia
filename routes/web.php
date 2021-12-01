<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return inertia('Home');
})->name('home');

Route::post('/login', [LoginController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::middleware('auth')->group(function() {
    Route::get('/users', function () {
        return inertia('Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->paginate(5)
                ->withQueryString()
                ->through(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user),
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class),
            ]
        ]);
    });
    
    Route::get('/users/create', function () {
        return inertia('Users/Create');
    })
    ->can('create', 'App\Models\User')
    ->name('users.create');
    
    Route::post('/users', function () {
        $user = User::create(Request::validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]));
    
        return redirect('/users');
    });
    
    Route::get('/settings', function () {
        return inertia('Settings');
    });

    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});
