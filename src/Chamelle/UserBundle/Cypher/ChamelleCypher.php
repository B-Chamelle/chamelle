<?php

namespace Chamelle\UserBundle\Cypher;

class ChamelleCypher
{
    const HASH_ALGORITHM = 'sha256';
    
    /**
     * Adds salt then hashes the given password
     *
     * @param string $pwd
     */
    public function securePwd(&$pwd)
    {
        $this->hashPwd($this->saltPwd($pwd));
    }
    

    /**
     * Adds salt to the given string
     *
     * @param string $s
     */
    private function saltPwd(&$s)
    {
        $s.= "#Trµ1T3%"; //TODO: use secured salt
    }
    

    /**
     * Hashes the given string
     *
     * @param string $s
     */
    private function hashPwd(&$s)
    {
        hash(self::HASH_ALGORITHMTHM, $s);
    }

}