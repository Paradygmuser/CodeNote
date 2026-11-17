<?php
namespace App\Models\Services;
use App\Models\UserModel;
class Authentifieur {
    /**
     * 
     * @param string $email la valeur d'email entre et 'email' est le nom de l'attribur du usermodel correspondant a celui en db.
     * @param string $pwd_h methode vu en classe.
     * @return object
     */
    public function verifierUser(string $email, string $pwd_h){
        $usermodel = new UserModel();
        $user = $usermodel->where('email', $email)->first();
        if(!$user){
            $user=null;
        }
        else{
            $valid =  password_verify($pwd_h, $user->password);
            if($valid){
                $user->password = ''; // pourquoi faut il le remettre a vide? comment etre sur que ca n'effacera pas la donnée appartenant à l'attribut du meme nom dans la base de donnée?
             
            }
            else{
                $user=null;
            }
            
        }
        
        return  $user;
    }
}