<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class godina extends Model
{
    protected $table = 'godina';

    protected $fillable = [
    'id_godina','godina', 'fk_smijer' ];
}
