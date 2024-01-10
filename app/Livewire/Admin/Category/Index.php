<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $categoryId;

    public function deleteCategory($categoryId){
        $this->categoryId = $categoryId;
    }

    public function destroyCategory(){
        dd($this->categoryId);
        Log::info('This is an informational message.');
        $category = Category::find($this->categoryId);
        $path = 'uploads/category/'.$category->image;
       if (File::exists($path))
       {
            File::delete($path);
       }
       $category->delete();
       session()->flash('message','Category Deleted');
       $this->dispatch('close-modal');
    }
    public function render()
    {
       $categpries = Category::orderBy('id','DESC')->paginate(1);
        return view('livewire.admin.category.index',['categories'=> $categpries]);
    }

}
