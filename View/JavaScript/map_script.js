function myMap(longiLati, idMap) {
    
    //Variável com as informação do mapa, como latitude e longitude e cores;
    var mapOptions = {
        
        center: new google.maps.LatLng(longiLati),
        zoom: 18,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [
        {elementType: 'geometry', stylers: [{color: '#444444'}]},//#242f3e
        {elementType: 'labels.text.stroke', stylers: [{color: '#000000'}]},//#242f3e
        {elementType: 'labels.text.fill', stylers: [{color: '#F5F5DC'}]},//#746855
        {
          featureType: 'administrative.locality',
          elementType: 'labels.text.fill',
          stylers: [{color: '#F5F5DC'}]//#d59563
        },
        {
          featureType: 'poi',
          elementType: 'labels.text.fill',
          stylers: [{color: '#F5F5DC'}]//#d59563
        },
        {
          featureType: 'poi.park',
          elementType: 'geometry',
          stylers: [{color: '#438200'}]//#263c3f
        },
        {
          featureType: 'poi.park',
          elementType: 'labels.text.fill',
          stylers: [{color: '#F5F5DC'}]//#6b9a76
        },
        {
          featureType: 'road',
          elementType: 'geometry',
          stylers: [{color: '#ffbf00'}]//#38414e
        },
        {
          featureType: 'road',
          elementType: 'geometry.stroke',
          stylers: [{color: '#000000'}]//#212a37
        },
        {
          featureType: 'road',
          elementType: 'labels.text.fill',
          stylers: [{color: '#F5F5DC'}]//#9ca5b3
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry',
          stylers: [{color: '#ffdc73'}]//#746855
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry.stroke',
          stylers: [{color: '#000000'}]//#1f2835
        },
        {
          featureType: 'road.highway',
          elementType: 'labels.text.fill',
          stylers: [{color: '#F5F5DC'}]//#f3d19c
        },
        {
          featureType: 'transit',
          elementType: 'geometry',
          stylers: [{color: '#a67c00'}]//#2f3948
        },
        {
          featureType: 'transit.station',
          elementType: 'labels.text.fill',
          stylers: [{color: '#F5F5DC'}]//#d59563
        },
        {
          featureType: 'water',
          elementType: 'geometry',
          stylers: [{color: '#4286f4'}]
        },
        {
          featureType: 'water',
          elementType: 'labels.text.fill',
          stylers: [{color: '#000000'}]//#515c6d
        },
        {
          featureType: 'water',
          elementType: 'labels.text.stroke',
          stylers: [{color: '#17263c'}]
        }
      ]
    }

    //Criando uma váriavel para guardar a localização do local e colocar um marcador;
    var marker = new google.maps.Marker({
        position: longiLati,
        title: "Teste"
    });

    //Obtendo o elemento para colocar o mapa;
    var map = new google.maps.Map(document.getElementById(idMap), mapOptions);

    //Colocando o marcador no mapa;
    marker.setMap(map);
}