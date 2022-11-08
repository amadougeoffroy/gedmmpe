<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Middleware\CostumAuth;

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



Route::get('/connexion', [Home::class, 'connexion']);
Route::post('/login', [Home::class, 'login']);


Route::group(['middleware' => ['CostumAuth']], function () {

        
//ROUTE JOJO*/************************************** */
//Je travaille avec le controller HOME.PHP

    Route::get('/', [Home::class, 'home']);
    Route::get('/dashboard', [Home::class, 'home']);
    Route::get('/logout', [Home::class, 'deconnexion']);

    //gestion utilisateurs
    Route::get('/liste-utilisateurs/{page?}', [Home::class, 'liste_utilisateurs']);
    Route::get('/ajouter-utilisateur', [Home::class, 'ajouter_utilisateur']);
    Route::get('/modifier-utilisateur/{id}', [Home::class, 'ajouter_utilisateur']);
    Route::post('/save-utilisateur', [Home::class, 'save_utilisateur']);

    //***utilisateurs parametres */
    Route::get('/changer-photo-profil', [Home::class, 'photo_profil']);
    Route::post('/save-photo', [Home::class, 'save_photo']);
    Route::get('/modifier-informations', [Home::class, 'modifier_informations']);
    Route::post('/save-infos', [Home::class, 'save_infos']);
    Route::get('/modifier-mot-de-passe', [Home::class, 'modifier_password']);
    Route::post('/save-password', [Home::class, 'save_password']);
    Route::get('/notifications', [Home::class, 'notifications']);

    //supprimer une ligne de la bd
    Route::get('/suppression/{urlretour}/{table}/{id}', [Home::class, 'suppression_ligne']);





/******************FIN ROUTE JOJO***************************** */







//ROUTE WILLY*/************************************** */
//Tu travailles avec le controller HOME2.PHP

    //ICI//


/*******************FIN ROUTES WILLY*************************** */



});



