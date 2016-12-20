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

    public function trouver_date($semaine, $annee, $jour)
    {
      if(strftime("%W",mktime(0,0,0,01,01,$annee))==1)
      $mktime = mktime(0,0,0,01,(01+(($semaine-1)*7)),$annee);
      else
      $mktime = mktime(0,0,0,01,(01+(($semaine)*7)),$annee);

      if(date("w",$mktime) >= 1)
      $decalage = ((date("w",$mktime)-1)*60*60*24);

      $lundi = $mktime - $decalage;
      $mardi = $lundi + (1*60*60*24);
      $mercredi = $lundi + (2*60*60*24);
      $jeudi = $lundi + (3*60*60*24);
      $vendredi = $lundi + (4*60*60*24);
      $samedi = $lundi + (5*60*60*24);
      $dimanche = $lundi + (6*60*60*24);

      $resultat = array(date("d/m/Y",$lundi),
                date("d/m/Y",$mardi),
                date("d/m/Y",$mercredi),
                date("d/m/Y",$jeudi),
                date("d/m/Y",$vendredi),
                date("d/m/Y",$samedi),
                date("d/m/Y",$dimanche));

      $jours = array(0, 1, 2, 3, 4, 5, 6);
      if(in_array($jour, $jours))
      return $resultat[$jour];
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
