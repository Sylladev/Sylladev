<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $flag = DB::select("select year(flagTransmis) as year  from consultation  group by year(flagTransmis) desc Limit 1");
        if (empty($flag)) {
            $year='2000';
        } else {
            $year =$flag[0]->year;
        }
        
        $year = date('Y');
       
        $consultations = count(DB::select("select * from consultation where flagTransmis like '%$year%'"));

        $medecins = count(DB::select("select * from medecin "));

        $patients = count(DB::select("select * from patient where flagTransmis like '%$year%' "));

        $patients2 = DB::select("select * from patient where flagTransmis like '%$year%' ");

        $today = date('Y-m-d');

        $patientsEnfant = 0;

        foreach($patients2 as $p){
            $date = strtotime($p->dateNaissancePatient);
            $dateConvert = date('Y-m-d',$date);
            $datetime1 = date_create($today); // Date fixe
            $datetime2 = date_create($dateConvert); // Date fixe
            $interval = date_diff($datetime1, $datetime2);
            $age =  $interval->format('%y');
            if($age<18){
                $patientsEnfant =$patientsEnfant + 1;
            }
        }

        $maladeFemale = count(DB::select("select * from patient where flagTransmis like '%$year%' and genrePatient ='F'"));

        $maladeMale = count(DB::select("select * from patient where flagTransmis like '%$year%' and genrePatient ='M'"));

        $patientsRecents = DB::select("select * from patient order by flagTransmis desc limit 5");

        $medecinsConnecter = DB::select("select DISTINCT(historiquePresence.idMedecin),medecin.prenomMedecin,medecin.nomMedecin,specialite.description,medecin.photo,historiquePresence.flagTransmis from medecin,specialite,historiquePresence where historiquePresence.idMedecin=medecin.idMedecin and medecin.idSpecialite=specialite.idSpecialite and  historiquePresence.description='Login' and historiquePresence.flagTransmis like '%$today%' order by historiquePresence.flagTransmis  desc limit 3");

    

        $a = DB::select("SELECT idMaladie,
        MAX(flagTransmis) as maj,
        COUNT(*) as total
        FROM diagnostic where diagnostic.flagTransmis like '%$year%'
        GROUP BY idMaladie 
        ORDER BY total DESC LIMIT 3");

       

       if (empty($a)) {
       $maladie1 = '';
       $maladie2 = '';
       $maladie3 = '';
       $cas1=0;
       $cas2=0;
       $cas3=0;

       }else {

        if (empty($a[0]->idMaladie)) {
            $maladie1 = '';
             $cas1=0;
            
        } else {
            $maladie1 = DB::select("select description from maladie where idMaladie=?",[$a[0]->idMaladie]);
            $cas1=$a[0]->total;
        
        }

        if (empty($a[1]->idMaladie)) {
            $maladie2 = '';
             $cas2=0;
        } else {
            $maladie2 = DB::select("select description from maladie where idMaladie=?",[$a[1]->idMaladie]);
            $cas2=$a[1]->total;
        }

        if (empty($a[2]->idMaladie)) {
            $maladie3 = '';
             $cas3=0;
        } else {
            $maladie3 = DB::select("select description from maladie where idMaladie=?",[$a[2]->idMaladie]);
            $cas3=$a[2]->total;
        }
        

    
       
       }

        $jan = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-01%'"));
        $fev = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-02%'"));
        $mar = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-03%'"));
        $avr = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-04%'"));
        $mai = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-05%'"));
        $juin = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-06%'"));
        $juil = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-07%'"));
        $aout = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-08%'"));
        $sep = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-09%'"));
        $oct = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-10%'"));
        $nov = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-11%'"));
        $dec = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-12%'"));

        $flag = DB::select("select year(flagTransmis) as year  from consultation  group by year(flagTransmis) desc");
        
        return view('home.dashboard', compact('a','maladie1','maladie2','maladie3','cas1','cas2','cas3','consultations','flag','patientsEnfant', 'year','medecins', 'patients','maladeFemale','maladeMale','patientsRecents','medecinsConnecter',
         'jan','fev','mar','avr','mai','juin','juil','aout','sep','oct','nov','dec'));
    }

    public function indexFilter($year)
    {
       
        $consultations = count(DB::select("select * from consultation where flagTransmis like '%$year%'"));

        $medecins = count(DB::select("select * from medecin "));

        $patients = count(DB::select("select * from patient where flagTransmis like '%$year%' "));

        $patients2 = DB::select("select * from patient where flagTransmis like '%$year%' ");

        $today = date('Y-m-d');

        $patientsEnfant = 0;

        foreach($patients2 as $p){
            $date = strtotime($p->dateNaissancePatient);
            $dateConvert = date('Y-m-d',$date);
            $datetime1 = date_create($today); // Date fixe
            $datetime2 = date_create($dateConvert); // Date fixe
            $interval = date_diff($datetime1, $datetime2);
            $age =  $interval->format('%y');
            if($age<18){
                $patientsEnfant =$patientsEnfant + 1;
            }
        }

        $maladeFemale = count(DB::select("select * from patient where flagTransmis like '%$year%' and genrePatient ='F'"));

        $maladeMale = count(DB::select("select * from patient where flagTransmis like '%$year%' and genrePatient ='M'"));

        $patientsRecents = DB::select("select * from patient order by flagTransmis desc limit 5");

        $medecinsConnecter = DB::select("select DISTINCT(historiquePresence.idMedecin),medecin.prenomMedecin,medecin.nomMedecin,specialite.description,medecin.photo,historiquePresence.flagTransmis from medecin,specialite,historiquePresence where historiquePresence.idMedecin=medecin.idMedecin and medecin.idSpecialite=specialite.idSpecialite order by historiquePresence.flagTransmis  desc limit 3");

        $maladiesFrequentes = DB::select(" 
        select
        maladie.idMaladie,
        maladie.description
        ,coalesce(a.LinkACount,0) countMaladie
        from maladie 
        left join (
            select idMaladie, Count(idMaladie) LinkACount from diagnostic where diagnostic.flagTransmis like '%$year%' group by idMaladie Order by LinkAcount Desc Limit 4
            ) as a on a.idMaladie=maladie.idMaladie
       
        ");

        $jan = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-01%'"));
        $fev = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-02%'"));
        $mar = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-03%'"));
        $avr = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-04%'"));
        $mai = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-05%'"));
        $juin = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-06%'"));
        $juil = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-07%'"));
        $aout = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-08%'"));
        $sep = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-09%'"));
        $oct = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-10%'"));
        $nov = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-11%'"));
        $dec = count(DB::select("select idConsultation from consultation where flagTransmis like '%$year-12%'"));

        $flag = DB::select("select year(flagTransmis) as year  from consultation  group by year(flagTransmis) desc");
        
        return view('home.dashboard', compact('consultations','flag','patientsEnfant', 'year','medecins', 'patients', 'maladiesFrequentes','maladiesFrequentes','maladeFemale','maladeMale','patientsRecents','medecinsConnecter',
         'jan','fev','mar','avr','mai','juin','juil','aout','sep','oct','nov','dec'));
    }
}
