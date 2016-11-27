<?php
  require_once ("Model.php");
  class TutoratManager extends Model{

    public function getSemaineTutorat($numSemaine, $numAnnee){
      $requete = $this->executerRequete('SELECT heurePlanning, lundi, mardi, mercredi, jeudi, vendredi FROM planningtutorat
      WHERE numeroSemaine = ? AND annee = ?', array($numSemaine, $numAnnee));

      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

    public function getTuteur($nomModule){
      $requete = $this->executerRequete('SELECT prenom, pseudo FROM utilisateurs
      LEFT JOIN module ON (SELECT id FROM utilisateurs) = (SELECT tuteur FROM module) WHERE module.tuteur = ?', array($nomModule));
      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

    public function getNomModule(){
      $requete = $this->executerRequete('SELECT nomModule FROM module WHERE tuteur IS NOT NULL');
      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

    public function verifierInitSemaine($numSemaine, $numAnnee){ //sert à verifier si toute la semaine à été initialisée (=verifie si toute la semaine est remplie de valeur NULL)
      $requete = $this->executerRequete('SELECT COUNT(*) AS verifInitSemaine FROM planningtutorat WHERE numeroSemaine = ? AND annee = ?', array($numSemaine, $numAnnee));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      return $data;
    }

    public function initialiseSemaine($numSemaine, $numAnnee){   //Sert à remplir toute une semaine avec NULL comme valeur pour les jours, simplifie l'affichage
      for($heure = 8; $heure <= 18; $heure++ ){
        $heure;
        $requete = $this->executerRequete('INSERT INTO planningtutorat (annee, numeroSemaine, heurePlanning) VALUES (?, ?, ?)', array($numAnnee, $numSemaine, $heure));
      }
    }

/*
    public function addTutorat(){
      $requete = $this->executerRequete('insert into courstutorat(nomModule, jour, heureDebut, tuteur, eleve, salle) values ('$_POST['...'])' ');
    }

*/
  /*  public function (){
      $joursSemaine[]=('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi');
      foreach ($joursSemaine as $jour) {




                               //idée de code possible, pb : comment ajouter automatiquement un cours a horaire ?,

      $requete = $this->executerRequete('update horaire
      set ? = (select coursTutorat.nomMatiere from coursTutorat where coursTutorat.id=horaire.idCoursTutorat)
      where numeroSemaine = WEEK(select coursTutorat.jour from coursTutorat where coursTutorat.id=horaire.idCoursTutorat)
      and creneau = heureDebut + heureFin and idCoursTutorat = var pour l id', array($jour, $numSemaine));

    }
  }
 */

 }
?>
