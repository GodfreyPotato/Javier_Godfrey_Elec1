<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OpportunityController;
use Illuminate\Support\Facades\Route;

Route::get('/{select?}', [HomeController::class, "home"])->name("home");

//Customer
Route::get('Customer/NewCustomer', [CustomerController::class, "create"])->name('createCustomer');
Route::post('Customer/CreateNewCustomer', [CustomerController::class, "store"])->name('processCustomer');
Route::get('Customer/ViewCustomer/{id}', [CustomerController::class, "show"])->name("viewCustomer");
Route::get('Customer/EditCustomer/{id}', [CustomerController::class, "edit"])->name("editCustomer");
Route::post('Customer/UpdateCustomer/{id}', [CustomerController::class, "update"])->name("updateCustomer");
Route::get('Customer/DeleteCustomer/{id}', [CustomerController::class, "destroy"])->name("deleteCustomer");

//Activities
Route::get('Activity/Interact/{id?}', [ActivityController::class, "create"])->name('createInteraction');
Route::post('Activity/NewInteraction', [ActivityController::class, "store"])->name("processInteraction");
Route::get('Activity/Activities', [ActivityController::class, "index"])->name("showActivities");

//Opportunity
Route::get('Opportunity/ViewOpportunity/{id}', [OpportunityController::class, "index"])->name("viewOpportunity");
Route::get("Opportunity/EditOpportunity/{id}", [OpportunityController::class, "edit"])->name("editOpportunity");
Route::post('Opportunity/UpdateOpportunity/{id}', [OpportunityController::class, "update"])->name("updateOpportunity");
Route::get('Opportunity/deleteOpportunity/{id}', [OpportunityController::class, "destroy"])->name('deleteOpportunity');
Route::get('Opportunity/UpdateOpportunityStatus/{id}/{status}', [OpportunityController::class, "updateStatus"])->name("updateOpportunityStatus");

//Deal
Route::get('Deal/EditDeal/{id}', [DealController::class, "edit"])->name("editDeal");
Route::post("Deal/UpdateDeal/{id}", [DealController::class, "update"])->name("updateDeal");
Route::get("Deal/DeleteDeal/{id}", [DealController::class, "destroy"])->name("deleteDeal");
Route::get('Deal/UpdateDealStatus/{id}/{status}', [DealController::class, "updateStatus"])->name("updateDealStatus");
