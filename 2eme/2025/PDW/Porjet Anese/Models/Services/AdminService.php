<?php
/**
 * toute les classes appartenant a namespace 
 * sont accesible depuis cette class, pour les autres ont utilise use
 */
namespace App\Models\Services;
use App\Models\UserModel;

class AdminService{
    public function inscrirePrestataire(array $dataForm){
        $usermodel = new UserModel();
        $prestataireType  = new \App\Models\PrestataireType();
        $reUsable = new ReUsableService();
        $count = $usermodel->countAll();
        
        $pwd = $dataForm['password'];
        $pwd_h = password_hash($pwd, PASSWORD_BCRYPT);
        /**
         * j'aimal nomé mais variable dans la base de donnée, 
         * je dois rajouter des clef correspondant à la base de donnée 
         * qui va enregistré la valeur des clef correspondante au formulaire
         * */
        $dataForm['password'] = $pwd_h;
        $dataForm['role']=1; // role prestataire
        $dataForm['user_num']= $reUsable->codeUnique($dataForm, $count,true); 
        $dataForm['user_nom']=$dataForm['username'];
        $dataForm['prenom']=$dataForm['firstname'];
        $dataForm['nom_famille']=$dataForm['lastname'];
        $adresse= $dataForm['street'].' '.$dataForm['num'].' '.$dataForm['zipcode'];
        $dataForm['adresse_complete']=$adresse;
        
        
        $usermodel->insert($dataForm);
        $prestataireId = $usermodel->getInsertID();
//         $prestataire = $usermodel->where('email',$dataForm['email'])->first();
//         $prestataireId=$prestataire->getId();
        /**
         * https://www.php.net/explode
         */
        $dataTyperType=[];
//         log_message('info-TYPE : ', $dataForm['type_demande']);
        foreach($dataForm['type_demande'] as $type){
            $typeInt = $type+0;
            $dataTyperType = [
                'type_demande'=>intval($typeInt),
                'id_prestataire'=>$prestataireId
            ];
            $prestataireType->insert($dataTyperType);            
        }
    }
    
    public function listerPrestataire(){
        /**
         * je suis obliger personnaliser les retour j'ai essayer un fetch et j'ai eu tout les info.
         * 
         */
        $userModel = new UserModel();
        $users = $userModel->where('role',1)->findAll();
        $prestataires=[];
        
        foreach($users as $prestataire ){ 
            //si je ne met pas le [] apres prestataire il remplace une seul ligne a chaque boucle.
            $prestataires[] =[
                'numero utilisateur'=>$prestataire->getNumUser(),
                'username'=>$prestataire->getUsername(),
                'last name'=>$prestataire->getLastname(),
                'first name'=>$prestataire->getFirstname(),
                'adresse complete'=>$prestataire->getAdresseComplete(),
                'numero tva'=>$prestataire->getTvaNum(),
                'creation date'=>$prestataire->getCreatedAt()                
            ];
            
        }
        return $prestataires;
    }
    public function listerUser(){
        /**
         * je suis obliger personnaliser les retour j'ai essayer un fetch et j'ai eu tout les info.
         *
         */
        $userModel = new UserModel();
        $users = $userModel->where('role',0)->findAll();
        $utilisateurs=[];
        
        foreach($users as $utilisateur ){
            //si je ne met pas le [] apres prestataire il remplace une seul ligne a chaque boucle.
            $utilisateurs[] =[
                'numero utilisateur'=>$utilisateur->getNumUser(),
                'username'=>$utilisateur->getUsername(),
                'last name'=>$utilisateur->getLastname(),
                'first name'=>$utilisateur->getFirstname(),
                'adresse complete'=>$utilisateur->getAdresseComplete(),
                'numero tva'=>$utilisateur->getTvaNum(),
                'creation date'=>$utilisateur->getCreatedAt()
            ];
            
        }
        return $utilisateurs;
    }
    /**
     * je vais rajouter un nouveaux tinyint 10 pour les user banni/supprimer
     * si le bool est faut on supprimer
     * @param string $numUser
     */
    public function deleteUser(string $numUser){
        $userModel= new UserModel();
        $user= $userModel->where('user_num', $numUser)->first();
        $user->setRole('17');
        $userModel->save($user);
    }
}