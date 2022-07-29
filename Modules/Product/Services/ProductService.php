<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\DB;
use Modules\Product\Services\Actions\ProductAction;
use Modules\Product\Services\Actions\ProductDeleteAction;

class ProductService implements ProductServiceInterface
{
    protected $product;

    protected $product_delete;

    public function __construct(
        ProductAction $product,
        ProductDeleteAction $product_delete
    ) {
        $this->product = $product;
        $this->product_delete = $product_delete;
    }

    /**
     * Cria e/ou atualiza o registro
     *
     * @param  array  $request
     * @param  null|int  $id
     * @return mixed
     */
    public function updateOrCreate($request, $id = null)
    {
        DB::beginTransaction();

        try {
            $product = $this->product->handle($request, $id);

            $product->contacts()->sync($request['contacts'] ?? []);

            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }

    /**
     * Exclui o registro
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return void
     */
    public function delete($product)
    {
        DB::beginTransaction();

        try {
            $this->product_delete->handle($product);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }
}
