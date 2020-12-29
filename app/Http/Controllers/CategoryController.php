<?php

namespace App\Http\Controllers;

use App\Dtos\CategoryDto;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var $categoryService
     */
    protected $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->has('perpage') ? $request->perpage : 10;
            $res = $this->categoryService->getAllCategories($perPage);
            return $this->showAllPaginate($res, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Error al obtener categorias', 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $res = $this->categoryService->saveCategory(CategoryDto::fromRequest($request));
            return $this->showOne($res,201);
        } catch (\Throwable $th) {
            return $this->errorResponse('Error al crear categorias', 500);
        }
    }

    public function show($id){
        try {
            $res = $this->categoryService->getCategory($id);
            return $this->showOne($res, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Categoría no encontrada', 401);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $res = $this->categoryService->updateCategory(CategoryDto::fromRequest($request), $id);
            return $this->showOne($res, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Error al actualizar categoria', 500);

        }
    }

    /**
     * Remove the specified resource from storage.th
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $res = $this->categoryService->deleteCategory($id);
            return $this->showOne($res, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Error al eliminar categoria', 500);
        }
    }
}
