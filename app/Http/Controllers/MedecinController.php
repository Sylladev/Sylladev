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
        $vmail->Debug = FALSE;
        $vmail->Debugoutput = 'html';
        $vmail->setEmailFrom('mortex415@gmail.com');

        return view('medecin.medecin', compact('specialite', 'departement', 'commune'));
    }

    // AJOUT
    public function create_medecin(Request $request)
    {
        $request->validate([]);
        addresse::create($request->all());

        //UPLOAD IMAGE
        //********************************************************
        $image = $request->file('photo');
        if (!empty($image)) {
            $extension = $image->getClientOriginalExtension();
            $photo  = time() . '.' . $extension;
            $image->move(base_path('public/uploads/'), $photo);
        } else {
            $photo = 'defaultImage.png';
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
            'flagTransmis' => $request->get('flagTransmis'),
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
            'flagtra\nsmis' => $request->get('flagTransmis'),
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
            'flagTransmis' => $request->get('flagTransmis'),
        ]);
        //FIN CONTACT URGENCE
        //********************************************************

        //UTILISATEUR
        //********************************************************
        $statut = 'activer';
        utilisateur::create([
            'idUser' => $request->get('idUser'),
            'idMedecin' => $request->get('idMedecin'),
            'username' => $request->get('username'),
            'password' => sha1($request->get('password')),
            'email' => $request->get('email'),
            'flagTransmis' => $request->get('flagTransmis'),
            'statut' => $statut,
        ]);
        //FIN UTILISATEUR
        //********************************************************

        return redirect()->route('medecin')->with('success', 'Medecin enregistré avec succès !');
    }
    //PAGE DES MEDECINS
    //*****************************************************************************
    public function medecin_liste()
    {

        $medecins = DB::select("select * from contact,medecin,utilisateur,specialite where medecin.idMedecin=utilisateur.idMedecin and medecin.idSpecialite=specialite.idSpecialite and medecin.idMedecin=contact.idPersonne");

        return view('medecin.medecin_liste', compact('medecins'));
    }

    public function medecin_presence()
    {

        $medecins = DB::select("select * from medecin,utilisateur,specialite,historiquePresence where medecin.idMedecin=utilisateur.idMedecin and medecin.idSpecialite=specialite.idSpecialite and historiquePresence.idMedecin=medecin.idMedecin");

        return view('medecin.medecin_presence', compact('medecins'));
    }
    //FIN PAGE MEDECINS
    //********************************************************


    


    



    // PAGE EDITION
    public function medecin_details($id)
    {
        $specialite = DB::select('select * from specialite');
        $departement = DB::select('select * from departement');
        $commune = DB::select('select * from commune');

        $medecinUpdate = DB::select('select *
          from medecin,contact,addresse,utilisateur,commune,departement,specialite,contactUrgence where 
          departement.idDepartement=medecin.idDepartement and
          specialite.idSpecialite=medecin.idSpecialite and
          commune.idCommune=addresse.idCommune and
          contactUrgence.idPersonne=medecin.idMedecin and
          medecin.idAddresse=addresse.idAddresse and
          medecin.idMedecin=contact.idPersonne and 
          medecin.idMedecin=utilisateur.idMedecin and
          medecin.idMedecin=?', [$id]);

        $medecin = DB::select(
            "SELECT medecin.nomMedecin,medecin.prenomMedecin,dateDeNaissance,medecin.photo,genreMedecin,statusMatrimonialMedecin,utilisateur.idUser,utilisateur.statut,medecin.idMedecin,departement.description as departement,specialite.description as specialite,contact.telephoneContact as contactes ,contact.telephoneUrgence as 
                                contactUrgence , contact.email as email, addresse.premiereAddresse as premiereAddresse,contactUrgence.relation,contactUrgence.nomRelation,contactUrgence.telephoneRelation
                                FROM (medecin inner JOIN departement on departement.idDepartement=medecin.idDepartement 
                                inner JOIN specialite on specialite.idSpecialite=medecin.idSpecialite 
                                inner JOIN contactUrgence on contactUrgence.idPersonne=medecin.idMedecin
                                inner JOIN utilisateur on utilisateur.idMedecin=medecin.idMedecin  
                                inner JOIN addresse on addresse.idAddresse=medecin.idAddresse
                                inner JOIN contact on medecin.idMedecin=contact.idPersonne and medecin.idMedecin=?)",
            [$id]
        );


        $consultations = DB::select("select * from consultation,patient where consultation.idPatient = patient.idPatient and consultation.idMedecin=? ", [$id]);
        return view('medecin.medecin_details', compact('medecin', 'consultations','specialite','departement','commune','medecinUpdate'));
    }


    //HISTORIQUES
    //*****************************************************************************
    public function medecin_story_data($limit, $id)
    {

        $historiques = DB::select(
            "SELECT date_format(dateHistorique,'%d %M %Y') as datestory, description from historiquePresence inner join medecin on historiquePresence.idMedecin = medecin.idMedecin  
                            order by dateHistorique DESC"
        );

        return view('medecin.medecin_story_data', compact('historiques', 'id'));
    }
    // HISTORIQUES

    public function modif_medecin($id)
    {
        $specialite = DB::select('select * from specialite');
        $departement = DB::select('select * from departement');
        $commune = DB::select('select * from commune');

        $medecin = DB::select('select *
           from medecin,contact,addresse,utilisateur,commune,departement,specialite,contactUrgence where 
          departement.idDepartement=medecin.idDepartement and
          specialite.idSpecialite=medecin.idSpecialite and
          commune.idCommune=addresse.idCommune and
          contactUrgence.idPersonne=medecin.idMedecin and
          medecin.idAddresse=addresse.idAddresse and
          medecin.idMedecin=contact.idPersonne and 
          medecin.idMedecin=utilisateur.idMedecin and
          medecin.idMedecin=?', [$id]);

        return view('medecin.modif_medecin', compact('specialite', 'departement', 'commune', 'medecin'));
    }




    public function updatemedecin(request $request, $idMedecin)
    {

        $idPersonne = $idMedecin;


        $nomMedecin = $request->input('nomMedecin');
        $prenomMedecin = $request->input('prenomMedecin');
        $dateDeNaissance = $request->input('dateDeNaissance');
        $idAddresse = $request->input('idAddresse');
        $premiereAddresse = $request->input('premiereAddresse');
        $telephoneContact = $request->input('telephoneContact');
        $telephoneUrgence = $request->input('telephoneUrgence');
        $username = $request->input('username');
        $uidMedecin = $request->input('uidMedecin');
        $passwor = $request->input('password');
        $password = sha1($passwor);
        $statusMatrimonialMedecin = $request->input('statusMatrimonialMedecin');
        $idSpecialite = $request->input('idSpecialite');
        $idDepartement = $request->input('idDepartement');
        $idCommune = $request->input('idCommune');
        $email = $request->input('email');
        $nomRelation = $request->input('nomRelation');
        $relation = $request->input('relation');
        $telephoneRelation = $request->input('telephoneRelation');
        $flagTransmis = $request->input('flagTransmis');

        DB::update('update medecin set nomMedecin = ? ,prenomMedecin = ?,dateDeNaissance = ? ,statusMatrimonialMedecin = ?,idSpecialite= ?, idDepartement = ?,uidMedecin= ?, flagTransmis= ? where idMedecin = ?', [$nomMedecin, $prenomMedecin, $dateDeNaissance, $statusMatrimonialMedecin, $idSpecialite, $idDepartement, $uidMedecin, $flagTransmis, $idMedecin]);
        DB::update('update contact set telephoneContact = ?, email = ?,telephoneUrgence= ?,flagTransmis=? where  idPersonne = ? ', [$telephoneContact, $email, $telephoneUrgence, $flagTransmis, $idPersonne]);
        DB::update('update addresse set idAddresse = ?, premiereAddresse =?,idCommune=?,flagTransmis=? where  idAddresse = ? ', [$idAddresse, $premiereAddresse, $idCommune, $flagTransmis, $idAddresse]);

        if ($passwor == "") {
            DB::update('update utilisateur set username =?,email=?,flagTransmis=? where  idMedecin = ? ', [$username,$email, $flagTransmis, $idMedecin]);
        } else {
            DB::update('update utilisateur set username =?,email=?,password = ?,flagTransmis=? where  idMedecin = ? ', [$username,$email, $password, $flagTransmis, $idMedecin]);
        }

        DB::update('update contactUrgence set nomRelation =?,relation = ?, telephoneRelation = ?,flagTransmis=? where  idPersonne = ? ', [$nomRelation, $relation, $telephoneRelation, $flagTransmis, $idPersonne]);


        $medecins = DB::select("SELECT medecin.nomMedecin,medecin.prenomMedecin,medecin.photo,medecin.idMedecin,departement.description as departement,specialite.description as specialite,contact.telephoneContact as contactes 
                                FROM (medecin inner JOIN departement on departement.idDepartement=medecin.idDepartement 
                                inner JOIN specialite on specialite.idSpecialite=medecin.idSpecialite 
                                inner JOIN contact on medecin.idMedecin=contact.idPersonne)");

        
        return redirect()->route('medecin_details',$idMedecin)->with('success', 'Le profile du medecin a été modifié avec succès !');
    }

    // ******************* FIN MEDECIN *******************
    // ***************************************************
}
