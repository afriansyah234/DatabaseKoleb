<?php
namespace App\Contracts\Interfaces\Eloquent;

interface Store
{
    /**
     * @param array $a
     * @return mixed
     */

    public function store(array $a): mixed;
}

?>