<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class tarjeta extends Model
{
    use HasFactory;
    
    protected $filable = ['banco', 'referencia','PDF','fecha'];

    public function users() {
        return $this->belongsToMany('App\Models\User');

}
}