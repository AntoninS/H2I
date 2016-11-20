<?php
  require_once ("Model.php");
  class TutoratManager extends Model{

    public function getSemaineTutorat($numSemaine){
      $requete = $this->executerRequete('select creneau, lundi, mardi, mercredi, jeudi, vendredi from planningtutorat
      where numeroSemaine = ?', array($numSemaine));

      $data = $requete->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }

  /*  public function updateTableHoraire(){
      $joursSemaine[]=('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi');
      foreach ($joursSemaine as $jour) {




                               //idée de code possible, pb : comment ajouter automatiquement un cours a horaire ?,

      $requete = $this->executerRequete('update horaire
      set ? = (select coursTutorat.nomMatiere from coursTutorat where coursTutorat.id=horaire.idCoursTutorat)
      where numeroSemaine = WEEK(select coursTutorat.jour from coursTutorat where coursTutorat.id=horaire.idCoursTutorat)
      and creneau = heureDebut + heureFin and idCoursTutorat = var pour l id', array($jour, $numSemaine));

    }
  }

    //public function addTutorat(){

    }
 */
 }
?>
