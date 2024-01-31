<!-- Add Crew Modal -->
<div class="modal fade" id="addStatusModal" tabindex="-1" role="dialog" aria-labelledby="addStatusModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{ route('status-crew.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCrewModalTitle">Tambah Status Crew
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="crew-form-container">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Status Crew -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNote">Nama Status</label>
                                    <textarea class="form-control @error('status_crew') is-invalid @enderror" name="status_crew" id="status_crew"
                                        placeholder="Masukkan Status Crew...">{{ old('status_crew') }}</textarea>
                                    @error('status_crew')
                                        <label class="small mb-1 text-danger" for="inputNote">{{ $message }}</label>
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
