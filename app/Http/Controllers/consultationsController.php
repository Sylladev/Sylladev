<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class consultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $consultations = DB::select("select * from consultation,medecin,patient where consultation.idMedecin = medecin.idMedecin and consultation.idPatient=patient.idPatient order by consultation.dateConsultation DESC LIMIT 100");
        
        return view('consultations.consultations_liste',compact('consultations'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consultations_details($id)
    {
        $consultation = DB::select("select * from consultation,medecin,patient,specialite where consultation.idMedecin = medecin.idMedecin and consultation.idPatient=patient.idPatient and  specialite.idSpecialite=medecin.idSpecialite and consultation.idConsultation=? order by consultation.idConsultation DESC LIMIT 100",[$id]);
        $conseils = DB::select("select * from consultation,conseil where consultation.idConsultation = conseil.idConsultation and consultation.idConsultation=?",[$id]);
        $descriptionConsultation = DB::select("select consultation.description from consultation,medecin,patient,specialite where consultation.idMedecin = medecin.idMedecin and consultation.idPatient=patient.idPatient and  specialite.idSpecialite=medecin.idSpecialite and consultation.idConsultation=?",[$id]);
        $prescriptions = DB::select("select * from prescription where idConsultation=?",[$id]);
        $diagnostics= DB::select("select consultation.idConsultation,maladie.description as maladie,diagnostic.description as diagnostic from diagnostic,consultation,maladie where diagnostic.idConsultation=consultation.idConsultation and diagnostic.idMaladie=maladie.idMaladie and consultation.idConsultation=?",[$id]);
        $signesVitaux = DB::select("select categorieSigneVitaux.description,valeur from signesVitaux,consultation,categorieSigneVitaux where signesVitaux.idConsultation=consultation.idConsultation and signesVitaux.idCatSV=categorieSigneVitaux.idCatSV and signesVitaux.idConsultation=?",[$id]);
        $vaccination = DB::select("select * from vaccinationPatient,typeVaccination where vaccinationPatient.idTypeVaccination = typeVaccination.idTypeVaccination and vaccinationPatient.idConsultation=?",[$id]);
        $symptome = DB::select("select symptome.description as symptome,departement.description as departement from symptomesPatient,symptome,departement where symptome.idDepartement=departement.idDepartement and symptomesPatient.idSymptome=symptome.idSymptome and symptomesPatient.idConsultation=?",[$id]);
        $reference1 = DB::select("select * from reference,medecin where reference.idMedecin1 = medecin.idMedecin and reference.idConsultation=? LIMIT 1",[$id]);
        $reference2 = DB::select("select * from reference,medecin where reference.idMedecin2 = medecin.idMedecin and reference.idConsultation=? LIMIT 1",[$id]);

        $ekg = DB::select("select * from ekgFichier where idConsultation=? order by idEkgFichier DESC LIMIT 12",[$id]);

        $examens = DB::select("select * from examen,typeExamens where examen.idTypeExamens = typeExamens.idTypeExamens and  examen.valeur like '%/%' and examen.idConsultation=? order by examen.idExamen DESC LIMIT 12",[$id]);

        $examensDetails = DB::select("select * from examen,typeExamens where examen.idTypeExamens = typeExamens.idTypeExamens and examen.idExamen in(select idExamen from examenDetaille) and examen.idConsultation=? order by examen.idExamen DESC LIMIT 100",[$id]);

        return view('consultations.consultations_details',compact('ekg','signesVitaux','consultation','prescriptions','descriptionConsultation','conseils','diagnostics','examens','examensDetails','vaccination','symptome','reference1','reference2'));
        
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
