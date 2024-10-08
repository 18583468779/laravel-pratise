<?php

use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// 使用 Laravel resource 方法定义用户资源路由
Route::resource('topic', TopicController::class)->except(['create', 'edit']);
