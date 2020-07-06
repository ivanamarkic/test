<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class raspored extends Model
{
    protected $table = 'raspored';

    protected $fillable = [
    'id_raspored','vrijemeod', 'vrijemedo', 'mjesto' ];
}
