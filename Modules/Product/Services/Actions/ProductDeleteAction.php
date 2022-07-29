<?php

namespace Modules\Product\Services\Actions;

class ProductDeleteAction
{
    /**
     * Exclui o registro
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return void
     */
    public function handle($product)
    {
        $product->delete();
    }
}
