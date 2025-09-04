<?php
namespace App\Services;

use App\Base\Interfaces\Uploads\UploadInterface;
use App\Contracts\Repositories\ProductRepository;
use App\Traits\UploadFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductService implements UploadInterface
{
    use UploadFile;

    protected ProductRepository $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this->product->get();
    }

    public function store(array $product)
    {
        if (isset($product['images']) && $product['images'] instanceof UploadedFile) {
            $path = $this->upload('products', $product['images']);
            $product['images'] = $path;
        }

        return $product;
    }

    public function show(mixed $a)
    {
        return $this->product->show($a);
    }

    public function update(mixed $id, array $data)
    {
        $product = $this->product->show($id);
        if (isset($data['images']) && $data['images'] instanceof UploadedFile) {
            if ($product->images && $this->exists($product->images)) {
                $this->remove($product->images);
            }
            $path = $this->upload('products', $data['images']);
            $data['images'] = $path;
        }

        return $this->product->Update($id, $data);
    }



    public function destroy(mixed $id)
    {
        // Get the current product to check for existing image
        $currentProduct = $this->product->show($id);

        // Delete old image if it exists
        if ($currentProduct->images) {
            Storage::disk('public')->delete($currentProduct->images);
        }

        return $this->product->destroy($id);
    }

    // UploadInterface methods are implemented by the UploadFile trait
}
?>