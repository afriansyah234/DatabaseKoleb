<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ProductRepository;
use App\Helpers\ResponseHelper;
use App\Helpers\PaginateHelper;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductPaginationResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $product;
    protected ProductRepository $repo;

    public function __construct(ProductService $product, ProductRepository $repo)
    {
        $this->product = $product;
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = $this->repo->customPaginate($request, $request->paginate ?? 8);
        return ResponseHelper::success(ProductPaginationResource::make($product, PaginateHelper::getPaginate($product)), null, 200, true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validasi = $this->product->store($request->validated());
        $product = $this->repo->store($validasi);
        return ResponseHelper::success(new ProductResource($product));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ProductResource($this->product->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        return ResponseHelper::success($this->product->update($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ResponseHelper::success($this->product->destroy($id), 'data berhasil di hapus');
    }
}
