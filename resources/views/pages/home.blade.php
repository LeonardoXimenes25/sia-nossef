@extends('layouts.app')

@section('content')
<section id="hero" class="hero section mt-5">
  <div class="hero-content">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="content">
            <h1>Transforming Ideas Into Strategic Business Solutions</h1>
            <p>We partner with forward-thinking companies to accelerate growth, optimize operations, and unlock their full potential through innovative consulting approaches and data-driven insights.</p>
            <div class="cta-group">
              <a href="#about" class="btn-primary">Start Your Journey</a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn-secondary glightbox">
                <i class="bi bi-play-circle"></i>
                <span>Watch Our Story</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="hero-image">
            <img src="assets/img/about/about-8.webp" alt="Corporate Business" class="img-fluid">
            <div class="floating-card" data-aos="fade-up" data-aos-delay="300">
              <div class="card-content">
                <div class="metric">
                  <span class="number">150+</span>
                  <span class="label">Successful Projects</span>
                </div>
                <div class="metric">
                  <span class="number">98%</span>
                  <span class="label">Client Satisfaction</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container mt-4">
  <h2 class="text-center mb-3">Peta Timor-Leste</h2>
  <div id="map" style="height: 500px; border-radius: 10px;"></div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi peta
    const map = L.map('map').setView([-8.8742, 125.7275], 8); // tengah Timor-Leste

    // Base map OSM
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>'
    }).addTo(map);

    // Load GeoJSON
    fetch("{{ asset('geo/timorleste.json') }}")
      .then(res => res.json())
      .then(data => {
          data.features.forEach(feature => {
              // Cek tipe geometry
              let polygons = [];
              if (feature.geometry.type === "Polygon") {
                  polygons = [feature.geometry.coordinates];
              } else if (feature.geometry.type === "MultiPolygon") {
                  polygons = feature.geometry.coordinates;
              }

              polygons.forEach(polygon => {
                  L.polygon(polygon, {
                      fillColor: "#90EE90",   // warna area hijau
                      fillOpacity: 0.6,       // transparansi
                      color: "#90EE90",       // samakan stroke dengan fill
                      weight: 0,               // tebal garis 0
                      stroke: false            // hapus garis
                  }).addTo(map);
              });
          });
      })
      .catch(err => console.error("Gagal load GeoJSON:", err));
});
</script>
@endsection
