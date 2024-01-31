<!-- Update Keterangan Modal -->
<div class="modal fade" id="updateKeteranganModal{{ $row->id }}" tabindex="-1" role="dialog"
    aria-labelledby="updateKeteranganModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data"
                action="{{ route('keterangan-crew.update', ['keterangan_crew' => $row->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateKeteranganModalLabel">Edit Keterangan Crew</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="crew-form-container">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Keterangan Crew -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNote">Keterangan</label>
                                    <textarea class="form-control @error('keterangan_crew') is-invalid @enderror" name="keterangan_crew"
                                        id="keterangan_crew">{{ $row->keterangan_crew }}</textarea>
                                    @error('keterangan_crew')
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
                        Keterangan</button>
                </div>
            </form>
        </div>
    </div>
</div>
