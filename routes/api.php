<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pessoa'], function () {
    Route::get('/', 'PessoaController@index');
    Route::get('/{id}', 'PessoaController@show');
    Route::post('/store', 'PessoaController@store');
    Route::put('/update/{id}', 'PessoaController@update');
    Route::delete('/delete/{id}', 'PessoaController@destroy');
});
