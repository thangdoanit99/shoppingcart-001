@if (Session::has('test_cart_items') != null)
@foreach (Session::get('test_cart_items')->toArray() as $item)
<div class="select-items">
    <table>
        <tbody>
            <tr>
                <td class="si-pic"><img width="70px" src="assets/img/products/{{$item['associatedModel']['image']}}"
                        alt="logo"></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{$item['price']}} x {{$item['quantity']}}</p>
                        <h6>{{$item['name']}}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close" data-id="{{$item['id']}}"></i>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
@endif
<div class="select-total">
    <span>total:</span>
    <h5>₫{{number_format(Cart::session('test')->getTotal(), 2)}}</h5>
    <input hidden id="total-quantity-cart" type="number" value="{{Cart::session('test')->getTotalQuantity()}}" />
</div>
