<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{

	protected $table = "project_tasks";
    public $primaryKey = "id";

    public function project() {
    	return $this->hasOne('App\Project', 'id', 'project_id');
    }

    public function scopeActive($query) {
    	return $query->where('status', 1);
    }

    public function scopeComplete($query) {
    	return $query->where('status', 2);
    }

}
