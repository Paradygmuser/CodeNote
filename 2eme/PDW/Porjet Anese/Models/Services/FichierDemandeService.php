<?php
namespace App\Models\Services;
use App\Models\FichierModel;
use App\Models\FichierDemandeModel;
use App\Models\DemandeModel;

class FichierDemandeService {
    public function getInfoFichiers(string $numeroDemande){
        
        log_message('info', 'getInfoFichier appeler');
        $fichierModel = new FichierModel();
        $fichiersDemande = $fichierModel->getfichierJoint($numeroDemande);
        $dataArray = [];
        log_message('info', 'je arrive en boucle');
        log_message('info','type '.gettype($fichiersDemande));
        log_message('info','count : '. count($fichiersDemande));
        foreach ($fichiersDemande as $fichier){
            log_message('info', 'je rentre en boucle');
            
            log_message('info', $fichier->getNameFichier());
            /**
             * je me fait avoir tout le temps, si je ne met pas les array avant le egale, il ne garde qu'une clef.
             */
            $dataArray[] = [
                'nom_fichier'=> $fichier->getNameFichier(),
                'type fichier'=> $fichier->getTypeMime()
            ];
        }
//         log_message('info', $dataArray['nom_fichier']);
        return $dataArray;
    }
    
    public function bounceRecu($numDemande, $dataFiles){
        $fichierService= new FichierService();
        $demandeModel = new DemandeModel();
        $fichierDemandeModel = new FichierDemandeModel();
        
        /**
         * recuperer la demande et l'id depuis le num unique
         * $demande
         */
        $demande = $demandeModel->where('demande_num', $numDemande)->first();
        $idDemande = $demande->getId();
        $statusDemande = $demande->getStatus();
        /**
         * definir version de revision simpliste
         * normlmnt il devrais avoir zero fichier de statut 1 je dois verifier si j'ai expliquer dans la doc fichierDemandeModel
         * status 0 : fichier du client
         * status1 : ifhcier du prestataire. 
         * donc si je compte tout les fichier avec le status un si par de version il y en a zero.
         * sinon je rajoute 1.
         */
        $revision = $fichierDemandeModel->where('id_demande',$idDemande)->where('status','1')->countAllResults();
        
        if($statusDemande==4){
            $revision++;
        }
        
        $fichierService->deposerFichier($idDemande, $revision, $dataFiles, true);
        $demande->setStatusDemande('2');
        $demandeModel->save($demande);
    }
    
}