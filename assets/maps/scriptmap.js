const searchInput = document.querySelector('.search-box-container input');
const searchButton = document.querySelector('.search-button');
const {destinationMarker} = require('../js/map');
const searchInputValue;

 searchInput.addEventListener('keypress', function(event){
     if(event.key == "Enter" && searchInput.value){
         searchInputValue = searchInput.value;
         console.log(searchInputValue);
         valueToEnter(searchInputValue);
     }
 })

 function valueToEnter(value){
    searchButton.addEventListener('click', function(event){
        
    })
 }