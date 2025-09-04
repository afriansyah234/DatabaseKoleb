<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductPaginationResource extends ResourceCollection
{
    protected array $pagination;
    public function __construct($resource, $pagination)
    {
        parent::__construct($resource);
        $this->pagination = $pagination;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => ProductResource::collection($this->collection),
            'pagination' => $this->pagination,
        ];
    }
}
