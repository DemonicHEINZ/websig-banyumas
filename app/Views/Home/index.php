<?= $this->extend('_layouts/main_layout') ?>;

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Dashboard</h3>
            </div>
        </div>
    </div>
    <!-- Baris pertama -->
    <section class="section">
        <div class="row">
            <!-- Peta start -->
            <div class="col-12 col-md-8">
                <div class="card me-0 ms-0">
                    <div class="card-header">
                        <h4 class="card-title mt-0 mb-0">Peta Kabupaten Banyumas</h4>
                    </div>
                    <div class="card-body">
                        <div id="map" class="z-3" style="height: 700px;"></div>
                    </div>
                </div>
            </div>
            <!-- Peta end -->

            <!-- Accordion start -->
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <!-- Accordion statistik start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="font-weight: bold;">
                                        Statistik
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <!-- Tabel statistik start -->
                                        <table class="table table-borderless">
                                            <tbody>
                                                <?php foreach ($kabupaten as $data) : ?>
                                                    <!-- Isi tabel statistik -->
                                                    <tr>
                                                        <td>Kabupaten</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= esc($data['nama_kabupaten']) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Luas Wilayah</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= number_format((float) $data['luas_wilayah'], 2, ',', '.') ?> km<sup>2</sup>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Penduduk</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= number_format(esc($data['jumlah_penduduk']), 0, ',', '.') ?> Jiwa
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!-- Tabel statistik end -->
                                        <p class="text-muted mt-3 mb-0">Sumber : BPS 2022</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion statistik end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>
    // Inisialisasi Leaflet
    var map = L.map('map').setView([-7.452056485479403, 109.17060824882819], 11);

    // Tambahkan layer tile
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        className: 'map-tiles'
    }).addTo(map);

    // Data koordinat kabupaten dari PHP ke JavaScript
    var kabupatenData = <?= json_encode($kabupaten) ?>;
    var sekolahData = <?= json_encode($sekolah) ?>;

    // Atur view peta berdasarkan data kabupaten pertama
    if (kabupatenData.length > 0) {
        var firstKabupaten = kabupatenData[0];
        var coords = firstKabupaten.koordinat.split(',');
        var lat = parseFloat(coords[0]);
        var lng = parseFloat(coords[1]);
        map.setView([lat, lng], 11);
    }

    // Muat file JSON dan tambahkan ke peta sebagai polygon
    fetch('public/uploads/3302.json')
        .then(response => response.json())
        .then(data => {
            L.geoJSON(data, {
                style: function(feature) {
                    switch (feature.properties.Name.toUpperCase()) {
                        case 'LUMBIR':
                            return {
                                fillColor: 'green', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'WANGON':
                            return {
                                fillColor: 'blue', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'JATILAWANG':
                            return {
                                fillColor: 'purple', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'RAWALO':
                            return {
                                fillColor: 'red', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'KEBASEN':
                            return {
                                fillColor: 'orange', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'KEMRANJEN':
                            return {
                                fillColor: 'yellow', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'SUMPIUH':
                            return {
                                fillColor: 'pink', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'TAMBAK':
                            return {
                                fillColor: 'cyan', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'SOMAGEDE':
                            return {
                                fillColor: 'magenta', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'KALIBAGOR':
                            return {
                                fillColor: 'brown', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'BANYUMAS':
                            return {
                                fillColor: 'lime', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'PATIKRAJA':
                            return {
                                fillColor: 'violet', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'PURWOJATI':
                            return {
                                fillColor: 'olive', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'AJIBARANG':
                            return {
                                fillColor: 'navy', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'GUMELAR':
                            return {
                                fillColor: 'limegreen', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'PEKUNCEN':
                            return {
                                fillColor: 'teal', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'CILONGOK':
                            return {
                                fillColor: 'coral', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'KARANGLEWAS':
                            return {
                                fillColor: 'orchid', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'KEDUNGBANTENG':
                            return {
                                fillColor: 'peru', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'BATURRADEN':
                            return {
                                fillColor: 'gold', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'SUMBANG':
                            return {
                                fillColor: 'tomato', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'KEMBARAN':
                            return {
                                fillColor: 'darkcyan', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'SOKARAJA':
                            return {
                                fillColor: 'mediumorchid', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'PURWOKERTO SELATAN':
                            return {
                                fillColor: 'salmon', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'PURWOKERTO BARAT':
                            return {
                                fillColor: 'slateblue', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'PURWOKERTO TIMUR':
                            return {
                                fillColor: 'seagreen', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        case 'PURWOKERTO UTARA':
                            return {
                                fillColor: 'skyblue', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                        default:
                            return {
                                fillColor: 'gray', color: 'black', weight: 2, fillOpacity: 0.5
                            };
                    }
                },
                onEachFeature: function(feature, layer) {
                    layer.bindPopup('<b>' + feature.properties.Name.toUpperCase());
                }
            }).addTo(map);
        });

    // Tambahkan marker untuk sekolah
    sekolahData.forEach(function(sekolah) {
        var coords = sekolah.koordinat.split(',');
        var lat = parseFloat(coords[0]);
        var lng = parseFloat(coords[1]);
        var popupContent = 'NPSN: ' + sekolah.npsn + '<br>' +
            '<b>' + sekolah.nama_sekolah + '</b><br>' +
            sekolah.alamat_sekolah + '<br>' +
            'Status: ' + sekolah.status_sekolah;
        L.marker([lat, lng]).addTo(map)
            .bindPopup(popupContent);
    });
</script>
<?= $this->endSection() ?>