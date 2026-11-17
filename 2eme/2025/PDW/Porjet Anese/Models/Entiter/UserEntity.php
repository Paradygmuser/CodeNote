<?php

namespace App\Models\Entiter;

use CodeIgniter\Entity\Entity;

class UserEntity extends Entity{
    /**
     * @var array $attributes est different de datamap 
     * dans codeigniter ils expliquent que datamap est propre a la db
     * $attributes est lui en plus dans l'entité.
     */
    
    
    public function getMaxStorage() : int{
        return (int) $this->max_bytes; // est ce qu'une valeur bigint pourrais depasser le int php?
    }
    /**
     * mariadb retourne des string j'ai du caster en int ici.
     * j'ai rencontrer un probleme aparent le role est un mot utilisé dans codeigniter j'ai mis le attributes. je devrais en faire de meme pour tout les autres.
     */
    public  function getRole() : int {
        return (int) $this->attributes['role'];
    }
    
    public function setRole($role) {
        $this->attributes['role']=$role;
    }
    public function getLastname(){
        return $this->attributes['nom_famille'];
    }
    public function getFirstname(){
        return $this->attributes['prenom'];
    }
    
    public function getAdresseComplete(){
        return $this->attributes['adresse_complete'];
    }
    
    public function setAdresseComplete($adresse){
        $this->attributes['adresse_complete']=$adresse;
    }
    
    public function getTvaNum(){
        return $this->attributes['tva_num'];
    }
    
    public function getCreatedAt(){
        return $this->attributes['creer_le'];
    }
    
    public function getPass(){
        return $this->password;
    }
    
    public function getId(){
        return $this->attributes['id_user'];
    }
    
    public function getUsername(){
        return $this->user_nom;
    }
    
    public function getNumUser(){
        return $this->attributes['user_num'];
    }
    
    public function getPathProfilPic(){
        return $this->image_profile_path;
    }
    public function getEmailUser(){
        return $this->attributes['email'];
    }
    
    public function setEmailUser($email){
        $this->attributes['email']=$email;
    }
    
    public function setPathFichier($path) {
        $this->attributes['image_profile_path']=$path;
    }
    
    public function setBioUser($bio){
        $this->attributes['biographie']=$bio;
    }
    
    public function getBioUser(){
        return $this->attributes['biographie'];
    }
    
    
}