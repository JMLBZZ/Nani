<?php

namespace App\EventEntityListener;

use App\Entity\Kid;
Use Doctrine\Persistence\Event\LifecycleEventArgs;

class KidLoadEventListener{
    private $encryptSecret;

    public function __construct(string $encryptSecret){
        $this->encryptSecret = $encryptSecret;
    }

    public function postLoad(Kid $kid, LifecycleEventArgs $event) {

        // On déclare l'algorithme de cryptage
        $cipher = "aes-256-gcm";
        // On déclare la clé de cryptage
        $key = $this->encryptSecret;
        // On déclare le vecteur d'initialisation
        // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $iv = base64_decode($kid->getSecretIV());
        // On mémorise le vecteur d'initialisation
        // $kid->setSecretIV(base64_encode($iv));

        // On crypte le nom de l'utilisateur:
        // Name
        if(!is_null($kid->getName())){
            $data = base64_decode($kid->getName());
            $tag = substr($data, 0, 16);
            $encodedName = substr($data, 16);
            $decodedName = openssl_decrypt($encodedName, $cipher, $key, 0, $iv, $tag);
            $kid->setName($decodedName);
        }

        // Firstname
        if(!is_null($kid->getFirstname())){
            $data = base64_decode($kid->getFirstname());
            $tag = substr($data, 0, 16);
            $encodedFirstname = substr($data, 16);
            $decodedFirstname = openssl_decrypt($encodedFirstname, $cipher, $key, 0, $iv, $tag);
            $kid->setFirstname($decodedFirstname);
        }

        // Birthdate
/*      if(!is_null($kid->getBirthdate())){
            $data = base64_decode($kid->getBirthdate());
            $tag = substr($data, 0, 16);
            $encodedBirthdate = substr($data, 16);
            $decodedBirthdate = openssl_decrypt($encodedBirthdate, $cipher, $key, 0, $iv, $tag);
            $kid->setBirthdate($decodedBirthdate);
        }
*/

    }
}