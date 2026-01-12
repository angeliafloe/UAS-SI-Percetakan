<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan</title>

    <style>
        @media print {
            /* Sembunyikan Sidebar, Navbar, Pagination, dan Tombol */
            .sidebar, .navbar, .no-print, .pagination, .btn, .text-muted, h5 {
                display: none !important;
            }

            /* Atur agar konten memenuhi lebar kertas */
            .container-fluid, .content {
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            /* Pastikan tabel memiliki border hitam tipis saat dicetak */
            table {
                border: 1px solid #000 !important;
            }
            th, td {
                border: 1px solid #000 !important;
                color: black !important;
            }

            /* Tampilkan footer total hanya saat print */
            .d-print-table-footer {
                display: table-footer-group !important;
            }
        }
    </style>
</head>

<div class="container-fluid p-4">
    <div class="bg-white rounded p-4 mb-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-dark">Laporan CV Mitra Java Lestari</h5>
        </div>

        <div class="text-center mb-4 d-none d-print-block">
            <h3 class="fw-bold text-uppercase">LAPORAN - CV Mitra Jaya Lestari</h3>
            <p class="mb-0">PERIODE PEMESANAN 01-01-2026 s/d 01-31-2026</p>
            <hr style="border: 1px solid black;">
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle border-light">
                <thead class="table-light text-muted">
                    <tr>
                        <th>No <i class="fa fa-sort ms-1 small"></i></th>
                        <th>ID Order<i class="fa fa-sort ms-1 small"></i></th>
                        <th>Tanggal Pesanan <i class="fa fa-sort ms-1 small"></i></th>
                        <th>Nama <i class="fa fa-sort ms-1 small"></i></th>
                        <th>Metode Bayar <i class="fa fa-sort ms-1 small"></i></th>
                        <th>Total Pembayaran <i class="fa fa-sort ms-1 small"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>ODR-050126BNR</td>
                        <td>2021-07-14</td>
                        <td>Steven Berlin</td>
                        <td>transfer1</td>
                        <td>Rp. 120,000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>ODR-070126SPK</td>
                        <td>2021-07-28</td>
                        <td>Angelia</td>
                        <td>transfer1</td>
                        <td>Rp. 75,000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>ODR-080126BRS</td>
                        <td>2021-07-28</td>
                        <td>Nabiel</td>
                        <td>transfer1</td>
                        <td>Rp. 200,000</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>ODR-080126BNR</td>
                        <td>2021-07-28</td>
                        <td>Karolina</td>
                        <td>transfer1</td>
                        <td>Rp. 250,000</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>ODR-110126SPK</td>
                        <td>2021-07-28</td>
                        <td>Anonim</td>
                        <td>transfer2</td>
                        <td>Rp. 60,000</td>
                    </tr>
                </tbody>
                <tfoot class="d-none d-print-table-footer">
                    <tr class="fw-bold">
                    <td colspan="5" class="text-end border-1">Total transaksi</td>
                    <td colspan="5" class="text-end border-top border-dark">Rp. 705,000,-</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <p class="text-muted mb-0 small">Showing 1 to 5 of 5 entries</p>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>

        <div class="mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary px-4">
                Cetak Laporan
            </button>
        </div>
    </div>
</div>