<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CumpleController;
use App\Models\Cumple;
use Illuminate\Support\Facades\Session;
use App\Mail\RegistroFiestaMail;
use Illuminate\Http\Request;

Route::get('/', HomeController::class);

Route::get('cumples',[CumpleController::class, 'index'])->name('cumples.index');
Route::get('cumple/registrar',[CumpleController::class, 'create'])->name('cumples.create');
Route::post('cumples', [CumpleController::class, 'store'])->name('cumples.store');

// Rutas de información (IMPORTANTE: Antes del {cumple})
Route::get('cumples/sitio', [CumpleController::class, 'sitio'])->name('cumples.sitio');
Route::get('cumples/vestimenta', [CumpleController::class, 'vestimenta'])->name('cumples.vestimenta');

Route::get('cumples/{cumple}',[CumpleController::class, 'show'])->name('cumples.show');
Route::get('cumples/{cumple}/edit',[CumpleController::class, 'edit'])->name('cumples.edit');
Route::put('cumples/{cumple}',[CumpleController::class, 'update'])->name('cumples.update');

// Login del admin
Route::get('/admin-login', function () {
    return view('cumples.admin-login');
})->name('cumples.admin.login');

Route::post('/admin-auth', function (Request $request) {
    if ($request->password === 'adminabp') {
        Session::put('admin_access', true);
        return redirect()->route('cumples.index');
    }
    return back()->with('error', 'Clave incorrecta');
})->name('cumples.admin.auth');

Route::get('/admin-logout', function () {
    Session::forget('admin_access'); 
    return redirect()->route('cumples.admin.login');
})->name('cumples.admin.logout');

Route::get('/preview-mail', function () {
    $cumple = Cumple::latest()->first(); 
    return new RegistroFiestaMail($cumple);
});