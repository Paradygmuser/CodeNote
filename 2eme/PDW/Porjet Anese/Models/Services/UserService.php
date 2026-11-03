<?php
namespace App\Models\Services;
use App\Models\UserModel;
use App\Models\PrestataireType;

class UserService {

    public function inscription(array $dataForm) {
        $usermodel = new UserModel();
        $reUsable = new ReUsableService();
        $count = $usermodel->countAll();
        $pwd = $dataForm['password'];
        $pwd_h = password_hash($pwd, PASSWORD_BCRYPT);
        /**
         * @$dataform je dois modifier le tableau d'entré car les nom des clefs ne correspondent pas à la db 
         */
        $dataForm['password'] = $pwd_h;        
        $dataForm['role']=0; // j'attribut ici sont role dans le userService.
        $dataForm['user_num']= $reUsable->codeUnique($dataForm, $count,true);
        $dataForm['user_nom']=$dataForm['username'];
        $dataForm['prenom']=$dataForm['firstname'];
        $dataForm['nom_famille']=$dataForm['lastname'];
        /**
         * @var string $adresse est composé par le formulaire,
         * @$params['adresse_complete'] je rajoute un noeud dans le tableau associatif
         *                              correspondant à l'attribut de la db relatif a l'adresse
         */
        $adresse= $dataForm['street'].' '.$dataForm['num'].' '.$dataForm['zipcode'];
        $dataForm['adresse_complete']=$adresse;   
        
        $usermodel->insert($dataForm);        
    }
    /**
     * apres avoir ecrit 99% du code je me rend compte que ce n'est pas une bonne idée de metre l'user en retour.
     * 
     */
    public function login(array $dataForm) {
        $email = $dataForm['email'];
        $pass = $dataForm['password'];
        $auth = new Authentifieur();
        $user = $auth->verifierUser($email, $pass);
        if(!$user){            
            return null;
        }
        else{
            return $user;
        }
    }
    /**
     * cette methode permet d'introduire un numero de tva pour l'user a tout moement et de modifier son adressse 
     * les autres attribut doivent encor implementer.
     * @param array $dataForm
     */
    public function updateInfoUser($idUser, array $dataForm) {
        log_message('info', 'updateUser est appeler et on peux test = '.$dataForm['bioUser']);
        $usermodel = new UserModel();
        $user= $usermodel->where('id_user', $idUser)->first();
        
        /*
         * Voila ce qu'on voit quand on tape simplement foreach dans php.net
         * https://www.php.net/manual/en/control-structures.foreach.php
         * alors personne ne me l'a dit , je l'utilise comme les entrySet dans les collection java.
         * */
        foreach($dataForm as $key => $value){
            if($key=='bioUser'){
                $user->setBioUser($value);
            }
            elseif($key=='adresse'){
                $user->setAdresseComplete($value);
            }
        }
        $usermodel->save($user);
        /**
         * je pourais renvoyé l'user, mais je veux etre sur que c'est les donnée nouvelle envoyé au controller
         */
//         $newUserNTT= $usermodel->where('id_user',$idUser)->first();
//         return $newUserNTT;
    }
    
    public function uploadProfilPic($idUser, $file){
        $fichierService=new FichierService();        
        $fichierService->depotPhotoProfil($idUser, $file);  
    }
    
    public function getPictProfil($idUser){
        $userM= new UserModel();
        $user = $userM->where('id_user',$idUser)->first();
        log_message('info', $user->getPathProfilPic());
        $pathFotoProfil = $user->getPathProfilPic();
        
        return $pathFotoProfil;
    }
    
    public function infoUtileUser($userNum, bool $userORpresta): array{
        $demandeService= new DemandeService();
        $userModel = new UserModel();
        $prestaTypeModel = new PrestataireType();
        $user= $userModel->where('user_num',$userNum)->first();
        $idUser= $user->getId();
        
        $data=[
            'username' => $user->getUsername(),
            'userEmail'=>$user->getEmailUser(),
            'userNfamille'=>$user->getLastname(),
            'userPrenom'=>$user->getFirstname(),
            'userAdresse'=>$user->getAdresseComplete(),
            'pictureProfile'=>$user->getPathProfilPic(),
            'biographie'=>$user->getBioUser()
        ];
        if($userORpresta){
            $countEncour = $demandeService->getCountEncour($idUser,true);
            $countEnAttent = $demandeService->getCountToValiD($idUser,true);
            
            $data['countEncour']=$countEncour;
            $data['countEnAttent']=$countEnAttent;
            $data['types']=['Artiste','GG'];
            $data['from']='fromUser';
        }
        else{
            $countEncour = $demandeService->getCountEncour($idUser,false);
            $countEnAttent = $demandeService->getCountToValiD($idUser,false);
            $countFini = $demandeService->getCountTerminer($idUser,false);
            $countRecu= $demandeService->getCountRecu($idUser, false);
            $typePossible = $prestaTypeModel->getTypePrestataire($idUser);
            
//             log_message('info', $typePossible);
            $typeArr = [];
            foreach ($typePossible as $type){
                log_message('info', $type->getType());
                $typeArr [] = $type->getType();
                
            }
            
            
            $data['countEncour']=$countEncour;
            $data['countEnAttent']=$countEnAttent;
            $data['countFini']=$countFini;
            $data['countRecu']=$countRecu;
            $data['types']=$typeArr;
            $data['from']='fromPrestataire';            
        }
        return $data;
    }
    
    
    
}