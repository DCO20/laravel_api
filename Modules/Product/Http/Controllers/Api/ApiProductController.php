<?php

namespace Modules\Product\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests;
use Modules\Product\Services\ProductServiceInterface;
use Modules\Product\Transformers\ProductResource;

class ApiProductController extends Controller
{
    /**
     * Método Construtor
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @param  \Modules\Product\Services\ProductServiceInterface  $product_service
     * @return void
     */
    public function __construct(
        protected Product $product,
        protected ProductServiceInterface $product_service
    ) {
    }

    public function index()
    {
        $product = $this->product->where('active', 1)->paginate(9);

        return ProductResource::collection($product);
    }

    public function store(Requests\ProductRequest $request)
    {
        $data = $request->all();

        if ($request->image) {
            $data['image'] = $request->image->store('products');
        }

        $this->product_service->updateOrCreate($data);

        return response()->json([
            'status' => 200,
            'message' => 'Cadastro realizado com sucesso',
        ]);
    }

    public function show($id)
    {
        $product = $this->product->with([
            'category',
        ])->findOrFail($id);

        return new ProductResource($product);
    }

    public function edit($id)
    {
        $product = $this->product->with([
            'category',
        ])->findOrFail($id);

        return new ProductResource($product);
    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $product = $this->product->findOrFail($id);

        $data = $request->all();

        if ($request->image && $request->image->isValid()) {
            if (Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $data['image'] = $request->image->store('products');
        }

        $this->product_service->updateOrCreate($data, $product->id);

        return response()->json([
            'status' => 200,
            'message' => 'Atualização feita com sucesso',
        ]);
    }

    public function delete($id)
    {
        $product_ype = $this->product->findOrFail($id);

        $this->product_service->delete($product_ype);

        return response()->json([
            'status' => 200,
            'message' => 'Exclusão feita com sucesso',
        ]);
    }
}
