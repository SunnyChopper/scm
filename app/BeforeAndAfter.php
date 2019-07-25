<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeforeAndAfter extends Model
{
    
	protected $table = "before_and_afters";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeInactive($query) {
    	return $query->where('is_active', 0);
    }

}
