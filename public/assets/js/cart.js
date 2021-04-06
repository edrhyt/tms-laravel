//Global Variables
let itemsCount = 0;
let subTotalPrice = 0;


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
                <li class="list-group-item position-relative">
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
            });

            //Update subtotal & items count
            updateSubTotalPrice();
            updateItemsCount();
        }
    });
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