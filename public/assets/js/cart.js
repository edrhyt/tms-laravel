function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function parsePrice(x) {
    return parseInt( x.replace(/[^0-9]/g, '') );
}

function addItem(btn) {
    $(btn).on('click', function () {
        if($(this).attr('disabled') != 'disabled') {
            $(this).attr('disabled', '');
            if($('#empty-list').css('display') != 'none'){
                $('#empty-list').hide();
            }

            //Disable button
            $(this).removeClass('text-success').addClass('text-muted');
            $(this).removeClass('cursor-pointer');

            //Initiate item props
            const itemId = $(this).attr('id').charAt($(this).attr('id').length-1);
            const itemName = $(this).parent().parent().find('>:first-child').text();
            const itemPrice = parseInt($(this).parent().parent().find('>:nth-child(3)').text());
            const itemStock = parseInt($(this).parent().parent().find('>:nth-child(2)').text());

            //HT to append
            const item = `
                <li class="list-group-item position-relative" id="pr-${itemId}">
                    <div>
                        ${itemName}
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <label for="qty-${itemId}" class="control-label m-0" style="flex: 1;">Kuantitas</label>
                            <input type="number" name="qty-${itemId}" id="qty-${itemId}" class="form-control text-xs item-qty" style="max-height: 2rem; max-width: 4rem; border: none !important; color: #555; background: #f5f5f5; flex: 1;" value="1" min="1" max="${itemStock}">
                            <h5 class="text-right item-price" style="flex: 2;">
                                <span>Rp.</span> 
                                <span id="price-${itemId}">${numberWithCommas( itemPrice )}</span>
                            </h5>
                        </div>
                    </div>
                    <i class="fas fa-times text-danger cursor-pointer abs-top-right" data-toggle="tooltip" data-placement="top" title="Hapus" id="del-item-${itemId}"></i>
                </li>
            `;

            //Append to list
            $('#cart-item-list').append(item);

            //Listeners for action
            // # Update qty action
            $(`#qty-${itemId}`).on('keyup change', function () {
                let currentPrice = numberWithCommas(itemPrice*parseInt($(this).val()));
                $(`#price-${itemId}`).text(currentPrice);
                updateSubTotalPrice();
                updateItemsCount();
            });

            // # Delete item action
            $(`#del-item-${itemId}`).on('click', function () {
                removeItem($(this).parent(), itemId);
                updateSubTotalPrice();
                updateItemsCount();
                isEmpty();
            });

            //Re-render
            updateSubTotalPrice();
            updateItemsCount();
        }
    });
}

function appendItem(btn, qty) {
    if($(btn).attr('disabled') != 'disabled') {
        $(btn).attr('disabled', '');
        if($('#empty-list').css('display') != 'none'){
            $('#empty-list').hide();
        }

        //Disable button
        $(btn).removeClass('text-success').addClass('text-muted');
        $(btn).removeClass('cursor-pointer');

        //Initiate item props
        const itemId = $(btn).attr('id').charAt($(btn).attr('id').length-1);
        const itemName = $(btn).parent().parent().find('>:first-child').text();
        const itemPrice = parseInt($(btn).parent().parent().find('>:nth-child(3)').text());
        const itemStock = parseInt($(btn).parent().parent().find('>:nth-child(2)').text());

        //HT to append
        const item = `
            <li class="list-group-item position-relative" id="pr-${itemId}">
                <div>
                    ${itemName}
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <label for="qty-${itemId}" class="control-label m-0" style="flex: 1;">Kuantitas</label>
                        <input type="number" name="qty-${itemId}" id="qty-${itemId}" class="form-control text-xs item-qty" style="max-height: 2rem; max-width: 4rem; border: none !important; color: #555; background: #f5f5f5; flex: 1;" value="${qty}" min="1" max="${itemStock}">
                        <h5 class="text-right item-price" style="flex: 2;">
                            <span>Rp.</span> 
                            <span id="price-${itemId}">${numberWithCommas( itemPrice*qty )}</span>
                        </h5>
                    </div>
                </div>
                <i class="fas fa-times text-danger cursor-pointer abs-top-right" data-toggle="tooltip" data-placement="top" title="Hapus" id="del-item-${itemId}"></i>
            </li>
        `;

        //Append to list
        $('#cart-item-list').append(item);

        //Listeners for action
        // # Update qty action
        $(`#qty-${itemId}`).on('keyup change', function () {
            let currentPrice = numberWithCommas(itemPrice*parseInt($(this).val()));
            $(`#price-${itemId}`).text(currentPrice);
            updateSubTotalPrice();
            updateItemsCount();
        });

        // # Delete item action
        $(`#del-item-${itemId}`).on('click', function () {
            removeItem($(this).parent(), itemId);
            updateSubTotalPrice();
            updateItemsCount();
            isEmpty();
        });

        //Re-render
        updateSubTotalPrice();
        updateItemsCount();
    }
}

function removeItem(item, itemId) {
    $(`#act-${itemId}`).removeClass('text-muted').addClass('text-success').addClass('cursor-pointer');
    $(`#act-${itemId}`).removeAttr('disabled');
    item.remove();
}

function updateSubTotalPrice() {
    const itemPrices = document.querySelectorAll('.item-price');
    let newSubTotal = 0;

    itemPrices.forEach(price => {
        newSubTotal += parsePrice( price.textContent );
    });

    $('#subtotal-price').text(numberWithCommas( newSubTotal ));
    subTotalPrice = newSubTotal;
}

function updateItemsCount() {
    const itemQtys = document.querySelectorAll('.item-qty');
    let newItemsCount = 0;

    itemQtys.forEach(qty => {
        newItemsCount += parseInt( qty.value );
    });

    $('#items-count').text(newItemsCount);
    itemsCount = newItemsCount;
}

function isEmpty() {
    if($('#cart-item-list').children().length < 2) {
        $('#empty-list').show();
    }
}

function saveCart() {
    // Append ke card keranjang
    let savedCart = `
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>Jumlah Barang : </span>
                <span class="badge badge-primary badge-pill"><strong>${itemsCount}</strong></span>
            </li>
            <li class="list-group-item">
                <span>Subtotal Keranjang : </span>
                <span><strong>Rp. ${numberWithCommas(subTotalPrice)}</strong></span>
            <li>
        </ul>
    `;

    // Set global variabel $totalPrice
    totalPrice = subTotalPrice;

    // Update view
    if (itemsCount > 0) {
        $('#installment').prop('disabled', false);

        if($('#installment').val() != 'NULL') {
            $('#diskon-dp').prop('readonly', false);
            $('#hadiah').prop('readonly', false);

            $('#netto').val(getNetto().toFixed());
            $('#angsuran-1').val(getFirstInstallment().toFixed());
            $('#angsuran-per-bulan').val(getMonthlyInstallments().toFixed())
        }
    } else {
        resetOrder();
    }

    $('#netto').val(getNetto().toFixed());
    $('#saved-cart-item-list').html(savedCart);
    $('#total-angsuran').val(totalPrice);
}