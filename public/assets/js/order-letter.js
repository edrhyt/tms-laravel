//Global Variables
let itemsCount = parseInt($('#jumlah-barang').text()) > 0 ? parseInt($('#jumlah-barang').text()) : 0;
let subTotalPrice = parseInt($('#subtotal-keranjang').text()) > 0 ? parseInt($('#subtotal-keranjang').text().match(/\d+/g).join('')) : 0;
let totalPrice = parseInt($('#total-angsuran').val()) > 0 ? parseInt($('#total-angsuran').val()) : 0;
let diskonDP = parseInt( $('#diskon-dp').val() ) ? parseInt($('#diskon-dp').val()) : 0;
let isEdit = $('#isEdit').val() ?? false;
let isCartInitialized = false;

let diskonKoordinator = parseInt( $('#diskon-koordinator').val() ) || 0;

function getNetto () {
    return totalPrice - diskonDP;
}

function getMonthlyInstallments() {
    const installmentsTime = parseInt($('#installment').val()) || 1;
    
    return totalPrice / installmentsTime;
}

function getFirstInstallment() {
    return getMonthlyInstallments() - diskonDP;
}

function resetOrder() {
    itemsCount = 0;
    subTotalPrice = 0;
    totalPrice = 0;
    diskonDP = parseInt( $('#diskon-dp').val() ) || 0;

    $('#installment').prop('disabled', true);
    $('#diskon-dp').prop('readonly', true);
    $('#hadiah').prop('readonly', true);

    $('#netto').val(0);
    $('#angsuran-1').val(0);
    $('#angsuran-per-bulan').val(0);
}