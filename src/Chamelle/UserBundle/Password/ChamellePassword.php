<?php

namespace Chamelle\UserBundle\Password;

class ChamellePassword
{
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
        $s.= "#Trµ1T3%";
    }
    

    /**
     * Hashes the given string
     *
     * @param string $s
     */
    private function hashPwd(&$s)
    {
        hash('sha256', $s);
    }

}