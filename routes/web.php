<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("auth/login");
});

Route::get("/absensi", [
    App\Http\Controllers\AbsensiController::class,
    "index",
])->name("absensi");

Route::get("/absensi/test", [
    App\Http\Controllers\AbsensiController::class,
    "testAlert",
])->name("absensi.test");

Route::get("/absensi/search/{employee}", [
    App\Http\Controllers\AbsensiController::class,
    "searchEmp",
])->name("absensi.search");

Auth::routes();

Route::get("/home", [
    App\Http\Controllers\HomeController::class,
    "index",
])->name("home");

//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(["middleware" => "auth"], function () {
    // OOTB
    Route::get("/", [
        App\Http\Controllers\HomeController::class,
        "index",
    ])->name("home");

    Route::resource("user", "App\Http\Controllers\UserController", [
        "except" => ["show"],
    ]);

    Route::get("profile", [
        "as" => "profile.edit",
        "uses" => "App\Http\Controllers\ProfileController@edit",
    ]);

    Route::put("profile", [
        "as" => "profile.update",
        "uses" => "App\Http\Controllers\ProfileController@update",
    ]);

    Route::get("upgrade", function () {
        return view("pages.upgrade");
    })->name("upgrade");

    Route::get("map", function () {
        return view("pages.maps");
    })->name("map");

    Route::get("icons", function () {
        return view("pages.icons");
    })->name("icons");

    Route::get("table-list", function () {
        return view("pages.tables");
    })->name("table");

    Route::put("profile/password", [
        "as" => "profile.password",
        "uses" => "App\Http\Controllers\ProfileController@password",
    ]);

    Route::get("tables", function () {
        return view("pages.tables");
    });

    // Employee
    Route::get("kepegawaian", [
        "as" => "employee",
        "uses" => "App\Http\Controllers\EmployeeController@index",
    ]);

    Route::get("kepegawaian/tambah", [
        "as" => "employee.create",
        "uses" => "App\Http\Controllers\EmployeeController@create",
    ]);

    Route::get("kepegawaian/edit/{employee}", [
        "as" => "employee.edit",
        "uses" => "App\Http\Controllers\EmployeeController@edit",
    ]);

    // Employee # POST, PUT, DELETE
    Route::post("kepegawaian", [
        "as" => "employee.store",
        "uses" => "App\Http\Controllers\EmployeeController@store",
    ]);

    Route::put("kepegawaian/update/{employee}", [
        "as" => "employee.update",
        "uses" => "App\Http\Controllers\EmployeeController@update",
    ]);

    Route::delete("kepegawaian/delete/{employee}", [
        "as" => "employee.delete",
        "uses" => "App\Http\Controllers\EmployeeController@delete",
    ]);

    // Product
    Route::get("inventory", [
        "as" => "product",
        "uses" => "App\Http\Controllers\ProductController@index",
    ]);

    Route::get("inventory/tambah", [
        "as" => "product.create",
        "uses" => "App\Http\Controllers\ProductController@create",
    ]);

    Route::get("inventory/edit/{product}", [
        "as" => "product.edit",
        "uses" => "App\Http\Controllers\ProductController@edit",
    ]);

    // Sale
    Route::get("penjualan/surat-order", [
        "as" => "order",
        "uses" => "App\Http\Controllers\OrderLetterController@index",
    ]);

    Route::get("penjualan/surat-order/tambah", [
        "as" => "order.create",
        "uses" => "App\Http\Controllers\OrderLetterController@create",
    ]);

    Route::get("penjualan/surat-order/{order}", [
        "as" => "order.view",
        "uses" => "App\Http\Controllers\OrderLetterController@view",
    ]);

    Route::get("penjualan/surat-order/edit/{order}", [
        "as" => "order.edit",
        "uses" => "App\Http\Controllers\OrderLetterController@edit",
    ]);

    Route::get("penjualan/surat-order/tambah/kecamatan/{regency}", [
        "as" => "order.kecamatan",
        "uses" => "App\Http\Controllers\OrderLetterController@getKecamatan",
    ]);

    Route::get("penjualan/surat-order/tambah/desa/{subdistrict}", [
        "as" => "order.desa",
        "uses" => "App\Http\Controllers\OrderLetterController@getDesa",
    ]);

    Route::get("penjualan/surat-order/survey/{order}", [
        "as" => "order.survey",
        "uses" => "App\Http\Controllers\OrderLetterController@makeSurvey",
    ]);

    // Sale # POST, PUT, DELETE
    Route::post("penjualan/surat-order/tambah", [
        "as" => "order.store",
        "uses" => "App\Http\Controllers\OrderLetterController@store",
    ]);

    Route::put("penjualan/surat-order/update/{order}", [
        "as" => "order.update",
        "uses" => "App\Http\Controllers\OrderLetterController@update",
    ]);

    // Dump
});
