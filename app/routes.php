<?php

Route::get('/', function () {
    (new TasksController())->getIndex();
});
Route::get('/login', function () {
    (new AuthController())->getLogin();
});
Route::post('/login', function () {
    (new AuthController())->auth();
});
Route::post('/logout', function () {
    (new AuthController())->logout();
});
Route::get('/add', function () {
    (new TasksController())->getAdd();
});
Route::post('/add', function () {
    (new TasksController())->store();
});
Route::get('/edit', function () {
    (new TasksController())->getEdit();
});
Route::post('/edit', function () {
    (new TasksController())->update();
});

// Must be in the end of file
Route::handleOtherRoutes();
