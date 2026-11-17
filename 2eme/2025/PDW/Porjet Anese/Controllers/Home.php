<?php

namespace App\Controllers;
use Config\App;
use App\Models\Services\UserService;

class Home extends BaseController
{
    public function index(): string
    {
        $data['from']='fromIndex';
        return view('welcome_message', $data);
    }
    public function login(): string{
        $data['from']='fromIndex';
        return view('welcome_login', $data);
    }
    public function inscription(): string {
        $params=$this->request->getPost(); 
        $userService = new UserService();
        $userService->inscription($params);
        return $this->index();        
    }
    public function loginProcess(){
        $params=$this->request->getPost();
        $userService = new UserService();
        $erreurLogin ="il y a eu un probleme recommencer";
        $user = $userService->login($params);
        if($user==null){
            $data['errorIndique']=$erreurLogin;
            $data['from']='fromIndex';
            return view('welcome_message', $data);
        }
        else{
            session()->set([
                'user'=>$user   ,
                'userNum'=>$user->getNumUser()
            ]);
            return $this->roleXview($user);
        }
    }
    
    public function roleXview(){
        $user=session()->get('user');
        if($user->getRole()===0){
            return redirect()->route('dashGlobalUser');
        }
        elseif($user->getRole()===1){
            return redirect()->route('dahsGlobalPresta');
        }
        elseif($user->getRole()===2){
            return redirect()->route('dashGlobalAdmin');
        }
    }
    
    public function logout() {
        session()->destroy();  
        return $this->index();
    }
}

