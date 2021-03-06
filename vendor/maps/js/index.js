(function() {
  var map, mapInitial, markers, places;

  map = null;

  markers = [];

  places = {
    'Hai Phong': {
      lat: '20.8449115',
      lng: '106.68808409999997'
    },
    'Ha Noi': {
      lat: '21.0277644',
      lng: '105.83415979999995'
    },
    'Ho Chi Minh': {
      lat: '10.8230989',
      lng: '106.6296638'
    },
    'Ninh Binh': {
      lat: '20.2129969',
      lng: '105.92299000000003'
    },
    'Hue': {
      lat: '16.4498',
      lng: '107.5623501'
    },
    'Da Lat': {
      lat: '11.9404192',
      lng: '108.45831320000002'
    },
    'Vinh': {
      lat: '18.6795848',
      lng: '105.6813333'
    }
  };

  mapInitial = function() {
    var mapLatLng, mapOpts;
    mapLatLng = new google.maps.LatLng(9.757897999999999, 105.6412527);
    mapOpts = {
      zoom: 8,
      center: mapLatLng
    };
    return map = new google.maps.Map(document.getElementById("map-canvas"), mapOpts);
  };

  mapInitial();

  Object.keys(places).forEach(function(place, idx) {
    var latLng, latLngObj;
    latLng = places[place];
    latLngObj = new google.maps.LatLng(latLng.lat, latLng.lng);
    return markers[idx] = new google.maps.Marker({
      position: latLngObj,
      map: map,
      animation: google.maps.Animation.DROP
    });
  });

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQSxNQUFBLEdBQUEsRUFBQSxVQUFBLEVBQUEsT0FBQSxFQUFBOztFQUFBLEdBQUEsR0FBTTs7RUFDTixPQUFBLEdBQVU7O0VBQ1YsTUFBQSxHQUNJO0lBQUEsV0FBQSxFQUNJO01BQUEsR0FBQSxFQUFLLFlBQUw7TUFDQSxHQUFBLEVBQUs7SUFETCxDQURKO0lBR0EsUUFBQSxFQUNJO01BQUEsR0FBQSxFQUFLLFlBQUw7TUFDQSxHQUFBLEVBQUs7SUFETCxDQUpKO0lBTUEsYUFBQSxFQUNJO01BQUEsR0FBQSxFQUFLLFlBQUw7TUFDQSxHQUFBLEVBQUs7SUFETCxDQVBKO0lBU0EsV0FBQSxFQUNJO01BQUEsR0FBQSxFQUFLLFlBQUw7TUFDQSxHQUFBLEVBQUs7SUFETCxDQVZKO0lBWUEsS0FBQSxFQUNJO01BQUEsR0FBQSxFQUFLLFNBQUw7TUFDQSxHQUFBLEVBQUs7SUFETCxDQWJKO0lBZUEsUUFBQSxFQUNJO01BQUEsR0FBQSxFQUFLLFlBQUw7TUFDQSxHQUFBLEVBQUs7SUFETCxDQWhCSjtJQWtCQSxNQUFBLEVBQ0k7TUFBQSxHQUFBLEVBQUssWUFBTDtNQUNBLEdBQUEsRUFBSztJQURMO0VBbkJKOztFQXNCSixVQUFBLEdBQWEsUUFBQSxDQUFBLENBQUE7QUFDVCxRQUFBLFNBQUEsRUFBQTtJQUFBLFNBQUEsR0FBWSxJQUFJLE1BQU0sQ0FBQyxJQUFJLENBQUMsTUFBaEIsQ0FBdUIsVUFBdkIsRUFBbUMsa0JBQW5DO0lBQ1osT0FBQSxHQUNJO01BQUEsSUFBQSxFQUFNLENBQU47TUFDQSxNQUFBLEVBQVE7SUFEUjtXQUdKLEdBQUEsR0FBTSxJQUFJLE1BQU0sQ0FBQyxJQUFJLENBQUMsR0FBaEIsQ0FBb0IsUUFBUSxDQUFDLGNBQVQsQ0FBd0IsWUFBeEIsQ0FBcEIsRUFBMkQsT0FBM0Q7RUFORzs7RUFRYixVQUFBLENBQUE7O0VBRUEsTUFBTSxDQUFDLElBQVAsQ0FBWSxNQUFaLENBQW1CLENBQUMsT0FBcEIsQ0FBNEIsUUFBQSxDQUFDLEtBQUQsRUFBUSxHQUFSLENBQUE7QUFDeEIsUUFBQSxNQUFBLEVBQUE7SUFBQSxNQUFBLEdBQVMsTUFBTyxDQUFBLEtBQUE7SUFDaEIsU0FBQSxHQUFZLElBQUksTUFBTSxDQUFDLElBQUksQ0FBQyxNQUFoQixDQUF1QixNQUFNLENBQUMsR0FBOUIsRUFBbUMsTUFBTSxDQUFDLEdBQTFDO1dBRVosT0FBUSxDQUFBLEdBQUEsQ0FBUixHQUFlLElBQUksTUFBTSxDQUFDLElBQUksQ0FBQyxNQUFoQixDQUNYO01BQUEsUUFBQSxFQUFVLFNBQVY7TUFDQSxHQUFBLEVBQUssR0FETDtNQUVBLFNBQUEsRUFBVyxNQUFNLENBQUMsSUFBSSxDQUFDLFNBQVMsQ0FBQztJQUZqQyxDQURXO0VBSlMsQ0FBNUI7QUFuQ0EiLCJzb3VyY2VzQ29udGVudCI6WyJtYXAgPSBudWxsXG5tYXJrZXJzID0gW11cbnBsYWNlcyA9IFxuICAgICdIYWkgUGhvbmcnOlxuICAgICAgICBsYXQ6ICcyMC44NDQ5MTE1J1xuICAgICAgICBsbmc6ICcxMDYuNjg4MDg0MDk5OTk5OTcnXG4gICAgJ0hhIE5vaSc6XG4gICAgICAgIGxhdDogJzIxLjAyNzc2NDQnXG4gICAgICAgIGxuZzogJzEwNS44MzQxNTk3OTk5OTk5NSdcbiAgICAnSG8gQ2hpIE1pbmgnOlxuICAgICAgICBsYXQ6ICcxMC44MjMwOTg5J1xuICAgICAgICBsbmc6ICcxMDYuNjI5NjYzOCdcbiAgICAnTmluaCBCaW5oJzpcbiAgICAgICAgbGF0OiAnMjAuMjEyOTk2OSdcbiAgICAgICAgbG5nOiAnMTA1LjkyMjk5MDAwMDAwMDAzJ1xuICAgICdIdWUnOlxuICAgICAgICBsYXQ6ICcxNi40NDk4J1xuICAgICAgICBsbmc6ICcxMDcuNTYyMzUwMSdcbiAgICAnRGEgTGF0JzpcbiAgICAgICAgbGF0OiAnMTEuOTQwNDE5MidcbiAgICAgICAgbG5nOiAnMTA4LjQ1ODMxMzIwMDAwMDAyJ1xuICAgICdWaW5oJzpcbiAgICAgICAgbGF0OiAnMTguNjc5NTg0OCdcbiAgICAgICAgbG5nOiAnMTA1LjY4MTMzMzMnXG5cbm1hcEluaXRpYWwgPSAtPlxuICAgIG1hcExhdExuZyA9IG5ldyBnb29nbGUubWFwcy5MYXRMbmcgMjEuMDI3NzY0NCwgMTA1LjgzNDE1OTc5OTk5OTk1XG4gICAgbWFwT3B0cyA9IFxuICAgICAgICB6b29tOiA4XG4gICAgICAgIGNlbnRlcjogbWFwTGF0TG5nXG4gICAgICAgIFxuICAgIG1hcCA9IG5ldyBnb29nbGUubWFwcy5NYXAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJtYXAtY2FudmFzXCIpLCBtYXBPcHRzXG4gICAgXG5tYXBJbml0aWFsKClcblxuT2JqZWN0LmtleXMocGxhY2VzKS5mb3JFYWNoIChwbGFjZSwgaWR4KSAtPlxuICAgIGxhdExuZyA9IHBsYWNlc1twbGFjZV1cbiAgICBsYXRMbmdPYmogPSBuZXcgZ29vZ2xlLm1hcHMuTGF0TG5nIGxhdExuZy5sYXQsIGxhdExuZy5sbmdcbiAgICBcbiAgICBtYXJrZXJzW2lkeF0gPSBuZXcgZ29vZ2xlLm1hcHMuTWFya2VyXG4gICAgICAgIHBvc2l0aW9uOiBsYXRMbmdPYmpcbiAgICAgICAgbWFwOiBtYXBcbiAgICAgICAgYW5pbWF0aW9uOiBnb29nbGUubWFwcy5BbmltYXRpb24uRFJPUCJdfQ==
//# sourceURL=coffeescript