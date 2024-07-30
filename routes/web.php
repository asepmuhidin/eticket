<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TictypeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\ItemProgressController;
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
    return view('auth/login');
}); 
Route::get('/pass',function(){
	print (Hash::make('12345'));
});


Auth::routes();
Route::get('send-email', [TicketController::class,'send'])->name('send-email');
Route::get('tickets/export/', [TicketController::class, 'export'])->name('tickets.export');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('reports', [ReportController::class, 'index'])->name('reports');
Route::put('/tickets/approval/{ticket}', [TicketController::class, 'approval'])->name('tickets.approval');
Route::get('/tickets/delegate/{ticket}', [TicketController::class, 'delegate'])->name('tickets.delegate');
Route::put('/tickets/delegate/{ticket}', [TicketController::class, 'delegated'])->name('tickets.delegated');
Route::get('/tickets/viewpproval/{ticket}', [TicketController::class, 'viewapproval'])->name('tickets.viewapproval');
Route::put('/tickets/pmapproval/{ticket}', [TicketController::class, 'pmapproval'])->name('tickets.pmapproval');
Route::put('/tickets/close/{ticket}', [TicketController::class, 'ticketClose'])->name('tickets.close');

Route::get('/tickets/progress/{ticket}', [TicketController::class, 'progress'])->name('tickets.status');
Route::put('/tickets/progress/{ticket}', [TicketController::class, 'changeProgress'])->name('tickets.progress');
Route::post('/tickets/fetchtype', [TicketController::class, 'fetchHouseType'])->name('tickets.fetchtype');
Route::put('/item_progress/{ticket}', [ItemProgressController::class, 'indexByTicket'])->name('item_progress.indexByTicket');
//Route::put('/tickets-progress/{ticket}', [ItemProgressController::class, 'create'])->name('tickets-progress.create');
Route::post('/reports/search', [ReportController::class, 'search'])->name('reports.search');
Route::get('/reports/export/', [ReportController::class, 'export'])->name('reports.export');
Route::resources([
    'permission'=>PermissionController::class,
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
    'levels' => LevelsController::class,
    'status'=>StatusController::class,
    'types'=>TictypeController::class,
    'tickets'=>TicketController::class,
    'setting'=>SettingController::class,
    'complains'=>ComplainController::class,
    'items'=>ItemController::class,
    'houses'=>HouseController::class,
    'clusters'=>ClusterController::class,
    'blocks'=>BlockController::class,
    'item_progress'=>ItemProgressController::class
]);