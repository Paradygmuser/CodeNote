<?php
namespace App\Controllers;

use App\Models\Services\UserService;
use App\Models\Services\DemandeService;

class GlobalViewController extends BaseController{
    
    public function infoUtileAdmin(): array{
        $user=session()->get('user');
        $data=[
            'username' => $user->getUsername(),
            'from' =>'fromAdmin'
        ];
        return $data;
    }
    /**
     * leprofile manager ma montrer que les data ne secrasait pas,
     * comme si data est rester sur le premier user avant les appel
     * je force le rafraichissement des donnée en recuperant l'entité tel qu'actuellement appeler.
     */
    public function returnDashUserGlobal(){
        $userNum=session()->get('userNum');
        $userService= new UserService();
        $data = $userService->infoUtileUser($userNum, true);
        return view('UserViews/dashboard_user', $data);
    }
    public function returnDashUser(){
        $userService= new UserService();
        $data = $userService->infoUtileUser(session()->get('userNum'), true);
        return view('UserViews/dashboard_userPrincipal', $data);
    }
    
    public function returnDashPrestaGlobal(){
        $userService= new UserService();
        $data = $userService->infoUtileUser(session()->get('userNum'), false);
        return view('UserViews/dashboard_presta', $data);
    }
    public function returnDashPrestataire(){
        $userService= new UserService();
        $data = $userService->infoUtileUser(session()->get('userNum'), false);
        return view('UserViews/dashPrestaPrincipal',$data);
    }
    
    public function returnDashAdminGlobal(){
        $data = $this->infoUtileAdmin();
        log_message('info', $data['from']);
        return view('UserViews/dashboard_admin', $data);
    }
    public function returnDashAdmin(){
        $data = $this->infoUtileAdmin();
        return view('UserViews/dashboard_adminPrincipal',$data);
    }
    
}