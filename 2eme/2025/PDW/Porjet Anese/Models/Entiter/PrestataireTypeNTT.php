<?php
namespace App\Models\Entiter;

use CodeIgniter\Entity\Entity;

class PrestataireTypeNTT extends Entity{
    public function getType():string{
        $resulta= $this->attributes['type_demande'];
        switch ($resulta){
            case '0':
                return 'MIX-AUDIO';
                break;
            case '1':
                return 'MASTER-AUDIO';
                break;
            case '2':
                return 'SOUND-DESIGN';
                break;
            case '3':
                return 'COMPOSITION';
                break;
        }
    }
}
