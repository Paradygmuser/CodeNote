<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'USER_ESERVICE';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'user_nom', 
        'email', 
        'password',
        'nom_famille',
        'prenom', 
        'adresse_complete', 
        'biographie',
        'tva_num',
        'role',
        'image_profile_path',
        'user_num',
        'max_bytes',
        'prestataire_type_id',
        'creer_le'        
    ];
    
    protected $returnType = \App\Models\Entiter\UserEntity::class;
    
    // Dates
    //https://www.codeigniter.com/user_guide/models/model.html#dates
    protected $useTimestamps = false; 
    //si c'est faut le timestamp est automatiquement géré par la db et sous le format timestamp dans mariadb j'ai gerer les current_timestamp dans la db
}