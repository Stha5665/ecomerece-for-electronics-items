<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

// What does slug mean in Laravel?
// Slug is a part of a URL that identifies a particular (unique) web page. An example of a slug is URL https://codelapan.com/post-slug, and means the slug of that URL is "post-slug". For SEO, include keywords in the URL and create a user-friendly URL.
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status, $brand_id, $category_id;

    public function rules(){
        return [
            'name' => 'required|string'
            , 'slug'=> 'required|string'
            , 'status' => 'nullable',
            'category_id' => 'required|integer'
        ];
    }

    // after saving,editing,deleting we have to empty input field
    // 
    public function resetInput(){
        $this->name=Null;
        $this->slug=Null;
        $this->status=NULL;
        $this->brand_id=NULL;
        $this->category_id=NULL;
    }

    // for reseting update modal 
    public function closeModal(){
        $this->resetInput();
    }
    public function storeBrand(){
        $validateData = $this->validate();

        // Str::slug converts in safe string that can be used in url
        Brand::create([
            'name'=> $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
            'category_id' => $this->category_id
        ]);

        session()->flash('message', 'Brand Added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }


    public function editBrand($brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;

    }

    public function updateBrand(){
        $validateData = $this->validate();

        // Str::slug converts in safe string that can be used in url
        Brand::findOrFail($this->brand_id)->update([
            'name'=> $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
            'category_id' => $this->category_id

        ]);

        session()->flash('message', 'Brand Updated successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }

    // delete 

    public function deleteBrand($brand_id){
        $this->brand_id = $brand_id;
    }

    // if yes is pressed call this destroy function
    public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand Deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();


    }
    public function render()
    {
        $categories = Category::where('status', '0')->get();
        $brands = Brand::orderBy('id', 'DESC')->paginate(2);
        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories'=> $categories])
                    ->extends('layouts.admin')
                    ->section('content');
                    
    }
}
