<?php

namespace Chamelle\UserBundle\Service;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class Cypher implements PasswordEncoderInterface
{
    const HASH_ALGORITHM = 'sha256';
    const SALT_BYTES_LENGTH = 32; //length of the salt as bytes (half of the hexa string)
    
    /**
     * Adds salt then hashes the given password
     *
     * @param string $raw
     * @param string $salt
     */
    public function encodePassword($raw, $salt)
    {
        return hash(self::HASH_ALGORITHM, $salt . $raw);
    }
    
    
    /**
     * Checks if a raw password matches the given encoded password
     *
     * @param string $encoded
     * @param string $raw
     * @param string $salt
     */
    public function isPasswordValid($encoded, $raw, $salt)
    {
        return ($encoded === $this->encodePassword($raw, $salt));
    }
    
    
    /**
     * Returns an hexadecimal random salt
     */
    public function generateSalt()
    {
        return bin2hex(mcrypt_create_iv(self::SALT_BYTES_LENGTH, MCRYPT_DEV_URANDOM));
    }

}