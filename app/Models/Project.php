<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'description'];

    public function project_types()
    {
        return $this->belongsToMany(ProjectType::class, 'mapping_project_project_type', 'project_id', 'project_type_id');
    }
}
