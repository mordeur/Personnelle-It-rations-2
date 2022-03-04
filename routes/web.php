<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controleur_site;

//Page de test et routes de test pour tous les collaborateurs
//Ces dernières peuvent tester leur routes sur leurs pages dédiées et tester les routes ici avant de les mettre definitevement dans le reste des routes

//test Valentin
Route::get('/valentin', function () {
    return view('PageTestValentin');
});

//test Adeline
Route::get('/adeline', function () {
    return view('PageTestAdeline');
});

//test Hugo
Route::get('/page-acueil-admin', function () {
    return view('PageTestHugo');
});
////////////////////////////////////////////////////////////////////////

//Exemple

//Formulaire inscription exemple
Route::get('/efi', 'InscriptionController@formulaire');

//Création utilisateur exemple
//Avec récupération des données du formulaire ci dessus
Route::post('/exemple_formulaire_inscription', 'InscriptionController@traitement');

//Liste utilisateurs exemple
//exemple_liste_users.blade.php --> Page test pour afficher la liste des utilisateurs
Route::get('/elu', 'UtilisateursController@listetest');

//Connexion exemple
Route::get('/', 'ConnexionController@formulaire');
Route::post('/connexion', 'acueil@redirection');

/* 
Valentin : Pas compris à quoi ça sert donc pour l'instant je le mets en commentaire jusqu'à une explication
Route::get('/',[Controleur_site::class,'accueil'])->name('accueil');
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

//Page de démarrage
//Route::get('/', function () {
//    return view('compte/connection');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/inscription','InscriptionController@formulaire');
Route::post('/register','InscriptionController@traitement');


Route::get('/mdpPerdu', function () {
    return view('Parking.compte.MdpPerdu');
});
Route::get('/confirm-Mdp', function () {
    return view('Parking.compte.Confirmations-Mdp');
});
Route::get('/confirm-Inscri', function () {
    return view('Parking.compte.Confirmations-Inscriptions');
});


Route::get('/page-acueil','acueil@redirection');
Route::post('/page-acueil','acueil@redirection');


Route::post('/reservation', 'Reservation@ReservationMiseEnPlace');
Route::get('/reservation', 'Reservation@retoure');


Route::post('/liste-attente', 'ListeAtt@ListeAttApp');
Route::get('/liste-attente', 'ListeAtt@retoure');


Route::post('/compte', 'Compte@CompteLoad');
Route::get('/compte', 'Compte@retoure');

Route::get('/reservation-admin', function () {
    return view('Parking.admin.Admin_Réservation');
});
Route::get('/liste-attente-admin', function () {
    return view('Parking.utilisateur.Liste_Att');
});

Route::get('/Compte-admin', function () {
    return view('Parking.Utilisateur_et_admin.Compte_Info');
});

Route::get('/Modifier-admin', function () {
    return view('Parking.admin.Admin_Modif');
});