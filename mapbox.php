<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> MY Mapbox API</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
#fit {
    position: absolute;
    right: 255px;
    top: 8px;
    margin-right: 10px;
    width: 13%;
    height: 40px;
    padding: 0px;
    outline-color: darkgray;
    border: 2px solid darkgray;
    border-radius: 6px;
    font-size: 15px;
    text-align: center;
    color: darkslategray;
    background: white;
}
#mapContainer { 
    display : none;
    width: 50%;
    position: absolute;
    bottom: 0;
    left: 0;
}
#mapboxInfoContainer{
    box-shadow: 5px 4px 4px #8b5d33;
}
</style>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">
<link rel="stylesheet" href="./mapStyles.css" type="text/css">
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<div id="map"></div>
<br>
<button id="fit">Fit to India</button>

<div id="mapContainer" 
class='absolute z-10 flex flex-col justify-center transition duration-100 ease-in-out transform bg-opacity-10 b-0 align-center hover:-translate-y-1 hover:scale-10' >
    <div class='w-1/2 p-2 m-3 text-center bg-gray-100 border-2 border-black md:w-1/3 rounded-2xl drop-shadow-2xl' id='mapboxInfoContainer'>
        <div  class='text-3xl font-extrabold sm:font-semibold sm:text-2xl' id='hospitalName'></div>
        <div  class='text-sm' >Distance: <b id='distance'></b></div>
        <div  class='text-sm'>Travel Time: <b id='travelTime'></b></div>
    </div>
</div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibmFrc2hpdGEtMjg1IiwiYSI6ImNrdjluOThkNzBlenoybnRjbXN4d2oyOGoifQ.e1SywbxgJF9YQvWIQGHigw';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [ 77.1025, 28.7041 ],
        zoom: 9
    });

    
    var destinationCoords = [];
    var liveLocationCoords = [];
    var destinationName = '';
    
    const coordinatesGeocoder = function (query) {
        // Match anything which looks like
        // decimal degrees coordinate pair.
        const matches = query.match(
            /^[ ]*(?:Lat: )?(-?\d+\.?\d*)[, ]+(?:Lng: )?(-?\d+\.?\d*)[ ]*$/i
        );
        if (!matches) {
            return null;
        }

        function coordinateFeature(lng, lat) {
            return {
                center: [lng, lat],
                geometry: {
                    type: 'Point',
                    coordinates: [lng, lat]
                },
                place_name: 'Lat: ' + lat + ' Lng: ' + lng,
                place_type: ['coordinate'],
                properties: {},
                type: 'Feature'
            };
        }

         const coord1 = Number(matches[1]);
         const coord2 = Number(matches[2]);
        const geocodes = [];

        if (coord1 < -90 || coord1 > 90) {
            // must be lng, lat
            geocodes.push(coordinateFeature(coord1, coord2));
        }

        if (coord2 < -90 || coord2 > 90) {
            // must be lat, lng
            geocodes.push(coordinateFeature(coord2, coord1));
        }

        if (geocodes.length === 0) {
            // else could be either lng, lat or lat, lng
            geocodes.push(coordinateFeature(coord1, coord2));
            geocodes.push(coordinateFeature(coord2, coord1));
        }

        return geocodes;
    };

    
    
    navigator.geolocation.getCurrentPosition(successLocation),({
            enableHighAccuracy:true
        })
    function successLocation(position){
               // console.log("Pickup coords: "+ [position.coords.longitude, position.coords.latitude])
        liveLocationCoords = [position.coords.longitude, position.coords.latitude];
        const marker = new mapboxgl.Marker({ color: 'red', rotation: 20 })
               .setLngLat(liveLocationCoords)
               .addTo(map);
        const liveLocationPopup = new mapboxgl.Popup({ className: "pickup", closeOnCLick: false, offset: [0, -30] })
                    .setLngLat(liveLocationCoords)
                    .setHTML(
                    `<h3 class="text-sm uppercase transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100">
                    Live Location</h3>`
                    
                    ).addTo(map);
    }
    
    
    // Add the control to the map.
    var geocoder = new MapboxGeocoder({
                            accessToken: mapboxgl.accessToken,
                            localGeocoder: coordinatesGeocoder,
                            zoom: 10,
                            padding: 20,
                            worldview : 'in',
                            placeholder: 'Enter your Destination',
                            mapboxgl: mapboxgl,
                            reverseGeocode: true,
                            getItemValue: e => {
                                            // console.log(e.place_name);
                                            destinationNameFunction(e.place_name, e.center);
                                            console.log(e);
                                            return e.place_name;
                                                }
                            
                        })
                                                  
    function destinationNameFunction(name, center){
        
        if(center != null){
        destinationCoords = [center[0], center[1]];
        console.log(destinationCoords);
        
        const destinationLong = destinationCoords[0];
        const destinationLat =  destinationCoords[1];
        const pickupLong = liveLocationCoords[0];
        const pickupLat = liveLocationCoords[1];

        // console.log("destination longitude"+ destinationLong)
        // console.log("destination latitude"+ destinationLat);
        // console.log("pickue longitude"+ pickupLong)
        // console.log("pickup latitude" + pickupLat) 
        
        var distance = distanceCalc(pickupLong, pickupLat, destinationLong, destinationLat );
        console.log("Distance "+ distance + "km ")

        var speed=40;
                time = distance/speed ;
               time = Math.round((time*100));
               console.log("Distance: "+ distance + " km" + " And Time: "+ time +" hrs");
        
      
        destinationName = name.split(',')[0];
        
        var destinationPopup = new mapboxgl.Popup({ className: "dropoff", closeOnCLick: false, offset: [0, -30] })
                    .setLngLat(destinationCoords)
                    .setText(destinationName)
                    .setHTML(
                    `<h3 class="text-sm text-center uppercase transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100">
                    ${destinationName}</h3>`
                    )   
         
                    
        if(destinationCoords != center){
             destinationPopup.addTo(map);
        }
        document.getElementById("mapContainer").style.display = "block";
        document.getElementById("hospitalName").innerHTML = destinationName;
        document.getElementById("distance").innerHTML = distance + " km"; 
        document.getElementById("travelTime").innerHTML = time + " mins";

        
    }   else{
        return;
    }
          
}
var distance ;
var time;




const pickupLong= liveLocationCoords[0];
const pickupLat= liveLocationCoords[1];

document.getElementById('fit').addEventListener('click', () => {
    map.fitBounds([
        [68.0753944015233,6.65718310150864],
        [97.3950629309158,35.6732489160381]
        ])
            
            });
 
   map.addControl( geocoder);
                    
    geocoder.on('results', function(results) {   
        // console.log(results)
     })

    function distanceCalc(liveLocationLong, liveLocationLat, DestinationLong, DestinationLat) {
        
        const pickup = new mapboxgl.LngLat(liveLocationLong, liveLocationLat);
        const dropoff = new mapboxgl.LngLat(DestinationLong, DestinationLat);
        
        
        
        return (Math.round(pickup.distanceTo(dropoff)/1000))

    }
    

</script>

</body>
</html>