<?php

namespace App\Models;


class Rencontre extends AppModel
{

    public function getRencontres($division, $journee)
    {

        $sql = "SELECT  re.feuille_match, 
                        COALESCE(cl1.nom, \"BYE\") AS visite, 
                        COALESCE(cl2.nom, \"BYE\") AS visiteur, 
                        re.date_match, COALESCE(cl1.indice, \"BYE\") AS indice_visite, 
                        COALESCE(cl2.indice, \"BYE\") AS indice_visiteur, 
                        COALESCE(eq1.lettre,\"\") AS lettre_visite,  
                        COALESCE(eq2.lettre, \"\") AS lettre_visiteur
                FROM rencontres re
                LEFT JOIN equipes eq1
                ON re.visite = eq1.id
                LEFT JOIN clubs cl1
                ON eq1.club = cl1.id
                LEFT JOIN equipes eq2
                ON re.visiteur = eq2.id
                LEFT JOIN clubs cl2
                ON eq2.club = cl2.id
                WHERE re.division = ?
                AND journee = ?
                ORDER BY 
                CASE
                    WHEN cl1.nom IS NULL OR cl2.nom IS NULL THEN 2
                    ELSE 1 
                END;";
        $req = $this->bdd->prepare($sql);
        $req->execute([$division, $journee]);
        $results = $req->fetchAll(\PDO::FETCH_CLASS, 'App\\Models\\Entities\\RencontreEntity');
        return $results;
    }
    public function getRencontresEquipe($id)
    {
        $sql = "SELECT  re.feuille_match, 
                        COALESCE(cl1.nom, \"BYE\") AS visite, 
                        COALESCE(cl2.nom, \"BYE\") AS visiteur, 
                        re.date_match, COALESCE(cl1.indice, \"BYE\") AS indice_visite, 
                        COALESCE(cl2.indice, \"BYE\") AS indice_visiteur, 
                        COALESCE(eq1.lettre,\"\") AS lettre_visite,  
                        COALESCE(eq2.lettre, \"\") AS lettre_visiteur
                FROM rencontres re
                LEFT JOIN equipes eq1
                ON re.visite = eq1.id
                LEFT JOIN clubs cl1
                ON eq1.club = cl1.id
                LEFT JOIN equipes eq2
                ON re.visiteur = eq2.id
                LEFT JOIN clubs cl2
                ON eq2.club = cl2.id
                WHERE eq1.id = :id 
                 OR eq2.id = :id
                ORDER BY re.date_match;";
        $req = $this->bdd->prepare($sql);
        $req->execute(["id" => $id]);
        $results = $req->fetchAll(\PDO::FETCH_CLASS, 'App\\Models\\Entities\\RencontreEntity');
        return $results;
    }
    public function getRencontreToUpdate()
    {
        $sql = "select IC
                from rencontres
                where date_match < NOW()
                and complete = 0
                and visite is not null
                and visiteur is not null";
        $req = $this->bdd->prepare($sql);
        $req->execute();
        $results = $req->fetchAll(\PDO::FETCH_CLASS, 'App\\Models\\Entities\\RencontreEntity');
        return $results;
    }


}
