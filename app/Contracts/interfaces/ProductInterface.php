<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\Delete;
use App\Contracts\Interfaces\Eloquent\GetAll;
use App\Contracts\Interfaces\Eloquent\Showdata;
use App\Contracts\Interfaces\Eloquent\Store;
use App\Contracts\Interfaces\Eloquent\Update;

interface ProductInterface extends GetAll, Store, Showdata, Update, Delete
{

}
?>