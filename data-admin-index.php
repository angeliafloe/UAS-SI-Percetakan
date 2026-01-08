<?php
require 'connect.php';

$query = mysqli_query($conn, "SELECT * FROM admins ORDER BY id_admin ASC");
$no = 1;
?>

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
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>ADM<?= str_pad($row['id_admin'], 5, '0', STR_PAD_LEFT) ?></td>
                            <td><?= htmlspecialchars($row['username_admin']) ?></td>
                            <td><?= htmlspecialchars($row['nama_admin']) ?></td>
                            <td class="text-center">
                                <button
                                    class="btn btn-sm btn-warning me-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEditAdmin"
                                    data-id="<?= $row['id_admin'] ?>"
                                    data-username="<?= $row['username_admin'] ?>"
                                    data-nama="<?= $row['nama_admin'] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>


                                <button
                                    class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalHapus"
                                    data-id="<?= $row['id_admin'] ?>"
                                    data-nama="<?= $row['nama_admin'] ?>"
                                    data-table="admins"
                                    data-column="id_admin">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<div class="modal fade" id="modalTambahAdmin" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Data Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="tambah.php" method="POST">
                <input type="hidden" name="table" value="admins">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username_admin" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_admin" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password_admin" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditAdmin" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="edit.php" method="POST">

                <input type="hidden" name="table" value="admins">
                <input type="hidden" name="id" id="edit-id">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username_admin" id="edit-username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_admin" id="edit-nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password (opsional)</label>
                        <input type="password" name="password_admin" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak diubah</small>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>

            </form>

        </div>
    </div>
</div>


<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="hapus.php" method="POST">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <p>Yakin hapus data:</p>
                    <b id="hapus-nama" class="text-danger"></b>

                    <input type="hidden" name="id" id="hapus-id">
                    <input type="hidden" name="table" id="hapus-table">
                    <input type="hidden" name="column" id="hapus-column">
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-danger">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    const modal = event.target;

    if (modal.id === 'modalEditAdmin') {
        modal.querySelector('#edit-id').value = button.dataset.id;
        modal.querySelector('#edit-username').value = button.dataset.username;
        modal.querySelector('#edit-nama').value = button.dataset.nama;
    } else if (modal.id === 'modalHapus') {
        modal.querySelector('#hapus-id').value = button.dataset.id;
        modal.querySelector('#hapus-nama').innerText = button.dataset.nama;
        modal.querySelector('#hapus-table').value = button.dataset.table;
        modal.querySelector('#hapus-column').value = button.dataset.column;
    }
});
</script>