<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadMagnet extends Model
{
    
	protected $table = "lead_magnets";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeInactive($query) {
    	return $query->where('is_active', 0);
    }

}
