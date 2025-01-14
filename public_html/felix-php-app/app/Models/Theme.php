<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = ['name', 'folder', 'version'];

    public function options(){
        return $this->hasMany('\Wave\ThemeOptions', 'theme_id');
    }
}
