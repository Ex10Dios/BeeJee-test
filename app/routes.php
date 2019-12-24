<?php

Route::get('/', function ($request) {
    (new TasksController())->getIndex($request);
});
Route::get('/login', function ($request) {
    (new AuthController())->getLogin($request);
});
Route::post('/login', function ($request) {
    (new AuthController())->auth($request);
});
Route::post('/logout', function ($request) {
    (new AuthController())->logout($request);
});
Route::get('/add', function ($request) {
    (new TasksController())->getAdd($request);
});
Route::post('/add', function ($request) {
    (new TasksController())->store($request);
});
Route::get('/edit', function ($request) {
    (new TasksController())->getEdit($request);
});
Route::post('/edit', function ($request) {
    (new TasksController())->update($request);
});

// Must be in the end of file
Route::handleOtherRoutes();
