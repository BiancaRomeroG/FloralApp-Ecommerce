<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddToCartButton extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }

    public function addToCart()
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$this->product['id']])) {
            $cart[$this->product['id']]['quantity'] += 1;
        } else {
            $cart[$this->product['id']] = [
                'name' => $this->product['name'],
                'photo' => $this->product['photo'],
                'price' => $this->product['price'],
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);

        $this->emit('cartModified');
    }
}
