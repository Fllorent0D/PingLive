<?php

namespace App\Controllers;


use App\Api\CalendrierClub;
use App\Api\CalendrierDivision;
use App\Api\FeuilleMatch;
use App\Api\InfosClub;
use App\Api\InitData;
use App\Api\ListeForce;
use App\Api\Resultats;
use Carbon\Carbon;

class DashboardController extends AppController
{
    public $hasModel = false;


    public function index()
    {
        try
        {

            /*
             * Infos clubs
             */
            /*
            $this->loadModel('Club');
            $this->loadModel('Responsable');

            $clubs = $this->Club->get(["where" => "indice IS NOT NULL"]);
            foreach ($clubs as $club)
            {
                $request = new InfosClub($club->indice);
                $infos = $request->getData();
                var_dump($infos);

                $updateclub = new \stdClass();
                if($infos[0] != 'null')
                {

                    $updateclub->equipes_mes = (int)$infos[0][0]->NM;
                    $updateclub->equipes_dam = (int)$infos[0][0]->ND;
                    $updateclub->email = $infos[0][0]->MAIL;
                }
                if($infos[1] != 'null')
                {

                    $updateclub->nom_complet = ucfirst(strtolower($infos[1][0]->NOM));
                    $updateclub->adresse = ucfirst(strtolower($infos[1][0]->ADRESSE));
                    $updateclub->code_postal =$infos[1][0]->CP;
                    $updateclub->localite = ucfirst(strtolower($infos[1][0]->LOCALITE));
                    $updateclub->telephone =$infos[1][0]->TEL;
                    if(!is_null($infos[1][0]->SM))
                        $updateclub->semelles_noirs = ($infos[1][0]->SM == 'N')? 0 : 1;

                    if(!is_null($infos[1][0]->MV))
                        $updateclub->acces_valide =($infos[1][0]->MV == 'N')? 0 : 1;

                    if(!is_null($infos[1][0]->BB))
                        $updateclub->balles_blanches =($infos[1][0]->BB == 'N')? 0 : 1;

                    if(!is_null($infos[1][0]->BJ))
                        $updateclub->balles_jaunes =($infos[1][0]->BJ == 'N')? 0 : 1;

                    if(!is_null($infos[1][0]->TV))
                        $updateclub->tables_vertes =($infos[1][0]->TV == 'N')? 0 : 1;

                    if(!is_null($infos[1][0]->TB))
                        $updateclub->tables_bleues =($infos[1][0]->TB == 'N')? 0 : 1;

                    $updateclub->remarques =$infos[1][0]->RE;
                    $updateclub->latitude =$infos[1][0]->LAT;
                    $updateclub->longitude =$infos[1][0]->LNG;
                    $updateclub->nombre_tables =(int)$infos[1][0]->NT;
                    var_dump($updateclub);
                    $this->Club->update($club->id, $updateclub);


                }

                foreach ($infos[2]  as $responsable)
                {
                    $newresponsable = new \stdClass();
                    $newresponsable->club = $club->id;
                    $newresponsable->fonction = $responsable->FONCTION;
                    $newresponsable->nom = $responsable->NOM;
                    $newresponsable->prenom = $responsable->PRENOM;
                    $newresponsable->adresse = $responsable->ADRESSE;
                    $newresponsable->code_postal = $responsable->CP;
                    $newresponsable->localite = $responsable->LOCALITE;
                    $newresponsable->telephone = $responsable->TEL;
                    $newresponsable->fax = $responsable->FAX;
                    $newresponsable->gsm = $responsable->GSM;
                    $newresponsable->email = $responsable->MAIL;
                    var_dump($newresponsable);
                    $this->Responsable->create($newresponsable);
                }


            }
die;
            */
            /* Clubs/Indices/provinces
             $request = new InitData();
                $clubs = $request->getClubs();
            $this->loadModel('Club');
            $this->loadModel('Province');

        foreach ($clubs as $club)
        {
            var_dump($club);
            $club->CLUB = str_replace("'", '', $club->CLUB);
            $checkClub = $this->Club->getFirst(["where" => ["nom" => $club->CLUB]]);
            $province = $this->Province->getFirst(["where" => ["nom" => $club->PROVINCE]]);

            $newClub = new \stdClass();
            $newClub->nom = $club->CLUB;
            $newClub->indice = $club->INDICE;
            $newClub->province = $province->id;

            if(empty($checkClub))
            {
                $this->Club->create($newClub);
            }
            else
            {
                $this->Club->update($checkClub->id, $newClub);
            }

        }
*/







            // INIT DATA
            /*
            $this->loadModel("Province");
            foreach ($d["divisions"] as $division)
            {
                $checkProvince = $this->Province->get(["where" => ["nom" => $division->CH]]);
                if(!$checkProvince)
                {
                    $newProvince = new \stdClass();
                    $newProvince->nom = $division->CH;
                    $this->Province->create($newProvince);
                }

                $checkProvince = $this->Province->getFirst(["where" => ["nom" => $division->CH]]);
                var_dump($checkProvince);
                $division->province = $checkProvince->id;
                $division->nom = $division->DI;
                //$division->id = $division->ID;
                var_dump($division);
                unset($division->CH);
                unset($division->DI);
                //unset($division->ID);
                unset($division->IDC);
                unset($division->NU);
                $this->Division->create($division);
            }*/


        }
        catch (\Exception $ex)
        {

            $this->Session->setFlash($ex->getMessage(), "danger");
        }
    }
    public function proute()
    {
        $this->needRender = false;
        $test = new CalendrierDivision(8027);
        //$test = new FeuilleMatch(171881);

        var_dump($test->getRawData());
    }
    public function test()
    {
        $this->loadModel('Division');
        $this->loadModel('Rencontre');
        $divisions = $this->Division->get();
        foreach ($divisions as $division)
        {
            $request = new CalendrierDivision($division->id);
            $rencontres = $request->getCalendrier();
            foreach ($rencontres as $rencontre)
            {
                $record = $this->Rencontre->getFirst(["where" => ["feuille_match" => $rencontre->ID]]);
                $updateRecord = new \stdClass();
                $updateRecord->division = $division->id;
                if(($record->division != $updateRecord->division)&&isset($record->id)){
                    echo "ID : ".$record->feuille_match." | "."Old : ".$record->division. " | New : ".$updateRecord->division . "<br>";
                    $this->Rencontre->update($record->id, $updateRecord);
                }
            }
        }
    }
}