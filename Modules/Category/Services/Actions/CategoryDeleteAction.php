<?php

namespace Modules\Category\Services\Actions;

class CategoryDeleteAction
{
    /**
     * Exclui o registro
     *
     * @param  \Modules\Category\Entities\Category  $category
     * @return void
     */
    public function handle($category)
    {
        $category->delete();
    }
}
