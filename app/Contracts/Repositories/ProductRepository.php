<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProductInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductInterface
{
    public function get(): mixed
    {
        return Product::paginate(10);
    }

    public function store(array $a): mixed
    {
        return Product::create($a);
    }

    public function show(mixed $id): mixed
    {
        return Product::findOrFail($id);
    }

    public function Update(mixed $id, array $data): mixed
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function destroy(mixed $id): mixed
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return $product;
    }

    public function customPaginate(Request $request, int $pagination = 5): LengthAwarePaginator
    {
        return Product::paginate($pagination);
    }
}
?>