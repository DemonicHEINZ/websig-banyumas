<?= $this->extend('_layouts/main_layout'); ?>

<?= $this->section('head'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="/public/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" crossorigin href="/public/assets/compiled/css/table-datatable-jquery.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3><?= $title ?></h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4>Data <?= $title ?></h4>
                    <a href="<?= base_url('/sekolah/create') ?>" class="btn btn-outline-primary">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Kecamatan</th>
                                <th class="text-center">NPSN</th>
                                <th class="text-center">Nama Sekolah</th>
                                <th class="text-center">Alamat Sekolah</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Jenjang Pendidikan</th>
                                <th class="text-center">Koordinat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sekolah as $key => $data) : ?>
                                <tr>
                                    <td class="text-center"><?= $key + 1 ?></td>
                                    <td><?= $data['nama_kecamatan'] ?></td>
                                    <td class="text-center"><?= $data['npsn'] ?></td>
                                    <td><?= $data['nama_sekolah'] ?></td>
                                    <td><?= $data['alamat_sekolah'] ?></td>
                                    <td class="text-center"><?= $data['status_sekolah'] ?></td>
                                    <td class="text-center"><?= $data['jenjang_pendidikan'] ?></td>
                                    <td class="text-center"><?= $data['koordinat'] ?></td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('/sekolah/edit/' . $data['npsn']) ?>" class="btn btn-outline-primary me-2" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-outline-danger" title="Delete" onclick="confirmDelete('<?= base_url('/sekolah/delete/' . $data['npsn']) ?>')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="/public/assets/extensions/jquery/jquery.min.js"></script>
<script src="/public/assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/public/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="/public/assets/static/js/pages/datatables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    }
</script>
<?= $this->endSection(); ?>