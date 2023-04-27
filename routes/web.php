<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\resetControler;
use App\Http\Controllers\userController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\consultationsController;
use App\Http\Controllers\editionController;
use App\Http\Controllers\examensController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\redirectController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\prescriptionsController;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
	$users= DB::select("select * from users where privilege='admin' ");
	if(empty($users)) {
		return view('home/userAdmin');
	} else {
		return view('auth/login');
	}   
})->name('login');

Route::POST('/home/createuserAdmin', [resetControler::class, 'createuserAdmin'])->name('createuserAdmin');
Route::get('home/userAdmin', [resetControler::class, 'userAdmin'])->name('userAdmin');

//UTILISATEUR
//***************************************
Route::get('/users/edit/{id}', [userController::class, 'edit'])->name('edit')->middleware('isAdmin');

Route::get('/users/gestion', [userController::class, 'index'])->name('create')->middleware('isAdmin');
Route::get('/users/liste', [userController::class, 'liste'])->name('liste_utilisateurs')->middleware('isAdmin');
Route::POST('/users/create_user', [userController::class, 'create_user'])->name('create_user');
Route::get('/users/destroy/{id}', [userController::class, 'destroy'])->name('destroy');
Route::get('/users/modifCompte', [userController::class, 'show'])->name('modifCompte');
Route::POST('/users/update/{id}', [userController::class, 'update'])->name('update');
Route::get('/users/desactiver/{id}', [userController::class, 'desactive'])->name('desactiveUser');
Route::get('/users/activer/{id}', [userController::class, 'active'])->name('activeUser');



Route::get('/auth/redirect', [redirectController::class, 'redirect'])->name('redirect');
Route::post('/users/Compteupdate/{id}', [userController::class, 'compteupdate'])->name('Compteupdate');
Route::post('/users/updateimage/{id}', [userController::class, 'updateimage'])->name('updateimage');

Route::get('/auth/erreur', [userController::class, 'erreur'])->name('erreur');
Route::fallback(function () {
	return view('auth.404');
});
Route::get('home/verifEmail', [resetControler::class, 'verifEmail'])->name('verifEmail');
Route::get('home/verifCode', [resetControler::class, 'verifCode'])->name('verifCode');
Route::GET('home/editpassword', [resetControler::class, 'editpassword'])->name('editpassword');
Route::POST('home/confirmEmail', [resetControler::class, 'confirmEmail'])->name('confirmEmail');
Route::POST('home/confirmCode', [resetControler::class, 'confirmCode'])->name('confirmCode');
Route::POST('home/confirmPassword', [resetControler::class, 'confirmPassword'])->name('confirmPassword');
Route::get('/users/recherchePatient', [editionController::class, 'recherche'])->name('recherche');
Route::POST('/users/indexpat', [editionController::class, 'indexpat'])->name('indexpat');
Route::get('/users/modifPatient/{idPatient}', [editionController::class, 'modifPatient'])->name('modifPatient');
Route::POST('/users/updatePatient/{idPatient}', [editionController::class, 'updatePatient'])->name('updatePatient');

Route::get('/users/help', [resetControler::class, 'help'])->name('help');
Route::get('/users/listeMaladie', [resetControler::class, 'listeMaladie'])->name('listeMaladie');
Route::get('/users/listeSymptome', [resetControler::class, 'listeSymptome'])->name('listeSymptome');



//UTILISATEUR
//***************************************


// ALLERGIE
//***************************************
Route::get('/configuration/allergie', [ConfigController::class, 'allergie'])->name('allergie');
Route::POST('/confsiguration/create_allergie', [ConfigController::class, 'create_allergie'])->name('create_allergie');
Route::get('/configuration/edit_allergie/{idAllergie}', [ConfigController::class, 'edit_allergie'])->name('edit_allergie');
Route::POST('/configuration/update_allergie', [ConfigController::class, 'update_allergie'])->name('update_allergie');
// ALLERGIE
//***************************************


// DEPARTEMENT
//***************************************
Route::get('/configuration/departement', [ConfigController::class, 'departement'])->name('departement');
Route::POST('/confsiguration/create_departement', [ConfigController::class, 'create_departement'])->name('create_departement');
Route::get('/configuration/edit_departement/{idDepartement}', [ConfigController::class, 'edit_departement'])->name('edit_departement');
Route::POST('/configuration/update_departement', [ConfigController::class, 'update_departement'])->name('update_departement');
// DEPARTEMENT
//***************************************


// Maladie
//***************************************
Route::get('/configuration/maladie', [ConfigController::class, 'maladie'])->name('maladie');
Route::POST('/confsiguration/create_maladie', [ConfigController::class, 'create_maladie'])->name('create_maladie');
Route::get('/configuration/edit_maladie/{idMaladie}', [ConfigController::class, 'edit_maladie'])->name('edit_maladie');
Route::POST('/configuration/update_maladie', [ConfigController::class, 'update_maladie'])->name('update_maladie');

// Maladie
//***************************************

// Vice
//***************************************
Route::get('/configuration/vice', [ConfigController::class, 'vice'])->name('vice');
Route::POST('/confsiguration/create_vice', [ConfigController::class, 'create_vice'])->name('create_vice');
Route::get('/configuration/edit_vice/{idVice}', [ConfigController::class, 'edit_vice'])->name('edit_vice');
Route::POST('/configuration/update_vice', [ConfigController::class, 'update_vice'])->name('update_vice');

// Vice
//***************************************


// Categoriesignevitaux
//***************************************
Route::get('/configuration/categoriesignevitaux', [ConfigController::class, 'categoriesignevitaux'])->name('categoriesignevitaux');
Route::POST('/confsiguration/create_categoriesignevitaux', [ConfigController::class, 'create_categoriesignevitaux'])->name('create_categoriesignevitaux');
Route::get('/edit_categoriesignevitaux/{idCatSv}', [ConfigController::class, 'edit_categoriesignevitaux'])->name('edit_categoriesignevitaux');
Route::POST('/update_categoriesignevitaux', [ConfigController::class, 'update_categoriesignevitaux'])->name('update_categoriesignevitaux');
// Categoriesignevitaux
//***************************************


// Medecin
//***************************************
Route::get('/medecin/medecin', [MedecinController::class, 'medecin'])->name('medecin');
Route::POST('/medecin/create_medecin', [MedecinController::class, 'create_medecin'])->name('create_medecin');
Route::get('/medecin/medecin_liste', [MedecinController::class, 'medecin_liste'])->name('medecin_liste');
Route::get('/medecin/profile_medecin/{id}', [MedecinController::class, 'medecin_details'])->name('medecin_details');
Route::get('/medecin/medecin_presence', [MedecinController::class, 'medecin_presence'])->name('medecin_presence');
Route::POST('/medecin/updatemedecin/{idMedecin}', [MedecinController::class, 'updatemedecin'])->name('updatemedecin');

// Medecin
//***************************************

// Patients
//***************************************
Route::get('/patients/patients', [PatientController::class, 'patients'])->name('patients');
Route::get('/patients/profile_patient/{id}', [PatientController::class, 'patient_details'])->name('patient_details');
Route::POST('/patients/updatePatient/{idPatient}', [PatientController::class, 'updatePatient'])->name('updatePatient');


// Patients
//***************************************

// Consultations
//***************************************
Route::get('/Consultations/consultations', [consultationsController::class, 'liste'])->name('consultations_liste')->middleware('isAdmin');;
Route::get('/Consultations/consultations_details/{id}', [consultationsController::class, 'consultations_details'])->name('consultations_details')->middleware('isAdmin');;

// Consultations
//***************************************

// Prescriptions
//***************************************
Route::get('/Prescriptions/prescriptions', [prescriptionsController::class, 'liste'])->name('prescriptions_liste')->middleware('isAdmin');;

// Prescriptions
//***************************************

// Examens
//***************************************
Route::get('/Examens/examens', [examensController::class, 'liste'])->name('examens_liste')->middleware('isAdmin');;

// Examens
//***************************************

// Hopital
//***************************************
Route::get('/parametre/hopital', [ConfigController::class, 'hopital'])->name('paramHopital')->middleware('isAdmin');
Route::POST('/parametre/createHopital', [ConfigController::class, 'createHopital'])->name('create_hopital')->middleware('isAdmin');
Route::get('/configuration/getVille/{idPays}', [ConfigController::class, 'getVille'])->name('getVille');

// Hopital
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
Route::post('/configuration/updateSpecialite', [ConfigController::class, 'updateSpecialite'])->name('update_specialite');
// Specialité
//*************************************************

//Symptome
//*************************************************
Route::get('/configuration/symptome', [ConfigController::class, 'symptome'])->name('symptome');
Route::post('/configuration/createSymptome', [ConfigController::class, 'createSymptome'])->name('create_symptome');
Route::get('/configuration/edit_symptome/{idSymptome}', [ConfigController::class, 'editSymptome'])->name('edit_symptome');
Route::post('/configuration/updateSymptome', [ConfigController::class, 'updateSymptome'])->name('update_symptome');
Route::get('/configuration/deleteSymptome/{idSymptome}', [ConfigController::class, 'deleteSymptome'])->name('delete_symptome');
// Symptome
//*************************************************

//Type examens
//*************************************************
Route::get('/configuration/examen', [ConfigController::class, 'examen'])->name('examen');
Route::post('/configuration/createExamen', [ConfigController::class, 'createExamen'])->name('create_examen');
Route::get('/configuration/editExamen/{idType}', [ConfigController::class, 'editExamen'])->name('edit_examen');
Route::post('/configuration/updateExamen', [ConfigController::class, 'updateExamen'])->name('update_examen');
// Type examens
//*************************************************

Route::get('/examen/gallery/{idExamen}', [examensController::class, 'getExamen'])->name('getExamen');
Route::get('/examenDetails/gallery/{idExamen}', [examensController::class, 'getExamenDetails'])->name('getExamenDetails');
Route::get('/getEkg/gallery/{idEkg}', [examensController::class, 'getEkg'])->name('getEkg');


//Type vaccination
//*************************************************
Route::get('/configuration/vaccination', [ConfigController::class, 'vaccination'])->name('vaccination');
Route::post('/configuration/createvaccination', [ConfigController::class, 'createvaccination'])->name('create_vaccination');
Route::get('/configuration/editvaccination/{idTypevaccination}', [ConfigController::class, 'editvaccination'])->name('edit_vaccination');
Route::post('/configuration/updatevaccination', [ConfigController::class, 'updatevaccination'])->name('update_vaccination');

Route::get('/home/layout', [HomeController::class, 'layout'])->name('layout');
// Type vaccination
//*************************************************

//Medicaments
//*************************************************
Route::get('/configuration/medicaments', [ConfigController::class, 'medicaments'])->name('medicaments');
Route::get('/configuration/categorieMedicaments', [ConfigController::class, 'categorieMedicaments'])->name('categorieMedicaments');
Route::post('/configuration/create_medicament', [ConfigController::class, 'create_medicament'])->name('create_medicament');
Route::post('/configuration/create_categorieMedicament', [ConfigController::class, 'create_categorieMedicament'])->name('create_categorieMedicament');
Route::get('/configuration/delete_medicament/{idMedicament}', [ConfigController::class, 'delete_medicament'])->name('delete_medicament');
Route::get('/configuration/delete_categorieMedicament/{idCategorieMedicament}', [ConfigController::class, 'delete_categorieMedicament'])->name('delete_categorieMedicament');
Route::get('/parametrage/edit_medicament/{idMedicament}', [ConfigController::class, 'edit_medicament'])->name('edit_medicament');
Route::POST('/configuration/update_medicament', [ConfigController::class, 'update_medicament'])->name('update_medicament');
Route::get('/parametrage/edit_categorieMedicament/{idCategorieMedicament}', [ConfigController::class, 'edit_categorieMedicament'])->name('edit_categorieMedicament');
Route::POST('/configuration/update_categorieMedicament', [ConfigController::class, 'update_categorieMedicament'])->name('update_categorieMedicament');



// Type vaccination
//*************************************************



// regions
//***************************************
Route::get('/configuration/region', [ConfigController::class, 'region'])->name('region');
Route::POST('/configuration/create_region', [ConfigController::class, 'create_region'])->name('create_region');
Route::get('/configuration/supression/{id}', [ConfigController::class, 'delete_region'])->name('delete_region');
Route::get('/configuration/modifier/{id}', [ConfigController::class, 'edit_region'])->name('edit_region');
Route::POST('/configuration/edition/{id}', [ConfigController::class, 'update_region'])->name('update_region');
Route::POST('/configuration/create_pays', [ConfigController::class, 'create_pays'])->name('create_pays');
Route::get('/configuration/delete_pays/{id}', [ConfigController::class, 'delete_pays'])->name('delete_pays');
Route::get('/configuration/edit_pays/{id}', [ConfigController::class, 'edit_pays'])->name('edit_pays');
Route::POST('/configuration/update_pays/{id}', [ConfigController::class, 'update_pays'])->name('update_pays');
// regions
//***************************************


// Statistiques
//***************************************
Route::get('/home/statistic/{annee}', [StatisticController::class, 'index'])->name('statistic');
// Statistiques
//***************************************
//Rechercher un medicament
Route::get('/configuration/search', [ConfigController::class, 'search_medicament'])->name('search');
Route::post('/configuration/search', [ConfigController::class, 'search_medicament']);

Route::get('/configuration/search_maladie', [ConfigController::class, 'search_maladie'])->name('searchMaladie');
Route::post('/configuration/search_maladie', [ConfigController::class, 'search_maladie']);
Route::get('/home/filtre/{year}', [HomeController::class, 'indexFilter'])->name('homeFilter');

Auth::routes();
Route::get('/home/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






// Send email
//***************************************
//Route::get('/send', [SendEmailController::class, 'index'])->name('send');
Route::get('/send_email/{chemin}/{titre}/{email}/{note}', [SendEmailController::class, 'send_mail_get'])->name('send_mail_get');
//Route::post('/send_email', [SendEmailController::class, 'send_mail_post'])->name('send_mail_post');