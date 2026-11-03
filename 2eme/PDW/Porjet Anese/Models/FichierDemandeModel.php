<?php

namespace App\Models;

use CodeIgniter\Model;

class FichierDemandeModel extends Model
{
    protected $table      = 'FICHIER_DEMANDE';
    protected $primaryKey = 'id_fichier_demande';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_demande', 
        'id_fichier', 
        'commentaires_prestataire',
        'status'      
    ];
    // 'status' 0 est un fichier upload par l'user, 1 est fichier bounce, >1 est fichier de revision
    protected $returnType = \App\Models\Entiter\FichierDemande::class;
    
    // Dates
    //https://www.codeigniter.com/user_guide/models/model.html#dates
    protected $useTimestamps = false;
    //si c'est faux le timestamp est automatiquement géré par la db et sous le format timestamp dans mariadb j'ai gerer les current_timestamp dans la db
    
  
    
}