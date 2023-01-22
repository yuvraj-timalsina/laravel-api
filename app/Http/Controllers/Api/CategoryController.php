<?php
    
    namespace App\Http\Controllers\Api;
    
    use App\Models\Category;
    use Illuminate\Http\Response;
    use App\Http\Controllers\Controller;
    use App\Http\Resources\CategoryResource;
    use App\Http\Requests\StoreCategoryRequest;
    
    class CategoryController extends Controller
    {
        public function index()
        {
            $categories = Category::all();
            
            return CategoryResource::collection($categories);
        }
        
        
        public function show(Category $category)
        {
            return new CategoryResource($category);
        }
        
        
        public function store(StoreCategoryRequest $request)
        {
            $data = $request->all();
            
            if ($request->hasFile('photo')) {
            $data['photo'] = $request->photo->store('categories');
        }
            $category = Category::create($data);
            
            return new CategoryResource($category);
        }
        
        
        public function update(StoreCategoryRequest $request, Category $category)
        {
            $category->update($request->all());
            
            return new CategoryResource($category);
        }
        
        
        public function destroy(Category $category)
        {
            $category->delete();
            
            return response(NULL, Response::HTTP_NO_CONTENT);
        }
    }
