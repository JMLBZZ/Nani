<?php

namespace App\EventEntityListener;

use App\Entity\User;
Use Doctrine\Persistence\Event\LifecycleEventArgs;

class UserLoadEventListener{
    private $encryptSecret;

    public function __construct(string $encryptSecret){
        $this->encryptSecret = $encryptSecret;
    }

    public function postLoad(User $user, LifecycleEventArgs $event) {

        // On déclare l'algorithme de cryptage
        $cipher = "aes-256-gcm";
        // On déclare la clé de cryptage
        $key = $this->encryptSecret;
        // On déclare le vecteur d'initialisation
        // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $iv = base64_decode($user->getSecretIV());
        // On mémorise le vecteur d'initialisation
        // $user->setSecretIV(base64_encode($iv));

        // On crypte le nom de l'utilisateur:
        // Name
        if(!is_null($user->getName())){
            $data = base64_decode($user->getName());
            $tag = substr($data, 0, 16);
            $encodedName = substr($data, 16);
            $decodedName = openssl_decrypt($encodedName, $cipher, $key, 0, $iv, $tag);
            $user->setName($decodedName);
        }

        // Firstname
        if(!is_null($user->getFirstname())){
            $data = base64_decode($user->getFirstname());
            $tag = substr($data, 0, 16);
            $encodedFirstname = substr($data, 16);
            $decodedFirstname = openssl_decrypt($encodedFirstname, $cipher, $key, 0, $iv, $tag);
            $user->setFirstname($decodedFirstname);
        }

        // Street
        if(!is_null($user->getStreet())){
            $data = base64_decode($user->getStreet());
            $tag = substr($data, 0, 16);
            $encodedStreet = substr($data, 16);
            $decodedStreet = openssl_decrypt($encodedStreet, $cipher, $key, 0, $iv, $tag);
            $user->setStreet($decodedStreet);
        }

        // CP
        if(!is_null($user->getCp())){
            $data = base64_decode($user->getCp());
            $tag = substr($data, 0, 16);
            $encodedCp = substr($data, 16);
            $decodedCp = openssl_decrypt($encodedCp, $cipher, $key, 0, $iv, $tag);
            $user->setCp($decodedCp);
        }

        // Complement
        if(!is_null($user->getComplement())){
            $data = base64_decode($user->getComplement());
            $tag = substr($data, 0, 16);
            $encodedComplement = substr($data, 16);
            $decodedComplement = openssl_decrypt($encodedComplement, $cipher, $key, 0, $iv, $tag);
            $user->setComplement($decodedComplement);
        }

        // City
        if(!is_null($user->getCity())){
            $data = base64_decode($user->getCity());
            $tag = substr($data, 0, 16);
            $encodedCity = substr($data, 16);
            $decodedCity = openssl_decrypt($encodedCity, $cipher, $key, 0, $iv, $tag);
            $user->setCity($decodedCity);
        }

        // Tel
        if(!is_null($user->getTel())){
            $data = base64_decode($user->getTel());
            $tag = substr($data, 0, 16);
            $encodedTel = substr($data, 16);
            $decodedTel = openssl_decrypt($encodedTel, $cipher, $key, 0, $iv, $tag);
            $user->setTel($decodedTel);
        }
    }
}