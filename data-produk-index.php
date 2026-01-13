    <?php
    require 'connect.php';
    $no = 1;

    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk ASC");
    ?>

    <div class="container-fluid px-0 mb-4">
        <div class="bg-white rounded-box p-4">

            <div class="d-flex align-items-center justify-content-between mb-3">
                <h6 class="mb-0 fw-semibold">Manajemen Produk</h6>
                <a href="#" class="text-primary">Show All</a>
            </div>

            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">
                    <i class="fa fa-user-plus me-1"></i> Tambah Data
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>ID Jasa</th>
                            <th>Nama Jasa</th>
                            <th>Ukuran</th>
                            <th>Harga Jasa</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['id_produk']) ?></td>
                                <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                                <td><?= htmlspecialchars($row['ukuran']) ?></td>
                                <td>Rp <?= number_format($row['harga_produk'], 0, ',', '.') ?></td>
                                <td class="text-center">
                                    <button
                                        class="btn btn-sm btn-warning me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditProduk"
                                        data-id="<?= $row['id_produk'] ?>"
                                        data-nama-produk="<?= $row['nama_produk'] ?>"
                                        data-ukuran="<?= htmlspecialchars($row['ukuran']) ?>"
                                        data-harga-produk="<?= $row['harga_produk'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    <button
                                        class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalHapus"
                                        data-id="<?= $row['id_produk'] ?>"
                                        data-nama="<?= $row['nama_produk'] ?>"
                                        data-table="produk"
                                        data-column="id_produk">
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

    <div class="modal fade" id="modalTambahProduk" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="tambah.php" method="POST">
                    <input type="hidden" name="table" value="produk">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Jasa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Jasa</label>
                            <input type="text" name="nama_produk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ukuran</label>
                            <input
                                type="text"
                                name="ukuran"
                                class="form-control"
                                placeholder='Contoh: ["A5","A4","A3"]'
                                required>
                            <small class="text-muted">
                                Gunakan format JSON, pisahkan dengan koma
                            </small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Jasa</label>
                            <input type="text" name="harga_produk" class="form-control" required>
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

    <div class="modal fade" id="modalEditProduk" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit.php" method="POST">
                    <input type="hidden" name="table" value="produk">
                    <input type="hidden" name="column" value="id_produk">
                    <input type="hidden" name="id" id="edit-id">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Jasa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Jasa</label>
                            <input type="text" name="nama_produk" id="edit-nama-produk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ukuran</label>
                            <input
                                type="text"
                                name="ukuran"
                                id="edit-ukuran"
                                class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Jasa</label>
                            <input type="text" name="harga_produk" id="edit-harga-produk" class="form-control" required>
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

            if (modal.id === 'modalEditProduk') {
                modal.querySelector('#edit-id').value = button.dataset.id;
                modal.querySelector('#edit-nama-produk').value = button.dataset.namaProduk;
                modal.querySelector('#edit-ukuran').value = button.dataset.ukuran;
                modal.querySelector('#edit-harga-produk').value = button.dataset.hargaProduk;
            }

            if (modal.id === 'modalHapus') {
                modal.querySelector('#hapus-id').value = button.dataset.id;
                modal.querySelector('#hapus-nama').innerText = button.dataset.nama;
                modal.querySelector('#hapus-table').value = button.dataset.table;
                modal.querySelector('#hapus-column').value = button.dataset.column;
            }
        });
    </script>