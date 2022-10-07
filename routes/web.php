<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\AmenetyController;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ServiceProviderController;
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

Route::get('/',[FrontController::class,'index']);


Route::get('/properties-rent',[PropertiesController::class,'rent']);

Route::get('/properties-sell',[PropertiesController::class,'sell']);

Route::get('/properties-buy',[PropertiesController::class,'buy']);
Route::get('/properties-details/{id}',[PropertiesController::class,'propertiesDetails']);

Route::get('/sevice-provider',[PropertiesController::class,'buy']);



Route::get('/sevices',[PropertiesController::class,'buy']);
Route::get('/contact-us',[FrontController::class,'contact']);




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/admin',[DashboardController::class,'index']);
Route::prefix('admin')->middleware(['auth'])->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
    //manage_user/service...
    Route::get('/service-provider',[ServiceProviderController::class,'Show_Service_provider'])->name('service.provider');
    Route::post('/add-service-provider',[ServiceProviderController::class,'Add_Service_provider'])->name('add.service.provider');
    Route::get('/list-service-provider',[ServiceProviderController::class,'List_Service_provider'])->name('list.service.provider');
    Route::get('/edit-service-provider/{id}',[ServiceProviderController::class,'Edit_Service_provider'])->name('edit.service.provider');
    Route::post('/update-service-provider/{id}',[ServiceProviderController::class,'Update_Service_provider'])->name('update.service.provider');
    Route::get('/delete-service-provider/{id}',[ServiceProviderController::class,'Delete_Service_provider'])->name('delete.service.provider');
    Route::post('/changeStatus',[ServiceProviderController::class,'Change_service_provider_status']);
    //manage_user/admin
    Route::get('/admin-list',[AdminController::class,'admin_list'])->name('admin.list');
    Route::get('/admin-view',[AdminController::class,'admin_view'])->name('admin.view');
    Route::post('/admin-add',[AdminController::class,'admin_add'])->name('admin.add');
    Route::get('/admin-edit/{id}',[AdminController::class,'admin_edit'])->name('admin.edit');
    Route::post('/admin-update/{id}',[AdminController::class,'admin_update'])->name('admin.update');
    Route::get('/admin-delete/{id}',[AdminController::class,'admin_delete'])->name('admin.delete');
    Route::post('/admin-change-status',[AdminController::class,'admin_change_status'])->name('admin.change.status');

    //manage_user/builder
    Route::get('/builder-list',[BuilderController::class,'builder_list'])->name('builder.list');
    Route::get('/builder-view',[BuilderController::class,'builder_view'])->name('builder.view');
    Route::post('/builder-add',[BuilderController::class,'builder_add'])->name('builder.add');
    Route::get('/builder-edit/{id}',[BuilderController::class,'builder_edit'])->name('builder.edit');
    Route::post('/builder-update/{id}',[BuilderController::class,'builder_update'])->name('builder.update');
    Route::get('/builder-delete/{id}',[BuilderController::class,'builder_delete'])->name('builder.delete');
    Route::post('/builder-change-status',[BuilderController::class,'builder_change_status'])->name('builder.change.status');

    //manage_user/agent
    Route::get('/agent-list',[AgentController::class,'agent_list'])->name('agent.list');
    Route::get('/agent-view',[AgentController::class,'agent_view'])->name('agent.view');
    Route::post('/agent-add',[AgentController::class,'agent_add'])->name('agent.add');
    Route::get('/agent-edit/{id}',[AgentController::class,'agent_edit'])->name('agent.edit');
    Route::post('/agent-update/{id}',[AgentController::class,'agent_update'])->name('agent.update');
    Route::get('/agent-delete/{id}',[AgentController::class,'agent_delete'])->name('agent.delete');
    Route::post('/agent-change-status',[AgentController::class,'agent_change_status'])->name('agent.change.status');
    //manage_user/owner
    Route::get('/owner-list',[OwnerController::class,'owner_list'])->name('owner.list');
    Route::get('/owner-view',[OwnerController::class,'owner_view'])->name('owner.view');
    Route::post('/owner-add',[OwnerController::class,'owner_add'])->name('owner.add');
    Route::get('/owner-edit/{id}',[OwnerController::class,'owner_edit'])->name('owner.edit');
    Route::post('/owner-update/{id}',[OwnerController::class,'owner_update'])->name('owner.update');
    Route::get('/owner-delete/{id}',[OwnerController::class,'owner_delete'])->name('owner.delete');
    Route::post('/owner-change-status',[OwnerController::class,'owner_change_status'])->name('owner.change.status');

      //manage_user/customer
    Route::get('/customer-list',[customerController::class,'customer_list'])->name('customer.list');
    Route::get('/customer-view',[customerController::class,'customer_view'])->name('customer.view');
    Route::post('/customer-add',[customerController::class,'customer_add'])->name('customer.add');
    Route::get('/customer-edit/{id}',[customerController::class,'customer_edit'])->name('customer.edit');
    Route::post('/customer-update/{id}',[customerController::class,'customer_update'])->name('customer.update');
    Route::get('/customer-delete/{id}',[customerController::class,'customer_delete'])->name('customer.delete');
    Route::post('/customer-change-status',[customerController::class,'customer_change_status'])->name('customer.change.status');
     //setting/ameneties
     Route::get('/ameneties-list',[AmenetyController::class,'ameneties_list'])->name('ameneties.list');
     Route::get('/ameneties-view',[AmenetyController::class,'ameneties_view'])->name('ameneties.view');
     Route::post('/ameneties-add',[AmenetyController::class,'ameneties_add'])->name('ameneties.add');
     Route::get('/ameneties-edit/{id}',[AmenetyController::class,'ameneties_edit'])->name('ameneties.edit');
     Route::post('/ameneties-update/{id}',[AmenetyController::class,'ameneties_update'])->name('ameneties.update');
     Route::get('/ameneties-delete/{id}',[AmenetyController::class,'ameneties_delete'])->name('ameneties.delete');
     Route::post('/ameneties-change-status',[AmenetyController::class,'ameneties_change_status'])->name('ameneties.change.status');
      //setting/countries
      Route::get('/countries-list',[CountryController::class,'countries_list'])->name('countries.list');
      Route::get('/countries-view',[CountryController::class,'countries_view'])->name('countries.view');
      Route::post('/countries-add',[CountryController::class,'countries_add'])->name('countries.add');
      Route::get('/countries-edit/{id}',[CountryController::class,'countries_edit'])->name('countries.edit');
      Route::post('/countries-update/{id}',[CountryController::class,'countries_update'])->name('countries.update');
      Route::get('/countries-delete/{id}',[CountryController::class,'countries_delete'])->name('countries.delete');
      Route::post('/countries-change-status',[CountryController::class,'countries_change_status'])->name('countries.change.status');
        //setting/states
        Route::get('/states-list',[StateController::class,'states_list'])->name('states.list');
        Route::get('/states-view',[StateController::class,'states_view'])->name('states.view');
        Route::post('/states-add',[StateController::class,'states_add'])->name('states.add');
        Route::get('/states-edit/{id}',[StateController::class,'states_edit'])->name('states.edit');
        Route::post('/states-update/{id}',[StateController::class,'states_update'])->name('states.update');
        Route::get('/states-delete/{id}',[StateController::class,'states_delete'])->name('states.delete');
        Route::post('/states-change-status',[StateController::class,'states_change_status'])->name('states.change.status');
         //setting/cities
         Route::get('/cities-list',[CityController::class,'cities_list'])->name('cities.list');
         Route::get('/cities-view',[CityController::class,'cities_view'])->name('cities.view');
         Route::post('/cities-add',[CityController::class,'cities_add'])->name('cities.add');
         Route::get('/cities-edit/{id}',[CityController::class,'cities_edit'])->name('cities.edit');
         Route::post('/cities-update/{id}',[CityController::class,'cities_update'])->name('cities.update');
         Route::get('/cities-delete/{id}',[CityController::class,'cities_delete'])->name('cities.delete');
         Route::post('/cities-change-status',[CityController::class,'cities_change_status'])->name('cities.change.status');
});



require __DIR__.'/auth.php';
