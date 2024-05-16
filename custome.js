$(document).ready(function() {
    cartNoti();
    showTable();
    decreaseQty();
    increaseQty();
    removeItem();
    $('.addtocartBtn').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var codeno = $(this).data('codeno');
        var photo = $(this).data('photo');
        var price = $(this).data('price');
        var discount = $(this).data('discount');
        var qty = 1;

        // alert(`${id},${name},${codeno},${photo},${price},${discount}`);

        var mylist = {
            id: id,
            name: name,
            codeno: codeno,
            photo: photo,
            price: price,
            discount: discount,
            qty: qty
        };

        // var cart = localStorage.getItem('cart');

        // if (!cart) {
        //     var cart = '{"mycart":[]}';
        // }
        // cart = JSON.parse('cart');

        // var mycart = cart.mycart;
        // length = mycart.length;

        // //increase qty when localStorage-id and new-id are same

        // for (var i = 0; i < length; i++) {
        //     if (id == mycart[i].id) {
        //         mycart[i].qty += 1;
        //         var exit = 1;
        //     }
        // }

        var cart = localStorage.getItem('cart');
        var cartArray;

        if (cart == null) {
            cartArray = Array();
        } else {
            cartArray = JSON.parse(cart);
        }

        var status = false;

        $.each(cartArray, function(i, v) {
            if (id == v.id) {
                v.qty++;
                status = true;
            }
        })

        if (!status) {
            cartArray.push(mylist);
        }

        var cartData = JSON.stringify(cartArray);
        localStorage.setItem('cart', cartData);
        cartNoti();
        // increaseQty();
        removeItem();
    })

    function cartNoti() {
        var cart = localStorage.getItem('cart');
        if (cart) {
            var cartArray = JSON.parse(cart);
            var total = 0; //total kyats for cart
            var noti = 0; //total qty for cart
            $.each(cartArray, function(i, v) {
                var unitprice = v.price;
                var discount = v.discount;
                var qty = v.qty;
                //putting value price of item without discount items
                if (discount) {
                    var price = discount;
                } else {
                    var price = unitprice;
                }

                var subtotal = price * qty;
                noti += qty++;
                total += subtotal++;
            })
            $('.cartNoti').html(noti);
            $('.cartTotal').html(total + "MMK");
        } else {
            $('.cartNoti').html(0);
            $('.cartTotal').html(0 + "MMK");
        }
        decreaseQty();
        increaseQty();
        removeItem()
    }

    function showTable() {
        var cart = localStorage.getItem('cart');

        if (cart) {
            $('.shoppingcart_div').show();
            $('.noneshoppingcart_div').hide();

            var cartArray = JSON.parse(cart);
            var shoppingcartData = '';

            if (cartArray.length > 0) {
                var total = 0;
                $.each(cartArray, function(i, v) {
                    var id = v.id;
                    var codeno = v.codeno;
                    var photo = v.photo;
                    var name = v.name;
                    var unitprice = v.price;
                    var discount = v.discount;
                    var qty = v.qty;

                    if (discount) {
                        var price = discount;
                    } else {
                        var price = unitprice;
                    }
                    var subtotal = price * qty;

                    shoppingcartData += `<tr>
                                            <td>
                                            <button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%" data-id="${i}"> 
                                            <i class="icofont-close-line"></i> 
                                            </button></td>

                                            <td><img src="${photo}" class="cartImg"></td>

                                            <td><p> ${name} </p>
                                            <p> YT_${codeno}</p></td>

                                            <td><button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
                                            <i class="icofont-plus"></i> 
                                            </button></td>

                                            <td><p> ${qty} </p></td>

                                            <td><button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
                                            <i class="icofont-minus"></i>
                                            </button></td>
                                            <td>`;

                    if (discount) {
                        shoppingcartData += `<p class="text-danger">${discount} MMK</p>
                                            <p class="font-weight-lighter"> 
                                            <del> ${unitprice} MMK</del> </p>`;
                    } else {
                        shoppingcartData += `<p class="text-danger"> 
                                                ${unitprice} MMK
                                                </p>`;
                    }

                    shoppingcartData += `</td>

                                            <td><p>${subtotal} MMK</p></td>
                                        </tr>`
                    total += subtotal++;
                })
                $('#shoppingcart_table').html(shoppingcartData);
            } else {
                $('.shoppingcart_div').hide();
                $('.noneshoppingcart_div').show();
            }
        } else {
            $('.shoppingcart_div').hide();
            $('.noneshoppingcart_div').show();
        }
        decreaseQty();
        increaseQty();
        removeItem()
    }

    //remove items
    function removeItem() {
        $('.remove').on('click', function() {
            var id = $(this).data('id');
            // alert(`${id}`);

            var cart = localStorage.getItem('cart');
            var cartArray = JSON.parse(cart);
            cartArray.splice(id, 1);
            localStorage.setItem('cart', JSON.stringify(cartArray));
            cartNoti();
            showTable();
        })
    }


    // qty increase 
    function increaseQty() {
        $('.plus_btn').on('click', function() {
            var id = $(this).data('id');
            // alert(`${id}`);
            var cart = localStorage.getItem('cart');
            var cartArray = JSON.parse(cart);
            $.each(cartArray, function(i, v) {
                if (i == id) {
                    v.qty++;
                }
            })
            localStorage.setItem('cart', JSON.stringify(cartArray));
            cartNoti();
            showTable();
        })
    }


    // qty decrease 
    function decreaseQty() {
        $('.minus_btn').on('click', function() {
            var id = $(this).data('id');
            // alert(`${id}`);
            var cart = localStorage.getItem('cart');
            var cartArray = JSON.parse(cart);
            $.each(cartArray, function(i, v) {
                if (i == id) {
                    v.qty--;
                    if (v.qty == 0) {
                        cartArray.splice(id, 1);
                    }
                }
            })
            localStorage.setItem('cart', JSON.stringify(cartArray));
            cartNoti();
            showTable();
        })
    }

    // checkout function and clear localstorage 
    $('.checkoutbtn').on('click', function() {
        // alert('Hello this is check out');
        // console.log("hellohello");
        var cart = localStorage.getItem('cart');
        var cartArray = JSON.parse(cart);

        // console.log(cartArray);

        var note = $('#notes').val();
        // console.log(note);
        $.post('storeorder.php', {
            cart: cartArray,
            note: note
        }, function(response) {
            localStorage.clear();
            location.href = "ordersuccess.php";
        })
    })

})