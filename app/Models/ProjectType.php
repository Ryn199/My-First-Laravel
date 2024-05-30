<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    // protected $fillable = ['type', 'description'];

    public $timestamps = false;  

    public function projects()
    {
        return $this->belongsToMany(project::class, 'mapping_project_project_type', 'project_type_id', 'project_type');
    }
}
