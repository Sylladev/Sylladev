<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\allergie;
use App\Models\departement;
use App\Models\maladie;
use App\Models\categoriesignevitaux;
use App\Models\specialite;
use App\Models\medecin;
use App\Models\utilisateur;
use App\Models\addresse;
use App\Models\commune;
use App\Models\contact;
use App\Models\contactUrgence;
use App\Models\verification;
use Illuminate\Support\Facades\DB;

class MedecinController extends Controller
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


// ********************* MEDECIN **************************** //
//**********************************************************//
    public function medecin()
    {
        $specialite = DB::select('select * from specialite');
        $departement = DB::select('select * from departement');
        $commune = DB::select('select * from commune');
		

			
		include_once 'verification.php';

      $vmail = new verifyEmail();
      $vmail->setStreamTimeoutWait(20);
      $vmail->Debug= FALSE;
      $vmail->Debugoutput= 'html';
      $vmail->setEmailFrom('mortex415@gmail.com');
	  
        return view('medecin.medecin',compact('specialite','departement','commune'));
		
		
    }

    // AJOUT
    public function create_medecin(Request $request)
    {
       $request->validate([]);
       addresse::create($request->all());

               //UPLOAD IMAGE
               //********************************************************
               $image = $request->file('photo');
               if(!empty($image)){
                      $extension = $image->getClientOriginalExtension();
                  $photo  = time() . '.' . $extension;
                  $image->move(base_path('public/uploads/'), $photo);
               }else{
                  $photo="vide";
              }
              //UPLOAD IMAGE
             //********************************************************


       //INSERTION MEDECIN
      //********************************************************
      medecin::create([
          'idMedecin' => $request->get('idMedecin'),
          'idDepartement' => $request->get('idDepartement'),
          'idSpecialite' => $request->get('idSpecialite'),
          'nomMedecin' => $request->get('nomMedecin'),
          'prenomMedecin' => $request->get('prenomMedecin'),
          'genreMedecin' => $request->get('genreMedecin'),
          'dateDeNaissance' => $request->get('dateDeNaissance'),
          'uidMedecin' => $request->get('uidMedecin'),
          'genreMedecin' => $request->get('genreMedecin'),
          'flagtransmis' => $request->get('flagtransmis'),
          'photo' => $photo,
          'idAddresse' => $request->get('idAddresse'),
          'statusMatrimonialMedecin' => $request->get('statusMatrimonialMedecin'),
      ]);
      //FIN INSERTION MEDECIN 
     //********************************************************

      //CONTACT
      //********************************************************
      contact::create([
          'idContact' => $request->get('idContact'),
          'idPersonne' => $request->get('idMedecin'),
          'telephoneContact' => $request->get('telephoneContact'),
          'telephoneUrgence' => $request->get('telephoneUrgence'),
          'email' => $request->get('email'),
          'flagtra\nsmis' => $request->get('flagtransmis'),
      ]);
      //FIN CONTACT
      //********************************************************

      //CONTACT URGENCE
      //********************************************************
      contactUrgence::create([
          'idEmergencyContact' => $request->get('idEmergencyContact'),
          'idPersonne' => $request->get('idMedecin'),
          'relation' => $request->get('relation'),
          'nomRelation' => $request->get('nomRelation'),
          'telephoneRelation' => $request->get('telephoneRelation'),
          'flagtransmis' => $request->get('flagtransmis'),
      ]);
      //FIN CONTACT URGENCE
      //********************************************************

      //UTILISATEUR
      //********************************************************
      utilisateur::create([
          'idUser' => $request->get('idUser'),
          'idMedecin' => $request->get('idMedecin'),
          'username' => $request->get('username'),
          'password' => sha1($request->get('password')),
          'email' => $request->get('username'),
          'flagtransmis' => $request->get('flagtransmis'),
      ]);
      //FIN UTILISATEUR
      //********************************************************


       return redirect()->route('medecin')->with('success','Effectué !');
    }



    //LISTE DES MEDECINS
   //*****************************************************************************
    public function medecin_liste()
    {

        $medecins = DB::select("SELECT medecin.nomMedecin,medecin.prenomMedecin,medecin.photo,medecin.idMedecin,departement.description as departement,specialite.description as specialite,contact.telephoneContact as contactes 
                                FROM (medecin inner JOIN departement on departement.idDepartement=medecin.idDepartement 
                                inner JOIN specialite on specialite.idSpecialite=medecin.idSpecialite 
                                inner JOIN contact on medecin.idMedecin=contact.idPersonne)"
        );


        return view('medecin.medecin_liste',compact('medecins'));
    }
    //FIN LISTE MEDECINS
      //********************************************************


        // PAGE EDITION
   public function medecin_details($id)
    {

       $medecin = DB::select("SELECT medecin.nomMedecin,medecin.prenomMedecin,medecin.photo,medecin.idMedecin,utilisateur.idUser,utilisateur.status,departement.description as departement,specialite.description as specialite,contact.telephoneContact as contactes 
                                FROM (medecin inner JOIN departement on departement.idDepartement=medecin.idDepartement 
                                inner JOIN specialite on specialite.idSpecialite=medecin.idSpecialite 
                                inner JOIN utilisateur on utilisateur.idMedecin=medecin.idMedecin 
                                inner JOIN contact on medecin.idMedecin=contact.idPersonne and medecin.idMedecin=?)",[$id]
        );


       return view('medecin.medecin_details',compact('medecin'));
    }


// ******************* FIN MEDECIN *******************
// ***************************************************



}
