<?php

namespace App\EventEntityListener;

use App\Entity\Kid;
Use Doctrine\Persistence\Event\LifecycleEventArgs;

class KidPersistEventListener{
    private $encryptSecret;

    public function __construct(string $encryptSecret){
        $this->encryptSecret = $encryptSecret;
    }

    public function prePersist(Kid $kid, LifecycleEventArgs $event) {

        // On déclare l'algorithme de cryptage
        $cipher = "aes-256-gcm";
        // On déclare la clé de cryptage
        $key = $this->encryptSecret;
        // On déclare le vecteur d'initialisation
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        // On mémorise le vecteur d'initialisation
        $kid->setSecretIV(base64_encode($iv));

        // On crypte le nom de l'utilisateur:
        // Name
        if(!is_null($kid->getName())){
            $encodedName = openssl_encrypt($kid->getName(), $cipher, $key, 0, $iv, $tag);
            $encodedName = base64_encode($tag.$encodedName);
            $kid->setName($encodedName);
        }

        // Firstname
        if(!is_null($kid->getFirstname())){
            $encodedFirstname = openssl_encrypt($kid->getFirstname(), $cipher, $key, 0, $iv, $tag);
            $encodedFirstname = base64_encode($tag.$encodedFirstname);
            $kid->setFirstname($encodedFirstname);
        }

        // Birthdate
/*        if(!is_null($kid->getBirthdate())){
            $encodedBirthdate = openssl_encrypt($kid->getBirthdate(), $cipher, $key, 0, $iv, $tag);
            $encodedBirthdate = base64_encode($tag.$encodedBirthdate);
            $kid->setBirthdate($encodedBirthdate);
        }
*/

    }
}