<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);


Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
 
    Route::resource('users', 'UsersController');
});
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
 
    Route::resource('profils', 'ProfilController');
});


//Produits
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/produit/add', 'ProduitController@add')->name('addproduit');
Route::get('/produit/edit/{id}', 'ProduitController@edit')->name('editproduit');
Route::post('/produit/update', 'ProduitController@update')->name('updateproduit');
Route::post('/produit/ajouter', 'ProduitController@ajouter')->name('ajouterproduit');
Route::get('/produit/delete/{id}', 'ProduitController@delete')->name('deleteproduit');
Route::get('/produit/getall', 'ProduitController@getAll')->name('getallproduit');

//Categories
Route::get('/categorie/add', 'CategorieController@add')->name('addcategorie');
Route::get('/categorie/edit/{id}', 'CategorieController@edit')->name('editcategorie');
Route::post('/categorie/update', 'CategorieController@update')->name('updatecategorie');
Route::post('/categorie/ajouter', 'CategorieController@ajouter')->name('ajoutercategorie');
Route::get('/categorie/delete/{id}', 'CategorieController@delete')->name('deletecategorie');
Route::get('/categorie/getall', 'CategorieController@getAll')->name('getallcategorie');

//Clientel
Route::get('/client/add', 'ClientsController@add')->name('addclient');
Route::post('/client/persist','ClientsController@persist')->name('persistclient');
Route::get('/client/{id}','ClientsController@edit')->name('editclient');
Route::post('/client/searchPost/','ClientsController@searchPost')->name('searchclient');
Route::get('/client/searchNom/{search}','ClientsController@index')->name('search');

//change password
Route::put('update-password','PasswordController@updatePassword')->name('update-password');
Route::get('set-password','PasswordController@setPassword')->name('set-password');
