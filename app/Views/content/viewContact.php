<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Load map styles -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Contact Us</h1>
        <p>
            Silakan datang secara langsung atau dapat menghubungi kami melalui Media Sosial kami dibawah.
        </p>
    </div>
</div>

<!-- Start Map -->
<div id="mapid" style="width: 100%; height: 300px;"></div>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script>
    var mymap = L.map('mapid').setView([-5.3645, 105.2434, 13], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    L.marker([-5.3645, 105.2434, 13]).addTo(mymap)
        .bindPopup("<b>Fresh Mart</b> E-Commerce <br />Location.").openPopup();

    mymap.scrollWheelZoom.disable();
    mymap.touchZoom.disable();
</script>
<?= $this->endSection(); ?>