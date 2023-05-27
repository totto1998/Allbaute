/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Ecommerce cart Js File
*/


var taxRate = 0.19;
var discountRate = 0.00;

var currencySign = "$";

function recalculateCart() {
    var subtotal = 0;

    Array.from(document.getElementsByClassName("product")).forEach(function (item) {
        Array.from(item.getElementsByClassName('product-line-price')).forEach(function (e) {
            subtotal += parseFloat(e.innerHTML);
        });
    });

    /* Calculate totals */
    var tax = subtotal * taxRate;
    var discount = subtotal * discountRate;

    var total = subtotal + tax - discount;

    document.getElementById("cart-subtotal").innerHTML = currencySign + subtotal.toFixed(2);
    document.getElementById("cart-tax").innerHTML = currencySign + tax.toFixed(2);
    document.getElementById("cart-total").innerHTML = currencySign + total.toFixed(2);
}

function updateQuantity(quantityInput) {
    var productRow = quantityInput.closest('.product');
    var price;
    if (productRow || productRow.getElementsByClassName('product-price'))
        Array.from(productRow.getElementsByClassName('product-price')).forEach(function (e) {
            price = parseFloat(e.innerHTML);
        });

    if (quantityInput.previousElementSibling && quantityInput.previousElementSibling.classList.contains("product-quantity")) {
        var quantity = quantityInput.previousElementSibling.value;
    } else if (quantityInput.nextElementSibling && quantityInput.nextElementSibling.classList.contains("product-quantity")) {
        var quantity = quantityInput.nextElementSibling.value;
    }
    var linePrice = price * quantity;
    /* Update line price display and recalc cart totals */
    Array.from(productRow.getElementsByClassName('product-line-price')).forEach(function (e) {
        e.innerHTML = linePrice.toFixed(2);
        recalculateCart();
    });
}

// Remove product from cart
var removeProduct = document.getElementById('removeItemModal');
if (removeProduct) {
    removeProduct.addEventListener('show.bs.modal', function (e) {
        document.getElementById('remove-product').addEventListener('click', function (event) {
            e.relatedTarget.closest('.product').remove();
            document.getElementById("close-modal").click();
            recalculateCart();
        });
    });
}