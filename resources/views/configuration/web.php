<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\userController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\redirectController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\editionController;
use App\Http\Controllers\resetControler;





Route::get('/', function () {
    return view('auth/login');
});

//UTILISATEUR
//***************************************
Route::get('/users/edit/{id}', [userController::class, 'edit'])->name('edit')->middleware('isAdmin');
Route::get('/users/liste', [userController::class, 'index'])->name('liste')->middleware('isAdmin');
Route::get('/users/create', [userController::class, 'create'])->name('create')->middleware('isAdmin');
Route::get('/auth/redirect',[redirectController::class, 'redirect'])->name('redirect');
Route::get('/users/destroy/{id}', [userController::class, 'destroy'])->name('destroy');
Route::POST('/users/create_user', [userController::class, 'create_user'])->name('create_user');
Route::POST('/users/update/{id}', [userController::class, 'update'])->name('update');
Route::post('/users/Compteupdate/{id}',[userController::class, 'compteupdate'])->name('Compteupdate');
Route::get('/users/modifCompte/',[userController::class, 'show'])->name('modifCompte');
Route::get('/auth/erreur',[userController::class, 'erreur'])->name('erreur');
Route::fallback(function() { return view('auth.404'); });
					Route::get('home/verifEmail', [resetControler::class, 'verifEmail'])->name('verifEmail');
					Route::get('home/verifCode', [resetControler::class, 'verifCode'])->name('verifCode');
					Route::GET('home/editpassword', [resetControler::class, 'editpassword'])->name('editpassword');
					Route::POST('home/confirmEmail', [resetControler::class, 'confirmEmail'])->name('confirmEmail');
					Route::POST('home/confirmCode', [resetControler::class, 'confirmCode'])->name('confirmCode');
					Route::POST('home/confirmPassword', [resetControler::class, 'confirmPassword'])->name('confirmPassword');
					Route::get('/users/recherchePatient',[editionController::class, 'recherche'])->name('recherche');
					Route::POST('/users/indexpat',[editionController::class, 'indexpat'])->name('indexpat');
					Route::get('/users/modifPatient/{idPatient}',[editionController::class, 'modifPatient'])->name('modifPatient');
					Route::POST('/users/updatePatient/{idPatient}',[editionController::class, 'updatePatient'])->name('updatePatient');
//UTILISATEUR
//***************************************


// ALLERGIE
//***************************************
Route::get('/configuration/allergie', [ConfigController::class, 'allergie'])->name('allergie');
Route::POST('/confsiguration/create_allergie', [ConfigController::class, 'create_allergie'])->name('create_allergie');
Route::get('/configuration/delete_allergie/{id}',[ConfigController::class, 'delete_allergie'])->name('delete_allergie');
Route::get('/configuration/edit_allergie/{id}',[ConfigController::class, 'edit_allergie'])->name('edit_allergie');
Route::POST('/configuration/update_allergie/{id}',[ConfigController::class, 'update_allergie'])->name('update_allergie');
// ALLERGIE
//***************************************


// DEPARTEMENT
//***************************************
Route::get('/configuration/departement', [ConfigController::class, 'departement'])->name('departement');
Route::POST('/confsiguration/create_departement', [ConfigController::class, 'create_departement'])->name('create_departement');
Route::get('/configuration/delete_departement/{id}',[ConfigController::class, 'delete_departement'])->name('delete_departement');
Route::get('/configuration/edit_departement/{id}',[ConfigController::class, 'edit_departement'])->name('edit_departement');
Route::POST('/configuration/update_departement/{id}',[ConfigController::class, 'update_departement'])->name('update_departement');
// DEPARTEMENT
//***************************************


// Maladie
//***************************************
Route::get('/configuration/maladie', [ConfigController::class, 'maladie'])->name('maladie');
Route::POST('/confsiguration/create_maladie', [ConfigController::class, 'create_maladie'])->name('create_maladie');
Route::get('/configuration/delete_maladie/{id}',[ConfigController::class, 'delete_maladie'])->name('delete_maladie');
Route::get('/configuration/edit_maladie/{id}',[ConfigController::class, 'edit_maladie'])->name('edit_maladie');
Route::POST('/configuration/update_maladie/{id}',[ConfigController::class, 'update_maladie'])->name('update_maladie');

Route::get('/configuration/maladie/{limit}', [ConfigController::class, 'maladie_liste_data'])->name('maladie_liste_data');
// Maladie
//***************************************


// Categoriesignevitaux
//***************************************
Route::get('/configuration/categoriesignevitaux', [ConfigController::class, 'categoriesignevitaux'])->name('categoriesignevitaux');
Route::POST('/confsiguration/create_categoriesignevitaux', [ConfigController::class, 'create_categoriesignevitaux'])->name('create_categoriesignevitaux');
Route::get('/configuration/{id}',[ConfigController::class, 'delete_categoriesignevitaux'])->name('delete_categoriesignevitaux');
Route::get('/configuration/categoriesignevitaux_edit/{id}',[ConfigController::class, 'edit_categoriesignevitaux'])->name('edit_categoriesignevitaux');
Route::POST('/configuration/edition/{id}',[ConfigController::class, 'update_categoriesignevitaux'])->name('update_categoriesignevitaux');
// Categoriesignevitaux
//***************************************


// Medecin
//***************************************
Route::get('/medecin/medecin', [MedecinController::class, 'medecin'])->name('medecin');
Route::POST('/medecin/create_medecin', [MedecinController::class, 'create_medecin'])->name('create_medecin');
Route::get('/medecin/medecin_liste', [MedecinController::class, 'medecin_liste'])->name('medecin_liste');
Route::get('/medecin/medecin_liste/{limit}', [MedecinController::class, 'medecin_liste_data'])->name('medecin_liste_data');
Route::get('/medecin/medecin_details/{id}',[MedecinController::class, 'medecin_details'])->name('medecin_details');
Route::get('/medecin/modif_medecin/{id}',[MedecinController::class, 'modif_medecin'])->name('modif_medecin');
Route::POST('/medecin/updatemedecin/{idMedecin}',[MedecinController::class, 'updatemedecin'])->name('updatemedecin');
Route::get('/medecin/medecin_liste_search/{texte}', [MedecinController::class, 'medecin_liste_search'])->name('medecin_liste_search');
Route::get('/medecin/medecin_story/{limit},{id}', [MedecinController::class, 'medecin_story_data'])->name('medecin_story_data');

// Medecin
//***************************************


//accueil de configuration
//**************************************************
Route::get('/configuration/accueilConfig', [ConfigController::class, 'accueilConfig'])->name('accueilConfig');
// accueil de configuration
//**************************************************


//Specialité
//**************************************************
Route::get('/configuration/specialite', [ConfigController::class, 'specialite'])->name('specialite');
Route::post('/configuration/createSpecialite', [ConfigController::class, 'createSpecialite'])->name('create_specialite');
Route::get('/configuration/editSpecialite/{idSpecialite}', [ConfigController::class, 'editSpecialite'])->name('edit_specialite');
Route::post('/configuration/updateSpecialite/{idSpecialite}', [ConfigController::class, 'updateSpecialite'])->name('update_specialite');
Route::get('/configuration/deleteSpecialite/{idSpecialite}', [ConfigController::class, 'deleteSpecialite'])->name('delete_specialite');
// Specialité
//*************************************************

//Symptome
//*************************************************
Route::get('/configuration/symptome', [ConfigController::class, 'symptome'])->name('symptome');
Route::post('/configuration/createSymptome', [ConfigController::class, 'createSymptome'])->name('create_symptome');
Route::get('/configuration/editSymptome/{idSymptome}', [ConfigController::class, 'editSymptome'])->name('edit_symptome');
Route::post('/configuration/updateSymptome/{idSymptome}', [ConfigController::class, 'updateSymptome'])->name('update_symptome');
Route::get('/configuration/deleteSymptome/{idSymptome}', [ConfigController::class, 'deleteSymptome'])->name('delete_symptome');
// Symptome
//*************************************************

//Type examens
//*************************************************
Route::get('/configuration/examen', [ConfigController::class, 'examen'])->name('examen');
Route::post('/configuration/createExamen', [ConfigController::class, 'createExamen'])->name('create_examen');
Route::get('/configuration/editExamen/{idTypeExamens}', [ConfigController::class, 'editExamen'])->name('edit_examen');
Route::post('/configuration/updateExamen/{idTypeExamens}', [ConfigController::class, 'updateExamen'])->name('update_examen');
Route::get('/configuration/deleteExamen/{idTypeExamens}', [ConfigController::class, 'deleteExamen'])->name('delete_examen');
// Type examens
//*************************************************

//Type vaccination
//*************************************************
Route::get('/configuration/vaccination', [ConfigController::class, 'vaccination'])->name('vaccination');
Route::post('/configuration/createvaccination', [ConfigController::class, 'createvaccination'])->name('create_vaccination');
Route::get('/configuration/editvaccination/{idTypevaccination}', [ConfigController::class, 'editvaccination'])->name('edit_vaccination');
Route::post('/configuration/updatevaccination/{idTypevaccination}', [ConfigController::class, 'updatevaccination'])->name('update_vaccination');
Route::get('/configuration/deletevaccination/{idTypevaccination}', [ConfigController::class, 'deletevaccination'])->name('delete_vaccination');
Route::get('/home/layout', [HomeController::class, 'layout'])->name('layout');
// Type vaccination
//*************************************************



// Categoriesignevitaux
//***************************************
Route::get('/configuration/region', [ConfigController::class, 'region'])->name('region');
Route::POST('/configuration/create_region', [ConfigController::class, 'create_region'])->name('create_region');
Route::get('/configuration/supression/{id}',[ConfigController::class, 'delete_region'])->name('delete_region');
Route::get('/configuration/modifier/{id}',[ConfigController::class, 'edit_region'])->name('edit_region');
Route::POST('/configuration/edition/{id}',[ConfigController::class, 'update_region'])->name('update_region');
// Categoriesignevitaux
//***************************************


// Statistiques
//***************************************
Route::get('/home/statistic', [StatisticController::class, 'index'])->name('statistic');
// Statistiques
//***************************************


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');