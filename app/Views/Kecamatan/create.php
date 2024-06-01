<?= $this->extend('_layouts/main_layout'); ?>

<?= $this->section('head'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                <h4>Tambah Data Kecamatan</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/kecamatan/store') ?>" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="kode-kecamatan-horizontal">Kode Kecamatan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="kode-kecamatan-horizontal" class="form-control" name="kode_kecamatan" placeholder="Kode Kecamatan" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nama-kecamatan-horizontal">Nama Kecamatan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama-kecamatan-horizontal" class="form-control" name="nama_kecamatan" placeholder="Nama Kecamatan" required>
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah-penduduk-horizontal">Jumlah Penduduk</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="number" id="jumlah-penduduk-horizontal" class="form-control" name="jumlah_penduduk" placeholder="Jumlah Penduduk" required>
                            </div>
                            <div class="col-md-4">
                                <label for="luas-wilayah-horizontal">Luas Wilayah</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="number" id="luas-wilayah-horizontal" class="form-control" name="luas_wilayah" placeholder="Luas Wilayah" required>
                            </div>
                            <!-- Tambahkan dropdown untuk pilih kabupaten -->
                            <div class="col-md-4">
                                <label for="kabupaten-select">Kabupaten</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select id="kabupaten-select" class="form-control" name="id_kabupaten" required>
                                    <option value="">Pilih Kabupaten</option>
                                    <?php foreach ($kabupaten as $kab) : ?>
                                        <option value="<?= $kab['id_kabupaten'] ?>"><?= $kab['nama_kabupaten'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <a href="<?= base_url('/kecamatan') ?>" class="btn btn-secondary me-1 mb-1">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>