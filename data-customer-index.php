<?php
require 'connect.php';

$query = mysqli_query($conn, "SELECT * FROM customer ORDER BY id_customer ASC");
$no = 1;
?>

<!-- Customer Start -->
<div class="container-fluid px-0 mb-4">
    <div class="bg-white rounded-box p-4">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 fw-semibold">Manajemen Customer</h6>
            <a href="#" class="text-primary">Show All</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>ID Customer</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Total Order</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['id_customer']) ?></td>
                            <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['no_hp']) ?></td>
                            <td>
                                <?php
                                $customer_id = $row['id_customer'];
                                $order_query = mysqli_query($conn, "SELECT COUNT(*) AS total_orders FROM orders WHERE id_customer = '$customer_id'");
                                $order_data = mysqli_fetch_assoc($order_query);
                                echo $order_data['total_orders'];
                                ?>
                            </td>
                            <td class="text-center">
                                <button
                                    class="btn btn-sm btn-warning me-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEditcustomer"
                                    data-id="<?= $row['id_customer'] ?>"
                                    data-nama="<?= $row['nama_lengkap'] ?>"
                                    data-email="<?= $row['email'] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>


                                <button
                                    class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalHapus"
                                    data-id="<?= $row['id_customer'] ?>"
                                    data-nama="<?= $row['nama_lengkap'] ?>"
                                    data-table="customer"
                                    data-column="id_customer">
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
<div class="modal fade" id="modalEditcustomer" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="edit.php" method="POST">

                <input type="hidden" name="table" value="customers">
                <input type="hidden" name="id" id="edit-id">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username_customer" id="edit-username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_customer" id="edit-nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password (opsional)</label>
                        <input type="password" name="password_customer" class="form-control">
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

        if (modal.id === 'modalEditCustomer') {
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