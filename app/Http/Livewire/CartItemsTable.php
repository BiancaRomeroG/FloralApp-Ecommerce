<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartItemsTable extends Component
{
    public $cart;

    public function mount()
    {
        $this->cart = session('cart', []);
    }

    public function increaseQuantity($productId)
    {
        $this->cart[$productId]['quantity'] += 1;
        session()->put('cart', $this->cart);

        $this->emit('cartModified');
    }

    public function decreaseQuantity($productId)
    {
        if ($this->cart[$productId]['quantity'] > 1) {
            $this->cart[$productId]['quantity'] -= 1;
            session()->put('cart', $this->cart);

            $this->emit('cartModified');
        }
    }

    public function removeFromCart($productId)
    {
        unset($this->cart[$productId]);
        session()->put('cart', $this->cart);

        $this->emit('cartModified');
    }

    public function render()
    {
        return view('livewire.cart-items-table');
    }
}
