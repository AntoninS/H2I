<?php
  require_once ("Model.php");
  class TutoratManager extends Model
  {

    public function getSemaineTutorat($numSemaine, $numAnnee)
    {
      $requete = $this->executerRequete('SELECT heurePlanning, lundi, mardi, mercredi, jeudi, vendredi FROM planningtutorat
      WHERE numeroSemaine = ? AND annee = ?', array($numSemaine, $numAnnee));

      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      $semaine = $this->transformerSemaine($data);
      return $semaine;
    }
    /*
        Ce qu'on a pour le moment :
        Array (
        [0] => Array ( [heurePlanning] => 8
                       [lundi] =>
                       [mardi] =>
                       [mercredi] =>
                       [jeudi] =>
                       [vendredi] => 1
                     )
       [1] => Array ( [heurePlanning] => 9
                      [lundi] =>
                      [mardi] =>
                      [mercredi] =>
                      [jeudi] =>
                      [vendredi] =>
                    )
        )

        Après l'utilisation de cette fonction pour rajouter un array :

        Array (
        [0] => Array ( [heurePlanning] => 8
                       [lundi] => Array ( [id] =>
                                          [nomModule] =>
                                        )
                       [mardi] => Array ( [id] =>
                                          [nomModule] =>
                                        )
                       [mercredi] => Array ( [id] =>
                                             [nomModule] =>
                                           )
                       [jeudi] => Array ( [id] =>
                                          [nomModule] =>
                                        )
                       [vendredi] => Array ( [id] => 1
                                             [nomModule] => Programmation C
                                           )
                     )
        )
    */
    public function transformerSemaine($semaine)
    {
      for($i=0; $i<=count($semaine)-1; $i++)
      {
        $idLundi = $semaine[$i]['lundi'];
        $nomModuleLundi = $this->getNomModule($semaine[$i]['lundi']);
        $nbPlacesRestantes = $this->getNombrePlacesRestantes($semaine[$i]['lundi']);
        $infoLundi = array("id"=>$idLundi, "nomModule"=>$nomModuleLundi, "nbPlacesRestantes"=>$nbPlacesRestantes);

        $idMardi = $semaine[$i]['mardi'];
        $nomModuleMardi = $this->getNomModule($semaine[$i]['mardi']);
        $nbPlacesRestantes = $this->getNombrePlacesRestantes($semaine[$i]['mardi']);
        $infoMardi = array("id"=>$idMardi, "nomModule"=>$nomModuleMardi, "nbPlacesRestantes"=>$nbPlacesRestantes);

        $idMercredi = $semaine[$i]['mercredi'];
        $nomModuleMercredi = $this->getNomModule($semaine[$i]['mercredi']);
        $nbPlacesRestantes = $this->getNombrePlacesRestantes($semaine[$i]['mercredi']);
        $infoMercredi = array("id"=>$idMercredi, "nomModule"=>$nomModuleMercredi, "nbPlacesRestantes"=>$nbPlacesRestantes);

        $idJeudi = $semaine[$i]['jeudi'];
        $nomModuleJeudi = $this->getNomModule($semaine[$i]['jeudi']);
        $nbPlacesRestantes = $this->getNombrePlacesRestantes($semaine[$i]['jeudi']);
        $infoJeudi = array("id"=>$idJeudi, "nomModule"=>$nomModuleJeudi, "nbPlacesRestantes"=>$nbPlacesRestantes);

        $idVendredi = $semaine[$i]['vendredi'];
        $nomModuleVendredi = $this->getNomModule($semaine[$i]['vendredi']);
        $nbPlacesRestantes = $this->getNombrePlacesRestantes($semaine[$i]['vendredi']);
        $infoVendredi = array("id"=>$idVendredi, "nomModule"=>$nomModuleVendredi, "nbPlacesRestantes"=>$nbPlacesRestantes);

        $semaine[$i]['lundi'] = $infoLundi;
        $semaine[$i]['mardi'] = $infoMardi;
        $semaine[$i]['mercredi'] = $infoMercredi;
        $semaine[$i]['jeudi'] = $infoJeudi;
        $semaine[$i]['vendredi'] = $infoVendredi;
      }
      return $semaine;
    }

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

    public function getDateTutorat($id)
    {
      $requete = $this->executerRequete('SELECT jour, heureDebut, heureFin FROM courstutorat WHERE id=?', array($id));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      return $data;
    }

    public function getNombrePlacesRestantes($tutoratID)
    {
      $requete = $this->executerRequete('SELECT
                                         IF(eleve1 is null, 0, 1) +
                                         IF(eleve2 is null, 0, 1) +
                                         IF(eleve3 is null, 0, 1) +
                                         IF(eleve4 is null, 0, 1) AS nb
                                         FROM courstutorat
                                         WHERE id = ?', array($tutoratID));
      $data = $requete->fetch(PDO::FETCH_ASSOC);
      $nombrePlacesRestantes = 4 - $data['nb'];
      return $nombrePlacesRestantes;
    }

    public function getElevesInscrit($idTutorat)
    {
      $requete = $this->executerRequete('SELECT eleve1, eleve2, eleve3, eleve4 FROM courstutorat WHERE id = ?', array($idTutorat));
      $listeEleves = $requete->fetch(PDO::FETCH_ASSOC);
      return $listeEleves;
    }

    public function ajouterEleveTutorat($idEleve, $idTutorat, $rangEleveRemplacer)
    {
      $requete = $this->executerRequete("UPDATE courstutorat SET $rangEleveRemplacer=? WHERE id=?",
      array($idEleve, $idTutorat));
    }

    public function getListeParticipationTutoratEleve($idEleve)
    {
      $requete = $this->executerRequete('SELECT * FROM courstutorat WHERE (eleve1=? OR eleve2=? OR eleve3=? OR eleve4=?) AND jour >= CURDATE() ORDER BY jour', array($idEleve, $idEleve, $idEleve, $idEleve));
      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

    public function getListeTutoratDispense($idTuteur)
    {
      $requete = $this->executerRequete('SELECT * FROM courstutorat WHERE tuteur=?  AND jour >= CURDATE() ORDER BY jour', array($idTuteur));
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
