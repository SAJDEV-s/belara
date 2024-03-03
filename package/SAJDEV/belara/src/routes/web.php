<?php
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    dd(config('belara.auth_id'));
});