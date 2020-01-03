<?php

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

/* Route::get('/', function () {
    return view('welcome');
}); */

//Home
Route::get('/', 'HomeController@index');

//Bio-Data
Route::get('/addBioData', 'BiodataController@addBioData')->name('addBioData');
Route::post('/saveBioData', 'BiodataController@saveBioData')->name('saveBioData');
Route::get('/showBioData', 'BiodataController@showBioData')->name('showBioData');
Route::get('/editBioData/{id}', 'BiodataController@editBioData')->name('editBioData');
Route::post('/updateBioData/{id}', 'BiodataController@updateBioData')->name('updateBioData');
Route::get('/deleteBioData/{id}', 'BiodataController@deleteBioData')->name('deleteBioData');


//Product
Route::get('/admin', 'ProductController@product');
Route::get('/admin/product', 'ProductController@product');
Route::get('/admin/add-product', 'ProductController@addProduct');
Route::post('/admin/save-product', 'ProductController@saveProduct');
Route::get('/admin/view-product', 'ProductController@viewProduct');
Route::get('/admin/{id}/edit-product', 'ProductController@editProduct');
Route::post('/admin/{id}/update-product', 'ProductController@updateProduct');
Route::delete('/admin/{id}/delete-product', 'ProductController@deleteProduct');


//Category
Route::get('/admin/add-category', 'ProductController@addCategory');
Route::post('/admin/save-category', 'ProductController@saveCategory');
Route::get('/admin/{id}/edit-category', 'ProductController@editCategory');
Route::post('/admin/{id}/update-category', 'ProductController@updateCategory');
Route::delete('/admin/{id}/delete-category', 'ProductController@deleteCategory');


//Admin
Route::get('/admin/add-admin', 'ProductController@addAdmin');
Route::get('/admin/view-admins', 'ProductController@viewAdmins');


Auth::routes();

Route::get('/admin', 'ProductController@product');
