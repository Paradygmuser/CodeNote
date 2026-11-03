<?php

namespace App\Models\Entiter;

use CodeIgniter\Entity\Entity;

class Fichier extends Entity{
    
    public function getBytesSize(){
        return $this->bytes_size;
    }
    
    public function getNameFichier(){
        return $this->attributes['nom_fichier_origin'];
    }
    
    public function getTypeMime(){
        return $this->type_fichier;
    }
    public function getPathFichier(){
        return $this->attributes['path_fichier'];
    }
}