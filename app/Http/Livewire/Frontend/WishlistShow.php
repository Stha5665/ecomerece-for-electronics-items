<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{

    public function removeWishlistItem($wishlistId){
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();

        // firing event

        // to reload the wishlist count in navbar
        $this->emit('wishlistAddedUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Item Removed successfully',
            'type'=> 'success',
            'status'=> 200
        ]);
    }

    public function render()
    {
        $wishList = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishList
        ]);
    }
}
