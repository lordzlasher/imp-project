<!-- Add Crew Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{ route('user-management.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserTitle">Tambah User
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="crew-form-container">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Nama -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNote">Nama</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" id="name" placeholder="Masukkan Nama..."
                                        value="{{ old('name') }}"></input>
                                    @error('name')
                                        <label class="small mb-1 text-danger" for="inputNote">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Username -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNote">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" type="text"
                                        name="username" id="username" placeholder="Masukkan Username..."
                                        value="{{ old('username') }}"></input>
                                    @error('username')
                                        <label class="small mb-1 text-danger" for="inputNote">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form email -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNote">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        name="email" id="email" placeholder="Masukkan Email..."
                                        value="{{ old('email') }}"></input>
                                    @error('email')
                                        <label class="small mb-1 text-danger" for="inputNote">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Password -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNote">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        name="password" id="password" placeholder="Masukkan Password..."></input>
                                    @error('password')
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
                        User</button>
                </div>
            </form>
        </div>
    </div>
</div>
