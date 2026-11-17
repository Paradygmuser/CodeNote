<?php
namespace App\Controllers;
use App\Models\Services\DemandeService;
use App\Models\Services\FichierDemandeService;
//https://datatables.net/examples/data_sources/ajax.html
/**
 * je suis parti de l'exemple dans le liens ci dessus pour ma comprehension du datatables.
 * il fallait pour l'ajax, un {key[key,value]} une collection map<Entry(...)> permettant d'etre
 * manipuler par javascript dont datatbale depend.
 * setJson est ideal. je retourn seulement des data qui seront lu comme un texte par le js de datatable.
 */
class TablerController extends BaseController{
    public function demandeToValider(){
        $prestataire = session()->get('user');
        $idPrestataire = $prestataire->getId();
        $demandeService = new DemandeService();
        //         $data['dataTablesSrc'] = $demandeService->listerDemandeToValider($idPrestataire, false);
        //         return $this->response->setJSON($data);
        $data['demandes']=$demandeService->listerDemandeToValider($idPrestataire,false);
        return view('TablesViews/PrestataireTableToValider',$data);
    }
    
    public function demandeToDo(){
        $prestataire = session()->get('user');
        $idPrestataire = $prestataire->getId();
        $demandeService = new DemandeService();
        //         $data['dataTablesSrc'] = $demandeService->listerDemandeEnCours($idPrestataire,false);
        //         return $this->response->setJSON($data);
        $data['demandes']=$demandeService->listerDemandeEnCours($idPrestataire,false);
        return view('TablesViews/PrestataireTableToDo',$data);
    }
    
    public function getTableAttenteU(){
        $user = session()->get('user');
        $idUser = $user->getId();
        $demandeService = new DemandeService();
        $data['lignes'] = $demandeService->listerDemandeToValider($idUser, true);
        $lignes= $data['lignes'];
        foreach ($lignes as $ligne){
            log_message('info', $ligne['nom projet']);
        }
        return view('TablesViews/UserTableEnAttente',$data);
    }
    
    public function getTableToWait(){
        $user = session()->get('user');
        $idUser = $user->getId();
        $demandeService = new DemandeService();
        $data['lignes'] = $demandeService->listerDemandeEnCours($idUser, true);
        $lignes= $data['lignes'];
        foreach ($lignes as $ligne){
            log_message('info', $ligne['nom_projet']);
        }
        return view('TablesViews/UserTableEnTraitement',$data);
    }
    public function getTableRecu(){
        $user = session()->get('user');
        $idUser = $user->getId();
        $demandeService = new DemandeService();
        $data['lignes'] = $demandeService->listerDemandeRecu($idUser, true);
        $lignes= $data['lignes'];
        foreach ($lignes as $ligne){
            log_message('info', $ligne['nom projet']);
        }
        return view('TablesViews/UserTableDemandeRecu',$data);
    }
    public function getTableCloturer(){
        $user = session()->get('user');
        $idUser = $user->getId();
        $demandeService = new DemandeService();
        $data['lignes'] = $demandeService->listerDemandeCloturer($idUser, true);
        $lignes= $data['lignes'];
        foreach ($lignes as $ligne){
            log_message('info', $ligne['nom projet']);
        }
        return view('TablesViews/UserTableDemandeCloturer',$data);
        
    }
    
    public function listerFichiersDemande(){
        $fichierDemandeService = new FichierDemandeService();
        $params= $this->request->getGet();
        $numeroDemande = $params['numeroDemande_envoyee'];
        log_message('info', $numeroDemande);
        //         $data['fichiersDemandeReturn'] = $fichierDemandeService->getInfoFichiers($numeroDemande) ;
        //         return $this->response->setJSON($data);
        $data['lignes'] = $fichierDemandeService->getInfoFichiers($numeroDemande) ;
        foreach ($data['lignes']as $ligne){
            log_message('info', $ligne['nom_fichier']);
        }
        return view('TablesViews/tableFichierDemande',$data);
    }
}