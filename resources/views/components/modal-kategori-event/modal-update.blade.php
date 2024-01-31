<!-- Update Keterangan Modal -->
<div class="modal fade" id="updateKategoriEvent{{ $kategori->id }}" tabindex="-1" role="dialog"
    aria-labelledby="updateKeteranganModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{ route('kategori-event.update', $kategori->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateKeteranganModalLabel">Edit Keterangan Crew</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="crew-form-container">
                            <!-- Form kategori-->
                            <div class="kategori gx-3 mb-3">
                                <!-- Form Keterangan Crew -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNote">Kategori Event</label>
                                    <textarea class="form-control @error('kategori_event') is-invalid @enderror" name="kategori_event" id="kategori_event">{{ $kategori->kategori_event }}</textarea>
                                    @error('kategori_event')
                                        <label class="small mb-1 text-danger" for="inputNote">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Update
                        Kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>
