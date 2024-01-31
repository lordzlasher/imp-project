 {{-- Edit Crew Modal --}}
 <div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
     {{-- Modal content --}}
     <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
             <form enctype="multipart/form-data" action="{{ route('event.updateEvent', $events) }}" method="POST">
                 @csrf
                 @method('PUT')
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalCenterTitle">Edit Event
                     </h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="card-body">
                         <div id="crew-form-container">
                             <!-- Form Row-->
                             <div class="row gx-3 mb-3">
                                 <!-- Form Tanggal Loading -->
                                 <div class="mb-3">
                                     <label class="small mb-1" for="inputTglLoading">Tanggal Loading</label>
                                     <input class="form-control @error('tanggal_loading') is-invalid @enderror"
                                         id="litepickerSingleDate" name="tanggal_loading"
                                         placeholder="Masukan Tanggal Loading Barang..."
                                         value="{{ $events->tanggal_loading }}" autocomplete="off" />
                                     @error('tanggal_loading')
                                         <label class="small mb-1 text-danger"
                                             for="inputTglLoading">{{ $message }}</label>
                                     @enderror
                                 </div>
                                 <!-- Form Tanggal Acara -->
                                 <div class="mb-3">
                                     <label class="small mb-1" for="inputTanggalAcara">Tanggal Acara</label>
                                     <input class="form-control @error('tanggal_acara[]') is-invalid @enderror"
                                         name="tanggal_acara[]" id="litepickerDateRange"
                                         placeholder="Select Tanggal Acara..." value="{{ $input_tanggal_acara }}"
                                         autocomplete="off" />
                                     @error('tanggal_acara[]')
                                         <label class="small mb-1 text-danger"
                                             for="inputTanggalAcara">{{ $message }}</label>
                                     @enderror
                                 </div>
                                 <!-- Form Ukuran LED -->
                                 <div class="mb-3">
                                     <label class="small mb-1" for="inputUkuran">Ukuran LED</label>
                                     <!-- Date Range Picker Example-->
                                     <input class="form-control @error('ukuran_led') is-invalid @enderror"
                                         name="ukuran_led" id="ukuran_led" placeholder="Masukan Ukuran LED..."
                                         type="text" value="{{ $events->ukuran_led }}" />
                                     @error('ukuran_led')
                                         <label class="small mb-1 text-danger" for="inputUkuran">{{ $message }}</label>
                                     @enderror
                                 </div>
                                 <!-- Form Venue -->
                                 <div class="mb-3">
                                     <label class="small mb-1" for="inputVenue">Venue</label>
                                     <!-- Date Range Picker Example-->
                                     <input class="form-control @error('venue') is-invalid @enderror" name="venue"
                                         id="venue" type="text" placeholder="Masukan Venue Event..."
                                         value="{{ $events->venue }}" />
                                     @error('venue')
                                         <label class="small mb-1 text-danger" for="inputVenue">{{ $message }}</label>
                                     @enderror
                                 </div>
                                 <!-- Form Client -->
                                 <div class="mb-3">
                                     <label class="small mb-1" for="inputUkuran">Client</label>
                                     <!-- Date Range Picker Example-->
                                     <input class="form-control @error('client') is-invalid @enderror" name="client"
                                         id="client" placeholder="Masukan Client..." type="text"
                                         value="{{ $events->client }}" " />
                                     @error('client')
    <label class="small mb-1 text-danger"
                                                                         for="inputUkuran">{{ $message }}</label>
@enderror
                                 </div>
                                 <!-- Form Kategori Event -->
                                 <div class="mb-3">
                                     <label class="small mb-1" for="inputCrew">Ketegori Event</label>
                                     <select class="form-select @error('kategori_event') is-invalid @enderror"
                                         name="kategori_event" id="kategori_event">
                                         <option selected hidden value="{{ $events->id_kategori_event }}">{{ $events->kategoriEvent->kategori_event }}
                                         </option>
                                       @foreach ($kategories as $kategori)
                                     <option value="{{ $kategori->id }}">{{ $kategori->kategori_event }}
                                     </option>
                                     @endforeach
                                     </select>
                                     @error('kategori_event')
                                         <label class="small mb-1 text-danger" for="inputCrew">{{ $message }}</label>
                                     @enderror
                                 </div>
                                 <!-- Form Note -->
                                 <div class="mb-3">
                                     <label class="small mb-1" for="inputNote">Note</label>
                                     <!-- Date Range Picker Example-->
                                     <input class="form-control @error('note') is-invalid @enderror" name="note"
                                         id="note" type="text" placeholder="Masukan Note untuk Event..."
                                         value="{{ $events->note }}" />
                                     @error('note')
                                         <label class="small mb-1 text-danger" for="inputNote">{{ $message }}</label>
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
