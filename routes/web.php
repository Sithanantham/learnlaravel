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
Route::get('/mobile-Computer-items', 'HomeController@mobilesAndComputers');
Route::get('{id}/buy-it', 'HomeController@buyIt');
Route::get('{id}/payment', 'HomeController@payment');

//Video Audio Image Upload
Route::get('/videoAudioImageUpload', 'HomeController@videoAudioImageUpload');

//Bio-Data
Route::get('/addBioData', 'BiodataController@addBioData')->name('addBioData');
Route::post('/saveBioData', 'BiodataController@saveBioData')->name('saveBioData');
Route::get('/showBioData', 'BiodataController@showBioData')->name('showBioData');
Route::get('/editBioData/{id}', 'BiodataController@editBioData')->name('editBioData');
Route::post('/updateBioData/{id}', 'BiodataController@updateBioData')->name('updateBioData');
Route::get('/deleteBioData/{id}', 'BiodataController@deleteBioData')->name('deleteBioData');


Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
//Product
Route::get('/admin', 'ProductController@product');
Route::get('/admin/product', 'ProductController@product');
Route::get('/admin/add-product', 'ProductController@addProduct');
Route::post('/admin/save-product', 'ProductController@saveProduct');
Route::get('/admin/view-product', 'ProductController@viewProduct');
Route::get('/admin/{id}/edit-product', 'ProductController@editProduct');
Route::post('/admin/{id}/update-product', 'ProductController@updateProduct');
Route::delete('/admin/{id}/delete-product', 'ProductController@deleteProduct');
//In project, Export data as Excel, CSV and PDF
Route::get('/admin/view-product/exportExcel/', 'ProductController@exportExcel')->name('exportExcel');
Route::get('/admin/view-product/exportCSV/', 'ProductController@exportCSV')->name('exportCSV');
Route::get('/admin/view-product/exportPDF/', 'ProductController@exportPDF')->name('exportPDF');

//Category
Route::get('/admin/add-category', 'ProductController@addCategory');
Route::post('/admin/save-category', 'ProductController@saveCategory');
Route::get('/admin/{id}/edit-category', 'ProductController@editCategory');
Route::post('/admin/{id}/update-category', 'ProductController@updateCategory');
Route::delete('/admin/{id}/delete-category', 'ProductController@deleteCategory');
//In Category, Export data as Excel, CSV and PDF
Route::get('/admin/add-category/exportCategoryASExcel', 'ProductController@exportCategoryASExcel')->name('exportCategoryASExcel');
Route::get('/admin/add-category/exportCategoryAsCSV', 'ProductController@exportCategoryAsCSV')->name('exportCategoryAsCSV');
Route::get('/admin/add-category/exportCategoryAsPDF', 'ProductController@exportCategoryAsPDF')->name('exportCategoryAsPDF');

//Customer
Route::get('/admin/customers', 'ProductController@customers');
//In Customer, Export data as Excel, CSV and PDF
Route::get('/admin/customers/exportcustomerASExcel', 'ProductController@exportcustomerASExcel')->name('exportcustomerASExcel');
Route::get('/admin/customers/exportcustomerAsCSV', 'ProductController@exportcustomerAsCSV')->name('exportcustomerAsCSV');
Route::get('/admin/customers/exportcustomerAsPDF', 'ProductController@exportcustomerAsPDF')->name('exportcustomerAsPDF');

//Admin
Route::get('/admin/add-admin', 'ProductController@addAdmin');
Route::get('/admin/view-admins', 'ProductController@viewAdmins');
//In Admin, Export data as Excel, CSV and PDF
Route::get('/admin/view-admins/exportAdminASExcel', 'ProductController@exportAdminASExcel')->name('exportAdminASExcel');
Route::get('/admin/view-admins/exportAdminAsCSV', 'ProductController@exportAdminAsCSV')->name('exportAdminAsCSV');
Route::get('/admin/view-admins/exportAdminAsPDF', 'ProductController@exportAdminAsPDF')->name('exportAdminAsPDF');

});


Auth::routes();

Route::get('/', 'HomeController@index');

//Route::get('/admin/product', 'ProductController@product');

/* Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@login');
Route::get('/admin/register', 'Admin\RegisterController@showRegisterForm')->name('showadmin.register');
Route::post('/save-admin/register', 'Admin\RegisterController@createRegister')->name('admin.register');
Route::post('/admin-pasordsword/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::post('/admin-passw/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
 */

//refresh captcha
Route::get('/refreshcaptcha', 'Auth\LoginController@refreshCaptcha');
/*
Route::get('/login', 'AgentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AgentAuth\LoginController@login');
  Route::post('/logout', 'AgentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AgentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AgentAuth\RegisterController@register');
 */
