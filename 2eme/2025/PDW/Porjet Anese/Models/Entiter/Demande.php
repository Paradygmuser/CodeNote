<?php

namespace App\Models\Entiter;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Demande extends Entity{
    protected $attributes=[
        'description_project'=>null
    ];
     /**
     * si une date d'expiration est presente et que l'heur actuel est avant celle ci alors vrai l'user peux demander une revision
     * 
     * @return bool donc si faux la date d'expiration est passé => nouvelle demande, si vrai c'est une revision permise.
     */
    public function estRevisionnable() : bool{
        return $this->expires_le != null and Time::now('Europe/Paris')->isBefore($this->expires_le);
    }
    
    public function getInformation(){
        return 'la demande : '.$this->id_demande.' appartien a l\'user : '.$this->id_user.' sa confirmation est ; '.$this->num_demande.' son statut est a :';
    }
    
    public function getStatus() {
        return  (int) $this->status_demande;
    }
    public function getId(){
        return $this->id_demande;
    }
    
    public function getIdPrestataire(){
        return $this->attributes['id_prestataire'];
    }
    public function getNameProject(){
        return $this->nom_projet;
    }
    
    public function getNum(){
        return $this->demande_num;
    }
    
    public function setDescription(string $description){
        $this->attributes['description_project']=$description;
    }
    public function getCreatedAt(){
        return $this->attributes['creer_le'];
    }
    
    public function getNumDemande(){
        return $this->demande_num;
    }
    
    public function getTypeString() : string {
        $result = $this->demande_type;
        switch ($result) {
            case '0':
                return 'MIX AUDIIO';
                break;
            case '1':
                return 'MASTER AUDIO';
                break;
            case '2':
                return 'SOUND DESIGN';
                break;
            case '3':
                return 'COMPOSITION';
                break;
        }
    }
    public function getStatusString() : string {
        $result = $this->status_demande;
        switch ($result) {
            case '0':
                return 'ATTENTE VALIDATION'; //la demande est creer le prestataire a 14 jour pour la valider.
                break;
            case '1':
                return 'EN TRAITEMENT';//le prestataire a valider la mission, il a 14 jour pour la remettre(les x jour sont arbitraire et devrait etre analyser en fonction du type de demande
                break;
            case '2':
                return 'RECU'; // le prestataire a fait le depot de la demande de mission.(deux fois sur trois type c'est un zip, sinon wav(type master).
                break;
            case '3':
                return 'CLOTURER'; //le client a valider le depot, la mission est terminer.
                break;
            case '4':
                return 'EN REVISION'; // une revision est en court.
                break;
            case '5':
                return 'SUPPRIMER'; // la demande est annuler par le client ou le prestataire.
                break;
        }
    }
    public function setStatusDemande($status){
        /**
         * sans le attribute le entitie ne sauvegarde pas temporrairement dans le model le status demande a sauvegarder.
         */
        $this->attributes['status_demande']=$status;
    }
    public function donneInfo(){
        return $this->commentaire_realisation;
    }
    public function getIdUser(){
        return $this->attributes['id_user'];
    }
    public function setExpireLe($dateToString){
        $this->attributes['expires_le']=$dateToString;
    }
    
    public function getExpiresDate(){
        return $this->expires_le;
    }
    public function getModifeDate(){
        return $this->modifier_le;
    }
}