<?php

namespace App\Http\Controllers;
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
use App\Models\contacturgence;
use App\Models\verification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($annee)
    {
        $medecin= DB::select('select count(*) as total_medecin from medecin');
        $patient= DB::select("select count(*) as total_patient, year(flagTransmis) as flagTransmis from patient where year(flagTransmis)='$annee' group by year(flagTransmis)");
        $consultation= DB::select("select count(*) as total_consultation, year(flagTransmis) as flagTransmis from consultation where year(flagTransmis)='$annee' group by year(flagTransmis)");
        $departement= DB::select('select count(*) as total_departement from departement');
        $maladie= DB::select('select description as malad, description from maladie  ORDER BY malad DESC LIMIT 3');
        

        
        $consultation_graphe= DB::select("select date_format(dateConsultation,'%Y-%m') as mois,count(*) as totalconsult from consultation where year(flagTransmis)='$annee'  group by date_format(dateConsultation,'%Y-%m') 
        order by date_format(dateConsultation,'%Y-%m') asc limit 13");

        $vaccination_graphe= DB::select("select date_format(dateVaccination,'%Y-%m') as mois,count(*) as totalVaccin from vaccinationPatient where year(flagTransmis)='$annee'  group by date_format(dateVaccination,'%Y-%m') 
        order by date_format(dateVaccination,'%Y-%m') asc limit 13");

        $maladieFrequent= DB::select("select maladie.description as malad, count(diagnostic.idMaladie) as count  from maladie,diagnostic where maladie.idMaladie=diagnostic.idMaladie and year(diagnostic.flagTransmis)='$annee'  group BY malad DESC LIMIT 3");
        $examenFrequent= DB::select("select typeExamens.typeExamens as exam, count(examen.idExamen) as count  from examen,typeExamens where examen.idTypeExamens=typeExamens.idTypeExamens and year(examen.flagTransmis)='$annee'  group BY exam DESC LIMIT 3");
        $sanguinFrequent= DB::select("select sanguin.description as sanguin, count(patient.groupeSanguinPatient) as count  from sanguin,patient where patient.groupeSanguinPatient=sanguin.description and year(patient.flagTransmis)='$annee' group BY sanguin DESC LIMIT 3");


  $flag= DB::select("select year(flagTransmis) as year  from consultation  group by year(flagTransmis) desc");
          if (empty($flag)) {
             $annee = '2000';
         }else{
            $annee = $flag[0]->year;
         }
       
          
        return view('home/statistic',compact('medecin','patient','consultation','departement','maladie','consultation_graphe','flag','maladieFrequent','vaccination_graphe','examenFrequent','sanguinFrequent','annee'));
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
