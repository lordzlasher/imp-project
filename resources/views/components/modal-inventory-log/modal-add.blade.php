<!-- Add Crew Modal -->
<div class="modal fade" id="addInventoryLogModal" tabindex="-1" role="dialog" aria-labelledby="addInventoryLogModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{ route('inventory-log.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addInventoryLogTitle">Tambah Log Inventory
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="crew-form-container">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Tanggal -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputTanggal">Tanggal</label>
                                    <input class="form-control @error('tanggal') is-invalid @enderror"
                                        id="litepickerSingleDate" name="tanggal"
                                        placeholder="Masukan Tanggal Loading Barang..." value="{{ old('tanggal') }}"
                                        autocomplete="off" />
                                    @error('tanggal')
                                        <label class="small mb-1 text-danger" for="inputTanggal">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Tambah
                        Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
