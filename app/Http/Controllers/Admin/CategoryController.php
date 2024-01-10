<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

use function Laravel\Prompts\select;

class CategoryController extends Controller
{
    
    public function index ()
    {
       return view('admin.category.index');
    }

    public function create ()
    {
        return view('admin.category.create');
    }

    public function store ( CategoryFormRequest $request)
     {
            $validateData = $request->validated();
            $fileName = [];
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                $ext = $file->getClientOriginalName();
                $fileName = time().'.'.$ext;
                $file->move('uploads/category/',$fileName);
            }else{
                $fileName=null;
            }
             Category::create([
                'name'=>$validateData['name'],
                'slug'=>Str::slug($validateData['slug']),
                'image'=>$fileName,
                'description'=>$validateData['description'],
                'meta_title'=>$validateData['meta_title'],
                'meta_keyword'=>$validateData['meta_keyword'],
                'meta_description'=>$validateData['meta_description'],
                'status'=> $request->status == true ? '1':'0',

            ]);
            return redirect(route('admin.category'))->with('message','Category Added');
    }

    // Catagory Edit
    public function edit (Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    // Catagory Update
    public function update(CategoryFormRequest $request,$category_id)
    {   
        $category = Category::findOrFail($category_id);
        $validateData = $request->validated();
        $fileName = [];
        
        if ($request->hasFile('image'))
        {
            $imagePath = 'uploads/category/'.$category->image;

            if (File::exists($imagePath))
            {
                File::delete($imagePath);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $fileName = time().'.'.$ext;
            $file->move('uploads/category/',$fileName);
        }
        
            Category::where('id','=',$category_id)->update([
                
            'name'=>$validateData['name'],
            'slug'=> Str::slug($validateData['slug']),
            'image'=>$request->image != null ? $fileName : $category->image,
            'description'=>$validateData['description'],
            'meta_title'=>$validateData['meta_title'],
            'meta_keyword'=>$validateData['meta_keyword'],
            'meta_description'=>$validateData['meta_description'],
            'status'=>$request->status == true ? 1 : 0,
            

        ]);
        return redirect(route('admin.category'))->with('message','Category Updated');
            

    }
}
