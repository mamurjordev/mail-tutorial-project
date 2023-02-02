<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mailsetting;

use App\Http\Controllers\TestAttachementController;
use App\Http\Controllers\LanguageTranslationController;

use App\Http\Controllers\LangController;


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

Route::get('send-mail', [Mailsetting::class, 'Mailend']);



Route::get('send/mail', [TestAttachementController::class, 'send_mail'])->name('send_mail');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    /**
    * Verification Routes
    */
    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');

//only authenticated can access this group
Route::group(['middleware' => ['auth']], function() {
    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function() {
            /**
             * Dashboard Routes
             */
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    });
});

Route::get('languages', [LanguageTranslationController::class, 'index'])->name('languages');



Route::post('translations/update', [LanguageTranslationController::class, 'transUpdate'])->name('translation.update.json');
Route::post('translations/updateKey', [LanguageTranslationController::class, 'transUpdateKey'])->name('translation.update.json.key');



Route::delete('translations/destroy/{key}', [LanguageTranslationController::class, 'destroy'])->name('translations.destroy');

Route::post('translations/create', [LanguageTranslationController::class, 'store'])->name('translations.create');

Route::get('check-translation', function(){
	\App::setLocale('fr');
	
	dd(__('website'));
});

Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');