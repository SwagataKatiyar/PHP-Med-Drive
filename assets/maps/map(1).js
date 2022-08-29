
mapboxgl.accessToken = 'pk.eyJ1IjoibmFrc2hpdGEtMjg1IiwiYSI6ImNrdjluOThkNzBlenoybnRjbXN4d2oyOGoifQ.e1SywbxgJF9YQvWIQGHigw';
    
navigator.geolocation.getCurrentPosition(successLocation, errorLocation),({
    enableHighAccuracy:true
})

function successLocation(position){
    console.log( position.coords.longitude, position.coords.latitude);
    setupMap([position.coords.longitude, position.coords.latitude]);
}
function errorLocation(){
    const newDelhiCoords = [77.2090, 28.6139];       // longitute and latitute
    setupMap(newDelhiCoords);  
}


function setupMap(center){
    if(center){
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v11', // style URL
            center: center, // starting position
            zoom: 15  // starting zoom
        });
    
        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl(),);
        addMarker(map, center);
        map.addControl(Directions);
    }else{
        console.log("not valid Coordinates! ");
    }

}

function addMarker(map, center){
    const marker = new mapboxgl.Marker()
        .setLngLat(center)
        .addTo(map)
}

 
