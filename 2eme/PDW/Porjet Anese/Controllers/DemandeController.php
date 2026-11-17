<?php
namespace App\Controllers;
use App\Models\Services\DemandeService;
use App\Models\Services\FichierDemandeService;

class DemandeController extends BaseController{
    /******=FORMULAIRE=******/   
    
    public function returnFormDemande(){
        return view('DemandeViews/formDemande');
    }
    public function listerPrestataireSANSJS(){
        $param = $this->request->getGet();
        $demandeService= new DemandeService();
        $type  = $param['demande_type_envoyee'];
        $data['prestataires']= $demandeService->listerLesPrestataires($type);
        return view('DemandeViews/formDemandePrestataireList',$data);
    }
    
    public function introduireDemande(){
        //https://codeigniter.com/user_guide/libraries/uploaded_files.html#multiple-files
        $params= $this->request->getPost();
        $userInfo= session()->get('user');
        $idUser =$userInfo->getId();
        //https://www.php.net/gettype
        log_message('info', gettype($params));
        log_message('info', count($params));
        log_message('info', 'prestataire id = '.$params['prestataireId']);
        $idPrestataire= (int) $params['prestataireId'];
        log_message('critical', $idUser.'');
        $demandeService= new DemandeService();
        $fileUpload = $this->request->getFileMultiple('fichier_demande');
        //         $dataFile = $params['fichier_demande'];
        $demandeService->creerDemande($idUser, $idPrestataire, $params, $fileUpload);
        return redirect()->route('dashGlobalUser');
    }
    
    /********=UTILITY=********/
    public function toPseudoDelete(){
        $userInfo= session()->get('user');
        $idUser =$userInfo->getId();
        $params = $this->request->getPost();
        $numDemande = $params['numero_demande_envoyee'];
        $demandeService = new DemandeService();
        $demandeService->pseudoDelete($numDemande);
        //         $data['demandeReturn'] = $demandeService->listerDemandeService($idUser);
        //         return $this->response->setJSON($data);
        $data['lignes'] = $demandeService->listerDemandeToValider($idUser, true);
        return view('TablesViews/UserTableEnAttente',$data);
        
    }
    
    public function infoDemande(){
        $params = $this->request->getGet();
        $numDemande = $params['numeroDemande_envoyee'];
        $demandeService = new DemandeService();
        $data= $demandeService->getInfoDemande($numDemande);
        /**
         * $this est ce document, qui herite de basecontroler ,
         * qui lui pocede l'element de response http
         * permettant a javascript de recevoir l'objet json.
         */
        //         return $this->response->setJSON($data);
        return view('DemandeViews/ResumerDemande',$data);
        
    }
    
    public function validerDemande(){
        $prestataire = session()->get('user');
        $idPrestataire = $prestataire->getId();
        $params = $this->request->getPost();
        $numDemande = $params['numDemande_envoyee'];
        $demandeService = new DemandeService();
        $demandeService->validerDemande($idPrestataire, $numDemande);
        $dateExpire['expirationDate'] = $demandeService->returnExpiresDate($numDemande);
        return $this->response->setJSON($dateExpire);
    }
    //telecharger fichier : https://www.php.net/manual/en/ziparchive.addfile.php    
    /*******=INTERACTION PRESTATAIRE=*****/
    public function toBounce(){
        $params=$this->request->getPost();
        $numDemande = $params['numDemandeInput'];
        log_message('info', 'numDemande : '.$numDemande);
        $filesUpload = $this->request->getFileMultiple('fichier_bounce');
        $fichierDemandeService= new FichierDemandeService();
        $fichierDemandeService->bounceRecu($numDemande, $filesUpload);
        return redirect()->route('dahsGlobalPresta');
        
        //         $demandeModel = new \App\Models\DemandeModel();
        //         $demande = $demandeModel->where('demande_num',$numDemande)->first();
        //         $x = $demande->getStatusString();
        //         log_message('debug', 'status de la demande: '.$x);
        //il est prefereable de faire un redirect apres un form pour eviter de re inserer les donner lors d'un rafraichissement de page;
        
            // a checker https://www.youtube.com/watch?v=wcGaUlAfpT8&t=753s (10:00)
        
    }    
    /*******=INTERACTION CLIENT=*****/
    public function conditionValidation(){
        return view('DemandeViews/PrestataireValidationCondition');
    }
    
    public function userClotureDemande(){
        $params= $this->request->getPost();
        $numDemande = $params['numDemandeCloture'];
        $demandeService= new DemandeService();
        $demandeService->cloturerDemande($numDemande);
        return view('DemandeViews/ConfirmationClotureDemande');
    }
    
}