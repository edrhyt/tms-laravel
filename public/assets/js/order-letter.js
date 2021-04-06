//Global Variables
let itemsCount = 0;
let subTotalPrice = 0;

function updateTotalPrice() {
    let totalPrice = 0;
    let diskonDP = parseInt( $('#diskon-dp').val() ) || 0;

    totalPrice = subTotalPrice - diskonDP;

    $('#total').val(totalPrice);
}