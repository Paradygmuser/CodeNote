<?php
namespace App\Models\Services;

use App\Models\FichierModel;
use App\Models\FichierDemandeModel;
use App\Models\DemandeModel;
use App\Models\UserModel;

class FichierService {
    /**
     * cette fonction me permet de deposer un fichier peut importe la situation , des fichier concernant mission ou avatar
     * @param int $idDemande si c'est un avatar l'id sera de 0 .
     * @param int $revision utile pour le FichierDemandeModel si 0 c'est un depot client sinon prestataire
     * @param array $fichierDataFrom objet du xhr recu contenant les fichier
     * @param bool $bounceORnot provient il d'un prestataire ou de l'user?
     * file-move() =>https://codeigniter.com/user_guide/libraries/files.html#moving-files
     * $fichier->getRandomName => https://codeigniter.com/user_guide/libraries/files.html#moving-files
     * 
     * https://codeigniter.com/user_guide/models/model.html#insert pour getInsertId()
     * 
     * https://codeigniter.com/user_guide/libraries/files.html#guessextension
     */
    public function deposerFichier(int $idDemande, int $revision, array $fichierDataFrom, bool $bounceORnot){        
        $fichierModel = new FichierModel();
        $fichierDemande = new FichierDemandeModel();
        $demandeM = new DemandeModel();
        $demande = $demandeM->where('id_demande',$idDemande)->first();
        
        foreach ($fichierDataFrom as &$fichier){
            if ($fichier->isValid() && ! $fichier->hasMoved()) {
                $fichierNom = $fichier->getName();
                $fichierSize = $fichier->getSize();
                $dataFichierDemande=[];
                $nomUnique='';
                $status;
                if($idDemande==0){
                    $nomUnique=$fichier->getRandomName();
                    $fichierNom=$fichier->getRandomName();
                }
                elseif (!$bounceORnot){
                    $nomUnique='R_'.$fichierNom.'_'.$demande->getNumDemande().'.'.$fichier->guessExtension();
                    $status=0;
                }
                else{
                    $nomUnique='B_'.$fichierNom.'_'.$demande->getNumDemande().'_V-'.$revision.'.'.$fichier->guessExtension();
                    $status=1;
                    
                }
                
                $pathDossier='FICHIERS';
                $pathFichier = $pathDossier.'/'.$nomUnique;
                $ligneToInsert = [
                    'nom_fichier_origin'=> $fichierNom,
                    'nom_fichier_unique'=> $nomUnique,
                    'path_fichier'=> $pathFichier,                    
                    'bytes_size'=> $fichierSize
                ];
                $fichier->move(WRITEPATH . $pathDossier, $nomUnique);
                
                $fichierModel->insert($ligneToInsert);
                if($idDemande!=0){
                    $id_fichier = $fichierModel->getInsertID();
                    
                    $dataFichierDemande= [
                        'id_demande' =>$idDemande,
                        'id_fichier' => $id_fichier,
                        'status'=>$status
                    ];
                    log_message('critical', 'id_demande numero :'.$dataFichierDemande['id_demande']);
                    log_message('critical', 'id_fichier numero :'.$dataFichierDemande['id_fichier']);
                    $fichierDemande->insert($dataFichierDemande);                    
                }
                
            }   
        }
    }
    public function depotPhotoProfil( $idUser, array $fichierDataFrom){
        $fichierModel = new FichierModel();
        $userModel = new UserModel();
        $userNTT = $userModel->where('id_user',$idUser)->first(); // recuperer les ligne de la db
        foreach ($fichierDataFrom as &$fichier){
            if ($fichier->isValid() && ! $fichier->hasMoved()) {
                $fichierSize = $fichier->getSize();
                $nomUnique=$fichier->getRandomName();
                $fichierNom=$nomUnique;
                $pathDossier= 'public/avatars';
                $pathFichier = $pathDossier.'/'.$nomUnique;
                $ligneToInsert = [
                    'nom_fichier_origin'=> $fichierNom,
                    'nom_fichier_unique'=> $nomUnique,
                    'path_fichier'=> $nomUnique,
                    'bytes_size'=> $fichierSize
                ];
                log_message('info', 'fc : '.FCPATH);
                log_message('info', 'fc : '.$pathDossier);
                log_message('info', is_dir($pathDossier)? 'dirOk' : 'dir Non OK');
                log_message('info', is_writable($pathDossier)? 'dirOk' : 'dir Non OK');
                
                $fichier->move(FCPATH. 'public/avatars/' , $nomUnique);
                $fichierModel->insert($ligneToInsert);
                $userNTT->setPathFichier($pathFichier);
                $userModel->save($userNTT);
            }
        }
    }
    /**
     * 
     * @param int $idDemande utile a la jointure
     * @param array $dataFichierForm information selection dans la view
     * @return array $fichier pour un force download vu sur https://codeigniter4.github.io/userguide/outgoing/response.html#force-file-download
     * le probleme c'est un à un.
     * 
     * corection apprement ca devrait etre fait par le controller. plus tres sur.
     */
    public function telechargerFichiers(int $idDemande, array $dataFichierForm){
        $fichierModel = new FichierModel();
        $fichierDemandeModel = new FichierDemandeModel();
        $fichier = $fichierModel->getfichierJoint($idDemande); // ref \App\Models\FichierModel::getFichierJoint.
        
        return $fichier;
    }
}