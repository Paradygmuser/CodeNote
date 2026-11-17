<?php

namespace App\Models;

use CodeIgniter\Model;

class DemandeModel extends Model{
    protected $table      = 'DEMANDE_ESERVICE';
    protected $primaryKey = 'id_demande';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_prestataire',
        'id_user',
        'nom_projet', // pour eviter les double nom de projet je dois faire un numero de projet.
        'demande_num',
        'demande_type',
        'status_demande',
        'reference_realisation',
        'commentaire_production',
        'commentaire_realisation',
        'commentaire_revision',
        'creer_le',
        'modifier_le',
        'expires_le'
        
    ];
    
    protected $useTimestamps = false;
    
    protected $returnType = \App\Models\Entiter\Demande::class;
   
    /**
     * https://codeigniter.com/user_guide/models/model.html#update
     * 3 eme exemple
     */
    public function setStatusDelete($numDemande){
        $this->where('demande_num',$numDemande)->set(['status_demande' => 5])->update();
    }
}