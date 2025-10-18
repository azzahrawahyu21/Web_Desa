<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = ['nama_menu', 'url'];

    public function submenus()
    {
        return $this->hasMany(Submenu::class, 'id_menu');
    }
    public $timestamps = false; 
}