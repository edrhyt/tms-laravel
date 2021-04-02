<div class="modal fade" id="{{$slug}}" tabindex="-1" role="dialog" aria-labelledby="cartModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 70rem !important;" role="document">
        <div class="modal-content">
            <div class="modal-header px-4 py-2 align-items-center" style="background: #f5f5f5;">
                <h5 class="modal-title" id="{{$slug}}ModalTitle">{{$title}}</h5>
                <div>
                    <i class="fas fa-times text-danger" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" data-dismiss="modal" title="Keluar"></i>
                    <i class="fas fa-check text-success ml-3" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Simpan"></i>
                </div>
            </div>
            <div class="modal-body px-4 py-2">
                <div class="container px-0">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>List Barang</h3>
                            <div class="card">
                                <div class="card-body p-3" style="overflow-y: auto;">
                                    {!! $dataTable->table() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3>Keranjang</h3>
                            <div class="card">
                                <div class="card-body p-3" style="overflow-y: auto;">
                                    Empty
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>