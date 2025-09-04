<?php
namespace App\Contracts\Interfaces\Eloquent;
interface Update
{
    /**
     * @param mixed $id
     * @param array $data
     * @return mixed
     */

    public function Update(mixed $id, array $data): mixed;
}

?>