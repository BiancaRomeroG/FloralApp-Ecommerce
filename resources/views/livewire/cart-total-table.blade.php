@if (count($cart) > 0)
    <div class="row">
        <div class="col-lg-5 ml-auto col-custom">
            <!-- Cart Calculation Area -->
            <div class="cart-calculator-wrapper">
                <div class="cart-calculate-items">
                    <h3>Total a pagar</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Sub Total</td>
                                <td>Bs. {{ $subtotal }}</td>
                            </tr>
                            <tr>
                                <td>Envio</td>
                                <td>Bs. {{ $shipping }}</td>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <td class="total-amount">Bs. {{ $subtotal + $shipping }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a href="{{ route('checkout') }}" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Proceder
                    a pagar</a>
            </div>
        </div>
    </div>
@endif
