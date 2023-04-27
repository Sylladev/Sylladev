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
        $patients = DB::select("select * from patient,addresse,contact where patient.idAddresse=addresse.idAddresse and contact.idPersonne=patient.idPatient");
        return view('patients.patients_liste',compact('patients'));
    }

    public function patient_details($id)
    {
        $patient = DB::select("select * from patient,addresse,contact,contacturgence where patient.idAddresse=addresse.idAddresse and contact.idPersonne=patient.idPatient and patient.idPatient=contacturgence.idPersonne and patient.idPatient=?",[$id]);
        $consultations = DB::select("select * from consultation,medecin where consultation.idMedecin = medecin.idMedecin and consultation.idPatient=? ", [$id]);
        $vices = DB::select("select * from vice,vicepatient where vice.idVice = vicepatient.idVice and vicepatient.idPatient=?",[$id]);
        $allergie1 = DB::select("select * from allergiepatient,patient where allergiepatient.idPatient=patient.idPatient and patient.idPatient=?",[$id]);
        $allergie2 = DB::select("select * from allergieMedicamentPatient,patient,medicament where allergieMedicamentPatient.idPatient=patient.idPatient and medicament.idMedicament=allergieMedicamentPatient.idMedicament and patient.idPatient=?",[$id]);
        $antecedents = DB::select("select * from antecedentPatient,maladie where antecedentPatient.idMaladie=maladie.idMaladie and antecedentPatient.idPatient=?",[$id]);
        return view('patients.patients_details',compact('patient','consultations','vices','allergie1','allergie2','antecedents'));
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
