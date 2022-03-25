<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerRequest;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User Settings
Route::get('/users/settings', [App\Http\Controllers\UserSettingController::class, 'edit'])->name('user.settings.edit');
Route::put('/users/settings', [App\Http\Controllers\UserSettingController::class, 'update'])->name('user.settings.update');
Route::get('/users/change-password', [App\Http\Controllers\UserSettingController::class, 'changePassword'])->name('user.settings.changePassword');
Route::post('/users/change-password', [App\Http\Controllers\UserSettingController::class, 'updatePassword'])->name('user.settings.updatePassword');

// Customer Request
Route::group(['middleware' => ['role:AM']], function() {
    Route::resource('customer', CustomerRequestController::class);
});

// BackroomTask
Route::group(['middleware' => ['permission:backroom']], function() {
    Route::get('/backroom/task', [App\Http\Controllers\BackroomTaskController::class, 'index'])->middleware('permission:backroom')->name('backroomtask.index');
    Route::get('/backroom/task/{status}/edit', [App\Http\Controllers\BackroomTaskController::class, 'edit'])->name('backroomtask.edit');
    Route::put('/backroom/task/{status}', [App\Http\Controllers\BackroomTaskController::class, 'update'])->name('backroomtask.update');
    
});

//Super Admin
Route::group(['middleware' => ['role:superAdmin']], function() {
    //User
    Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/admin/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

    //Admin Settings
    Route::get('/settings', [App\Http\Controllers\AdminSettingController::class, 'edit'])->name('admin.edit');
    Route::put('/settings', [App\Http\Controllers\AdminSettingController::class, 'update'])->name('admin.update');
    Route::get('/change-password', [App\Http\Controllers\AdminSettingController::class, 'changePassword'])->name('changePassword');
    Route::post('/change-password', [App\Http\Controllers\AdminSettingController::class, 'updatePassword'])->name('updatePassword');

    //Service
    Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/create', [App\Http\Controllers\ServiceController::class, 'store'])->name('service.store');
    Route::delete('/service/{service}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.destroy');
    Route::get('/service/{service}/edit', [App\Http\Controllers\ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/{service}', [App\Http\Controllers\ServiceController::class, 'update'])->name('service.update');

    //Backroom
    Route::get('/backroom', [App\Http\Controllers\BackroomController::class, 'index'])->name('backroom.index');
    Route::get('/backroom/create', [App\Http\Controllers\BackroomController::class, 'create'])->name('backroom.create');
    Route::post('/backroom/create', [App\Http\Controllers\BackroomController::class, 'store'])->name('backroom.store');
    Route::get('/backroom/{backroom}/edit', [App\Http\Controllers\BackroomController::class, 'edit'])->name('backroom.edit');
    Route::put('/backroom/{backroom}', [App\Http\Controllers\BackroomController::class, 'update'])->name('backroom.update');
    Route::delete('/backroom/{backroom}', [App\Http\Controllers\BackroomController::class, 'destroy'])->name('backroom.destroy');

    //Customer request for admin
    Route::get('admin/customer', function () {
        $customers = CustomerRequest::sortable()
        ->latest()
        ->filter(request(['search']))
        ->with('statuses')
        ->paginate(10);
        return view('admin.customer.index', compact('customers'));
    })->name('customer.admin');
});
Route::get('/markAllAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAllAsRead');

Route::get('/markAsRead/{id}', function ($id) {
    $notification = auth()->user()->notifications()->where('id', $id)->first();
    if ($notification) {
        $notification->markAsRead();
        return redirect('/backroom/task?search=' . $notification->data['businessKey']);
    }
    
})->name('markAsRead');
