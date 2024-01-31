<!-- Add Crew Modal -->
<div class="modal fade" id="addCrewModal" tabindex="-1" role="dialog" aria-labelledby="addCrewModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{ route('event.storeCrew', ['eventId' => $events->id]) }}"
                method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCrewModalTitle">Tambah Karyawan
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="crew-form-container">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Karyawan -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputKaryawan">Karyawan</label>
                                    <select class="form-select" name="karyawan_id" id="karyawan_id">
                                        <option value="" selected disabled hidden>
                                            Pilih Karyawan</option>
                                        @foreach ($karyawans as $karyawan)
                                            <option value="{{ $karyawan->id }}">
                                                {{ $karyawan->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('karyawan_id')
                                        <label class="small mb-1 text-danger"
                                            for="inputKaryawan">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Status Crew -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputStatus">Status</label>
                                    <select class="form-select" name="status_crew" id="status_crew">
                                        <option value="" selected disabled hidden>
                                            Pilih Status</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">
                                                {{ $status->status_crew }}</option>
                                        @endforeach
                                    </select>
                                    @error('status_crew')
                                        <label class="small mb-1 text-danger" for="inputStatus">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Keterangan Crew -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputStatus">Keterangan</label>
                                    <select class="form-select" name="keterangan_crew" id="keterangan_crew">
                                        <option value="" selected disabled hidden>
                                            Pilih Keterangan</option>
                                        @foreach ($keterangans as $keterangan)
                                            <option value="{{ $keterangan->id }}">
                                                {{ $keterangan->keterangan_crew }}</option>
                                        @endforeach
                                    </select>
                                    @error('keterangan_crew')
                                        <label class="small mb-1 text-danger" for="inputStatus">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Tambah
                        Karyawan</button>
                </div>
            </form>
        </div>
    </div>
</div>
