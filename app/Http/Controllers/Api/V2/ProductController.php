<?php
    
    namespace App\Http\Controllers\Api\V2;
    
    use App\Models\Product;
    use App\Http\Controllers\Controller;
    use App\Http\Resources\ProductResource;

    /**
     * @group Products
     *
     * Managing Products
     */
    class ProductController extends Controller
    {
        /**
         * List Products
         *
         * Get all Products
         */
        public function index()
        {
            $products = Product::with('category')->paginate(9);
            
            return ProductResource::collection($products);
        }
    }
