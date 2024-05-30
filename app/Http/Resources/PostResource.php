<?php

namespace App\Http\Resources;

use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    //define properti
    public $status;
    public $message;
    public $resource;

    // /**
    //  * __construct
    //  *
    //  * @param  mixed $status
    //  * @param  mixed $message
    //  * @param  mixed $resource
    //  * @return void
    //  */
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }

    // /**
    //  * toArray
    //  *
    //  * @param  mixed $request
    //  * @return array
    //  */
    public function toArray(Request $request): array
    {
        return [
            'success'   => $this->status,
            'message'   => $this->message,
            'data'      => $this->resource
        ];
    }

    public function project_types()
    {
        return $this->belongsToMany(ProjectType::class, 'mapping_project_project_type', 'project_id', 'project_type_id');
    }
}