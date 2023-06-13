<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartTotalTable extends Component
{
    public $cart;
    public $subtotal;
    public $shipping;

    protected $listeners = ['cartModified'];

    public function mount($shipping)
    {
        $this->getCartAndSubtotal();
        $this->shipping = $shipping;
    }

    public function cartModified()
    {
        $this->getCartAndSubtotal();
    }

    public function getCartAndSubtotal() {
        $this->cart = session('cart', []);
        $this->subtotal = array_sum(array_map(function ($item) {
            return $item['quantity'] * $item['price'];
        }, $this->cart));
    }
    
    public function render()
    {
        return view('livewire.cart-total-table');
    }
}
