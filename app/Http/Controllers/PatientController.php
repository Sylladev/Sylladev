<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function patients()
    {
        $patients = DB::select("select * from patient,addresse,contact where patient.idAddresse=addresse.idAddresse and contact.idPersonne=patient.idPatient order by patient.flagTransmis DESC LIMIT 100");
        return view('patients.patients_liste',compact('patients'));
    }

    public function patient_details($id)
    {
        $commune = DB::select('select * from commune');
        $pat = DB::select("select * from patient,addresse,contact,contactUrgence,commune where 
        patient.idAddresse=addresse.idAddresse and contact.idPersonne=patient.idPatient and patient.idPatient=contactUrgence.idPersonne
        and commune.idCommune=addresse.idCommune and patient.idPatient=?",[$id]);
        $consultations = DB::select("select * from consultation,medecin where consultation.idMedecin = medecin.idMedecin and consultation.idPatient=? order by consultation.flagTransmis DESC", [$id]);
        $vices = DB::select("select * from vice,vicePatient where vice.idVice = vicePatient.idVice and vicePatient.idPatient=?",[$id]);
        $allergie1 = DB::select("select * from allergiePatient,patient where allergiePatient.idPatient=patient.idPatient and patient.idPatient=?",[$id]);
        $allergie2 = DB::select("select * from allergieMedicamentPatient,patient,medicament where allergieMedicamentPatient.idPatient=patient.idPatient and medicament.idMedicament=allergieMedicamentPatient.idMedicament and patient.idPatient=?",[$id]);
        $antecedents = DB::select("select * from antecedentPatient,maladie where antecedentPatient.idMaladie=maladie.idMaladie and antecedentPatient.idPatient=?",[$id]);
        return view('patients.patients_details',compact('pat','consultations','vices','allergie1','allergie2','antecedents','commune'));
    }

//Modification du patient


    public function updatePatient(Request $request, $idPatient){

        $nom= $request->input('nomPatient');
        $prenom= $request->input('prenomPatient');
        $genrePatient= $request->input('genrePatient');
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
        $flagTransmis=$request->input('flagTransmis');

    $pat= DB::select("select idAddresse from patient where idPatient=?  ",[$idPatient]);
    $addresse=$pat[0]->idAddresse;

    DB::update('update patient set nomPatient = ? ,prenomPatient = ?,genrePatient=?,numeroIdentitePatient = ? ,uidPatient = ?,statusMatrimonialPatient= ?, dateNaissancePatient = ?, flagTransmis= ? where idPatient = ?',[$nom,$prenom,$genrePatient,$numero,$uid,$statut,$date,$flagTransmis,$idPatient]);
    DB::update('update addresse set premiereAddresse = ?,  idCommune= ?, flagTransmis=? where  idAddresse = ? ',[$adr,$commune,$flagTransmis,$addresse]);
    DB::update('update contact set telephoneContact = ?, telephoneUrgence=? , email= ?,flagTransmis=? where  idPersonne = ? ',[$telC,$telU,$email,$flagTransmis,$idPatient]);
    DB::update('update contactUrgence set relation =?,nomRelation = ?, telephoneRelation= ? ,flagTransmis=? where  idPersonne = ? ',[$relation,$Nrelation,$telR,$flagTransmis,$idPatient]);


    $pat = DB::select("SELECT patient.nomPatient,patient.prenomPatient,patient.idPatient,patient.photoPatient,allergie.description as allergie,medicament.description as allergiemedicamentpatient,contact.telephoneContact as contactes 
                                FROM (patient inner JOIN allergiePatient on allergiePatient.idPatient=patient.idPatient 
                                inner JOIN allergie on allergie.idAllergie=allergiePatient.idAllergie	 
                                inner JOIN allergiemedicamentpatient on allergiemedicamentpatient.idPatient=patient.idPatient	 
                                inner JOIN medicament on medicament.idMedicament=allergiemedicamentpatient.idMedicament	 
                                inner JOIN contact on patient.idPatient=contact.idPersonne)");

        
        return redirect()->route('patient_details',$idPatient)->with('success', 'Le profile du patient a été modifié avec succès !');


}  
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
