let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 49.430680, lng: 1.080230 },
    zoom: 8,
  });
}