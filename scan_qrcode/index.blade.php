
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="d-flex align-items-center">
                    {{-- <button type="button" class="btn btn-primary btn-lg-6 btn-flat mr-3" id="AddMasterdata">
                    <i class="fa fa-plus"></i> Add New Data
                </button> --}}

                    {{-- <button type="button" id="checkStockItem" class="btn btn-flat btn-sm btn-danger">
                    <i class="fa fa-check"></i> Stock
                </button> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <button type="button" class="btn btn btn-lg-6 btn-flat mr-3 text-white" id="AddMasterdata"
                                style="background: rgb(22, 95, 163)">
                                <i class="fa fa-plus"></i> Add scan
                            </button>
                            <div class="form-group">
                                <label for="inputNama">Item Code</label>
                                <input type="text" class="form-control" id="item_code" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Part No</label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="Masukkan email">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Qty</label>
                                <input type="password" class="form-control" id="inputPassword"
                                    placeholder="Masukkan password">
                            </div>
                            <div class="form-group">
                                <label for="inputAlamat">Location</label>
                                <textarea class="form-control" id="inputAlamat" rows="3" placeholder="Masukkan alamat"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('scan_qrcode.modal.scan')

