<?= $this->extend('_layouts/main_layout'); ?>

<?= $this->section('head'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Sekolah</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4><?= $title ?></h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/sekolah/store') ?>" method="POST">
                    <div class="form-group">
                        <label for="npsn">NPSN</label>
                        <input type="text" id="npsn" class="form-control" name="npsn" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_sekolah">Nama Sekolah</label>
                        <input type="text" id="nama_sekolah" class="form-control" name="nama_sekolah" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_sekolah">Alamat Sekolah</label>
                        <input type="text" id="alamat_sekolah" class="form-control" name="alamat_sekolah" required>
                    </div>
                    <div class="form-group">
                        <label for="status_sekolah">Status Sekolah</label>
                        <input type="text" id="status_sekolah" class="form-control" name="status_sekolah" required>
                    </div>
                    <div class="form-group">
                        <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                        <input type="text" id="jenjang_pendidikan" class="form-control" name="jenjang_pendidikan" required>
                    </div>
                    <div class="form-group">
                        <label for="koordinat">Koordinat</label>
                        <input type="text" id="koordinat" class="form-control" name="koordinat" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_kecamatan">Kecamatan</label>
                        <select id="kode_kecamatan" class="form-control" name="kode_kecamatan" required>
                            <?php foreach ($kecamatan as $kec) : ?>
                                <option value="<?= $kec['kode_kecamatan'] ?>"><?= $kec['nama_kecamatan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-12 d-flex   mt-4">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <a href="<?= base_url('/sekolah') ?>" class="btn btn-secondary me-1 mb-1">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>