<?php
namespace App\Controllers;

use App\Models\Services\AdminService;

class AdminController extends BaseController{
    public function inscription(){  
        $homeControl = new Home();
        $params=$this->request->getPost();       
        $user=session()->get('user');
        $adminService = new AdminService();
        $adminService->inscrirePrestataire($params);
        /**
         * premier modal qui me demande chercher les reponse http a part
         * https://codeigniter.com/user_guide/outgoing/response.html#setting-the-output
         */
        $data = [
            'success' => true,
            'message' => 'Prestataire enregistré.',
        ];
        return $homeControl->roleXview();
//         return $this->response->setJSON($data);       
//            return  view('/dashboard_admin', $data);
    }
    
    public function listerPrestataire(){
        $adminService= new AdminService();
        $data['prestataires'] = $adminService->listerPrestataire();
        return view('AdminViews/AdminTablePrestataire',$data);
    }
    
    public function listerUtilisateurs(){
        $adminService= new AdminService();
        $data['users']= $adminService->listerUser();
        return view('AdminViews/AdminTableUser',$data);
    }
    
    public function deleteUser(){
        $params=$this->request->getPost();
        $adminService=new AdminService();
        $numUser = $params['numUserEnvoyee'];
        $adminService->deleteUser($numUser);
        //https://www.php.net/manual/fr/function.str-contains.php
        //https://www.php.net/manual/fr/function.str-starts-with.php
        if(str_starts_with($numUser,'U-')){
            return $this->listerUtilisateurs();
        }
        elseif(str_starts_with($numUser,'P-')){
            return $this->listerPrestataire();
        }
    }
}