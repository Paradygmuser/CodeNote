<?php
namespace App\Models\Services;
use CodeIgniter\I18n\Time;

class ReUsableService {
    /**
     * generer un code unique.
     * @param array $dataForm permet d'identifier le role de l'user
     * @param int $countTable, un nomobre avec le quel je joue pour faire une fin de code unqiue.
     * @param bool $userORdemande code unique pour la creation d'un user ou pour la creation d'une demande, j'y est pensé mais je n'ai pas mis dans la db le demande_num donc pas besoin en vrai.
     * @return string
     */
    public function codeUnique (array $dataForm, int $countTable, bool $userORdemande) : string {
        $countTable += 1001;
        $countTable++;
        $now = Time::now();
        
        if ($userORdemande) {
            if ($dataForm['role'] == 1) {
                return 'P-' . $now->getYear() . $now->getMonth() . $now->getDay() . '-' . $countTable;
            } else {
                return 'U-' . $now->getYear() . $now->getMonth() . $now->getDay() . '-' . $countTable;
            }
        }
        else {
            return 'D-' . $now->getYear() . $now->getMonth() . $now->getDayOfYear() . '-' . $countTable;
        }
    }
    
    /**
     * arbitrairement je donne 7 jour pour l'expiration du projet, si la variable est_revision est vrai alors 2 semaines
     * cette fonction sera appeler que lors d'une creation ou revision de Demande de projet.
     *
     * @param $time Time est une variable qui fait appel à l'objet Time qui fournis un Timestamp correspondant a mariaDb heberger en europe.
     * https://codeigniter4.github.io/userguide/libraries/time.html#now
     * https://codeigniter4.github.io/userguide/libraries/time.html#todatetimestring
     * https://codeigniter4.github.io/userguide/libraries/time.html#getters
     */
    public function fournirDateExpiration($estRevision) {
        $time = Time::now('Europe/Paris');
        if(!$estRevision){
            $time = $time->addDays(7);
        }
        else{
            $time = $time->addDays(14);
        }
//         https://codeigniter4.github.io/userguide/libraries/time.html#todatetimestring
        return $time->toDateTimeString();
    }    
    
    public function pathBuilder(int $idUser, int $id_demande,  bool $userORprestataire, int $revision) : string {
        $pathEnDur = 'DEMANDE\\'; 
        if($userORprestataire){
            return $pathEnDur.'client_'.$idUser.'\\'.$id_demande.'\fichierClient\\';
        }
        else{            
            return $pathEnDur.'client_'.$idUser.'\\'.$id_demande.'\bounce\\'.'_v'.$revision;
        }
    }
}