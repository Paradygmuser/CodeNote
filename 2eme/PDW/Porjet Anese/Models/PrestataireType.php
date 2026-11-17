<?php

namespace App\Models;

use CodeIgniter\Model;
/**
 * table de relation
 * @author emac- enaelmusic
 *
 */
class PrestataireType extends Model{
    protected $table      = 'PRESTATAIRE_TYPE';
    protected $primaryKey = 'id_prestataire_type';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'type_demande',        
        'id_prestataire'
    ];
    protected $useTimestamps = false;
    protected $returnType = \App\Models\Entiter\PrestataireTypeNTT::class;
    //https://codeigniter.com/user_guide/models/model.html#asarray
    //
    public function getTypePrestataire($idPrestataire){
        $typesDuPresta= $this->where('id_prestataire',$idPrestataire)->findAll();
        return $typesDuPresta;
    }
}