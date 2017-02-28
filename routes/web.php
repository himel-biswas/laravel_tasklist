
<?php

use App\Task;
use Illuminate\Http\Request;



Route::get('/', 'TasksController@create');

Route::post('task', 'TasksController@store');

Route::delete('task/{id}', 'TasksController@destroy');