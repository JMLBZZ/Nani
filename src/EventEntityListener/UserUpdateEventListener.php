<?php

namespace App\EventEntityListener;

use App\Entity\User;
Use Doctrine\Persistence\Event\LifecycleEventArgs;

class UserUpdateEventListener{
    private $encryptSecret;

    public function __construct(string $encryptSecret){
        $this->encryptSecret = $encryptSecret;
    }

    public function preUpdate(User $user, LifecycleEventArgs $event) {

        // On déclare l'algorithme de cryptage
        $cipher = "aes-256-gcm";
        // On déclare la clé de cryptage
        $key = $this->encryptSecret;
        // On déclare le vecteur d'initialisation
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $iv = base64_decode($user->getSecretIV());
        // On mémorise le vecteur d'initialisation
        // $user->setSecretIV(base64_encode($iv));

        // On crypte le nom de l'utilisateur:
        // Name
        if(!is_null($user->getName())){
            $encodedName = openssl_encrypt($user->getName(), $cipher, $key, 0, $iv, $tag);
            $encodedName = base64_encode($tag.$encodedName);
            $user->setName($encodedName);
        }

        // Firstname
        if(!is_null($user->getFirstname())){
            $encodedFirstname = openssl_encrypt($user->getFirstname(), $cipher, $key, 0, $iv, $tag);
            $encodedFirstname = base64_encode($tag.$encodedFirstname);
            $user->setFirstname($encodedFirstname);
        }

        // Street
        if(!is_null($user->getStreet())){
            $encodedStreet = openssl_encrypt($user->getStreet(), $cipher, $key, 0, $iv, $tag);
            $encodedStreet = base64_encode($tag.$encodedStreet);
            $user->setStreet($encodedStreet);
        }
        // CP
        if(!is_null($user->getCp())){
            $encodedCp = openssl_encrypt($user->getCp(), $cipher, $key, 0, $iv, $tag);
            $encodedCp = base64_encode($tag.$encodedCp);
            $user->setCp($encodedCp);
        }
        
        // Complement
        if(!is_null($user->getComplement())){
            $encodedComplement = openssl_encrypt($user->getComplement(), $cipher, $key, 0, $iv, $tag);
            $encodedComplement = base64_encode($tag.$encodedComplement);
            $user->setComplement($encodedComplement);
        }

        // City
        if(!is_null($user->getCity())){
            $encodedCity = openssl_encrypt($user->getCity(), $cipher, $key, 0, $iv, $tag);
            $encodedCity = base64_encode($tag.$encodedCity);
            $user->setCity($encodedCity);
        }

        // Tel
        if(!is_null($user->getTel())){
            $encodedTel = openssl_encrypt($user->getTel(), $cipher, $key, 0, $iv, $tag);
            $encodedTel = base64_encode($tag.$encodedTel);
            $user->setTel($encodedTel);
        }
    }
}