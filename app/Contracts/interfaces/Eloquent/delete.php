<?php
namespace App\Contracts\Interfaces\Eloquent;

interface Delete
{
    /**
     * @param mixed $id
     * @return mixed
     */

    public function destroy(mixed $id): mixed;
}

?>