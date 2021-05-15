<div class="modal fade" id="{{$slug}}" tabindex="-1" role="dialog" aria-labelledby="cartModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 70rem !important;" role="document">
        <div class="modal-content">
            <div class="modal-header px-4 py-2 align-items-center" style="background: #f5f5f5;">
                <h5 class="modal-title" id="{{$slug}}ModalTitle">{{$title}}</h5>
                <div>
                    <i class="fas fa-times text-danger cursor-pointer" data-toggle="tooltip" data-placement="top" data-dismiss="modal" title="Keluar"></i>
                    <i class="fas fa-check text-success ml-3 cursor-pointer" data-toggle="tooltip" data-placement="top" data-dismiss="modal" title="Simpan" id="save-btn"></i>
                </div>
            </div>
            <div class="modal-body px-4 py-2">
                <div class="container px-0">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>List Barang</h3>
                            <div class="card">
                                <div class="card-body p-3" style="overflow-y: auto; max-height: 29rem; height: 29rem;">
                                    {!! $dataTable->table() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3>Keranjang</h3>
                            <div class="card">
                                <div class="card-body p-0" style="overflow-y: auto; overflow-x: hidden; max-height: 24rem; height: 24rem;">
                                    <ul id="cart-item-list" class="list-group list-group-flush text-xs">
                                        <span id="empty-list" class="abs-center text-muted text-lg">Empty</span>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <div class="d-flex justify-content-between">
                                    <h4>Jumlah Barang :</h4>
                                    <h4><span id="items-count">0</span></h4>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h4>Subtotal :</h4>
                                    <h4>Rp. <span id="subtotal-price">0</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $('#cart-add-btn').on('click', () => {
            $('document').ready(function () {
                const addToCartBtns = document.querySelectorAll('.act-icon');
                
                if(isEdit && !isCartInitialized) initializeCart();

                addToCartBtns.forEach(btn => {
                    addItem(btn);
                });

                $('#save-btn').on('click', function () {
                    saveCart();
                });
            });
        });

        function initializeCart() {
            let productList = [];
            if(isEdit) {
                <?php
                    if(isset($value)) {
                        foreach($value as $key => $product) {
                            ?>
                            productList[<?= $key ?>] = {
                                "product_id": <?= $product['value']['product_id'] ?>, 
                                "qty": <?= $product['value']['qty'] ?>
                            };
                            <?php
                        }
                    }
                ?>
    
                productList.forEach(product => {
                    appendItem(document.getElementById(`act-${product.product_id}`), product.qty);
                });
            }

            isCartInitialized = true;
        }
    </script>   
@endpush