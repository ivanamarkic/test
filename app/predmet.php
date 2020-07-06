<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class predmet extends Model
{
    protected $table = 'predmet';

    protected $fillable = [
    'id_predmet','ime_predmeta', 'fk_user', 'fk_godina', 'fk_raspored'];
}
