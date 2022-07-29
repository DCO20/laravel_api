<?php

namespace Modules\Category\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests;
use Modules\Category\Services\CategoryServiceInterface;
use Modules\Category\Transformers\CategoryResource;

class ApiCategoryController extends Controller
{
    /**
     * Método Construtor
     *
     * @param  \Modules\Category\Entities\Category  $category
     * @param  \Modules\Category\Services\CategoryServiceInterface  $category_service
     * @return void
     */
    public function __construct(
        protected Category $category,
        protected CategoryServiceInterface $category_service
    ) {
    }

    public function index()
    {
        $category = $this->category->where('active', 1)->paginate(9);

        return CategoryResource::collection($category);
    }

    public function store(Requests\CategoryRequest $request)
    {
        $this->category_service->updateOrCreate($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Cadastro realizado com sucesso',
        ]);
    }

    public function show($id)
    {
        $category = $this->category->findOrFail($id);

        return new CategoryResource($category);
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);

        return new CategoryResource($category);
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $category = $this->category->findOrFail($id);

        $this->category_service->updateOrCreate($request->all(), $category->id);

        return response()->json([
            'status' => 200,
            'message' => 'Atualização feita com sucesso',
        ]);
    }

    public function delete($id)
    {
        $category = $this->category->findOrFail($id);

        $this->category_service->delete($category);

        return response()->json([
            'status' => 200,
            'message' => 'Exclusão feita com sucesso',
        ]);
    }
}
