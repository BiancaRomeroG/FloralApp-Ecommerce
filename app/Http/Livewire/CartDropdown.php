<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartDropdown extends Component
{
    public $cartItems;
    public $cartTotal;

    protected $listeners = ['cartModified'];

    public function mount()
    {
        $this->getCartAndTotal();
    }

    public function cartModified()
    {
        $this->getCartAndTotal();
    }

    public function getCartAndTotal() {
        $this->cartItems = session('cart', []);
        $this->cartTotal = array_sum(array_map(function ($item) {
            return $item['quantity'] * $item['price'];
        }, $this->cartItems));
    }

    public function render()
    {
        return view('livewire.cart-dropdown');
    }
}
