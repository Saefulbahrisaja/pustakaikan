<script type="text/javascript">
var locations = <?php echo json_encode($lokasi, JSON_NUMERIC_CHECK); ?>;
var osm = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 20,
    id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
});
var mymap = L.map('mapid', {
    center: [-0.789275, 113.921327],
    zoom: 4.4,
    layers: [osm]
});

var array = [];
for (var i = 0; i < locations.length; i++) {
    marker = new L.marker([locations[i][1], locations[i][2]])
    .bindPopup(locations[i][0]);
    array.push(marker);
}
var layerGroup = L.featureGroup(array).addTo(mymap);
mymap.fitBounds(layerGroup.getBounds(), {
    padding: [50, 50]
});
var baseMaps = {
    "<span style='color: gray'>OSM</span>": osm,
    // "Google": googleStreets,
    // "Bing": bing
};
var overlayMaps = {
    "Restoran": layerGroup
};
L.control.layers(baseMaps, overlayMaps).addTo(mymap);
</script>