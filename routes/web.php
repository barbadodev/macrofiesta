<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CumpleController;
use App\Models\Cumple;
use Illuminate\Support\Facades\Session;

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

Route::get('/', HomeController::class);

Route::get('cumples',[CumpleController::class, 'index'])->name('cumples.index');

Route::get('cumple/registrar',[CumpleController::class, 'create'])->name('cumples.create');

Route::post('cumples', [CumpleController::class, 'store'])->name('cumples.store');

Route::get('cumples/{cumple}',[CumpleController::class, 'show'])->name('cumples.show');

Route::get('cumples/{cumple}/edit',[CumpleController::class, 'edit'])->name('cumples.edit');

Route::put('cumples/{cumple}',[CumpleController::class, 'update'])->name('cumples.update');





//login del admin
Route::get('/admin-login', function () {
    return view('cumples.admin-login');
})->name('cumples.admin.login');

//Clave
Route::post('/admin-auth', function (Illuminate\Http\Request $request) {
    if ($request->password === 'adminabp') { //CONTRASEÑA
        Session::put('admin_access', true);
        return redirect()->route('cumples.index');
    }
    return back()->with('error', 'Clave incorrecta');
})->name('cumples.admin.auth');

Route::get('/admin-logout', function () {
    Session::forget('admin_access'); // Borra el permiso
    return redirect()->route('cumples.admin.login');
})->name('cumples.admin.logout');












