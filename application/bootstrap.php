<?php
require_once 'core/config.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
session_start();
Route::start(); // запускаем маршрутизатор
?>