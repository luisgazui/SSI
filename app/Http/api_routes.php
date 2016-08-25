<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::resource('areasFisicas', 'AreasFisicasAPIController');

Route::resource('departamentosProses', 'DepartamentosProseAPIController');

Route::resource('perfilesProses', 'PerfilesProseAPIController');

Route::resource('metas', 'MetasAPIController');

Route::resource('paramedicos', 'ParamedicoAPIController');