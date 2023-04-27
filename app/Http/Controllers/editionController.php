<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\patient;
use CONCAT;
use DB;

class editionController extends Controller
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
    public function recherche()
    {
        
        return view('users.recherchePatient'); 
    }


    public function modifPatient($idPatient)
    {
         $pat= DB::select("select * from patient,addresse,contact,contactUrgence,commune where
          patient.idPatient=contact.idPersonne and addresse.idAddresse=patient.idAddresse and commune.idCommune=addresse.idCommune and patient.idPatient=contactUrgence.idPersonne AND patient.idPatient=?  ",[$idPatient]);

        $commune = DB::select('select * from commune');
 
        return view('users.modifPatient', compact('pat','commune')); 
    }
       
   public function indexpat(Request $request)
    {
      $tel = $request->input('telephoneContact');
      $nom = $request->input('nomPatient');

      if (empty($_POST['telephoneContact'])){

          $pat= DB::select("select nomPatient,prenomPatient,premiereAddresse,email,dateNaissancePatient,telephoneContact,photoPatient,idPatient from patient,addresse,contact where
          patient.idPatient=contact.idPersonne and addresse.idAddresse=patient.idAddresse  and concat(nomPatient,' ',prenomPatient) like '%$nom%'");
        return view('users.listepatient', compact('pat')); 

      }else{
          $pat= DB::select("select nomPatient,prenomPatient,premiereAddresse,email,dateNaissancePatient,telephoneContact,photoPatient,idPatient from patient,addresse,contact where
          patient.idPatient=contact.idPersonne and addresse.idAddresse=patient.idAddresse and telephoneContact='$tel' ");
        return view('users.listepatient', compact('pat')); 
      }

    
  }


      public function updatePatient(Request $request, $idPatient){

            $nom= $request->input('nomPatient');
            $prenom= $request->input('prenomPatient');
            $numero= $request->input('numeroIdentitePatient');
            $uid= $request->input('uidPatient');
            $statut= $request->input('statusMatrimonialPatient');
            $date = date('Y/m/d', strtotime($request->input('dateNaissancePatient')));
            $adr = $request->input('premiereAddresse');
            $commune = $request->input('idCommune');
            $telC = $request->input('telephoneContact');
            $telU = $request->input('telephoneUrgence');
            $email = $request->input('email');
            $relation = $request->input('relation');
            $Nrelation = $request->input('nomRelation');
            $telR = $request->input('telephoneRelation');
            $flagtransmis=$request->input('flagtransmis');

        $pat= DB::select("select idAddresse from patient where idPatient=?  ",[$idPatient]);
        $addresse=$pat[0]->idAddresse;

        DB::update('update patient set nomPatient = ? ,prenomPatient = ?,numeroIdentitePatient = ? ,uidPatient = ?,statusMatrimonialPatient= ?, dateNaissancePatient = ?, flagtransmis= ? where idPatient = ?',[$nom,$prenom,$numero,$uid,$statut,$date,$flagtransmis,$idPatient]);
        DB::update('update addresse set premiereAddresse = ?,  idCommune= ?, flagtransmis=? where  idAddresse = ? ',[$adr,$commune,$flagtransmis,$addresse]);
        DB::update('update contact set telephoneContact = ?, telephoneUrgence=? , email= ?,flagtransmis=? where  idPersonne = ? ',[$telC,$telU,$email,$flagtransmis,$idPatient]);
        DB::update('update contactUrgence set relation =?,nomRelation = ?, telephoneRelation= ? ,flagtransmis=? where  idPersonne = ? ',[$relation,$Nrelation,$telR,$flagtransmis,$idPatient]);

      if (empty($_POST['telephoneContact'])){

          $pat= DB::select("select nomPatient,prenomPatient,premiereAddresse,email,dateNaissancePatient,telephoneContact,photoPatient,idPatient from patient,addresse,contact where
          patient.idPatient=contact.idPersonne and addresse.idAddresse=patient.idAddresse  and concat(nomPatient,' ',prenomPatient)='$nom'");
        return redirect()->route('modifPatient',$idPatient)->with('edit','Effectué !');

      }else{

          $pat= DB::select("select nomPatient,prenomPatient,premiereAddresse,email,dateNaissancePatient,telephoneContact,photoPatient,idPatient from patient,addresse,contact where
          patient.idPatient=contact.idPersonne and addresse.idAddresse=patient.idAddresse and telephoneContact='$telC' ");
        return redirect()->route('modifPatient',$idPatient)->with('edit','Effectué !');
      }

    }  
}
