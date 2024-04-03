<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{

    public $category, $product,$prodColorSelectedQuantity ;

    public function mount($category, $product){
        $this->category = $category;
        $this->product = $product;
    }

    // add to wishlist
    public function addToWishList($productId){
        if(Auth::check()){

            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()){
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist',
                    'type'=> 'success',
                    'status'=> 409
                ]);
                
                return false;
            }else{
            $wishList = Wishlist::create([
                'user_id' => auth()->user()->id,
                'product_id' => $productId
            ]);

            // firing event to update whishlist when item added 

            $this->emit('wishlistAddedUpdated');
            session()->flash('message', 'WishList added successfully');

            $this->dispatchBrowserEvent('message', [
                'text' => 'WishList added successfully',
                'type'=> 'success',
                'status'=> 200
            ]);
            }
        }else{

            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type'=> 'info',
                'status'=> 401
            ]);
            return false;
        }
    }

    public function colorSelected($producColorId){
        $productColor = $this->product->productColors()->where('id', $producColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    
    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product'=>$this->product
        ]);
    }
}
