<?php

namespace App\Http\Controllers;

use App\Models\addresse;
use Illuminate\Http\Request;
use App\Models\allergie;
use App\Models\departement;
use App\Models\maladie;
use App\Models\categorieSigneVitaux;
use App\Models\specialite;
use App\Models\symptome;
use App\Models\typeExamens;
use App\Models\typeVaccination;
use App\Models\region;
use App\Models\pays;
use App\Models\medicament;
use App\Models\categorieMedicament;
use App\Models\hopital;
use App\Models\vice;
use Illuminate\Support\Facades\DB;


class ConfigController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //
   }

   public function accueilConfig()
   {
      return view('configuration.accueilConfig');
   }

   public function specialite()
   {
      $specialites = DB::select("select * from specialite");

      return view('parametrage.specialite', compact('specialites'));
   }



   // ******************* ALLERGIE ****************************//
   //**********************************************************//
   public function allergie()
   {
      $allergies  = DB::select("select * from allergie");
      return view('parametrage.allergie', compact('allergies'));
   }

   // AJOUT
   public function create_allergie(Request $request)
   {
      $request->validate([]);
      $data = allergie::where('description', 'like', "$request->description")->first();
      if ($data != null) {
         return redirect()->route('allergie')->with('error', 'Erreur, Cette allergie existe déjà');
      }
      allergie::create([
         'idAllergie' => $request->get('idAllergie'),
         'flagtransmis' => $request->get('flagtransmis'),
         'type' => $request->get('type'),
         'description' => $request->get('description'),
      ]);
      return redirect()->route('allergie')->with('success', 'Allergie enregistrée avec succès !');
   }

   // SUPPRESSION
   public function delete_allergie($id)
   {
      DB::delete("delete from allergie where idAllergie=?", [$id]);
      return redirect()->route('allergie')->with('delete', "Supression Effectuée");
   }

   // PAGE EDITION
   public function edit_allergie($idAllergie)
   {

      $allergie = DB::select("select * from allergie where idAllergie=?", [$idAllergie]);
      return response()->json([
         'allergie' => $allergie
      ]);
   }

   // MODIFICATION
   public function update_allergie(Request $request)
   {

      $id = $request->input('idAllergie');
      $type = $request->input('type');
      $description = $request->input('description');
      $flagtransmis = $request->input('flagtransmis');

      DB::update("update allergie set type=?,description=?,flagtransmis=? where idAllergie=?", [$type, $description, $flagtransmis, $id]);
      return redirect()->route('allergie')->with('success', "Cette allergie a été modifiée avec succès");
   }
   // ******************* FIN ALLERGIE *******************
   // ***************************************************


   // ******************* DEPARTEMENT ****************************//
   //**********************************************************//
   public function departement()
   {
      $departements = DB::select("select * from departement");
      $hopital = DB::select("select * from hopital");
      return view('parametrage.departement', compact('departements','hopital'));
   }

   // AJOUT
   public function create_departement(Request $request)
   {
      $request->validate([]);
      $data = departement::where('description', 'like', "$request->description")->first();
      if ($data != null) {
         return redirect()->route('departement')->with('error', 'Ce departement existe déjà');
      }
      departement::create($request->all());
      return redirect()->route('departement')->with('success', 'Departement enregistré avec succès !');
   }

   // SUPPRESSION
   public function delete_departement($id)
   {
      DB::delete("delete from departement where idDepartement=?", [$id]);
      return redirect()->route('departement')->with('delete', "Supression Effectuée");
   }

   // PAGE EDITION
   public function edit_departement($id)
   {

      $departement = DB::select("select * from departement where idDepartement=?", [$id]);
      return response()->json([
         'departement' => $departement
      ]);
   }

   // MODIFICATION
   public function update_departement(Request $request)
   {
      $description = $request->input('description');
      $idDepartement = $request->input('idDepartement');
      $flagtransmis = $request->input('flagtransmis');

      DB::update("update departement set description=?,flagtransmis=? where idDepartement=?", [$description, $flagtransmis, $idDepartement]);
      return redirect()->route('departement')->with('success', " Departement modifié avec succès !");
   }
   // ******************* FIN DEPARTEMENT *******************
   // *******************************************************



   // ******************* DEPARTEMENT ****************************//
   //**********************************************************//
   public function maladie()
   {
      $maladies = DB::select('select * from maladie');

      return view('parametrage.maladie', compact('maladies'));
   }


   // AJOUT
   public function create_maladie(Request $request)
   {
      $request->validate([]);
      $data = maladie::where('description', 'like', "$request->description")->first();
      if ($data != null) {
         return redirect()->route('maladie')->with('error', 'Cette description existe déjà');
      }
      maladie::create($request->all());
      return redirect()->route('maladie')->with('success', 'Maladie enregistrée avec succès !');
   }

   // SUPPRESSION
   public function delete_maladie($id)
   {
      DB::delete("delete from maladie where idMaladie=?", [$id]);
      return redirect()->route('maladie')->with('delete', "Supression Effectuée");
   }

   // PAGE EDITION
   public function edit_maladie($idMaladie)
   {

      $maladie = DB::select("select * from maladie where idMaladie=?", [$idMaladie]);
      return response()->json([
         'maladie' => $maladie
      ]);
   }

   // MODIFICATION
   public function update_maladie(Request $request)
   {
      $description = $request->input('description');
      $idM = $request->input('idMaladie');
      $flagtransmis = $request->input('flagtransmis');

      DB::update("update maladie set description=?,flagtransmis=? where idMaladie=?", [$description, $flagtransmis, $idM]);
      return redirect()->route('maladie')->with('success', " Maladie modifiée avec succès !");
   }
   // ******************* FIN DEPARTEMENT *******************
   // *******************************************************


      // ******************* DEPARTEMENT ****************************//
   //**********************************************************//
   public function vice()
   {
      $vices = DB::select('select * from vice');

      return view('parametrage.vice', compact('vices'));
   }


   // AJOUT
   public function create_vice(Request $request)
   {
      $request->validate([]);
      $data = vice::where('description', 'like', "$request->description")->first();
      if ($data != null) {
         return redirect()->route('vice')->with('error', 'Cette description existe déjà');
      }
      vice::create($request->all());
      return redirect()->route('vice')->with('success', 'Vice enregistrée avec succès !');
   }

   // SUPPRESSION
   public function delete_vice($id)
   {
      DB::delete("delete from vice where idVice=?", [$id]);
      return redirect()->route('vice')->with('delete', "Supression Effectuée");
   }

   // PAGE EDITION
   public function edit_vice($idVice)
   {

      $vice = DB::select("select * from vice where idVice=?", [$idVice]);
      return response()->json([
         'vice' => $vice
      ]);
   }

   // MODIFICATION
   public function update_vice(Request $request)
   {
      $description = $request->input('description');
      $idV = $request->input('idVice');
      $flagtransmis = $request->input('flagtransmis');

      DB::update("update vice set description=?, flagtransmis=? where idVice=?", [$description, $flagtransmis, $idV]);
      return redirect()->route('vice')->with('success', " Vice modifié avec succès !");
   }
   // ******************* FIN VICE *******************
   // *******************************************************

   // ******************* CATEGORIE SIGNE VITAUX ****************************//
   // ***********************************************************************//
   public function categorieSigneVitaux()
   {
      $categoriesignevitaux = DB::select('select * from categorieSigneVitaux');
      return view('parametrage.signeVitaux', compact('categoriesignevitaux'));
   }

   // AJOUT
   public function create_categorieSigneVitaux(Request $request)
   {
      $request->validate([]);
      $category = categorieSigneVitaux::where('description', 'like', "$request->description")->first();
      if ($category != null) {
         return redirect()->route('categoriesignevitaux')->with('error', 'Cette description existe déjà');
      }
      categorieSigneVitaux::create($request->all());
      return redirect()->route('categoriesignevitaux')->with('success', 'Signe vital enregistré avec succès !');
   }

   // SUPPRESSION
   public function delete_categorieSigneVitaux($id)
   {
      DB::delete("delete from categorieSigneVitaux where idCatSV=?", [$id]);
      return redirect()->route('categoriesignevitaux')->with('delete', "Supression Effectuée");
   }

   // PAGE EDITION
   public function edit_categorieSigneVitaux($idCatSv)
   {

      $categoriesignevitaux = DB::select("select * from categorieSigneVitaux where idCatSV=?", [$idCatSv]);
      return response()->json([
         'categoriesignevitaux' => $categoriesignevitaux
      ]);
   }

   // MODIFICATION
   public function update_categorieSigneVitaux(Request $request,)
   {
      $description = $request->input('description');
      $idCatSV = $request->input('idCatSV');
      $flagtransmis = $request->input('flagtransmis');

      DB::update("update categorieSigneVitaux set description=?,flagtransmis=? where idCatSV=?", [$description, $flagtransmis, $idCatSV]);
      return redirect()->route('categoriesignevitaux')->with('success', " Signe vital modifié avec succès !");
   }
   // ******************* FIN CATEGORIE SIGNE VITAUX *******************
   // ******************************************************************





   // ******************* REGION ****************************//
   // ***********************************************************************//
   public function region()
   {
      $regions = DB::select('select * from region,pays where region.idPays=pays.idPays');
      $pays = DB::select('select * from pays');
      return view('configuration.region', compact('regions', 'pays'));
   }

   // AJOUT
   public function create_region(Request $request)
   {
      $request->validate([]);
      $data = region::where('nomRegion', 'like', "$request->nomRegion")->first();
      if ($data != null) {
         return redirect()->route('region')->with('error', 'Cette region existe déjà');
      }
      region::create($request->all());
      return redirect()->route('region')->with('success', 'Effectué !');
   }

   // AJOUT
   public function create_pays(Request $request)
   {
      $request->validate([]);
      $data = pays::where('nomPays', 'like', "$request->nomPays")->first();
      if ($data != null) {
         return redirect()->route('region')->with('error', 'Ce pays existe déjà');
      }
      pays::create($request->all());
      return redirect()->route('region')->with('success', 'Effectué !');
   }

   // SUPPRESSION
   public function delete_pays($id)
   {
      DB::delete("delete from pays where idPays=?", [$id]);
      return redirect()->route('region')->with('delete', "Supression Effectuée");
   }

   // SUPPRESSION
   public function delete_region($id)
   {
      DB::delete("delete from region where idRegion=?", [$id]);
      return redirect()->route('region')->with('delete', "Supression Effectuée");
   }

   // PAGE EDITION
   public function edit_region($id)
   {
      $region = DB::select("select * from region where idRegion=?", [$id]);
      return view('configuration.region_edit', compact('region'));
   }

   // MODIFICATION
   public function update_region(Request $request, $id)
   {

      $nom = $request->input('nomRegion');
      $flagtransmis = $request->input('flagTransmis');

      DB::update("update region set nomRegion=?,flagTransmis=? where idRegion=?", [$nom, $flagtransmis, $id]);
      return redirect()->route('region')->with('edit', " Effectuée");
   }

   // PAGE EDITION
   public function edit_pays($id)
   {
      $pays = DB::select("select * from pays where idPays=?", [$id]);
      return view('configuration.pays_edit', compact('pays'));
   }

   // MODIFICATION
   public function update_pays(Request $request, $id)
   {

      $nom = $request->input('nomPays');
      $flagtransmis = $request->input('flagTransmis');

      DB::update("update pays set nomPays=?,flagTransmis=? where idPays=?", [$nom, $flagtransmis, $id]);
      return redirect()->route('region')->with('edit', " Effectuée");
   }
   // ******************* FIN REGION *******************
   // ******************************************************************



   public function createSpecialite(Request $request)
   {
      $data = specialite::where('description', 'like', "$request->description")->first();
      if ($data != null) {
         return redirect()->route('specialite')->with('error', 'Cette spécialité existe déjà');
      }
      specialite::create($request->all());
      return redirect()->route('specialite')->with('success', 'Specialité enregistrée avec succès !');
   }



   public function editSpecialite(Request $request, $idSpecialite)
   {
      $specialite = DB::select("select * from specialite where idSpecialite=?", [$idSpecialite]);
      return response()->json([
         'specialite' => $specialite
      ]);
   }

   public function updateSpecialite(Request $request)
   {
      $description = $request->input('description');
      $idSpecialite = $request->input('idSpecialite');
      DB::update("update specialite set description =? where idSpecialite=?", [$description, $idSpecialite]);
      return redirect()->route('specialite')->with('success', 'Specialité modifiée avec succes !');
   }

   public function deleteSpecialite(Request $request, $idSpecialite)
   {

      DB::update("delete from specialite where idSpecialite=?", [$idSpecialite]);
      return redirect()->route('specialite')->with('delete', 'effectuer avec succes');
   }


   public function createHopital(Request $request)
   {
      $country_id = $request->input('premiereAddresse');
      $idAddresse = $request->input('idAddresse');

      DB::delete("delete from commune");
      DB::delete("delete from region");
      DB::delete("delete from hopital");
      DB::delete("delete from pays");
      DB::delete("delete from addresse where idAddresse=?",[$idAddresse]);

      addresse::create($request->all());
      hopital::create($request->all());

      $stateAPI = DB::select("select * from states where country_id=?",[$country_id]);
      foreach ($stateAPI as $s) {
         $flagtransmis = date('Y-m-d H:i:s.u');
        DB::insert("insert into region (idRegion,nomRegion,idPays,flagtransmis)VALUE(?,?,?,?)",[$s->id,$s->name,$s->country_id,$flagtransmis]);
      }

      $cityAPI = DB::select("select * from cities where country_id=?",[$country_id]);
      foreach ($cityAPI as $c) {
         $flagtransmis = date('Y-m-d H:i:s.u');
        DB::insert("insert into commune (idCommune,nomCommune,idRegion,flagtransmis)VALUE(?,?,?,?)",[$c->id,$c->name,$c->state_id,$flagtransmis]);
      }

      $countryAPI = DB::select("select * from countries where id=?",[$country_id]);
      foreach ($countryAPI as $c) {
         $flagtransmis = date('Y-m-d H:i:s.u');
        DB::insert("insert into pays (idPays,nomPays,flagtransmis)VALUE(?,?,?)",[$c->id,$c->name,$flagtransmis]);
      }
   
      $hopital = DB::select("select * from hopital");
      return redirect()->route('paramHopital',compact('hopital'))->with('success', 'Information enregisrée avec succès !');
   }


   //---------------------------------------------------------------------------------- Fonction symptome
   public function symptome()
   {
      //   $symptomes = DB::select("select symptome.idSymptome as idSymptome,symptome.description as symptomes,departement.description as departements from symptome inner join departement on symptome.idDepartement = departement.idDepartement order by symptome.description");
      $departements = DB::select('select * from departement');
      $symptomes = DB::select("select idSymptome,departement.idDepartement,departement.description as descriptionDep, symptome.description as descriptionSym from symptome,departement where symptome.idDepartement=departement.idDepartement ");
      return view('parametrage.symptome', compact('symptomes', 'departements'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function createSymptome(Request $request)
   {
      $data = symptome::where('description', 'like', "$request->description")->first();
      if ($data != null) {
         return redirect()->route('symptome')->with('error', 'Ce symptome existe déjà');
      }
      symptome::create($request->all());
      return redirect()->route('symptome')->with('success', 'Symptome enregistré avec succes');
   }



   public function editSymptome(Request $request, $idSymptome)
   {
      $symptomes = DB::select("select idSymptome,departement.idDepartement,departement.description as descriptionDep, symptome.description as descriptionSym from symptome,departement where symptome.idDepartement=departement.idDepartement and idSymptome=?", [$idSymptome]);
      $departement = DB::select('select * from departement');
      return response()->json([
         'symptomes' => $symptomes,
         'departement' => $departement
      ]);
   }

   public function updateSymptome(Request $request)
   {
      $description = $request->input('description');
      $idSymptome = $request->input('idSymptome');
      $dep = $request->input('idDepartement');
      DB::update("update symptome set description =?,idDepartement=? where idSymptome=?", [$description, $dep, $idSymptome]);
      return redirect()->route('symptome')->with('success', 'Symptome modifié avec success');
   }

   public function deleteSymptome(Request $request, $idSymptome)
   {

      DB::update("delete from symptome where idSymptome=?", [$idSymptome]);
      return redirect()->route('symptome')->with('delete', 'effectuer avec succes');
   }
   //--------------------------------------------------------------------------------------------

   //---------------------------------------------------------------------------------- Fonction examens
   public function examen()
   {
      $typeExamens = DB::select("select * from typeExamens");

      return view('parametrage.examen', compact('typeExamens'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function createExamen(Request $request)
   {
      $data = typeExamens::where('typeExamens', 'like', "$request->typeExamens")->first();
      if ($data != null) {
         return redirect()->route('examen')->with('error', 'Ce Type d\'examen existe déjà');
      }
      $data = typeExamens::where('description', 'like', "$request->description")->first();
      if ($data != null) {
         return redirect()->route('examen')->with('error', 'Ce Type examen existe déjà');
      }
      typeExamens::create($request->all());
      return redirect()->route('examen')->with('success', 'Type examen enregistré avec succèss !');
   }



   public function editExamen(Request $request, $idType)
   {
      $examens = DB::select("select * from typeExamens where idtypeExamens=?", [$idType]);
      return response()->json([
         'examens' => $examens
      ]);
   }

   public function updateExamen(Request $request)
   {
      $description = $request->input('description');
      $idtypeExamens = $request->input('idTypeExamens');
      $type = $request->input('typeExamens');
      DB::update("update typeExamens set description =?,typeExamens=? where idtypeExamens=?", [$description, $type, $idtypeExamens]);
      return redirect()->route('examen')->with('success', 'Type examen modifié avec succès !');
   }

   public function deleteExamen(Request $request, $idtypeExamens)
   {

      DB::update("delete from typeExamens where idtypeExamens=?", [$idtypeExamens]);
      return redirect()->route('examen')->with('delete', 'effectuer avec succes');
   }
   //--------------------------------------------------------------------------------------------


   //---------------------------------------------------------------------------------- Fonction vaccination
   public function vaccination()
   {
      $typeVaccins = DB::select("select * from typeVaccination");

      return view('parametrage.vaccin', compact('typeVaccins'));
   }

   public function medicaments()
   {
      //   $medicaments = DB::select("select idMedicament,medicament.description as mdesc, categorieMedicament.description as catdesc from medicament,categorieMedicament where medicament.idCategorieMedicament=categorieMedicament.idCategorieMedicament");
      $categ = DB::select('Select * from categorieMedicament');
      $medicaments = DB::select("select medicament.idMedicament,categorieMedicament.idCategorieMedicament,medicament.idCategorieMedicament, categorieMedicament.description as descCateg, 
        medicament.description as descMedoc  from medicament,categorieMedicament where medicament.idCategorieMedicament=categorieMedicament.idCategorieMedicament");

      return view('parametrage.medicaments', compact('medicaments', 'categ'));
   }

   public function categorieMedicaments()
   {
      $categorieMedicaments = DB::select('Select * from categorieMedicament');
      return view('parametrage.categorieMedicament', compact('categorieMedicaments'));
   }

   // AJOUT
   public function create_categorieMedicament(Request $request)
   {
      $request->validate([]);
      $data = categorieMedicament::where('description', 'like', "$request->description")->first();
      if ($data != null) {
         return redirect()->route('medicaments')->with('error', 'Cette categorie de medicament existe déjà');
      }
      categorieMedicament::create($request->all());
      return redirect()->route('categorieMedicaments')->with('success', 'Catégorie enregistré avec success !');
   }


   public function search_medicament(Request $request)
   {
      $medicaments = [];
      if ($request->search == null) {
         $medicaments = [];
      } else {
         $medicaments = DB::select("SELECT * FROM medicament WHERE description LIKE '%$request->search%'");
      }
      return view('configuration.search_result', ['medicaments' => $medicaments]);
   }

   public function search_maladie(Request $request)
   {
      $maladies = [];
      if ($request->search == null) {
         $maladies = [];
      } else {
         $maladies = DB::select("SELECT * FROM maladie WHERE description LIKE '%$request->search%'");
      }

      return view('configuration.result_maladie', ['maladies' => $maladies]);
   }

   public function create_medicament(Request $request)
   {
      $request->validate([]);
      $data = medicament::where('description', 'like', "$request->description")->first();
      if ($data != null) {
         return redirect()->route('medicaments')->with('error', 'Ce medicament  existe déjà');
      }
      medicament::create($request->all());
      return redirect()->route('medicaments')->with('success', 'médicament enregistré avec success !');
   }

   public function delete_medicament($idMedicament)
   {
      DB::delete("delete from medicament where idMedicament=?", [$idMedicament]);
      return redirect()->route('medicaments')->with('delete', "Supression Effectuée");
   }

   public function delete_categorieMedicament($idCategorieMedicament)
   {
      DB::delete("delete from categorieMedicament where idCategorieMedicament=?", [$idCategorieMedicament]);
      return redirect()->route('medicaments')->with('delete', "Supression Effectuée");
   }


   // PAGE EDITION
   public function edit_medicament($idMedicament)
   {
      $medicaments = DB::select("select medicament.idMedicament,categorieMedicament.idCategorieMedicament,medicament.idCategorieMedicament, categorieMedicament.description as descCateg, 
             medicament.description as descMedoc  from medicament,categorieMedicament where medicament.idCategorieMedicament=categorieMedicament.idCategorieMedicament and idMedicament=?", [$idMedicament]);
      $categorieMedicaments = DB::select('select * from categorieMedicament');
      return response()->json([
         'medicaments' => $medicaments,
         'categorieMedicaments' => $categorieMedicaments
      ]);
   }

   public function hopital(Request $request)
   {
      $pays = DB::select("select * from countries");
      $hopital = DB::select("select cities.name as ville,countries.id,countries.name as pays,nomHopital,premiereAddresse from hopital,addresse,countries,cities where hopital.idAddresse=addresse.idAddresse and addresse.premiereAddresse=countries.id and cities.id = addresse.idAddresse ");
     
      

      return view('parametrage.paramHopital',compact('pays','hopital'));
   }

   // MODIFICATION
   public function update_medicament(Request $request)
   {

      $desc = $request->input('description');
      $flagtransmis = $request->input('flagTransmis');
      $cat = $request->input('idCategorieMedicament');
      $id = $request->input('idMedicament');

      DB::update("update medicament set description=?,flagTransmis=?,idCategorieMedicament=? where idMedicament=?", [$desc, $flagtransmis, $cat, $id]);
      return redirect()->route('medicaments')->with('success', 'Médicament modifié avec success');
   }

   // PAGE EDITION
   public function edit_categorieMedicament($idCategorieMedicament)
   {
      $categorieMedicaments = DB::select("select * from categorieMedicament where idCategorieMedicament=?", [$idCategorieMedicament]);
      return response()->json([
         'categorieMedicaments' => $categorieMedicaments
      ]);
   }

   // MODIFICATION
   public function update_categorieMedicament(Request $request)
   {

      $desc = $request->input('description');
      $id = $request->input('idCategorieMedicament');
      $flagtransmis = $request->input('flagTransmis');

      DB::update("update categorieMedicament set description=?,flagTransmis=? where idCategorieMedicament=?", [$desc, $flagtransmis, $id]);
      return redirect()->route('categorieMedicaments')->with('success', 'Catégorie médicament modifié avec success');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function createvaccination(Request $request)
   {
      $data = typeVaccination::where('type', 'like', "$request->type")->first();
      if ($data != null) {
         return redirect()->route('vaccination')->with('error', 'Ce type de vaccin existe déjà');
      }
      typeVaccination::create($request->all());
      return redirect()->route('vaccination')->with('success', 'Type de vaccin enregistré avec succès !');
   }



   public function editvaccination(Request $request, $idtypeVaccination)
   {
      $vaccinations = DB::select("select * from typeVaccination where idtypeVaccination=?", [$idtypeVaccination]);
      return response()->json([
         'vaccinations' => $vaccinations
      ]);
   }

   public function getVille(Request $request, $idPays)
   {
      $villes = DB::select("select * from cities where country_id=?", [$idPays]);
      return response()->json([
         'villes' => $villes
      ]);
   }

   public function updatevaccination(Request $request)
   {
      $type = $request->input('type');
      $idtypeVaccination = $request->input('idTypeVaccination');
      $duree = $request->input('duree');
      $flag = $request->input('flagtransmis');
      DB::update("update typeVaccination set type=?,duree=?,flagtransmis=? where idtypeVaccination=?", [$type, $duree, $flag, $idtypeVaccination]);
      return redirect()->route('vaccination')->with('success', 'Type de vaccin modifié avec succès !');
   }

   public function deletevaccination(Request $request, $idtypeVaccination)
   {

      DB::update("delete from typeVaccination where idtypeVaccination=?", [$idtypeVaccination]);
      return redirect()->route('vaccination')->with('delete', 'effectuer avec succes');
   }
   //--------------------------------------------------------------------------------------------


   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
   }
}
