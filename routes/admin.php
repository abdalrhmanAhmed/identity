<?php

use App\Http\Controllers\admin\users\PermissionController;
use App\Http\Controllers\admin\users\RoleController;
use App\Http\Controllers\admin\users\RecordController;
use App\Http\Controllers\admin\users\userController;
use App\Http\Controllers\record\BankAcountsController;
use App\Http\Controllers\record\Birth_PlaceController;
use App\Http\Controllers\record\BloodTypeController;
use App\Http\Controllers\record\LocalesController;
use App\Http\Controllers\record\EducationController;
use App\Http\Controllers\record\ProfessionsController;
use App\Http\Controllers\record\ReligionsController;
use App\Http\Controllers\record\Social_situationController;
use App\Http\Controllers\record\StatesController;
use App\Http\Controllers\record\countryBirthController;
use App\Http\Controllers\record\BirthPlaceController;
use App\Http\Controllers\record\AdministrativeUnitsController;
use App\Http\Controllers\record\popularadminisController;
use App\Http\Controllers\record\BirthandController;
use App\Http\Controllers\record\TownController;
use App\Http\Controllers\record\ProfileController;
use App\Http\Controllers\record\CenterController;
use App\Http\Controllers\record\TicketController;
use App\Http\Controllers\record\ClientsController;
use App\Http\Controllers\record\FailedJobsController;
use App\Http\Controllers\record\HospetalController;
use App\Http\Controllers\record\BarthDatheController;
use App\Http\Controllers\WatcherController;
use App\Http\Controllers\admin\report\reportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Http\Controllers\ClientController;

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
Route::middleware([
    'auth'
])->group(function(){
    Route::name('admin.')->prefix('admin')->group(function(){
        Route::resource('roles',RoleController::class);
        Route::resource('record',RecordController::class);
        Route::resource('users',userController::class);
        Route::resource('permissions',PermissionController::class);
        Route::post('permissions/deleteAll', [PermissionController::class, 'deleteAll'])->name('deleteAll');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });

    ############################Settings routes###############################
    Route::controller(App\Http\Controllers\admin\users\SettingsController::class)->group(function(){
        Route::get('settings/dark_mode_on', 'dark_mode_on')->name('settings.dark_mode_on');
        Route::get('settings/dark_mode_off', 'dark_mode_off')->name('settings.dark_mode_off');
        Route::post('setting/changePassword/{id}', 'changePassword')->name('settings.changePassword');
    });

    Route::get('/{page}', [App\Http\Controllers\AdminController::class , 'index']);
});

Route::get('/', function () {
    return view('auth.login');
});



        Route::middleware([
            'auth'
        ])->group(function(){
            Route::prefix('record')->group(function(){

                // Route::resource('/record/banks/index', 'BankNameController@index' );
                Route::resource('/bankes', BankAcountsController::class);
                Route::resource('/birthPlace', BirthPlaceController::class);
                Route::resource('/town', TownController::class);
                Route::resource('/countryBirth', countryBirthController::class);
                Route::resource('/BloodType', BloodTypeController::class);
                Route::resource('/education', EducationController::class);
                Route::resource('/failed/jobs', FailedJobsController::class);
                Route::resource('/locales',LocalesController::class);
                Route::resource('/Profession',ProfessionsController::class);
                Route::resource('/Religions',ReligionsController::class);
                Route::resource('/Client',ClientsController::class);
                Route::get('/get_witness/{id}', [ClientController::class, 'get_witness'])->name('get_witness');
                Route::resource('/Social_situation',Social_situationController::class);
                Route::resource('/States',StatesController::class);
                Route::resource('/AdministrativeUnits',AdministrativeUnitsController::class);
                Route::resource('/popularAdministrations',popularadminisController::class);
                Route::resource('/Birthand',BirthandController::class );
                Route::resource('/profile',ProfileController::class );
                Route::resource('/center',CenterController::class );
                Route::resource('/tiket',TicketController::class );
                Route::get('barthindex',[BarthDatheController::class,'index'])->name('barthHome');
                Route::get('barthcreate',[BarthDatheController::class,'create'])->name('barthdetale');
                Route::get('barthinvoice',[BarthDatheController::class,'store'])->name('barthinvoice');
                Route::get('dathindex',[BarthDatheController::class,'indexd'])->name('dathindex');
                Route::get('dathcreate',[BarthDatheController::class,'created'])->name('dathcreate');
                Route::get('dathinvoice',[BarthDatheController::class,'stored'])->name('dathinvoice');
                Route::get('getLocal/{id}',[ProfileController::class,'getLocal'])->name('getLocal');
                Route::get('getCenter/{id}',[ProfileController::class,'getCenter'])->name('getCenter');
                Route::get('watcerIndex',[WatcherController::class,'index'])->name('watcerIndex');
                Route::post('watcerInvoice',[WatcherController::class,'invoice'])->name('watcerInvoice');
                Route::post('watcerComper',[WatcherController::class,'Comper'])->name('watcerComper');
                Route::post('dna',[ProfileController::class,'uploadDna'])->name('dna');
                Route::get('profile/data/{id}',[ClientsController::class,'index'])->name('profileData');
                Route::get('profile/dataEdit/{id}',[ClientsController::class,'dataEdit'])->name('profileDataEdit');
                Route::get('profile/getFatherName/{id}',[ClientsController::class,'getFatherName'])->name('getFatherName');
                Route::get('barthdoc',[HospetalController::class,'indexb'])->name('barthdoc');
                Route::post('barthcreate',[HospetalController::class,'store'])->name('barthcreate');
                Route::post('barthedit',[HospetalController::class,'edit'])->name('barthedit');
                Route::post('barthdelete',[HospetalController::class,'destroy'])->name('barthdelete');
                /**
                 * ==========================================================================
                 * =========================reports routes===================================
                 * ==========================================================================
                 */
                Route::controller(reportController::class)->group(function(){
                    Route::get('reports/contrys', 'contry')->name('reports.contrys');
                    Route::get('reports/agents', 'agents')->name('reports.agents');
                });
                

                Route::get('/qrcode',[App\Http\Controllers\qrcode\QrcodeController::class , 'index'])->name('qrcode');

        });
        });



Auth::routes();

