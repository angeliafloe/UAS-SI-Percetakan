<?php
require 'connect.php';
$no = 1;

$query = mysqli_query($conn, "SELECT * FROM orders ORDER BY id_order ASC");
?>

<!-- Orders Start -->
<div class="container-fluid px-0 mb-4">
    <div class="bg-white rounded-box p-4">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 fw-semibold">Manajemen Order</h6>
            <a href="#" class="text-primary">Show All</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>ID Order</th>
                        <th>ID Customer</th>
                        <th>Tanggal & Jam</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['id_order']) ?></td>
                            <td><?= htmlspecialchars($row['id_customer']) ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($row['tgl_jam_pesan'])) ?></td>
                            <td>Rp <?= number_format($row['total_biaya'], 0, ',', '.') ?></td>
                            <td>
                                <?php
                                $badge = match ($row['status']) {
                                    'pending' => 'warning',
                                    'diproses' => 'primary',
                                    'selesai' => 'success',
                                    'dibatalkan' => 'danger',
                                };
                                ?>
                                <span class="badge bg-<?= $badge ?>">
                                    <?= ucfirst($row['status']) ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalStatusOrder"
                                    data-id="<?= $row['id_order'] ?>"
                                    data-status="<?= $row['status'] ?>">
                                    <i class="fa fa-edit"></i> Ubah Status
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal Update Status -->
<div class="modal fade" id="modalStatusOrder" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="order-process.php" method="POST">
                <input type="hidden" name="id_order" id="modal-id-order">

                <div class="modal-header">
                    <h5 class="modal-title">Ubah Status Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" id="modal-status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="diproses">Diproses</option>
                            <option value="selesai">Selesai</option>
                            <option value="dibatalkan">Dibatalkan</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" style="background-color: none; color:black;" data-bs-dismiss="modal">Batal</button>
                    <button class="btn" style="background-color: #0a6ea2; color:white;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Set modal value saat tombol diklik
    document.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const modal = event.target;

        if (modal.id === 'modalStatusOrder') {
            modal.querySelector('#modal-id-order').value = button.dataset.id;
            modal.querySelector('#modal-status').value = button.dataset.status;
        }
    });
</script>