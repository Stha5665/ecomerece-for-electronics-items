<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }

    public function categories(){

        // get all categories which are visible
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug){

        $category = Category::where('slug', $category_slug)->first();

        // if category not found redirect back
        if($category){

             // products function is in category model
             $product = $category->products()->get();

            if($product){

                return view('frontend.collections.products.index', compact('category'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function productView($category_slug, $product_slug ){

        
    
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();

        // // if category not found redirect back
        if($category){

            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();

            return view('frontend.collections.products.view', compact('product', 'category'));
        }else{
            return redirect()->back();
        }

    }
}

