<!-- Admin Start -->
<div class="container-fluid px-0 mb-4">
    <div class="bg-white rounded-box p-4">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 fw-semibold">Manajemen Admin</h6>
            <a href="#" class="text-primary">Show All</a>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahAdmin">
                <i class="fa fa-user-plus me-1"></i> Tambah Data
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>ID Admin</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>24100007</td>
                        <td>angeliafloe</td>
                        <td>Angelia</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning me-1" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapusAdmin">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>24100009</td>
                        <td>S-BerlinNew</td>
                        <td>Berlin</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning me-1">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>
<div class="modal fade" id="modalTambahAdmin" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Form Tambah Data Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses_simpan.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <small class="text-muted italic">*Minimal 5 karakter.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <small class="text-muted italic">*Minimal 8 karakter.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapusAdmin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                <b id="hapus-nama" class="text-danger"></b>
            </div>
            <div class="modal-footer justify-content-center">
                <input type="hidden" name="id_admin" id="hapus-id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>