<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Projects List";
});

Route::get('/details', function () {
    return "Project details";
});

Route::get('/create', function () {
    return "Project created";
});

Route::get('/edit', function () {
    return "Project edited";
});

Route::get('/delete', function () {
    return "Project deleted";
});