<div class="col-lg-12" id="list-cart">
    <div class="cart-table">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th class="p-name">Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><button id="del-all" type="button" class="btn btn-danger p-2">Delete All</button></th>
                    <th><button id="edit-all" type="button" class="btn btn-success p-2">Edit All</button></th>
                </tr>
            </thead>
            <tbody>
                @if (Session::has('test_cart_items') != null)
                @foreach (Session::get('test_cart_items')->toArray() as $item)
                <tr>
                    <td class="cart-pic first-row"><img style="width: 80%; margin: 10px;"
                            src="assets/img/products/{{$item['associatedModel']['image']}}" alt="list-cart">
                    </td>
                    <td class="cart-title first-row">
                        <h5>{{$item['name']}}</h5>
                    </td>
                    <td class="p-price first-row">{{$item['price']}}</td>
                    <td class="qua-col first-row">
                        <div class="quantity">
                            <div class="pro-qty">
                                <span class="dec qtybtn">-</span>
                                <input data-id="{{$item['id']}}" id="quantity-input-{{$item['id']}}" type="text"
                                    value="{{$item['quantity']}}">
                                <span class="inc qtybtn">+</span>
                            </div>
                        </div>
                    </td>
                    <td class="total-price first-row">${{number_format($item['price'], 2)}}</td>
                    <td class="close-td first-row" onclick="RemoveListCart({{$item['id']}});"><i class="ti-close"></i>
                    </td>
                    <td class="close-td first-row" onclick="UpdateListCart({{$item['id']}});"><i class=" ti-save"></i>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-4 offset-lg-8">
            <div class="proceed-checkout">
                <ul>
                    <li class="subtotal">Quantity
                        <span>{{Cart::session('test')->getTotalQuantity()}}</span></li>
                    <li class="cart-total">Total
                        <span>${{Cart::session('test')->getTotal()}}</span></li>
                </ul>
                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
            </div>
        </div>
    </div>
</div>
