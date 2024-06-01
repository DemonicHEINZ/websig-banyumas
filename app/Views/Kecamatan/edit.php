<?= $this->extend('_layouts/main_layout'); ?>

<?= $this->section('head'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Kecamatan</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4><?= $title ?></h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/kecamatan/update/' . $kecamatan['kode_kecamatan']) ?>" method="POST">
                    <div class="form-group">
                        <label for="kode_kecamatan">Kode Kecamatan</label>
                        <input type="text" id="kode_kecamatan" class="form-control" name="kode_kecamatan" value="<?= $kecamatan['kode_kecamatan'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_kecamatan">Nama Kecamatan</label>
                        <input type="text" id="nama_kecamatan" class="form-control" name="nama_kecamatan" value="<?= $kecamatan['nama_kecamatan'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_penduduk">Jumlah Penduduk</label>
                        <input type="number" id="jumlah_penduduk" class="form-control" name="jumlah_penduduk" value="<?= $kecamatan['jumlah_penduduk'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="luas_wilayah">Luas Wilayah</label>
                        <input type="text" id="luas_wilayah" class="form-control" name="luas_wilayah" value="<?= $kecamatan['luas_wilayah'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten-select">Pilih Kabupaten</label>
                        <select id="kabupaten-select" class="form-control" name="id_kabupaten" required>
                            <?php foreach ($kabupaten as $kab) : ?>
                                <option value="<?= $kab['id_kabupaten'] ?>"><?= $kab['nama_kabupaten'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-12 d-flex mt-10">
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <a href="<?= base_url('/kecamatan') ?>" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>