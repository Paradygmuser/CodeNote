<?php

namespace App\Models\Entiter;

use CodeIgniter\Entity\Entity;

class FichierDemande extends Entity{
    
    public function getStatus(){
        return $this->status;
    }
    
    
}