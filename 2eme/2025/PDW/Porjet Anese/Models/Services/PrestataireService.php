<?php
namespace App\Models\Services;

use App\Models\DemandeModel;

class PrestataireService {
    //ce que fait un prestataire sur le site. il faut controller si c'est bien un prestataire qui le demande
    function notifierPrestataire(int $id_prestataire, int $id_demande, bool $nouvelORrevision) : array {
        $demandeModel = new DemandeModel();
        $demande = $demandeModel->find($id_demande);
        
        return $demande;        
    }
    
    public function confirmerDemande(int $id_demande){
        $demandeModel = new DemandeModel();
        $demande = $demandeModel->find($id_demande);
        $demande->status = 1;
        $demandeModel->save($demande);
    }
    
    public function depotVersion(int $id_demande, int $revision,array $fichierDataForm){
        \log_message('debug', 'fction lancé : depot version ');
        $demandeModel = new DemandeModel();
        $demande = $demandeModel->find($id_demande);
        $y = $demande->setJSon();
        
        $idUser = $demande->select('id_user');
        $fichierService = new FichierService();
        $fichierService->deposerFichier($id_demande, $idUser, false, $revision, $fichierDataForm);
        $demande->setStatusDemande('3');
        $demandeModel->save($demande);
        try{
            $x = $demande->getStatusString();
            \log_message('debug', 'status de la demande: '.$x.'json demande :'.$y);
        }
        catch(\Throwable $e){
            \log_message('error', 'status de la demande echouer');
            
        }
    }
}