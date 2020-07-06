<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'user';

    protected $fillable = [
    'id_user','Email', 'Ime', 'Prezime', 'Type' ];

    protected $hidden = [
        'password', 'remember_token',];


}
