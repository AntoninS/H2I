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

    public function getTuteurID($nomModule)
    {
      $requete = $this->executerRequete('SELECT utilisateurID FROM utilisateurs
      LEFT JOIN module ON utilisateurs.utilisateurID = module.tuteur WHERE module.nomModule = ?', array($nomModule));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      return $data;
    }

    public function getNomModule()
    {
      $requete = $this->executerRequete('SELECT nomModule FROM module WHERE tuteur IS NOT NULL');
      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

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

    public function ajouterTutorat($module, $jour, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle)
    {
      $requete = $this->executerRequete('INSERT INTO courstutorat(nomModule, jour, heureDebut, heureFin, tuteur, eleve, salle)
      VALUES (?, ?, ?, ?, ?, ?, ?)', array($module, $jour, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle));
    }

    public function getCoursTutoratID($module, $jour, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle)
    {
      $requete = $this->executerRequete('SELECT id FROM courstutorat WHERE nomModule=? AND jour=? AND heureDebut=? AND heureFin=? AND tuteur=? AND eleve=? AND salle=?',
      array($module, $jour, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      return $data['id'];
    }

    public function actualiserSemainePlanning($semaineAjoutTutorat, $anneeAjoutTutorat, $module, $jourTutoratMot, $idCoursTutorat, $heureaActualiser)
    {
      $requete = $this->executerRequete('UPDATE planningtutorat SET idCoursTutorat=?, '.$jourTutoratMot.'=? WHERE numeroSemaine=? AND heurePlanning=? AND annee = ?',
      array($idCoursTutorat, $module, $semaineAjoutTutorat, $heureaActualiser, $anneeAjoutTutorat));
    }


  }

?>
