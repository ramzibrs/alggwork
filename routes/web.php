<?php

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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [App\Http\Controllers\frontend\CartController::class, 'viewcart']);
    Route::get('/delete-cart/{id}', [App\Http\Controllers\frontend\CartController::class, 'destroy']);
    Route::get('/checkout', [App\Http\Controllers\frontend\CheckoutController::class, 'index']);
    Route::post('/checkout-order', [App\Http\Controllers\frontend\CheckoutController::class, 'pay']);
    Route::get('/earn-money/{id}', [App\Http\Controllers\frontend\FrontendController::class, 'earn']);
    Route::put('/receveur/{id}', [App\Http\Controllers\frontend\FrontendController::class, 'role']);
    Route::put('/tresfert-money/{id}', [App\Http\Controllers\frontend\MoneyController::class, 'money']);

    Route::get('/cv', [App\Http\Controllers\employeur\CvController::class, 'index']);
    Route::get('/travaille', [App\Http\Controllers\employeur\CvController::class, 'travaille']);
    Route::get('/employeur', [App\Http\Controllers\employeur\CvController::class, 'employeur']);
    Route::get('/jobs', [App\Http\Controllers\employeur\CvController::class, 'jobs']);
    Route::post('/entrer-cv', [App\Http\Controllers\employeur\CvController::class, 'entrercv']);
    Route::post('/entrer-travaille', [App\Http\Controllers\employeur\CvController::class, 'entrertravaille']);
    Route::get('/empvue/{id}', [App\Http\Controllers\employeur\CvController::class, 'empvue']);
    Route::get('/jobview/{id}', [App\Http\Controllers\employeur\CvController::class, 'jobview']);
    Route::get('/trvcond/{id}', [App\Http\Controllers\employeur\CvController::class, 'trvcond']);
    Route::post('/entrer-candidature', [App\Http\Controllers\employeur\CvController::class, 'entrercandidature']);
    Route::get('/contcv/{id}', [App\Http\Controllers\employeur\CvController::class, 'contcv']);
    Route::get('/vcv', [App\Http\Controllers\employeur\CvController::class, 'vcv']);
    Route::get('/vtrv', [App\Http\Controllers\employeur\CvController::class, 'vtrv']);
    Route::get('/vcand', [App\Http\Controllers\employeur\CvController::class, 'vcand']);
    Route::get('/trvclist/{id}', [App\Http\Controllers\employeur\CvController::class, 'trvclist']);
    Route::get('/empvuec/{id1}/{id2}', [App\Http\Controllers\employeur\CvController::class, 'empvuec']);
    Route::get('/contcvc/{id}', [App\Http\Controllers\employeur\CvController::class, 'contcvc']);
    Route::get('/search', [App\Http\Controllers\employeur\CvController::class, 'search'])->name('search');
    Route::get('/searcho', [App\Http\Controllers\employeur\CvController::class, 'searcho'])->name('searcho');
    Route::get('/searchc/{id}', [App\Http\Controllers\employeur\CvController::class, 'searchc'])->name('searchc');
    Route::get('/modtrv/{id}', [App\Http\Controllers\employeur\CvController::class, 'modtrv']);
    Route::get('/suptrv/{id}', [App\Http\Controllers\employeur\CVController::class, 'suptrv']);
    Route::post('/misetrv/{id}', [App\Http\Controllers\employeur\CvController::class, 'misetrv']);
    Route::get('/suptrv/{id}', [App\Http\Controllers\employeur\CvController::class, 'suptrv']);
    Route::get('/modcv/{id}', [App\Http\Controllers\employeur\CvController::class, 'modcv']);
    Route::get('/supcv/{id}', [App\Http\Controllers\employeur\CVController::class, 'supcv']);
    Route::post('/misecv/{id}', [App\Http\Controllers\employeur\CvController::class, 'misecv']);
    Route::get('/modcand/{id1}/{id2}', [App\Http\Controllers\employeur\CvController::class, 'modcand']);
    Route::get('/supcand/{id}', [App\Http\Controllers\employeur\CVController::class, 'supcand']);
    Route::post('/misecand/{id}', [App\Http\Controllers\employeur\CvController::class, 'misecand']);
    Route::get('/projet', [App\Http\Controllers\employeur\CvController::class, 'projet']);
    Route::get('/annonce', [App\Http\Controllers\employeur\CvController::class, 'annonce']);
    Route::post('/entrer-projet', [App\Http\Controllers\employeur\CvController::class, 'entrerprojet']);
    Route::post('/entrer-annonce', [App\Http\Controllers\employeur\CvController::class, 'entrerannonce']);
    Route::get('/lsprojets', [App\Http\Controllers\employeur\CvController::class, 'lsprojets']);
    Route::get('/lsannonces', [App\Http\Controllers\employeur\CvController::class, 'lsannonces']);
    Route::get('/lsidée', [App\Http\Controllers\employeur\CvController::class, 'lsidée']);
    Route::get('/searchp', [App\Http\Controllers\employeur\CvController::class, 'searchp'])->name('searchp');
    Route::get('/projetview/{id}', [App\Http\Controllers\employeur\CvController::class, 'projetview']);

























    });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard', function () {
       return view('admin.layouts.dashboard');
    });

    Route::get('/parametres', [App\Http\Controllers\admin\AdminController::class, 'index']);
    Route::get('/wilaya', [App\Http\Controllers\admin\AdminController::class, 'wilaya']);
    Route::get('/addwilaya', [App\Http\Controllers\admin\AdminController::class, 'addwilaya']);
    Route::get('/offres', [App\Http\Controllers\admin\AdminController::class, 'offres']);
    Route::get('/cev', [App\Http\Controllers\admin\AdminController::class, 'cev']);
    Route::get('/suprimer_offre/{id}', [App\Http\Controllers\admin\AdminController::class, 'suprimer_offre']);
    Route::get('/suprimer_cv/{id}', [App\Http\Controllers\admin\AdminController::class, 'suprimer_cv']);
    Route::get('/suprimer_wilaya/{id}', [App\Http\Controllers\admin\AdminController::class, 'suprimer_wilaya']);
    Route::get('/modifier_wilaya/{id}', [App\Http\Controllers\admin\AdminController::class, 'modifier_wilaya']);
    Route::put('/mise_wilaya/{id}', [App\Http\Controllers\admin\AdminController::class, 'mise_wilaya']);
    Route::put('/approuver/{id}', [App\Http\Controllers\admin\AdminController::class, 'approuver']);
    Route::put('/approuvert/{id}', [App\Http\Controllers\admin\AdminController::class, 'approuvert']);
    Route::post('/entrer-wilaya', [App\Http\Controllers\admin\AdminController::class, 'entrerwilaya']);
    Route::get('/cand', [App\Http\Controllers\admin\AdminController::class, 'cand']);
    Route::put('/approuverr/{id}', [App\Http\Controllers\admin\AdminController::class, 'approuverr']);
    Route::get('/suprimer_can/{id}', [App\Http\Controllers\admin\AdminController::class, 'suprimer_can']);
    Route::get('/proj', [App\Http\Controllers\admin\AdminController::class, 'proj']);
    Route::put('/approuverp/{id}', [App\Http\Controllers\admin\AdminController::class, 'approuverp']);
    Route::get('/suprimer_proj/{id}', [App\Http\Controllers\admin\AdminController::class, 'suprimer_proj']);
    Route::put('/tendancea/{id}', [App\Http\Controllers\admin\AdminController::class, 'tendancea']);
    Route::put('/tendanced/{id}', [App\Http\Controllers\admin\AdminController::class, 'tendanced']);
    Route::get('/ann', [App\Http\Controllers\admin\AdminController::class, 'ann']);
    Route::put('/approuvera/{id}', [App\Http\Controllers\admin\AdminController::class, 'approuvera']);
    Route::get('/suprimer_ann/{id}', [App\Http\Controllers\admin\AdminController::class, 'suprimer_ann']);
    Route::put('/tendanceaa/{id}', [App\Http\Controllers\admin\AdminController::class, 'tendanceaa']);
    Route::put('/tendancead/{id}', [App\Http\Controllers\admin\AdminController::class, 'tendancead']);













});
