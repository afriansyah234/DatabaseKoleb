<?php
namespace App\Contracts\Interfaces\Eloquent;

interface Showdata
{
    /**
     * @param mixed $id
     * @return mixed
     */
    public function show(mixed $id): mixed;
}

?>