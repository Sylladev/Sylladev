<?php

namespace App\Http\Controllers;

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
use DB;

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

       return view('configuration.specialite',compact('specialites'));
    }



// ******************* ALLERGIE ****************************//
//**********************************************************//
    public function allergie()
    {
        $allergies  = DB::select('select * from allergie');
        return view('configuration.allergie',compact('allergies'));
    }

    // AJOUT
    public function create_allergie(Request $request)
    {
       $request->validate([]);
       allergie::create($request->all());
       return redirect()->route('allergie')->with('success','Effectué !');
    }

    // SUPPRESSION
   public function delete_allergie($id)
    {
       DB::delete("delete from allergie where idAllergie=?",[$id] );
       return redirect()->route('allergie')->with('delete',"Supression Effectuée");
    }

    // PAGE EDITION
   public function edit_allergie($id)
    {

       $allergie=DB::select("select * from allergie where idAllergie=?",[$id]);
       return view('configuration.allergie_edit',compact('allergie'));
    }

    // MODIFICATION
   public function update_allergie(Request $request,$id)
    {

        $type= $request->input('type');
        $description= $request->input('description');
        $flagtransmis= $request->input('flagtransmis');

       DB::update("update allergie set type=?,description=?,flagtransmis=? where idAllergie=?",[$type,$description,$flagtransmis,$id]);
       return redirect()->route('allergie')->with('edit',"Supression Effectuée");
    }
// ******************* FIN ALLERGIE *******************
// ***************************************************


// ******************* DEPARTEMENT ****************************//
//**********************************************************//
    public function departement()
    {
        $departements = DB::select('select * from departement');
        return view('configuration.departement',compact('departements'));
    }

    // AJOUT
    public function create_departement(Request $request)
    {
       $request->validate([]);
       departement::create($request->all());
       return redirect()->route('departement')->with('success','Effectué !');
    }

    // SUPPRESSION
   public function delete_departement($id)
    {
       DB::delete("delete from departement where idDepartement=?",[$id] );
       return redirect()->route('departement')->with('delete',"Supression Effectuée");
    }

    // PAGE EDITION
   public function edit_departement($id)
    {

       $departement=DB::select("select * from departement where idDepartement=?",[$id]);
       return view('configuration.departement_edit',compact('departement'));
    }

    // MODIFICATION
   public function update_departement(Request $request,$id)
    {
        $description= $request->input('description');
        $flagtransmis= $request->input('flagtransmis');

       DB::update("update departement set description=?,flagtransmis=? where idDepartement=?",[$description,$flagtransmis,$id]);
       return redirect()->route('departement')->with('edit'," Effectuée");
    }  
// ******************* FIN DEPARTEMENT *******************
// *******************************************************



// ******************* DEPARTEMENT ****************************//
//**********************************************************//
    public function maladie()
    {
      //  $maladies = DB::select('select * from maladie');
        return view('configuration.maladie');
    }

    public function maladie_liste_data($limit)
    {
        $maladies = DB::select('select * from maladie order by description asc limit '.$limit);
        return view('configuration.maladie_liste_data',compact('maladies'));
    }




    // AJOUT
    public function create_maladie(Request $request)
    {
       $request->validate([]);
       maladie::create($request->all());
       return redirect()->route('maladie')->with('success','Effectué !');
    }

    // SUPPRESSION
   public function delete_maladie($id)
    {
       DB::delete("delete from maladie where idMaladie=?",[$id] );
       return redirect()->route('maladie')->with('delete',"Supression Effectuée");
    }

    // PAGE EDITION
   public function edit_maladie($id)
    {

       $maladie=DB::select("select * from maladie where idMaladie=?",[$id]);
       return view('configuration.maladie_edit',compact('maladie'));
    }

    // MODIFICATION
   public function update_maladie(Request $request,$id)
    {
        $description= $request->input('description');
        $type= $request->input('type');
        $flagtransmis= $request->input('flagtransmis');

       DB::update("update maladie set description=?,type=?,flagtransmis=? where idMaladie=?",[$description,$type,$flagtransmis,$id]);
       return redirect()->route('maladie')->with('edit'," Effectuée");
    }
// ******************* FIN DEPARTEMENT *******************
// *******************************************************


// ******************* CATEGORIE SIGNE VITAUX ****************************//
// ***********************************************************************//
    public function categorieSigneVitaux()
    {
        $categoriesignevitaux = DB::select('select * from categorieSigneVitaux');
        return view('configuration.categoriesignevitaux',compact('categoriesignevitaux'));
    }

    // AJOUT
    public function create_categorieSigneVitaux(Request $request)
    {
       $request->validate([]);
       categorieSigneVitaux::create($request->all());
       return redirect()->route('categoriesignevitaux')->with('success','Effectué !');
    }

    // SUPPRESSION
   public function delete_categorieSigneVitaux($id)
    {
       DB::delete("delete from categorieSigneVitaux where idCatSV=?",[$id] );
       return redirect()->route('categoriesignevitaux')->with('delete',"Supression Effectuée");
    }

    // PAGE EDITION
   public function edit_categorieSigneVitaux($id)
    {

       $categoriesignevitaux=DB::select("select * from categorieSigneVitaux where idCatSV=?",[$id]);
       return view('configuration.categoriesignevitaux_edit',compact('categoriesignevitaux'));
    }

    // MODIFICATION
   public function update_categorieSigneVitaux(Request $request,$id)
    {
        $description= $request->input('description');
        $flagtransmis= $request->input('flagtransmis');

       DB::update("update categorieSigneVitaux set description=?,flagtransmis=? where idCatSV=?",[$description,$flagtransmis,$id]);
       return redirect()->route('categoriesignevitaux')->with('edit'," Effectuée");
    }  
// ******************* FIN CATEGORIE SIGNE VITAUX *******************
// ******************************************************************





// ******************* REGION ****************************//
// ***********************************************************************//
    public function region()
    {
        $regions = DB::select('select * from region');
        $pays = DB::select('select * from pays');
        return view('configuration.region',compact('regions','pays'));
    }

    // AJOUT
    public function create_region(Request $request)
    {
       $request->validate([]);
       region::create($request->all());
       return redirect()->route('region')->with('success','Effectué !');
    }

    // SUPPRESSION
   public function delete_region($id)
    {
       DB::delete("delete from region where idRegion=?",[$id] );
       return redirect()->route('region')->with('delete',"Supression Effectuée");
    }

    // PAGE EDITION
   public function edit_region($id)
    {
       $region=DB::select("select * from region where idRegion=?",[$id]);
       return view('configuration.region_edit',compact('region'));
    }

    // MODIFICATION
    public function update_region(Request $request,$id){

        $nom= $request->input('nomRegion');
        $flagtransmis= $request->input('flagTransmis');

       DB::update("update region set nomRegion=?,flagTransmis=? where idRegion=?",[$nom,$flagtransmis,$id]);
       return redirect()->route('region')->with('edit'," Effectuée");
    }  
// ******************* FIN REGION *******************
// ******************************************************************



        public function createSpecialite(Request $request)
    {
      specialite::create($request->all());
      return redirect()->route('specialite')->with('success','effectuer avec succes');

    }



     public function editSpecialite(Request $request, $idSpecialite)
    {
      $descriptions = DB::select("select * from specialite where idSpecialite=?",[$idSpecialite]);
      $description = $descriptions[0]->description;
      return view('configuration.edit_specialite',compact('description','idSpecialite'));

    }

    public function updateSpecialite(Request $request, $idSpecialite)
    {
      $description = $request->input('description');
      DB::update("update specialite set description =? where idSpecialite=?",[$description,$idSpecialite]);
      return redirect()->route('specialite')->with('update','effectuer avec succes');

    }

     public function deleteSpecialite(Request $request, $idSpecialite)
    {
    
      DB::update("delete from specialite where idSpecialite=?",[$idSpecialite]);
      return redirect()->route('specialite')->with('delete','effectuer avec succes');

    }




    //---------------------------------------------------------------------------------- Fonction symptome
     public function symptome()
    {
        $symptomes = DB::select("select symptome.idSymptome as idSymptome,symptome.description as symptomes,departement.description as departements from symptome inner join departement on symptome.idDepartement = departement.idDepartement order by symptome.description");
        $departements = DB::select('select * from departement');

       return view('configuration.symptome',compact('symptomes','departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSymptome(Request $request)
    {
      symptome::create($request->all());
      return redirect()->route('symptome')->with('success','effectuer avec succes');

    }



     public function editSymptome(Request $request, $idSymptome)
    {
      $symptomes = DB::select("select * from symptome where idSymptome=?",[$idSymptome]);
      return view('configuration.edit_symptome',compact('symptomes'));

    }

    public function updateSymptome(Request $request, $idSymptome)
    {
      $description = $request->input('description');
      $type = $request->input('type');
      DB::update("update symptome set description =?,type=? where idSymptome=?",[$description,$type,$idSymptome]);
      return redirect()->route('symptome')->with('update','effectuer avec succes');

    }

     public function deleteSymptome(Request $request, $idSymptome)
    {
    
      DB::update("delete from symptome where idSymptome=?",[$idSymptome]);
      return redirect()->route('symptome')->with('delete','effectuer avec succes');

    }
    //--------------------------------------------------------------------------------------------

    //---------------------------------------------------------------------------------- Fonction examens
     public function examen()
    {
        $examens = DB::select("select * from typeExamens");

       return view('configuration.examen',compact('examens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createExamen(Request $request)
    {
      typeExamens::create($request->all());
      return redirect()->route('examen')->with('success','effectuer avec succes');

    }



     public function editExamen(Request $request, $idtypeExamens)
    {
      $examens = DB::select("select * from typeExamens where idtypeExamens=?",[$idtypeExamens]);
      return view('configuration.edit_examen',compact('examens'));

    }

    public function updateExamen(Request $request, $idtypeExamens)
    {
      $description = $request->input('description');
      $type = $request->input('typeExamens');
      DB::update("update typeExamens set description =?,typeExamens=? where idtypeExamens=?",[$description,$type,$idtypeExamens]);
      return redirect()->route('examen')->with('update','effectuer avec succes');

    }

     public function deleteExamen(Request $request, $idtypeExamens)
    {
    
      DB::update("delete from typeExamens where idtypeExamens=?",[$idtypeExamens]);
      return redirect()->route('examen')->with('delete','effectuer avec succes');

    }
    //--------------------------------------------------------------------------------------------
  

    //---------------------------------------------------------------------------------- Fonction vaccination
     public function vaccination()
    {
        $vaccinations = DB::select("select * from typeVaccination");

       return view('configuration.vaccination',compact('vaccinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createvaccination(Request $request)
    {
      typeVaccination::create($request->all());
      return redirect()->route('vaccination')->with('success','effectuer avec succes');

    }



     public function editvaccination(Request $request, $idtypeVaccination)
    {
      $vaccinations = DB::select("select * from typeVaccination where idtypeVaccination=?",[$idtypeVaccination]);
      return view('configuration.edit_vaccination',compact('vaccinations'));

    }

    public function updatevaccination(Request $request, $idtypeVaccination)
    {
      $description = $request->input('description');
      $type = $request->input('type');
      $duree = $request->input('duree');
      $flag = $request->input('flagtransmis');
      DB::update("update typeVaccination set type=?,duree=?,flagtransmis=? where idtypeVaccination=?",[$type,$duree,$idtypeVaccination,$flag]);
      return redirect()->route('vaccination')->with('update','effectuer avec succes');

    }

     public function deletevaccination(Request $request, $idtypeVaccination)
    {
    
      DB::update("delete from typeVaccination where idtypeVaccination=?",[$idtypeVaccination]);
      return redirect()->route('vaccination')->with('delete','effectuer avec succes');

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
