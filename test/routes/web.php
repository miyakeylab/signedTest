<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

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
    $url = URL::temporarySignedRoute(
    'unsubscribe', now()->addSeconds(5), ['user' => 1]);
    return view('welcome')->with('myUrl',$url);
});



Route::get('/unsubscribe/{user}', function (Request $request) {
    if (! $request->hasValidSignature()) {
        abort(403);
    }
    return view('safe');

    // ...
})->name('unsubscribe');