<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    @toastr_css
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
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
                                    <th><button id="del-all" type="button" class="btn btn-danger p-2">Delete
                                            All</button></th>
                                    <th><button id="edit-all" type="button" class="btn btn-success p-2">Edit
                                            All</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Session::has('test_cart_items') != null)
                                @foreach (Session::get('test_cart_items')->toArray() as $item)
                                <tr>
                                    <td class="cart-pic first-row"><img style="width: 80%; margin: 10px;"
                                            src="assets/img/products/{{$item['associatedModel']['image']}}"
                                            alt="list-cart">
                                    </td>
                                    <td class="cart-title first-row">
                                        <h5>{{$item['name']}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{$item['price']}}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input data-id="{{$item['id']}}" id="quantity-input-{{$item['id']}}"
                                                    type="text" value="{{$item['quantity']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">
                                        ${{number_format(Cart::session('test')->get($item['id'])->getPriceSum(), 2)}}
                                    </td>
                                    <td class="close-td first-row" onclick="RemoveListCart({{$item['id']}});"><i
                                            class="ti-close"></i></td>
                                    <td class="close-td first-row" onclick="UpdateListCart({{$item['id']}});"><i
                                            class=" ti-save"></i></td>
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
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.zoom.min.js"></script>
    <script src="assets/js/jquery.dd.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
    @jquery
    @toastr_js
    @toastr_render
    <script>
        function RenderCart(res){
            $('#list-cart').empty();
            $('#list-cart').html(res);
        }

        function RemoveListCart(id) {
            $.ajax({
                type: "GET",
                url: "Remove-List-Cart/" + id,
                success: function (res) {
                    RenderCart(res);
                    toastr.success('Removed Success', 'Congratulation !');
                }
            });
        }

        function UpdateListCart(id) {
            const quantity = $('#quantity-input-'+id).val();
            $.ajax({
                type: "GET",
                url: "Update-List-Cart/" + id + "/" + quantity,
                success: function (res) {
                    RenderCart(res);
                    toastr.success('Updated Success', 'Congratulation !');
                }
            });
        }

        var done = false;

        $('#edit-all').on('click', function () {

            const list = [];
            $('table tbody tr td').each(function() {
                $(this).find('input').each(function() {
                    let element = {key: $(this).data('id'), value: $(this).val()};
                    list.push(element);
                });
            });

            $.ajax({
                type: "POST",
                url: "Edit-All",
                data: {
                    "_token": '{{csrf_token()}}',
                    "data": list
                },
                success: function (res) {
                    setTimeout(() => {
                                        toastr.success('Edit All Success', 'Congratulation !');
                                        }, 1000);
                    location.reload();


                }
            });
        });

    </script>
</body>

</html>
