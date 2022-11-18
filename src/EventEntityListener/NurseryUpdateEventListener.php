<?php

namespace App\EventEntityListener;

use App\Entity\Nursery;
Use Doctrine\Persistence\Event\LifecycleEventArgs;

class NurseryUpdateEventListener{
    private $encryptSecret;

    public function __construct(string $encryptSecret){
        $this->encryptSecret = $encryptSecret;
    }

    public function preUpdate(Nursery $nursery, LifecycleEventArgs $event) {

        // On déclare l'algorithme de cryptage
        $cipher = "aes-256-gcm";
        // On déclare la clé de cryptage
        $key = $this->encryptSecret;
        // On déclare le vecteur d'initialisation
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $iv = base64_decode($nursery->getSecretIV());
        // On mémorise le vecteur d'initialisation
        // $nursery->setSecretIV(base64_encode($iv));

        // On crypte le nom de l'utilisateur:
        // Name
        if(!is_null($nursery->getName())){
            $encodedName = openssl_encrypt($nursery->getName(), $cipher, $key, 0, $iv, $tag);
            $encodedName = base64_encode($tag.$encodedName);
            $nursery->setName($encodedName);
        }

        // Siret
        if(!is_null($nursery->getSiret())){
            $encodedSiret = openssl_encrypt($nursery->getSiret(), $cipher, $key, 0, $iv, $tag);
            $encodedSiret = base64_encode($tag.$encodedSiret);
            $nursery->setSiret($encodedSiret);
        }

        // Street
        if(!is_null($nursery->getStreet())){
            $encodedStreet = openssl_encrypt($nursery->getStreet(), $cipher, $key, 0, $iv, $tag);
            $encodedStreet = base64_encode($tag.$encodedStreet);
            $nursery->setStreet($encodedStreet);
        }

        // CP
        if(!is_null($nursery->getCp())){
            $encodedCp = openssl_encrypt($nursery->getCp(), $cipher, $key, 0, $iv, $tag);
            $encodedCp = base64_encode($tag.$encodedCp);
            $nursery->setCp($encodedCp);
        }

        // Complement
        if(!is_null($nursery->getComplement())){
            $encodedComplement = openssl_encrypt($nursery->getComplement(), $cipher, $key, 0, $iv, $tag);
            $encodedComplement = base64_encode($tag.$encodedComplement);
            $nursery->setComplement($encodedComplement);
        }
        
        // City
        if(!is_null($nursery->getCity())){
            $encodedCity = openssl_encrypt($nursery->getCity(), $cipher, $key, 0, $iv, $tag);
            $encodedCity = base64_encode($tag.$encodedCity);
            $nursery->setCity($encodedCity);
        }

        // Tel
        if(!is_null($nursery->getTel())){
            $encodedTel = openssl_encrypt($nursery->getTel(), $cipher, $key, 0, $iv, $tag);
            $encodedTel = base64_encode($tag.$encodedTel);
            $nursery->setTel($encodedTel);
        }

    }
}