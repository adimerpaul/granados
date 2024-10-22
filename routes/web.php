<?php

use App\Http\Controllers\User\UserController;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Work\WorkController;
use App\Http\Controllers\Work\RequirementController;
use App\Http\Controllers\Work\InventoryController;
use App\Http\Controllers\Work\Warehouse\WarehouseController;


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
    return redirect()->route('login');
});

Auth::routes();

Route::namespace('Management')->prefix('managements')->middleware('auth')->group(function(){


    Route::get('/dashboard', 'ManagementController@dashboard')->name('managements.dashboard');
    

    Route::prefix('works')->group(function(){

        Route::get('/index', 'WorkController@index')->name('managements.works.index');
        Route::post('/store', 'WorkController@store')->name('managaments.works.store');
        Route::put('/{work}/update', 'WorkController@update')->name('managaments.works.update');
        Route::delete('/{work}/destroy', 'WorkController@destroy')->name('managements.works.destroy');

    });

    Route::namespace('Requirement')->prefix('requirements')->group(function(){

        Route::get('/index', 'RequirementController@index')->name('managements.requirements.index');
        Route::get('/requirements/purchase', 'RequirementController@purchaseRequirements')->name('managements.purchaseRequirements');
        Route::get('/{requirementId}/show', 'RequirementController@show')->name('management.showRequirement');
        Route::get('/{requirementId}/approve', 'RequirementController@approve')->name('management.requirement.approve');
        Route::get('/{requirementId}/disapprove', 'RequirementController@disapprove')->name('management.requirement.disapprove');
        Route::post('/{requirementId}/requiredProducts/{requiredProductId}/observation/create', 'RequirementController@addObservationRequiredProduct')->name('managements.addObservationRequiredProduct');

    });

    // User

    Route::prefix('users')->group(function(){

        Route::get('/index', 'UserController@Index')->name('managements.users.index');
        Route::get('/create', 'UserController@create')->name('managements.users.create');
        Route::post('/store', 'UserController@store')->name('managements.users.store');
        Route::get('/{user}/edit', 'UserController@edit')->name('managements.users.edit');
        Route::put('/{user}/update', 'UserController@update')->name('managements.users.update');
        Route::delete('/{user}/destroy', 'UserController@destroy')->name('managements.users.destroy');

    });


    // Inventory

    Route::namespace('Inventory')->prefix('inventories')->group(function(){

        Route::get('/index', 'InventoryController@index')->name('managements.inventories.index');
        Route::get('/works/{work}/inventory', 'InventoryController@show')->name('managements.inventories.show');
        
    });

    // Monitoring Internal Requirements

    Route::namespace('MonitoringInternalRequirement')->prefix('monitoringInternalRequirements')->group(function(){

        Route::get('/index', 'MonitoringInternalRequirementController@index')->name('managements.monitoringInternalRequirements.index');
        Route::get('/{internalRequirement}/show', 'MonitoringInternalRequirementController@show')->name('managements.monitoringInternalRequirements.show');
        
    });

});

Route::namespace('Logistics')->prefix('logistics')->group(function(){

    Route::get('/', 'LogisticsController@dashboard')->name('logistics.dashboard');

    Route::namespace('Requirement')->prefix('requirements')->group(function()
    {

        Route::get('/index', 'RequirementController@index')->name('workRequirements.index');
        Route::get('/{requirementId}', 'RequirementController@show')->name('workRequirements.show');

        Route::get('/{requirement}/status/update', 'RequirementController@updateStatus')->name('workRequirement.status.update');

        Route::post('/{requirementId}/inventory/{inventoryId}/product/{productId}/dispatch', 'DispatchRequirementController@productDispatch')->name('requirements.productDispatch');
        Route::delete('/dispatchRequirement/{dispatchRequirement}/destroy', 'DispatchRequirementController@destroy')->name('requirements.dispatchRequirement.destroy');
        
        Route::post('/{requirementId}/purchaseRequirement/{requiredProduct}', 'PurchaseRequirementController@productPurchase')->name('requirements.productPurchase');
        Route::delete('/purchaseRequirement/{purchaseRequirement}/destroy', 'PurchaseRequirementController@destroy')->name('requirements.purchaseRequirement.destroy');

    });

    Route::namespace('Supplier')->prefix('suppliers')->group(function()
    {
        Route::get('/', 'SupplierController@index')->name('logisticts.suppliers.index');
        Route::post('/store', 'SupplierController@store')->name('logistics.suppliers.store');
        Route::put('/{supplier}/update', 'SupplierController@update')->name('logistics.suppliers.update');
        Route::delete('/{supplier}/destroy', 'SupplierController@destroy')->name('logistics.suppliers.destroy');
    });

    Route::namespace('PurchaseOrder')->prefix('purchaseOrders')->group(function(){

        Route::get('/index', 'PurchaseOrderController@index')->name('logistics.purchaseOrders.index');
        Route::get('/{purchaseOrder}/show', 'PurchaseOrderController@show')->name('logistics.purchaseOrders.show');
        
        Route::put('/requirements/{requirement}/purchaseOrders/{purchaseRequirement}/updateAmount', 'PurchaseOrderController@updateAmount')->name('logistics.purchaseOrders.udpateAmount');
        Route::post('/requirements/{requirement}/purchaseOrders/{purchaseRequirement}/dispatchWarehouse', 'PurchaseOrderController@dispatchWarehouse')->name('logistics.purchaseOrders.dispatchWarehouse');
            
    });

    Route::namespace('DispatchOrder')->prefix('dispatchOrders')->group(function(){

        Route::get('/index', 'DispatchOrderController@index')->name('logistics.dispatchOrders.index');
        Route::get('/requirements/{requirement}/dispatchOrders/show', 'DispatchOrderController@show')->name('logistics.dispatchOrders.show');

    });

    Route::namespace('Inventory')->prefix('inventories')->group(function(){

        Route::get('/index', 'InventoryController@index')->name('logistics.inventories.index');
        
    });

});


Route::namespace('Work')->prefix('work/{work}')->middleware('auth')->group(function () {

    Route::get('/dashboard', 'WorkController@dashboard')->name('works.dashboard');

    Route::namespace('Requirement')->prefix('requirements')->group(function(){


        Route::namespace('RequiredProduct')->prefix('requiredProducts')->group(function(){

            Route::post('/{requiredProductId}/store', 'RequiredProductController@store')->name('requiredProducts.store');
            Route::delete('/{requiredProduct}/destroy', 'RequiredProductController@destroy')->name('requiredProducts.destroy');

            Route::delete('/{requiredProductId}/status/delete', 'RequiredProductController@destroyRequiredProductStatus')->name('works.destroyRequiredProductStatus');
            Route::post('/{requiredProductId}/status/edit', 'RequiredProductController@editRequiredProductStatus')->name('works.editRequiredProductStatus');

        });

        Route::get('/', 'RequirementController@requirements')->name('works.requirements');
        Route::post('/{requirementId}/send', 'RequirementController@send')->name('works.requirements.send');
        Route::get('/status', 'RequirementController@status')->name('works.requirements.status');
        Route::get('/{requirementId}/show', 'RequirementController@showRequirement')->name('works.showRequirement');
        Route::post('/{requirementId}/forwarding', 'RequirementController@sendRequirementsForwarding')->name('works.sendRequirementsForwarding');


        Route::namespace('Product')->prefix('products')->group(function(){

            Route::post('/create', 'ProductController@create')->name('works.requirements.products.create');

        });
        
    });

    Route::namespace('Warehouse')->prefix('warehouses')->group(function (){

        Route::get('/index','WarehouseController@index')->name('works.warehouses.index');

        Route::prefix('internalRequirements')->group(function(){

            Route::get('/index', 'InternalRequirementController@index')->name('works.warehouses.internalRequirements.index');
            Route::get('/{internalRequirement}/show', 'InternalRequirementController@show')->name('works.warehouses.internalRequirements.show');
            Route::post('/internalRequiredProduct/{internalRequiredProduct}/dispatch','InternalRequirementController@productDispatch')->name('works.warehouses.internalRequirements.internalRequiredProduct.productDispatch');

        });

        Route::prefix('dispatchs')->group(function(){

            Route::get('/index', 'DispatchController@index')->name('works.warehouses.dispatchs.index');
            Route::get('/requirement/{requirementId}', 'DispatchController@showRequirement')->name('works.warehouses.dispatchs.showRequirement');
            Route::post('/requirements/{requirement}/purchaseRequirement/{purchaseRequirement}/addStock', 'DispatchController@addStock')->name('works.warehouses.dispatchs.addStock');

        });

        Route::prefix('dispatchOrders')->group(function(){

            Route::get('/index','DispatchOrderController@index')->name('works.warehouses.dispatchOrders.index');
            Route::get('/requirements/{requirement}/dispatchOrders/show', 'DispatchOrderController@show')->name('works.warehouses.dispatchOrders.show');
            Route::post('/requirements/{requirement}/dispatchOrders/{dispatchRequirement}/status', 'DispatchOrderController@status')->name('works.warehouses.dispatchOrders.status');

        });

        Route::prefix('exitProductWarehouse')->group(function(){

            Route::get('/index', 'ExitProductWarehouseController@index')->name('works.warehosues.exitProductWarehouse.index');

        });

        Route::prefix('entryProductWarehouse')->group(function(){

            Route::get('/index', 'EntryProductWarehouseController@index')->name('works.warehosues.entryProductWarehouse.index');

        });

        

    });

    Route::namespace('InternalRequirement')->prefix('internalRequirements')->group(function (){

        Route::get('/index', 'InternalRequirementController@index')->name('works.internalRequirements.index');
        Route::get('/create', 'InternalRequirementController@create')->name('works.internalRequirements.create');
        Route::get('/internalRequirements/{internalRequirement}/show', 'InternalRequirementController@show')->name('works.internalRequirements.show');
        Route::post('/requiredProduct/{product}/store', 'InternalRequirementController@store')->name('works.internalRequirement.requiredProduct.store');
        Route::delete('/internalRequiredProduct/{internalRequiredProduct}/destroy', 'InternalRequirementController@destroy')->name('works.internalRequirements.internalRequiredProduct.destroy');
        Route::post('/{internalRequirement}/send', 'InternalRequirementController@send')->name('works.internalRequirements.send');
        

    });

    Route::get('/inventory', 'InventoryController@index')->name('works.inventory.index');
    Route::post('/inventory/storeProduct', 'InventoryController@storeProduct')->name('works.inventory.storeProduct');
    
});








