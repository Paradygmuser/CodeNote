<?php
namespace App\Models\Services;
use CodeIgniter\I18n\Time;

use App\Models\DemandeModel;
use App\Models\FichierDemandeModel;
use App\Models\UserModel;

class DemandeService {
    /**
     * @param creerDemande() est une fonction qui va insert une demande par rapport à un user.
     * la creation du timestamp ce fait en mariaDb
     * l'attribut status est defini par default en base de donnée sur 0
     * TINYINT => 
     *     0=ATTENTE ; la demande complete(fichier avec) est en cours d'(analyse elle attend d'etre accepter par un Prestataire.
     *     1=CONFIRMER ; la demande est traiter par le prestataire elle attend son depot de fichier
     *     3=RECU; le prestataire a deposer le fichier final et la demande attend d'etre terminer (payement)
     *     4=FINI : 
     *     5=REVISION : le payemeny a ete recu l'user peut telecharger les fichier.
     * En resumer, ca permet :
     * 1. de donner une date d'expiration.
     * 2. d'enregistrer les information relatives a la demande,
     *    tel que les commentaires dans la DB lier a la demande.
     * 3. par rapport à id_user :
     *    je rajoute un nouvelle entity dans la collection $dataDemandeForm avec la clef ['id_user'] 
     *  l'attribut est une clef etranger dans la db de DEMANDE_ESERVICE referencant USER_ESERVICE.
     *  4.notifier le prestataire qu'il a une demande a confirmer.
     */
    public function creerDemande(int $id_user, int $idPrestataire, array $dataDemandeForm, array $fichierDataFrom){
        $demandeModel = new DemandeModel();
        $fichierService = new FichierService();
//         $prestataireService = new PrestataireService();
        $reUsable= new ReUsableService();
        /*retrouver les clef correspondant au model*/
        $dataDemandeForm['id_user'] = $id_user;
        $dataDemandeForm['id_prestataire'] = $idPrestataire;
        $dataDemandeForm['demande_type']= $dataDemandeForm['inputTypeDemande'];
        $dataDemandeForm['commentaire_realisation']=$dataDemandeForm['description_projet'];
        /*construire un dataForm pour ma fonction codeUnique et count table demande*/
        $countTable= intval($demandeModel->countAll());
        /*je triche ma function en rajoutant une clef 'role' du a la generation de code unique*/
        $dataForm['role'] = 1002;
        $dataDemandeForm['demande_num']= $reUsable->codeUnique($dataForm, $countTable, false);
        $dataDemandeForm['expires_le'] = $reUsable->fournirDateExpiration(false);
        log_message('info', 'le numDemande inserer :'.$dataDemandeForm['demande_num']);
        log_message('info', 'expiration inserer :'.$dataDemandeForm['expires_le']);
        $demandeModel->insert($dataDemandeForm);
        $idDemande= $demandeModel->getInsertID();
//         $demandeEntity = $demandeModel->where('demande_num', $dataDemandeForm['demande_num'])->first();
//         $demandeEntity->setDescription($dataDemandeForm['description_projet']);
//         log_message('critical', 'le numDemande inserer :'.$demandeEntity->getInformation());
//         $idDemande = $demandeEntity->getID();
        
        $fichierService->deposerFichier($idDemande, 0, $fichierDataFrom, false); //flase fichier provenant de l'user.
        
       // $prestataireService->notifierPrestataire($idPrestataire, $idDemande, true);
    }
    /**
     * @param creerRevision() est une fonction qui va update les donnees:$this
     *          commentaire_revision, déja present dans le post formulaire.
     *          status,
     *          date d'expiration.
     * @param $demande l'entity à des methode commenter utile. ref \App\Entities\Demande.php
     */
    public function creerRevision(int $idUser , array $dataDemandeForm){
        $demandeModel = new DemandeModel();
        $prestataireService = new PrestataireService();
        $reUsable= new ReUsableService();
        $demande = $demandeModel->where('id_user',$idUser)->first();    
        $idDemande = $demande->select('id_demande');
        $idPrest = $demande->select('id_prestataire');
        if($demande->estRevisionnable()){            
            $demande->setStatusDemande('4');
            $demande->setExpireLe($reUsable->fournirDateExpiration(true));
                $demandeModel->save($demande);
                
                $prestataireService->notifierPrestataire($idPrest, $idDemande, false);
        }
        else{
            throw \Exception('la date est passé');
        }
    }
    
    public function listerLesPrestataires($typeDemande){
        $typeDemandeInt = intval($typeDemande);
        log_message('critical', 'id demande:'.$typeDemande);
        $userModel= new \App\Models\UserModel();
        $dataReturn = [];
        $prestataires = $userModel->select('*')
                            ->join('PRESTATAIRE_TYPE','USER_ESERVICE.id_user=PRESTATAIRE_TYPE.id_prestataire')
                            ->where('PRESTATAIRE_TYPE.type_demande',$typeDemandeInt)
                            ->findAll(); //sans lui pas de retour j'avais null
        
        foreach ($prestataires as $prestataire){
            
            log_message('critical', $prestataire->getID().'');
            $dataReturn[]=[
            'username'=>$prestataire->getUsername(),
                'id'=>$prestataire->getId()
//             'id'=>$this->prestataireTypes($prestataire->getId())
            ];
       }
//        return response()->setJSON($dataReturn);
          return $dataReturn;
        
    }
    
    public function prestataireTypes($idPrestataire){
        
        $prestataireType = new \App\Models\PrestataireType();
        log_message("info", $idPrestataire);
        $types= $prestataireType->select('type_demande')->where('id_prestataire', $idPrestataire);
        return $types;
        
    }
    /**
     * listerDemande() ref adminService:listerPrestataire
     */
    public function listerDemandeService(int $idUser){
        $demandeModel = new DemandeModel();
        $demandesUser = $demandeModel->where('id_user',$idUser)->notLike('status_demande', '5')->findAll();
        $demandes=[];
        
        foreach($demandesUser as $demande ){
            $demandes[] =[
                'nom projet'=>$demande->getNameProject(),
                'type demande'=>$demande->getTypeString(),
                'status'=>$demande->getStatusString(),
                'creation date'=>$demande->getCreatedAt(),
                'numero'=>$demande->getNumDemande()
            ];
            
        }
        return $demandes;
    }
    /**
     * je cherchait a faire un AND dans un where du coup je suis tomber sur
     * https://codeigniter.com/user_guide/database/query_builder.html#simple-key-value-method
     * plusieur where de suite font and, where est une methode de query builder mais accesible au model.
     * @var string $uORp :: Cette fonction me permet de lister les demande en fonction de l'id use ou prestataire
     * au lieu de if, je vais utilisé l'operateur ternaire pour utiliser le resultat dans cette variable
     * ensuite dans le where.
     * 
     * @param string $idUorP  peux importe que sa soit un user ou un prestataire il sont tous dans la meme table USER_ESERVICE.
     */
    public function listerDemandeToValider($idUorP, bool $userORprestataire){
        $uORp = ($userORprestataire)? 'id_user':'id_prestataire';
        $demandeModel = new DemandeModel();
        $demandesToValidate = $demandeModel
                                ->where($uORp,$idUorP)
                                ->where('status_demande','0')
                                ->findAll();
        $demandes=[];
                        
        foreach($demandesToValidate as $demande ){
            $demandes[] =[
                'nom projet'=>$demande->getNameProject(),
                'type demande'=>$demande->getTypeString(),
                'status'=>$demande->getStatusString(),
                'creation date'=>$demande->getCreatedAt(),
                'numero'=>$demande->getNumDemande()
            ];
        }
        
        return $demandes;
    }
    public function listerDemandeEnCours($idPrestataire, bool $userORprestataire){
        $uORp = ($userORprestataire)? 'id_user':'id_prestataire';
        $demandeModel = new DemandeModel();
        $demandesToValidate = $demandeModel
                                ->where($uORp,$idPrestataire)
                                ->where('status_demande','1')
                                ->findAll();
        $demandes=[];
        
        foreach($demandesToValidate as $demande ){
            $idPrestataire=$demande->getIdPrestataire();
            $userM = new UserModel();
            $prestataire= $userM->where('id_user',$idPrestataire)->first();
            $demandes[] =[
                'nom_projet'=>$demande->getNameProject(),
                'type demande'=>$demande->getTypeString(),
                'status'=>$demande->getStatusString(),
                'prestataireName'=>$prestataire->getUsername(),
                'expiration date'=>$demande->getExpiresDate(),
                'numero'=>$demande->getNumDemande()
            ];
        }
        
        return $demandes;
    }
    
    public function listerDemandeRecu($idPrestataire, bool $userORprestataire){
        $uORp = ($userORprestataire)? 'id_user':'id_prestataire';
        $demandeModel = new DemandeModel();
        $demandesToValidate = $demandeModel
        ->where($uORp,$idPrestataire)
        ->where('status_demande','2')
        ->findAll();
        $demandes=[];
        
        foreach($demandesToValidate as $demande ){
            $demandes[] =[
                'nom projet'=>$demande->getNameProject(),
                'type demande'=>$demande->getTypeString(),
                'status'=>$demande->getStatusString(),
                'expiration date'=>$demande->getExpiresDate(),
                'numero'=>$demande->getNumDemande()
            ];
        }
        
        return $demandes;
    }
    public function listerDemandeCloturer($idPrestataire, bool $userORprestataire){
        $uORp = ($userORprestataire)? 'id_user':'id_prestataire';
        log_message('info', 'demande cloturer table par = '.$uORp.'id user : '.$idPrestataire);
        $demandeModel = new DemandeModel();
        /**
         * je n'arrivait pas a faire un simple
         * SELECT * FROM DEMANDE_ESERVICE WHERE id_user=146 AND (status_demande=3 OR status_demande=5);
         * https://codeigniter.com/user_guide/database/query_builder.html#query-grouping
         */
        $demandesToValidate = $demandeModel
        ->where($uORp,$idPrestataire)
        ->groupStart()
            ->where('status_demande','3')
            ->orWhere('status_demande','5')
        ->groupEnd()
        ->findAll();
        $demandes=[];
        
        foreach($demandesToValidate as $demande ){
            $demandes[] =[
                'nom projet'=>$demande->getNameProject(),
                'type demande'=>$demande->getTypeString(),
                'status'=>$demande->getStatusString(),
                'expiration date'=>$demande->getExpiresDate(),
                'modifier_date'=>$demande->getModifeDate(),
                'numero'=>$demande->getNumDemande()
            ];
        }
        
        return $demandes;
    }
    
    public  function pseudoDelete($numDemande){
        $demandeModel = new DemandeModel();
        $demande= $demandeModel->where('demande_num',$numDemande)->first();        
        $demande->setStatusDemande('5');
        $demandeModel->save($demande);
    }
    
    public function getInfoDemande($numDemande){
        $demandeModel = new DemandeModel();
        $fichierDemande = new FichierDemandeModel();
        $userModel = new UserModel();
        $demande = $demandeModel->where('demande_num',$numDemande)->first();
        $countFile=$fichierDemande
                      ->join('DEMANDE_ESERVICE', 'ON DEMANDE_ESERVICE.id_demande=FICHIER_DEMANDE.id_demande')
                      ->where('DEMANDE_ESERVICE.demande_num',$numDemande)
                      ->countAllResults();
        $clientId = $demande->getIdUser();
        $client = $userModel->where('id_user',$clientId)->first();
        $clientName = $client->getUsername();
        $clientmMail = $client->getEmailUser();
        $countDemande= $demandeModel
                      ->join('USER_ESERVICE', 'ON DEMANDE_ESERVICE.id_user= USER_ESERVICE.id_user')
                      ->where('DEMANDE_ESERVICE.id_user',$client->getId())
                      ->countAllResults();
        $data=[
            'comment_description' => $demande->donneInfo(),
            'fileCount'=>$countFile,
            'clientName'=>$clientName,
            'emailClient'=>$clientmMail,
            'demandeCount'=>$countDemande,
            'numDemande'=>$numDemande
            
        ];
        return $data;
    }
    
    public function validerDemande($idPrestataire, $numDemande){
        $demandeModel= new DemandeModel();
        $reusable = new ReUsableService();
        $demande = $demandeModel->where('id_prestataire',$idPrestataire)->where('demande_num',$numDemande)
                      ->first();
        $demande->setStatusDemande('1');
        $demande->setExpireLe($reusable->fournirDateExpiration(true));
        $demandeModel->save($demande);
    }
    
    public function returnExpiresDate($numDemande){
        $demandeModel = new DemandeModel();
        $demande = $demandeModel->where('demande_num',$numDemande)->first();
        return $demande->getExpiresDate();
    }
    
    public function getCountEncour($idUserORPrestataire, bool $userORprestataire) : string{
        $uORp = ($userORprestataire)? 'id_user':'id_prestataire';
        $demandeModel= new DemandeModel();
        $count = $demandeModel
                   ->where($uORp,$idUserORPrestataire)->where('status_demande','1')
                   ->countAllResults();
        return $count;
    }
    
    public function getCountToValiD($idUserORPrestataire, bool $userORprestataire) : string{
        $uORp = ($userORprestataire)? 'id_user':'id_prestataire';
        $demandeModel= new DemandeModel();
        $count = $demandeModel
                    ->where($uORp,$idUserORPrestataire)
                    ->where('status_demande','0')
                    ->orWhere('status_demande','4')
                    ->countAllResults();
        return $count;
    }
    
    public function getCountTerminer($idUserORPrestataire, bool $userORprestataire) : string{
        $uORp = ($userORprestataire)? 'id_user':'id_prestataire';
        $demandeModel= new DemandeModel();
        $count = $demandeModel
        ->where($uORp,$idUserORPrestataire)->where('status_demande','3')
        ->countAllResults();
        return $count;
    }
    
    public function getCountRecu($idUserORPrestataire, bool $userORprestataire) : string{
        $uORp = ($userORprestataire)? 'id_user':'id_prestataire';
        $demandeModel= new DemandeModel();
        $count = $demandeModel
        ->where($uORp,$idUserORPrestataire)->where('status_demande','2')
        ->countAllResults();
        return $count;
    }
    /**
     * l'user a valider le bounce la mission est terminer
     */
    public function cloturerDemande($numDemande){
        $demandeM= new DemandeModel();
        $demande= $demandeM->where('demande_num',$numDemande)->first();
        $demande->setStatusDemande('3');
        $demandeM->save($demande);
    }
    
}