<?php
namespace App\Controllers;

use App\Models\Services\UserService;

class ProfileManagerController extends BaseController{
    //VERIFIE peut etre plus utiliser
    public function updateInfonUser(){
        $userService= new UserService();
        $params=$this->request-getPost();
        $userService->updateInfoUser($params);
        
    }
    
    public function returnProfileManaga(){
        $userService= new UserService();
        $user = session()->get('user');
        $role=$user->getRole();
        $data;
        switch ($role){
            case '0':
                $data=$userService->infoUtileUser(session()->get('userNum'), true);
                break;
            case '1':
                $data=$userService->infoUtileUser(session()->get('userNum'), false);
                break;
        }
        //         $userService = new \App\Services\UserService();
        //         $idUser= $user->getId();
        //         $data= $userService->getInfoProfil($idUser);
        //         foreach ($data as $d){
        //             log_message('info', $d['username']);
        //         }
            return view('ProfilManagViews/profileManagement',$data);
    }
    
    
    public function personalInfo(){
        $userService= new UserService();
        $user=session()->get('user');
        $role=$user->getRole();
        $data= [];
        switch ($role){
            case '0':
                $data=$userService->infoUtileUser(session()->get('userNum'), true);
                break;
            case '1':
                $data=$userService->infoUtileUser(session()->get('userNum'), false);
                break;
        }
        return view('ProfilManagViews/setingPersoinfo',$data);
    }
    
    public function sauverInfoUser(){
        
        $params=$this->request->getPost();
        $form = $params['formString'];
        log_message('info',$form);
        /*la requete comporte des element de requete tel % pour els espace, etc*/
        /*https://www.w3schools.com/php/func_string_parse_str.asp*/
        $dataInsert=[];
        parse_str($form,$dataInsert);
        log_message('info', 'G parser le form->bio = '.$dataInsert['bioUser']);
        $userService = new UserService();
        $user=session()->get('user');
        $idUser=$user->getId();
        //         $userMAJ = $userService->updateInfoUser($idUser,$dataInsert);
        $userService->updateInfoUser($idUser,$dataInsert);
        /**
         * AAAA il faut ecrasé l'ancienne entity pour avoir la nouvelle a jour!!!
         *
         */
        //         session()->set(['user'=>$userMAJ]);
        return $this->personalInfo();
    }
    
    public function uploadProfilPict(){
        log_message('info', 'uploadPictureController appeler');
        $homeController= new Home();
        $user= session()->get('user');
        $idUser = $user->getId();
        $file= $this->request->getFiles();
        $userService = new UserService();
        $userService->uploadProfilPic($idUser, $file);
        
        return $homeController->roleXview();
        
    }
    
}