<?php

// lista de modelos
Route::get('/modelsLists', 'Admin\AjaxController@modelsLists');
Route::get('/modelLists/{id?}', 'Admin\AjaxController@modelLists');
Route::get('/modelAvailables/{id?}', 'Admin\AjaxController@modelAvailables');
Route::get('/modelActualCost/{id?}', 'Admin\AjaxController@modelActualCost');


Route::get('/budgetsItems/{id}', 'Admin\AjaxController@budgetsItems');
Route::get('/salesWithItems/{id}', 'Admin\AjaxController@salesWithItems');

//buscar purchasesorders
Route::get('/purchasesOrdersFind/{id?}', 'Admin\PurchasesOrdersController@find');

//buscar purchasesorders x proveedor
Route::get('/purchasesOrdersByProviders/{id?}', 'Admin\PurchasesOrdersController@findByProviders');

//items
Route::get('/itemsByModels/{id?}', 'Admin\ItemsController@itemsByModels');
//items by adminr
Route::get('/items/findadminr/{nadminr?}', 'Admin\ItemsController@itemsByadminr');
//items by cuadro
Route::get('/items/findCuadro/{nCuadro?}', 'Admin\ItemsController@itemsByCuadro');

//dispathces add item
Route::get('/dispatches/addNew', 'Admin\DispatchesController@addItems');


//buscar presupuestos x clientes
Route::get('/budgetsByClients/{id?}', 'Admin\BudgetsController@findByClients');

//buscar clientes
Route::get('/clientsSearch/{id?}', 'Admin\ClientsController@show');


//dispatches items
Route::get('/dispatchesItems/{id?}', 'Admin\DispatchesController@findItems');

//Branches con stock de productos a vender
Route::get('/branchesWithStockByModels/', 'Admin\AjaxController@branchesWithStockByModels');

//Agregar adicionales a una entidad
Route::post('/addAdditionals/', 'Admin\AjaxController@addAdditionals');

//Eliminar adicionales a una entidad
Route::post('/removeAdditionals/', 'Admin\AjaxController@removeAdditionals');

// LOCATIONS
//buscar localidades
//Route::get('/clientsSearch/{id?}', 'Admin\ClientsController@show');

//Localidades por municipio y provincia
Route::get('/findLocalidades', 'Admin\AjaxController@findLocalidades');


//FinancialDues
Route::get('/findDues/{id?}','Admin\AjaxController@findDues');





   



