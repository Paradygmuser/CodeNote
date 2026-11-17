<?php

namespace App\Models;

use CodeIgniter\Model;

class FichierModel extends Model
{
    protected $table      = 'FICHIER_ESERVICE';
    protected $primaryKey = 'id_fichier';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nom_fichier_origin',
        'nom_fichier_unique',
        'path_fichier',
        'type_fichier',
        'bit_depth',
        'bytes_size',
        'creer_le'        
    ];  
    protected $useTimestamps = false;
    protected $returnType = \App\Models\Entiter\Fichier::class;
    
    public function getfichierJoint($numeroDemande){
        log_message('info', 'numDemande au model :'.$numeroDemande);
        return $this->select('*')
            ->join('FICHIER_DEMANDE','FICHIER_DEMANDE.id_fichier=FICHIER_ESERVICE.id_fichier')
            ->join('DEMANDE_ESERVICE', 'FICHIER_DEMANDE.id_demande=DEMANDE_ESERVICE.id_demande')
            ->where('DEMANDE_ESERVICE.demande_num', $numeroDemande)
            ->findAll();
    }
}