for (var i = 0; i < countries.length; i++) {
    
    var option = document.createElement("option"); 
  //for every turn of the loop create an option tag
    //console.log(option);
    var txt = document.createTextNode(countries[i]); 
  //for every turn of the loop create the inner text
    //console.log(txt);
    option.appendChild(txt); 
  //for every turn of the loop put the words from txt inside the <option> tags
    //console.log(option);
    option.setAttribute("value",countries[i]); //for every turn of the loop set the value attribute to corresponding country name
    //console.log(option);
    select.insertBefore(option,select.lastChild);
    //console.log(select);
    
}

document.addEventListener ('DOMContentLoaded', function() {
    //console.log('DOM fully loaded and parsed');
    document.querySelector('select[name="selectCountry"]').onchange = alertCountry;
     }, false);
    
function alertCountry(event) {
    //console.log('DOM loaded');
    //use "this" to refer to selected element
    if(!event.target.value) alert('Please select a country');
    else alert('You chose ' + event.target.value + '. Yay, grab a beer!');
}