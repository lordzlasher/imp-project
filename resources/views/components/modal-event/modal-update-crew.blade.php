 {{-- Edit Crew Modal --}}
 <div class="modal fade" id="editModal{{ $crew->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     {{-- Modal content --}}
     <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
             <form enctype="multipart/form-data" action="{{ route('event.updateCrew', ['crewId' => $crew->id]) }}"
                 method="POST">
                 @csrf
                 @method('PUT')
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalCenterTitle">Edit Karyawan
                     </h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="card-body">
                         <div id="crew-form-container">
                             <!-- Form Row-->
                             <div class="row gx-3 mb-3">
                                 <!-- Form Crew -->
                                 <div class="mb-3">
                                     <label class="small mb-1" for="inputCrew">Crew</label>
                                     <input class="form-control" type="text" value="{{ $crew->karyawan->nama }}"
                                         readonly />
                                 </div>
                                 <!-- Form Status Crew -->
                                 <div class="mb-3">
                                     <label class="small mb-1" for="inputStatus">Status</label>
                                     <select class="form-select" name="status_crew" id="status_crew">
                                         <option value="{{ $crew->status->id }}" selected hidden>
                                             {{ $crew->status->status_crew }}
                                         </option>
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
                                         <option value="{{ $crew->keterangan->id }}" selected hidden>
                                             {{ $crew->keterangan->keterangan_crew }}
                                         </option>
                                         @foreach ($keterangans as $keterangan)
                                             <option value="{{ $keterangan->id }}">
                                                 {{ $keterangan->keterangan_crew }}</option>
                                         @endforeach
                                     </select>
                                     @error('keterangan_crew')
                                         <label class="small mb-1 text-danger"
                                             for="inputStatus">{{ $message }}</label>
                                     @enderror
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                     <button class="btn btn-primary" type="submit">Save
                         changes</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
