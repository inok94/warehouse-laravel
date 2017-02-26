<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Pagination;
use Response;

class ProductsController extends Controller
{
    /**
     * Постраничный вывод товаров
     * @limit - максимальное количество продуктов для извлечения
     * @offset - Номер страницы товаров
     * @param Request $request
     * @return mixed
     */
    public function product(Request $request)
    {
        // Request limit - максимальное количество продуктов для извлечения
        $limit = ((int)$request->limit) ? : 25;
        // Номер страницы товаров
        $offset = ((int)$request->offset) ? : null;
        $products = Product::paginate($limit,['*'], 'offset', $offset);

        $emptyProduct = $products->toArray();
        // Проверка существования товаров на конкретной странице
        if(!$emptyProduct['data']){
            return Response::json(['status' => 404]);
        }
        return Response::json($products);
    }
}
