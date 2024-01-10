<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $debug = true;
    public $layout = 'layouts.app';
    protected $paginationTheme = 'bootstrap';


    public function storeBrand (Request $request)
    {
         $request->validate([
            'name' =>'required|string',
            'slug' =>'string',
            'status' =>'nullable'
        ]);

        Brand::create([
            'name'=> $request->name,
            'slug'=> Str::slug($request->slug),
            'status'=> $request->status == true ? '1' : '0'
        ]);
        session()->flash('message','Brands Added Successfully');
        // $this->dispatch('close-modal');
        return redirect()->route('admin.brand.render');
    }

    public function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
    }
    public function closeModel ()
    {
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function openModel ()
    {
        $this->dispatch('close-modal');
        $this->resetInput();
    }


    public function createBrand ()
    {
        return view('livewire.admin.brand.create-form');
        
    }
    
    public function updateBrand ()
    {
        dd($this->brandIdToUpdate);
        $validateData = $this->validate();
        $brands = Brand::all();
        $brands->update([
            'name'=> $this->name,
            'slug'=> Str::slug($this->slug),
            'status'=> $this->status == true ? '1' : '0'
        ]);
        session()->flash('message','Brands Update Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function render() 
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands'=>$brands]);
    }
}

