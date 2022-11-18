<?php

namespace App\EventEntityListener;

use App\Entity\Nursery;
Use Doctrine\Persistence\Event\LifecycleEventArgs;

class NurseryLoadEventListener{
    private $encryptSecret;

    public function __construct(string $encryptSecret){
        $this->encryptSecret = $encryptSecret;
    }

    public function postLoad(Nursery $nursery, LifecycleEventArgs $event) {

        // On déclare l'algorithme de cryptage
        $cipher = "aes-256-gcm";
        // On déclare la clé de cryptage
        $key = $this->encryptSecret;
        // On déclare le vecteur d'initialisation
        // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $iv = base64_decode($nursery->getSecretIV());
        // On mémorise le vecteur d'initialisation
        // $nursery->setSecretIV(base64_encode($iv));

        // On crypte le nom de l'utilisateur:
        // Name
        if(!is_null($nursery->getName())){
            $data = base64_decode($nursery->getName());
            $tag = substr($data, 0, 16);
            $encodedName = substr($data, 16);
            $decodedName = openssl_decrypt($encodedName, $cipher, $key, 0, $iv, $tag);
            $nursery->setName($decodedName);
        }

        // Siret
        if(!is_null($nursery->getSiret())){
            $data = base64_decode($nursery->getSiret());
            $tag = substr($data, 0, 16);
            $encodedSiret = substr($data, 16);
            $decodedSiret = openssl_decrypt($encodedSiret, $cipher, $key, 0, $iv, $tag);
            $nursery->setSiret($decodedSiret);
        }

        // Street
        if(!is_null($nursery->getStreet())){
            $data = base64_decode($nursery->getStreet());
            $tag = substr($data, 0, 16);
            $encodedStreet = substr($data, 16);
            $decodedStreet = openssl_decrypt($encodedStreet, $cipher, $key, 0, $iv, $tag);
            $nursery->setStreet($decodedStreet);
        }

        // CP
        if(!is_null($nursery->getCp())){
            $data = base64_decode($nursery->getCp());
            $tag = substr($data, 0, 16);
            $encodedCp = substr($data, 16);
            $decodedCp = openssl_decrypt($encodedCp, $cipher, $key, 0, $iv, $tag);
            $nursery->setCp($decodedCp);
        }

        // Complement
        if(!is_null($nursery->getComplement())){
            $data = base64_decode($nursery->getComplement());
            $tag = substr($data, 0, 16);
            $encodedComplement = substr($data, 16);
            $decodedComplement = openssl_decrypt($encodedComplement, $cipher, $key, 0, $iv, $tag);
            $nursery->setComplement($decodedComplement);
        }
        
        // City
        if(!is_null($nursery->getCity())){
            $data = base64_decode($nursery->getCity());
            $tag = substr($data, 0, 16);
            $encodedCity = substr($data, 16);
            $decodedCity = openssl_decrypt($encodedCity, $cipher, $key, 0, $iv, $tag);
            $nursery->setCity($decodedCity);
        }

        // Tel
        if(!is_null($nursery->getTel())){
            $data = base64_decode($nursery->getTel());
            $tag = substr($data, 0, 16);
            $encodedTel = substr($data, 16);
            $decodedTel = openssl_decrypt($encodedTel, $cipher, $key, 0, $iv, $tag);
            $nursery->setTel($decodedTel);
        }

    }
}