<?php
  require_once ("Model.php");
  class TutoratManager extends Model
  {

    public function getSemaineTutorat($numSemaine, $numAnnee)
    {
      $requete = $this->executerRequete('SELECT heurePlanning, lundi, mardi, mercredi, jeudi, vendredi FROM planningtutorat
      WHERE numeroSemaine = ? AND annee = ?', array($numSemaine, $numAnnee));

      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

    /*
    public function getSemaineTutorat($numSemaine, $numAnnee)
    {
      $requete = $this->executerRequete('SELECT heurePlanning, lundi = (SELECT nomModule FROM courstutorat WHERE id=(SELECT lundi from planningtutorat WHERE numeroSemaine = ? AND annee = ? AND heurePlanning=8)), mardi, mercredi, jeudi, vendredi FROM planningtutorat
      WHERE numeroSemaine = ? AND annee = ?', array($numSemaine, $numAnnee, $numSemaine, $numAnnee));

      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }
    */

    public function getTuteurID($nomModule)
    {
      $requete = $this->executerRequete('SELECT utilisateurID FROM utilisateurs
      LEFT JOIN module ON utilisateurs.utilisateurID = module.tuteur WHERE module.nomModule = ?', array($nomModule));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      return $data;
    }

    public function getNomModuleDispo()
    {
      $requete = $this->executerRequete('SELECT nomModule FROM module WHERE tuteur IS NOT NULL');
      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

    public function getNomModule($idCoursTutorat)
    {
      $requete = $this->executerRequete('SELECT nomModule FROM courstutorat WHERE id=?', array($idCoursTutorat));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      return $data['nomModule'];
    }

    public function getCoursTutoratID($module, $jour, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle)
    {
      $requete = $this->executerRequete('SELECT id FROM courstutorat WHERE nomModule=? AND jour=? AND heureDebut=? AND heureFin=? AND tuteur=? AND eleve1=? AND salle=?',
      array($module, $jour, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      return $data['id'];
    }

    public function getNombreElevesTutorat($tutoratID)
    {
      $requete = $this->executerRequete('SELECT
                                         IF(eleve1 is null, 0, 1) +
                                         IF(eleve2 is null, 0, 1) +
                                         IF(eleve3 is null, 0, 1) +
                                         IF(eleve4 is null, 0, 1) AS nb
                                         FROM courstutorat
                                         WHERE id = ?', array($tutoratID));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      return $data['nb'];
    }

/*
    public function addEleveTutorat()
    {

    }
*/
    public function verifierInitSemaine($numSemaine, $numAnnee) //sert à verifier si toute la semaine à été initialisée (=verifie si toute la semaine est remplie de valeur NULL)
    {
      $requete = $this->executerRequete('SELECT COUNT(*) AS verifInitSemaine FROM planningtutorat WHERE numeroSemaine = ? AND annee = ?', array($numSemaine, $numAnnee));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      return $data;
    }

    public function initialiseSemaine($numSemaine, $numAnnee) //Sert à remplir toute une semaine avec NULL comme valeur pour les jours, simplifie l'affichage
    {
      for($heure = 8; $heure <= 19; $heure++ )
      {
        $heure;
        $requete = $this->executerRequete('INSERT INTO planningtutorat (annee, numeroSemaine, heurePlanning) VALUES (?, ?, ?)', array($numAnnee, $numSemaine, $heure));
      }
    }

    public function trouverDateFormatJourMois($semaine, $annee, $jour)
    {
      return (new DateTime())->setISODate($annee, $semaine, $jour)->format('d/m');
    }

    public function trouverDateFormatJourMoisAnnee($semaine, $annee, $jour)
    {
      return (new DateTime())->setISODate($annee, $semaine, $jour)->format('d/m/Y');
    }

    public function ajouterTutorat($module, $jour, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle, $commentaireTutorat)
    {
      $requete = $this->executerRequete('INSERT INTO courstutorat(nomModule, jour, heureDebut, heureFin, tuteur, eleve1, salle, commentaireTutorat)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?)', array($module, $jour, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle, $commentaireTutorat));
    }

    public function actualiserSemainePlanning($semaineAjoutTutorat, $anneeAjoutTutorat, $module, $jourTutoratMot, $idCoursTutorat, $heureaActualiser)
    {
      $requete = $this->executerRequete("UPDATE planningtutorat SET $jourTutoratMot=? WHERE numeroSemaine=? AND heurePlanning=? AND annee = ?",
      array($idCoursTutorat, $semaineAjoutTutorat, $heureaActualiser, $anneeAjoutTutorat));
    }


  }

?>
