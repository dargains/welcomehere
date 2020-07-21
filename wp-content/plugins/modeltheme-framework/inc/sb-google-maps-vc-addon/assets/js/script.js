/* Map scripts */
var sbvcgmap_markers = new Array();
var sbvcgmap_maps = new Array();
var sbvcgmap_panorama = new Array();
(function ($) {

  /* Map Type Control Style */
  function sbvcgmap_get_map_type_control_style(string) {

    var map_type_control_style;
    string = string.toUpperCase();

    if (string == 'HORIZONTAL_BAR') {
      map_type_control_style = google.maps.MapTypeControlStyle.HORIZONTAL_BAR;
    } else if (string == 'DROPDOWN_MENU') {
      map_type_control_style = google.maps.MapTypeControlStyle.DROPDOWN_MENU;
    } else if (string == 'DEFAULT') {
      map_type_control_style = google.maps.MapTypeControlStyle.DEFAULT;
    } else {
      map_type_control_style = google.maps.MapTypeControlStyle.DEFAULT;
    }

    return map_type_control_style;
  }

  /* Zoom Control Style */
  function sbvcgmap_get_zoom_control_style(string) {

    var zoom_control_style;
    string = string.toUpperCase();

    if (string == 'SMALL') {
      zoom_control_style = google.maps.ZoomControlStyle.SMALL;
    } else if (string == 'LARGE') {
      zoom_control_style = google.maps.ZoomControlStyle.LARGE;
    } else if (string == 'DEFAULT') {
      zoom_control_style = google.maps.ZoomControlStyle.DEFAULT;
    } else {
      zoom_control_style = google.maps.ZoomControlStyle.DEFAULT;
    }

    return zoom_control_style;
  }

  /* Get Map Control Position */
  function sbvcgmap_get_map_control_position(string) {

    var mapcontrolposition;
    string = string.toUpperCase();

    if (string == 'TOP_CENTER') {
      mapcontrolposition = google.maps.ControlPosition.TOP_CENTER;
    } else if (string == 'TOP_LEFT') {
      mapcontrolposition = google.maps.ControlPosition.TOP_LEFT;
    } else if (string == 'TOP_RIGHT') {
      mapcontrolposition = google.maps.ControlPosition.TOP_RIGHT;
    } else if (string == 'LEFT_TOP') {
      mapcontrolposition = google.maps.ControlPosition.LEFT_TOP;
    } else if (string == 'RIGHT_TOP') {
      mapcontrolposition = google.maps.ControlPosition.RIGHT_TOP;
    } else if (string == 'LEFT_CENTER') {
      mapcontrolposition = google.maps.ControlPosition.LEFT_CENTER;
    } else if (string == 'RIGHT_CENTER') {
      mapcontrolposition = google.maps.ControlPosition.RIGHT_CENTER;
    } else if (string == 'LEFT_BOTTOM') {
      mapcontrolposition = google.maps.ControlPosition.LEFT_BOTTOM;
    } else if (string == 'RIGHT_BOTTOM') {
      mapcontrolposition = google.maps.ControlPosition.RIGHT_BOTTOM;
    } else if (string == 'BOTTOM_CENTER') {
      mapcontrolposition = google.maps.ControlPosition.BOTTOM_CENTER;
    } else if (string == 'BOTTOM_LEFT') {
      mapcontrolposition = google.maps.ControlPosition.BOTTOM_LEFT;
    } else if (string == 'BOTTOM_RIGHT') {
      mapcontrolposition = google.maps.ControlPosition.BOTTOM_RIGHT;
    } else {
      mapcontrolposition = null;
    }

    return mapcontrolposition;
  }

  /* Map Type */
  function sbvcgmap_get_map_type(string) {

    var map_type_id;
    string = string.toUpperCase();

    if (string == 'ROADMAP') {
      map_type_id = google.maps.MapTypeId.ROADMAP;
    } else if (string == 'SATELLITE') {
      map_type_id = google.maps.MapTypeId.SATELLITE;
    } else if (string == 'TERRAIN') {
      map_type_id = google.maps.MapTypeId.TERRAIN;
    } else if (string == 'HYBRID') {
      map_type_id = google.maps.MapTypeId.HYBRID;
    } else {
      map_type_id = google.maps.MapTypeId.ROADMAP;
    }

    return map_type_id;
  }

  /* Map Styles */
  function sbvcgmap_get_map_style(string) {
    var mapstyle;

    switch (string.toLowerCase()) {
      case 'style-1':
        mapstyle = '';
        break;
      case 'style-2':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "saturation": -100 }, { "lightness": 65 }, { "visibility": "on" }] }, { "featureType": "poi", "stylers": [{ "saturation": -100 }, { "lightness": 51 }, { "visibility": "simplified" }] }, { "featureType": "road.highway", "stylers": [{ "saturation": -100 }, { "visibility": "simplified" }] }, { "featureType": "road.arterial", "stylers": [{ "saturation": -100 }, { "lightness": 30 }, { "visibility": "on" }] }, { "featureType": "road.local", "stylers": [{ "saturation": -100 }, { "lightness": 40 }, { "visibility": "on" }] }, { "featureType": "transit", "stylers": [{ "saturation": -100 }, { "visibility": "simplified" }] }, { "featureType": "administrative.province", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "on" }, { "lightness": -25 }, { "saturation": -100 }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "hue": "#ffff00" }, { "lightness": -25 }, { "saturation": -97 }] }];
        break;
      case 'style-3':
        mapstyle = [{ "featureType": "water", "stylers": [{ "visibility": "on" }, { "color": "#acbcc9" }] }, { "featureType": "landscape", "stylers": [{ "color": "#f2e5d4" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#c5c6c6" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#e4d7c6" }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#fbfaf7" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#c5dac6" }] }, { "featureType": "administrative", "stylers": [{ "visibility": "on" }, { "lightness": 33 }] }, { "featureType": "road" }, { "featureType": "poi.park", "elementType": "labels", "stylers": [{ "visibility": "on" }, { "lightness": 20 }] }, {}, { "featureType": "road", "stylers": [{ "lightness": 20 }] }];
        break;
      case 'style-4':
        mapstyle = [{ "featureType": "water", "stylers": [{ "color": "#46bcec" }, { "visibility": "on" }] }, { "featureType": "landscape", "stylers": [{ "color": "#f2f2f2" }] }, { "featureType": "road", "stylers": [{ "saturation": -100 }, { "lightness": 45 }] }, { "featureType": "road.highway", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#444444" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-5':
        mapstyle = [{ "featureType": "water", "stylers": [{ "color": "#021019" }] }, { "featureType": "landscape", "stylers": [{ "color": "#08304b" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#0c4152" }, { "lightness": 5 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#000000" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#0b434f" }, { "lightness": 25 }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#000000" }] }, { "featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{ "color": "#0b3d51" }, { "lightness": 16 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#000000" }] }, { "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }] }, { "elementType": "labels.text.stroke", "stylers": [{ "color": "#000000" }, { "lightness": 13 }] }, { "featureType": "transit", "stylers": [{ "color": "#146474" }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#000000" }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#144b53" }, { "lightness": 14 }, { "weight": 1.4 }] }];
        break;
      case 'style-6':
        mapstyle = [{ "featureType": "administrative", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "water", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "transit", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "landscape", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.highway", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "visibility": "on" }] }, { "featureType": "water", "stylers": [{ "color": "#84afa3" }, { "lightness": 52 }] }, { "stylers": [{ "saturation": -17 }, { "gamma": 0.36 }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "color": "#3f518c" }] }];
        break;
      case 'style-7':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#000000" }, { "lightness": 17 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#000000" }, { "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#000000" }, { "lightness": 17 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#000000" }, { "lightness": 29 }, { "weight": 0.2 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#000000" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#000000" }, { "lightness": 16 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#000000" }, { "lightness": 21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#000000" }, { "lightness": 16 }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#000000" }, { "lightness": 40 }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#000000" }, { "lightness": 19 }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#000000" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#000000" }, { "lightness": 17 }, { "weight": 1.2 }] }];
        break;
      case 'style-8':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#e9ebed" }, { "saturation": -78 }, { "lightness": 67 }, { "visibility": "simplified" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "hue": "#bbc0c4" }, { "saturation": -93 }, { "lightness": 31 }, { "visibility": "simplified" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "hue": "#e9ebed" }, { "saturation": -90 }, { "lightness": -8 }, { "visibility": "simplified" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "hue": "#e9ebed" }, { "saturation": 10 }, { "lightness": 69 }, { "visibility": "on" }] }, { "featureType": "administrative.locality", "elementType": "all", "stylers": [{ "hue": "#2c2e33" }, { "saturation": 7 }, { "lightness": 19 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "hue": "#bbc0c4" }, { "saturation": -93 }, { "lightness": 31 }, { "visibility": "on" }] }, { "featureType": "road.arterial", "elementType": "labels", "stylers": [{ "hue": "#bbc0c4" }, { "saturation": -93 }, { "lightness": -2 }, { "visibility": "simplified" }] }];
        break;
      case 'style-9':
        mapstyle = [{ "featureType": "administrative", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "water", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "transit", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "landscape", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.highway", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.arterial", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "color": "#5f94ff" }, { "lightness": 26 }, { "gamma": 5.86 }] }, {}, { "featureType": "road.highway", "stylers": [{ "weight": 0.6 }, { "saturation": -85 }, { "lightness": 61 }] }, { "featureType": "road" }, {}, { "featureType": "landscape", "stylers": [{ "hue": "#0066ff" }, { "saturation": 74 }, { "lightness": 100 }] }];
        break;
      case 'style-10':
        mapstyle = [{ "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "simplified" }, { "lightness": 20 }] }, { "featureType": "administrative.land_parcel", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "elementType": "labels", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#a1cdfc" }, { "saturation": 30 }, { "lightness": 49 }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "hue": "#f49935" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "hue": "#fad959" }] }];
        break;
      case 'style-11':
        mapstyle = [{ "featureType": "all", "stylers": [{ "saturation": -100 }, { "gamma": 0.5 }] }];
        break;
      case 'style-12':
        mapstyle = [{ "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "stylers": [{ "saturation": -70 }, { "lightness": 37 }, { "gamma": 1.15 }] }, { "elementType": "labels", "stylers": [{ "gamma": 0.26 }, { "visibility": "off" }] }, { "featureType": "road", "stylers": [{ "lightness": 0 }, { "saturation": 0 }, { "hue": "#ffffff" }, { "gamma": 0 }] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "lightness": 50 }, { "saturation": 0 }, { "hue": "#ffffff" }] }, { "featureType": "administrative.province", "stylers": [{ "visibility": "on" }, { "lightness": -50 }] }, { "featureType": "administrative.province", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.province", "elementType": "labels.text", "stylers": [{ "lightness": 20 }] }];
        break;
      case 'style-13':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#a2daf2" }] }, { "featureType": "landscape.man_made", "elementType": "geometry", "stylers": [{ "color": "#f7f1df" }] }, { "featureType": "landscape.natural", "elementType": "geometry", "stylers": [{ "color": "#d0e3b4" }] }, { "featureType": "landscape.natural.terrain", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#bde6ab" }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.medical", "elementType": "geometry", "stylers": [{ "color": "#fbd3da" }] }, { "featureType": "poi.business", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffe15f" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#efd151" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "color": "black" }] }, { "featureType": "transit.station.airport", "elementType": "geometry.fill", "stylers": [{ "color": "#cfb2db" }] }];
        break;
      case 'style-14':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#193341" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#2c5a71" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "color": "#29768a" }, { "lightness": -37 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#406d80" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#406d80" }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#3e606f" }, { "weight": 2 }, { "gamma": 0.84 }] }, { "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "administrative", "elementType": "geometry", "stylers": [{ "weight": 0.6 }, { "color": "#1a3541" }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#2c5a71" }] }];
        break;
      case 'style-15':
        mapstyle = [{ "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }] }, { "featureType": "road.arterial", "stylers": [{ "visibility": "on" }, { "color": "#fee379" }] }, { "featureType": "road.highway", "stylers": [{ "visibility": "on" }, { "color": "#fee379" }] }, { "featureType": "landscape", "stylers": [{ "visibility": "on" }, { "color": "#f3f4f4" }] }, { "featureType": "water", "stylers": [{ "visibility": "on" }, { "color": "#7fc8ed" }] }, {}, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#83cead" }] }, { "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.man_made", "elementType": "geometry", "stylers": [{ "weight": 0.9 }, { "visibility": "off" }] }];
        break;
      case 'style-16':
        mapstyle = [{ "stylers": [{ "saturation": -100 }, { "gamma": 1 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.business", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.business", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.place_of_worship", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.place_of_worship", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "water", "stylers": [{ "visibility": "on" }, { "saturation": 50 }, { "gamma": 0 }, { "hue": "#50a5d1" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{ "color": "#333333" }] }, { "featureType": "road.local", "elementType": "labels.text", "stylers": [{ "weight": 0.5 }, { "color": "#333333" }] }, { "featureType": "transit.station", "elementType": "labels.icon", "stylers": [{ "gamma": 1 }, { "saturation": 50 }] }];
        break;
      case 'style-17':
        mapstyle = [{ "featureType": "water", "stylers": [{ "saturation": 43 }, { "lightness": -11 }, { "hue": "#0088ff" }] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [{ "hue": "#ff0000" }, { "saturation": -100 }, { "lightness": 99 }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "color": "#808080" }, { "lightness": 54 }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{ "color": "#ece2d9" }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "color": "#ccdca1" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#767676" }] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#b8cb93" }] }, { "featureType": "poi.park", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.sports_complex", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.medical", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.business", "stylers": [{ "visibility": "simplified" }] }];
        break;
      case 'style-18':
        mapstyle = [{ "featureType": "administrative", "elementType": "all", "stylers": [{ "visibility": "on" }, { "saturation": -100 }, { "lightness": 20 }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "visibility": "on" }, { "saturation": -100 }, { "lightness": 40 }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "visibility": "on" }, { "saturation": -10 }, { "lightness": 30 }] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [{ "visibility": "simplified" }, { "saturation": -60 }, { "lightness": 10 }] }, { "featureType": "landscape.natural", "elementType": "all", "stylers": [{ "visibility": "simplified" }, { "saturation": -60 }, { "lightness": 60 }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }, { "saturation": -100 }, { "lightness": 60 }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }, { "saturation": -100 }, { "lightness": 60 }] }];
        break;
      case 'style-19':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#aee2e0" }] }, { "featureType": "landscape", "elementType": "geometry.fill", "stylers": [{ "color": "#abce83" }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "color": "#769E72" }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#7B8758" }] }, { "featureType": "poi", "elementType": "labels.text.stroke", "stylers": [{ "color": "#EBF4A4" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }, { "color": "#8dab68" }] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#5B5B3F" }] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [{ "color": "#ABCE83" }] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#A4C67D" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#9BBF72" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#EBF4A4" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "visibility": "on" }, { "color": "#87ae79" }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#7f2200" }, { "visibility": "off" }] }, { "featureType": "administrative", "elementType": "labels.text.stroke", "stylers": [{ "color": "#ffffff" }, { "visibility": "on" }, { "weight": 4.1 }] }, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#495421" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-20':
        mapstyle = [{ "stylers": [{ "hue": "#ff1a00" }, { "invert_lightness": true }, { "saturation": -100 }, { "lightness": 33 }, { "gamma": 0.5 }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#2D333C" }] }];
        break;
      case 'style-21':
        mapstyle = [{ "featureType": "water", "stylers": [{ "color": "#19a0d8" }] }, { "featureType": "administrative", "elementType": "labels.text.stroke", "stylers": [{ "color": "#ffffff" }, { "weight": 6 }] }, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#e85113" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#efe9e4" }, { "lightness": -40 }] }, { "featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{ "color": "#efe9e4" }, { "lightness": -20 }] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [{ "lightness": 100 }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "lightness": -100 }] }, { "featureType": "road.highway", "elementType": "labels.icon" }, { "featureType": "landscape", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "stylers": [{ "lightness": 20 }, { "color": "#efe9e4" }] }, { "featureType": "landscape.man_made", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "labels.text.stroke", "stylers": [{ "lightness": 100 }] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [{ "lightness": -100 }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "hue": "#11ff00" }] }, { "featureType": "poi", "elementType": "labels.text.stroke", "stylers": [{ "lightness": 100 }] }, { "featureType": "poi", "elementType": "labels.icon", "stylers": [{ "hue": "#4cff00" }, { "saturation": 58 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#f0e4d3" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#efe9e4" }, { "lightness": -25 }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#efe9e4" }, { "lightness": -10 }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "simplified" }] }];
        break;
      case 'style-22':
        mapstyle = [{ "featureType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "visibility": "on" }, { "lightness": -100 }] }];
        break;
      case 'style-23':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "hue": "#F1FF00" }, { "saturation": -27.4 }, { "lightness": 9.4 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#0099FF" }, { "saturation": -20 }, { "lightness": 36.4 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#00FF4F" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#FFB300" }, { "saturation": -38 }, { "lightness": 11.2 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#00B6FF" }, { "saturation": 4.2 }, { "lightness": -63.4 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#9FFF00" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }];
        break;
      case 'style-24':
        mapstyle = [{ "featureType": "administrative", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "water", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "transit", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "landscape", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.highway", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "visibility": "on" }] }, { "featureType": "water", "stylers": [{ "color": "#84afa3" }, { "lightness": 52 }] }, { "stylers": [{ "saturation": -77 }] }, { "featureType": "road" }];
        break;
      case 'style-25':
        mapstyle = [{ "stylers": [{ "hue": "#2c3e50" }, { "saturation": 250 }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "lightness": 50 }, { "visibility": "simplified" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-26':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#333739" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#2ecc71" }] }, { "featureType": "poi", "stylers": [{ "color": "#2ecc71" }, { "lightness": -7 }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#2ecc71" }, { "lightness": -28 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#2ecc71" }, { "visibility": "on" }, { "lightness": -15 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#2ecc71" }, { "lightness": -18 }] }, { "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#2ecc71" }, { "lightness": -34 }] }, { "featureType": "administrative", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#333739" }, { "weight": 0.8 }] }, { "featureType": "poi.park", "stylers": [{ "color": "#2ecc71" }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "color": "#333739" }, { "weight": 0.3 }, { "lightness": 10 }] }];
        break;
      case 'style-27':
        mapstyle = [{ "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": -100 }, { "visibility": "off" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": -100 }, { "visibility": "off" }] }, { "featureType": "administrative", "elementType": "all", "stylers": [{ "hue": "#000000" }, { "saturation": 0 }, { "lightness": -100 }, { "visibility": "off" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": -100 }, { "visibility": "off" }] }, { "featureType": "road.local", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "on" }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "on" }] }, { "featureType": "transit", "elementType": "labels", "stylers": [{ "hue": "#000000" }, { "saturation": 0 }, { "lightness": -100 }, { "visibility": "off" }] }, { "featureType": "landscape", "elementType": "labels", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": -100 }, { "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "hue": "#bbbbbb" }, { "saturation": -100 }, { "lightness": 26 }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "hue": "#dddddd" }, { "saturation": -100 }, { "lightness": -3 }, { "visibility": "on" }] }];
        break;
      case 'style-28':
        mapstyle = [{ "featureType": "water", "stylers": [{ "visibility": "on" }, { "color": "#b5cbe4" }] }, { "featureType": "landscape", "stylers": [{ "color": "#efefef" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#83a5b0" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#bdcdd3" }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#e3eed3" }] }, { "featureType": "administrative", "stylers": [{ "visibility": "on" }, { "lightness": 33 }] }, { "featureType": "road" }, { "featureType": "poi.park", "elementType": "labels", "stylers": [{ "visibility": "on" }, { "lightness": 20 }] }, {}, { "featureType": "road", "stylers": [{ "lightness": 20 }] }];
        break;
      case 'style-29':
        mapstyle = [{ "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{ "color": "#f5f5f2" }, { "visibility": "on" }] }, { "featureType": "administrative", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.attraction", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "visibility": "on" }] }, { "featureType": "poi.business", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.medical", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.place_of_worship", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.school", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.sports_complex", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "visibility": "simplified" }] }, { "featureType": "road.arterial", "stylers": [{ "visibility": "simplified" }, { "color": "#ffffff" }] }, { "featureType": "road.highway", "elementType": "labels.icon", "stylers": [{ "color": "#ffffff" }, { "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "road.local", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "poi.park", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "color": "#71c8d4" }] }, { "featureType": "landscape", "stylers": [{ "color": "#e5e8e7" }] }, { "featureType": "poi.park", "stylers": [{ "color": "#8ba129" }] }, { "featureType": "road", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry", "stylers": [{ "color": "#c7c7c7" }, { "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "color": "#a0d3d3" }] }, { "featureType": "poi.park", "stylers": [{ "color": "#91b65d" }] }, { "featureType": "poi.park", "stylers": [{ "gamma": 1.51 }] }, { "featureType": "road.local", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.government", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.local", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road" }, { "featureType": "road" }, {}, { "featureType": "road.highway" }];
        break;
      case 'style-30':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "hue": "#165c64" }, { "saturation": 34 }, { "lightness": -69 }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "hue": "#b7caaa" }, { "saturation": -14 }, { "lightness": -18 }, { "visibility": "on" }] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [{ "hue": "#cbdac1" }, { "saturation": -6 }, { "lightness": -9 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "hue": "#8d9b83" }, { "saturation": -89 }, { "lightness": -12 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "hue": "#d4dad0" }, { "saturation": -88 }, { "lightness": 54 }, { "visibility": "simplified" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "hue": "#bdc5b6" }, { "saturation": -89 }, { "lightness": -3 }, { "visibility": "simplified" }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "hue": "#bdc5b6" }, { "saturation": -89 }, { "lightness": -26 }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "hue": "#c17118" }, { "saturation": 61 }, { "lightness": -45 }, { "visibility": "on" }] }, { "featureType": "poi.park", "elementType": "all", "stylers": [{ "hue": "#8ba975" }, { "saturation": -46 }, { "lightness": -28 }, { "visibility": "on" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "hue": "#a43218" }, { "saturation": 74 }, { "lightness": -51 }, { "visibility": "simplified" }] }, { "featureType": "administrative.province", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": 0 }, { "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "administrative.neighborhood", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": 0 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "administrative.locality", "elementType": "labels", "stylers": [{ "hue": "#ffffff" }, { "saturation": 0 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "administrative.land_parcel", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": 0 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "administrative", "elementType": "all", "stylers": [{ "hue": "#3a3935" }, { "saturation": 5 }, { "lightness": -57 }, { "visibility": "off" }] }, { "featureType": "poi.medical", "elementType": "geometry", "stylers": [{ "hue": "#cba923" }, { "saturation": 50 }, { "lightness": -46 }, { "visibility": "on" }] }];
        break;
      case 'style-31':
        mapstyle = [{ "featureType": "all", "elementType": "all", "stylers": [{ "invert_lightness": true }, { "saturation": 10 }, { "lightness": 30 }, { "gamma": 0.5 }, { "hue": "#435158" }] }];
        break;
      case 'style-32':
        mapstyle = [{ "featureType": "landscape", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "stylers": [{ "hue": "#00aaff" }, { "saturation": -100 }, { "gamma": 2.15 }, { "lightness": 12 }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "visibility": "on" }, { "lightness": 24 }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "lightness": 57 }] }];
        break;
      case 'style-33':
        mapstyle = [{ "stylers": [{ "hue": "#dd0d0d" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "lightness": 100 }, { "visibility": "simplified" }] }];
        break;
      case 'style-34':
        mapstyle = [{ "featureType": "administrative", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "hue": "#727D82" }, { "lightness": -30 }, { "saturation": -80 }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "visibility": "simplified" }, { "hue": "#F3F4F4" }, { "lightness": 80 }, { "saturation": -80 }] }];
        break;
      case 'style-35':
        mapstyle = [{ "stylers": [{ "hue": "#bbff00" }, { "weight": 0.5 }, { "gamma": 0.5 }] }, { "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.natural", "stylers": [{ "color": "#a4cc48" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "visibility": "on" }, { "weight": 1 }] }, { "featureType": "administrative", "elementType": "labels", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "visibility": "simplified" }, { "gamma": 1.14 }, { "saturation": -18 }] }, { "featureType": "road.highway.controlled_access", "elementType": "labels", "stylers": [{ "saturation": 30 }, { "gamma": 0.76 }] }, { "featureType": "road.local", "stylers": [{ "visibility": "simplified" }, { "weight": 0.4 }, { "lightness": -8 }] }, { "featureType": "water", "stylers": [{ "color": "#4aaecc" }] }, { "featureType": "landscape.man_made", "stylers": [{ "color": "#718e32" }] }, { "featureType": "poi.business", "stylers": [{ "saturation": 68 }, { "lightness": -61 }] }, { "featureType": "administrative.locality", "elementType": "labels.text.stroke", "stylers": [{ "weight": 2.7 }, { "color": "#f4f9e8" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.stroke", "stylers": [{ "weight": 1.5 }, { "color": "#e53013" }, { "saturation": -42 }, { "lightness": 28 }] }];
        break;
      case 'style-36':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "hue": "#FFA800" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#53FF00" }, { "saturation": -73 }, { "lightness": 40 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#FBFF00" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#00FFFD" }, { "saturation": 0 }, { "lightness": 30 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#00BFFF" }, { "saturation": 6 }, { "lightness": 8 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#679714" }, { "saturation": 33.4 }, { "lightness": -25.4 }, { "gamma": 1 }] }];
        break;
      case 'style-37':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#ffdfa6" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#b52127" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#c5531b" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#74001b" }, { "lightness": -10 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#da3c3c" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#74001b" }] }, { "featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{ "color": "#da3c3c" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "color": "#990c19" }] }, { "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }] }, { "elementType": "labels.text.stroke", "stylers": [{ "color": "#74001b" }, { "lightness": -8 }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#6a0d10" }, { "visibility": "on" }] }, { "featureType": "administrative", "elementType": "geometry", "stylers": [{ "color": "#ffdfa6" }, { "weight": 0.4 }] }, { "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-38':
        mapstyle = [{ "stylers": [{ "hue": "#16a085" }, { "saturation": 0 }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-39':
        mapstyle = [{ "featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#e0efef" }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "hue": "#1900ff" }, { "color": "#c0e8e8" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill" }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "color": "#7dcdcd" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "lightness": 700 }] }];
        break;
      case 'style-40':
        mapstyle = [{ "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "visibility": "on" }, { "color": "#2f343b" }] }, { "featureType": "landscape", "stylers": [{ "visibility": "on" }, { "color": "#703030" }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "visibility": "on" }, { "color": "#2f343b" }, { "weight": 1 }] }];
        break;
      case 'style-41':
        mapstyle = [{ "stylers": [{ "hue": "#007fff" }, { "saturation": 89 }] }, { "featureType": "water", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "administrative.country", "elementType": "labels", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-42':
        mapstyle = [{ "stylers": [{ "saturation": -100 }, { "gamma": 0.8 }, { "lightness": 4 }, { "visibility": "on" }] }, { "featureType": "landscape.natural", "stylers": [{ "visibility": "on" }, { "color": "#5dff00" }, { "gamma": 4.97 }, { "lightness": -5 }, { "saturation": 100 }] }];
        break;
      case 'style-43':
        mapstyle = [{ "featureType": "road", "elementType": "geometry", "stylers": [{ "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#C6E2FF" }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "color": "#C5E3BF" }] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [{ "color": "#D1D1B8" }] }];
        break;
      case 'style-44':
        mapstyle = [{ "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-45':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": -100 }, { "visibility": "simplified" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "hue": "#FFFFFF" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [] }, { "featureType": "landscape.natural", "elementType": "all", "stylers": [] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "hue": "#333333" }, { "saturation": -100 }, { "lightness": -69 }, { "visibility": "simplified" }] }, { "featureType": "poi.attraction", "elementType": "geometry", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "administrative.locality", "elementType": "geometry", "stylers": [{ "hue": "#ffffff" }, { "saturation": 0 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "poi.government", "elementType": "geometry", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }];
        break;
      case 'style-46':
        mapstyle = [{ "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [{ "color": "#000000" }, { "weight": 1 }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "color": "#000000" }, { "weight": 0.8 }] }, { "featureType": "landscape", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "water", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "elementType": "labels.text", "stylers": [{ "visibility": "on" }] }, { "elementType": "labels.text.stroke", "stylers": [{ "color": "#ffffff" }] }, { "elementType": "labels.text.fill", "stylers": [{ "color": "#000000" }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "on" }] }];
        break;
      case 'style-47':
        mapstyle = [{ "featureType": "road", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.province", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "color": "#004b76" }] }, { "featureType": "landscape.natural", "stylers": [{ "visibility": "on" }, { "color": "#fff6cb" }] }, { "featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [{ "visibility": "on" }, { "color": "#7f7d7a" }, { "lightness": 10 }, { "weight": 1 }] }];
        break;
      case 'style-48':
        mapstyle = [{ "featureType": "road", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.arterial", "stylers": [{ "hue": 149 }, { "saturation": -78 }, { "lightness": 0 }] }, { "featureType": "road.highway", "stylers": [{ "hue": -31 }, { "saturation": -40 }, { "lightness": 2.8 }] }, { "featureType": "poi", "elementType": "label", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "stylers": [{ "hue": 163 }, { "saturation": -26 }, { "lightness": -1.1 }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "hue": 3 }, { "saturation": -24.24 }, { "lightness": -38.57 }] }];
        break;
      case 'style-49':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#252525" }, { "saturation": -100 }, { "lightness": -81 }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "hue": "#666666" }, { "saturation": -100 }, { "lightness": -55 }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "hue": "#555555" }, { "saturation": -100 }, { "lightness": -57 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "hue": "#777777" }, { "saturation": -100 }, { "lightness": -6 }, { "visibility": "on" }] }, { "featureType": "administrative", "elementType": "all", "stylers": [{ "hue": "#cc9900" }, { "saturation": 100 }, { "lightness": -22 }, { "visibility": "on" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "hue": "#444444" }, { "saturation": 0 }, { "lightness": -64 }, { "visibility": "off" }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "hue": "#555555" }, { "saturation": -100 }, { "lightness": -57 }, { "visibility": "off" }] }];
        break;
      case 'style-50':
        mapstyle = [{ "stylers": [{ "hue": "#ff61a6" }, { "visibility": "on" }, { "invert_lightness": true }, { "saturation": 40 }, { "lightness": 10 }] }];
        break;
      case 'style-51':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "color": "#193a70" }, { "visibility": "on" }] }, { "featureType": "road", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "color": "#2c5ca5" }] }, { "featureType": "poi", "stylers": [{ "color": "#2c5ca5" }] }, { "elementType": "labels", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-52':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#004358" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#1f8a70" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#1f8a70" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#fd7400" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#1f8a70" }, { "lightness": -20 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#1f8a70" }, { "lightness": -17 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "color": "#ffffff" }, { "visibility": "on" }, { "weight": 0.9 }] }, { "elementType": "labels.text.fill", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "simplified" }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#1f8a70" }, { "lightness": -10 }] }, {}, { "featureType": "administrative", "elementType": "geometry", "stylers": [{ "color": "#1f8a70" }, { "weight": 0.7 }] }];
        break;
      case 'style-53':
        mapstyle = [{ "featureType": "landscape.natural", "stylers": [{ "saturation": -100 }, { "lightness": 100 }] }, { "featureType": "water", "stylers": [{ "saturation": -100 }, { "lightness": -86 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "saturation": -100 }, { "lightness": 100 }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "saturation": -100 }, { "lightness": -75 }] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [{ "saturation": -100 }, { "lightness": 97 }] }, { "featureType": "poi.park", "stylers": [{ "saturation": -100 }, { "lightness": -100 }] }, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [{ "saturation": -100 }, { "lightness": 100 }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "on" }] }, { "featureType": "landscape.man_made", "stylers": [{ "saturation": -100 }, { "lightness": -68 }] }, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "saturation": -100 }, { "lightness": 100 }] }, { "featureType": "administrative", "elementType": "labels.text.stroke", "stylers": [{ "saturation": -100 }, { "lightness": -100 }] }, { "featureType": "poi", "stylers": [{ "saturation": -100 }, { "lightness": 91 }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "saturation": -100 }, { "lightness": -100 }] }, { "featureType": "transit.station", "stylers": [{ "saturation": -100 }, { "lightness": -22 }] }, { "featureType": "landscape.man_made", "elementType": "geometry.stroke", "stylers": [{ "hue": "#ff004c" }, { "saturation": -100 }, { "lightness": 44 }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 1 }, { "lightness": -100 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "saturation": -100 }, { "lightness": 100 }] }, { "featureType": "administrative.locality", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.locality", "elementType": "labels", "stylers": [{ "visibility": "on" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "on" }] }];
        break;
      case 'style-54':
        mapstyle = [{ "featureType": "road", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#fffffa" }] }, { "featureType": "water", "stylers": [{ "lightness": 50 }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "geometry", "stylers": [{ "lightness": 40 }] }];
        break;
      case 'style-55':
        mapstyle = [{ "featureType": "all", "stylers": [{ "saturation": 0 }, { "hue": "#e7ecf0" }] }, { "featureType": "road", "stylers": [{ "saturation": -70 }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "visibility": "simplified" }, { "saturation": -60 }] }];
        break;
      case 'style-56':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "color": "#6c8080" }, { "visibility": "simplified" }] }, { "featureType": "administrative", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "stylers": [{ "color": "#d98080" }, { "hue": "#eeff00" }, { "lightness": 100 }, { "weight": 1.5 }] }];
        break;
      case 'style-57':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#76aee3" }, { "saturation": 38 }, { "lightness": -11 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "all", "stylers": [{ "hue": "#8dc749" }, { "saturation": -47 }, { "lightness": -17 }, { "visibility": "on" }] }, { "featureType": "poi.park", "elementType": "all", "stylers": [{ "hue": "#c6e3a4" }, { "saturation": 17 }, { "lightness": -2 }, { "visibility": "on" }] }, { "featureType": "road.arterial", "elementType": "all", "stylers": [{ "hue": "#cccccc" }, { "saturation": -100 }, { "lightness": 13 }, { "visibility": "on" }] }, { "featureType": "administrative.land_parcel", "elementType": "all", "stylers": [{ "hue": "#5f5855" }, { "saturation": 6 }, { "lightness": -31 }, { "visibility": "on" }] }, { "featureType": "road.local", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "water", "elementType": "all", "stylers": [] }];
        break;
      case 'style-58':
        mapstyle = [{ "featureType": "all", "elementType": "labels.text.stroke", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "all", "elementType": "labels.icon", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "hue": "#D1D3D4" }, { "saturation": -88 }, { "lightness": -7 }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "labels", "stylers": [{ "hue": "#939598" }, { "saturation": -91 }, { "lightness": -34 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "hue": "#414042" }, { "saturation": -98 }, { "lightness": -60 }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#E3EBE5" }, { "saturation": -61 }, { "lightness": 57 }, { "visibility": "off" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "hue": "#E3EBE5" }, { "saturation": -100 }, { "lightness": 57 }, { "visibility": "on" }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.country", "elementType": "all", "stylers": [{ "hue": "#E3EBE5" }, { "saturation": -100 }, { "lightness": 81 }, { "visibility": "off" }] }, { "featureType": "administrative.province", "elementType": "all", "stylers": [{ "hue": "#E3EBE5" }, { "saturation": -100 }, { "lightness": 81 }, { "visibility": "off" }] }, { "featureType": "administrative.locality", "elementType": "geometry", "stylers": [{ "hue": "#FFFFFF" }, { "saturation": 0 }, { "lightness": 100 }, { "visibility": "on" }] }, { "featureType": "administrative.locality", "elementType": "labels", "stylers": [{ "hue": "#939598" }, { "saturation": 2 }, { "lightness": 59 }, { "visibility": "on" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels", "stylers": [{ "hue": "#939598" }, { "saturation": -100 }, { "lightness": 16 }, { "visibility": "on" }] }, { "featureType": "administrative.neighborhood", "elementType": "all", "stylers": [{ "hue": "#939598" }, { "saturation": -100 }, { "lightness": 16 }, { "visibility": "on" }] }, { "featureType": "administrative.land_parcel", "elementType": "all", "stylers": [{ "hue": "#939598" }, { "saturation": -100 }, { "lightness": 16 }, { "visibility": "simplified" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "hue": "#939598" }, { "saturation": -98 }, { "lightness": -8 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "hue": "#FFFFFF" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "hue": "#6D6E71" }, { "saturation": -98 }, { "lightness": -43 }, { "visibility": "on" }] }, { "featureType": "road.arterial", "elementType": "labels", "stylers": [{ "hue": "#FFFFFF" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": -100 }, { "visibility": "on" }] }, { "featureType": "road.local", "elementType": "labels", "stylers": [{ "hue": "#FFFFFF" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }];
        break;
      case 'style-59':
        mapstyle = [{ "featureType": "all", "stylers": [{ "hue": "#0000b0" }, { "invert_lightness": "true" }, { "saturation": -30 }] }];
        break;
      case 'style-60':
        mapstyle = [{ "stylers": [{ "saturation": 100 }, { "gamma": 0.6 }] }];
        break;
      case 'style-61':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "hue": "#00dd00" }] }, { "featureType": "road", "stylers": [{ "hue": "#dd0000" }] }, { "featureType": "water", "stylers": [{ "hue": "#000040" }] }, { "featureType": "poi.park", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#ffff00" }] }, { "featureType": "road.local", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-62':
        mapstyle = [{ "stylers": [{ "saturation": -100 }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#0099dd" }] }, { "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "color": "#aadd55" }] }, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.arterial", "elementType": "labels.text", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.local", "elementType": "labels.text", "stylers": [{ "visibility": "on" }] }, {}];
        break;
      case 'style-63':
        mapstyle = [{ "elementType": "geometry", "stylers": [{ "hue": "#ff4400" }, { "saturation": -68 }, { "lightness": -4 }, { "gamma": 0.72 }] }, { "featureType": "road", "elementType": "labels.icon" }, { "featureType": "landscape.man_made", "elementType": "geometry", "stylers": [{ "hue": "#0077ff" }, { "gamma": 3.1 }] }, { "featureType": "water", "stylers": [{ "hue": "#00ccff" }, { "gamma": 0.44 }, { "saturation": -33 }] }, { "featureType": "poi.park", "stylers": [{ "hue": "#44ff00" }, { "saturation": -23 }] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [{ "hue": "#007fff" }, { "gamma": 0.77 }, { "saturation": 65 }, { "lightness": 99 }] }, { "featureType": "water", "elementType": "labels.text.stroke", "stylers": [{ "gamma": 0.11 }, { "weight": 5.6 }, { "saturation": 99 }, { "hue": "#0091ff" }, { "lightness": -86 }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "lightness": -48 }, { "hue": "#ff5e00" }, { "gamma": 1.2 }, { "saturation": -23 }] }, { "featureType": "transit", "elementType": "labels.text.stroke", "stylers": [{ "saturation": -64 }, { "hue": "#ff9100" }, { "lightness": 16 }, { "gamma": 0.47 }, { "weight": 2.7 }] }];
        break;
      case 'style-64':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "saturation": -100 }, { "lightness": 60 }] }, { "featureType": "road.local", "stylers": [{ "saturation": -100 }, { "lightness": 40 }, { "visibility": "on" }] }, { "featureType": "transit", "stylers": [{ "saturation": -100 }, { "visibility": "simplified" }] }, { "featureType": "administrative.province", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "visibility": "on" }, { "lightness": 30 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ef8c25" }, { "lightness": 40 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "color": "#b6c54c" }, { "lightness": 40 }, { "saturation": -40 }] }, {}];
        break;
      case 'style-65':
        mapstyle = [{ "stylers": [{ "hue": "#baf4c4" }, { "saturation": 10 }] }, { "featureType": "water", "stylers": [{ "color": "#effefd" }] }, { "featureType": "all", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "labels", "stylers": [{ "visibility": "on" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-66':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "hue": "#FFE100" }, { "saturation": 34.48275862068968 }, { "lightness": -1.490196078431353 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#FF009A" }, { "saturation": -2.970297029703005 }, { "lightness": -17.815686274509815 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#FFE100" }, { "saturation": 8.600000000000009 }, { "lightness": -4.400000000000006 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#00C3FF" }, { "saturation": 29.31034482758622 }, { "lightness": -38.980392156862735 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#0078FF" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#00FF19" }, { "saturation": -30.526315789473685 }, { "lightness": -22.509803921568633 }, { "gamma": 1 }] }];
        break;
      case 'style-67':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#1CB2BD" }, { "saturation": 53 }, { "lightness": -44 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "hue": "#1CB2BD" }, { "saturation": 40 }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "hue": "#BBDC00" }, { "saturation": 80 }, { "lightness": -20 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "all", "stylers": [{ "visibility": "on" }] }];
        break;
      case 'style-68':
        mapstyle = [{ "stylers": [{ "visibility": "simplified" }] }, { "stylers": [{ "color": "#131314" }] }, { "featureType": "water", "stylers": [{ "color": "#131313" }, { "lightness": 7 }] }, { "elementType": "labels.text.fill", "stylers": [{ "visibility": "on" }, { "lightness": 25 }] }];
        break;
      case 'style-69':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#bbbbbb" }, { "saturation": -100 }, { "lightness": -4 }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "hue": "#999999" }, { "saturation": -100 }, { "lightness": -33 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "hue": "#999999" }, { "saturation": -100 }, { "lightness": -6 }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#aaaaaa" }, { "saturation": -100 }, { "lightness": -15 }, { "visibility": "on" }] }];
        break;
      case 'style-70':
        mapstyle = [{ "stylers": [{ "hue": "#ff1a00" }, { "invert_lightness": true }, { "saturation": -100 }, { "lightness": 33 }, { "gamma": 0.5 }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#2D333C" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "color": "#eeeeee" }, { "visibility": "simplified" }] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "labels.text.stroke", "stylers": [{ "color": "#ffffff" }, { "weight": 3 }] }, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#2D333C" }] }];
        break;
      case 'style-71':
        mapstyle = [{ "featureType": "administrative", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#e3e3e3" }] }, { "featureType": "landscape.natural", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "color": "#cccccc" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.line", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.station.airport", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.station.airport", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#FFFFFF" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-72':
        mapstyle = [{ "featureType": "administrative", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.man_made", "stylers": [{ "visibility": "simplified" }, { "color": "#ffe24d" }] }, { "featureType": "road", "stylers": [{ "visibility": "simplified" }, { "color": "#158c28" }] }, { "featureType": "landscape.natural", "stylers": [{ "visibility": "simplified" }, { "color": "#37b34a" }] }, { "featureType": "water", "stylers": [{ "color": "#ffe24d" }] }, { "featureType": "poi", "stylers": [{ "visibility": "simplified" }, { "color": "#8bc53f" }] }, { "elementType": "labels.text.stroke", "stylers": [{ "color": "#808080" }, { "gamma": 9.91 }, { "visibility": "off" }] }, { "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }, { "lightness": 100 }, { "visibility": "on" }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-73':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "hue": "#FFAD00" }, { "saturation": 50.2 }, { "lightness": -34.8 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#FFAD00" }, { "saturation": -19.8 }, { "lightness": -1.8 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#FFAD00" }, { "saturation": 72.4 }, { "lightness": -32.6 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#FFAD00" }, { "saturation": 74.4 }, { "lightness": -18 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#00FFA6" }, { "saturation": -63.2 }, { "lightness": 38 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#FFC300" }, { "saturation": 54.2 }, { "lightness": -14.4 }, { "gamma": 1 }] }];
        break;
      case 'style-74':
        mapstyle = [{ "stylers": [{ "visibility": "on" }, { "saturation": -100 }, { "gamma": 0.54 }] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "color": "#4d4946" }] }, { "featureType": "poi", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "labels.text", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "road.local", "elementType": "labels.text", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "gamma": 0.48 }] }, { "featureType": "transit.station", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "gamma": 7.18 }] }];
        break;
      case 'style-75':
        mapstyle = [{ "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#0099cc" }] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [{ "color": "#00314e" }] }, { "featureType": "transit.line", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#f0f0f0" }] }, { "featureType": "landscape.man_made", "stylers": [{ "color": "#adbac9" }] }, { "featureType": "landscape.natural", "stylers": [{ "color": "#adb866" }] }, { "featureType": "poi", "stylers": [{ "color": "#f7c742" }] }, { "featureType": "poi.park", "stylers": [{ "color": "#adb866" }] }, { "featureType": "transit.station", "elementType": "geometry.fill", "stylers": [{ "color": "#ff8dd3" }] }, { "featureType": "transit.station", "stylers": [{ "color": "#ff8dd3" }] }, { "featureType": "transit.line", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#808080" }] }, {}];
        break;
      case 'style-76':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#71d6ff" }, { "saturation": 100 }, { "lightness": -5 }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": 0 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "hue": "#deecec" }, { "saturation": -73 }, { "lightness": 72 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "hue": "#bababa" }, { "saturation": -100 }, { "lightness": 25 }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "hue": "#e3e3e3" }, { "saturation": -100 }, { "lightness": 0 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "administrative", "elementType": "labels", "stylers": [{ "hue": "#59cfff" }, { "saturation": 100 }, { "lightness": 34 }, { "visibility": "on" }] }];
        break;
      case 'style-77':
        mapstyle = [{ "featureType": "landscape", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "hue": "#00ff88" }, { "lightness": 14 }, { "color": "#667348" }, { "saturation": 4 }, { "gamma": 1.14 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [{ "color": "#313916" }, { "weight": 0.8 }] }, { "featureType": "road", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.locality", "elementType": "labels.icon", "stylers": [{ "visibility": "simplified" }, { "color": "#334b1f" }] }, { "featureType": "administrative.province", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "visibility": "simplified" }] }];
        break;
      case 'style-78':
        mapstyle = [{ "elementType": "labels.text.stroke", "stylers": [{ "color": "#ffffff" }] }, { "elementType": "labels.text.fill", "stylers": [{ "color": "#000000" }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#0000ff" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ff0000" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#000100" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.fill", "stylers": [{ "color": "#ffff00" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.stroke", "stylers": [{ "color": "#ff0000" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#ffa91a" }] }, { "featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{ "color": "#000000" }] }, { "featureType": "landscape.natural", "stylers": [{ "saturation": 36 }, { "gamma": 0.55 }] }, { "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{ "color": "#000000" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.stroke", "stylers": [{ "lightness": -100 }, { "weight": 2.1 }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{ "invert_lightness": true }, { "hue": "#ff0000" }, { "gamma": 3.02 }, { "lightness": 20 }, { "saturation": 40 }] }, { "featureType": "poi.attraction", "stylers": [{ "saturation": 100 }, { "hue": "#ff00ee" }, { "lightness": -13 }] }, { "featureType": "poi.government", "stylers": [{ "saturation": 100 }, { "hue": "#eeff00" }, { "gamma": 0.67 }, { "lightness": -26 }] }, { "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [{ "hue": "#ff0000" }, { "saturation": 100 }, { "lightness": -37 }] }, { "featureType": "poi.medical", "elementType": "labels.text.fill", "stylers": [{ "color": "#ff0000" }] }, { "featureType": "poi.school", "stylers": [{ "hue": "#ff7700" }, { "saturation": 97 }, { "lightness": -41 }] }, { "featureType": "poi.sports_complex", "stylers": [{ "saturation": 100 }, { "hue": "#00ffb3" }, { "lightness": -71 }] }, { "featureType": "poi.park", "stylers": [{ "saturation": 84 }, { "lightness": -57 }, { "hue": "#a1ff00" }] }, { "featureType": "transit.station.airport", "elementType": "geometry.fill", "stylers": [{ "gamma": 0.11 }] }, { "featureType": "transit.station", "elementType": "labels.text.stroke", "stylers": [{ "color": "#ffc35e" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "lightness": -100 }] }, { "featureType": "administrative", "stylers": [{ "saturation": 100 }, { "gamma": 0.35 }, { "lightness": 20 }] }, { "featureType": "poi.business", "elementType": "geometry.fill", "stylers": [{ "saturation": -100 }, { "gamma": 0.35 }] }, { "featureType": "poi.business", "elementType": "labels.text.stroke", "stylers": [{ "color": "#69ffff" }] }, { "featureType": "poi.place_of_worship", "elementType": "labels.text.stroke", "stylers": [{ "color": "#c3ffc3" }] }];
        break;
      case 'style-79':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#87bcba" }, { "saturation": -37 }, { "lightness": -17 }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [{ "hue": "#4f6b46" }, { "saturation": -23 }, { "lightness": -61 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "hue": "#d38bc8" }, { "saturation": -55 }, { "lightness": 13 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "all", "stylers": [{ "hue": "#ffa200" }, { "saturation": 100 }, { "lightness": -22 }, { "visibility": "on" }] }, { "featureType": "road.local", "elementType": "all", "stylers": [{ "hue": "#d38bc8" }, { "saturation": -55 }, { "lightness": -31 }, { "visibility": "on" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "hue": "#f69d94" }, { "saturation": 84 }, { "lightness": 9 }, { "visibility": "on" }] }, { "featureType": "administrative", "elementType": "all", "stylers": [{ "hue": "#d38bc8" }, { "saturation": 45 }, { "lightness": 36 }, { "visibility": "on" }] }, { "featureType": "administrative.country", "elementType": "all", "stylers": [{ "hue": "#d38bc8" }, { "saturation": 45 }, { "lightness": 36 }, { "visibility": "on" }] }, { "featureType": "administrative.land_parcel", "elementType": "all", "stylers": [{ "hue": "#d38bc8" }, { "saturation": 45 }, { "lightness": 36 }, { "visibility": "on" }] }, { "featureType": "poi.government", "elementType": "all", "stylers": [{ "hue": "#d38bc8" }, { "saturation": 35 }, { "lightness": -19 }, { "visibility": "on" }] }, { "featureType": "poi.school", "elementType": "all", "stylers": [{ "hue": "#d38bc8" }, { "saturation": -6 }, { "lightness": -17 }, { "visibility": "on" }] }, { "featureType": "poi.park", "elementType": "all", "stylers": [{ "hue": "#b2ba70" }, { "saturation": -19 }, { "lightness": -25 }, { "visibility": "on" }] }];
        break;
      case 'style-80':
        mapstyle = [{ "stylers": [{ "visibility": "on" }, { "saturation": -100 }] }, { "featureType": "water", "stylers": [{ "visibility": "on" }, { "saturation": 100 }, { "hue": "#00ffe6" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "saturation": 100 }, { "hue": "#00ffcc" }] }, { "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.park", "stylers": [{ "visibility": "on" }] }];
        break;
      case 'style-81':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "hue": "#FFB000" }, { "saturation": 71.66666666666669 }, { "lightness": -28.400000000000006 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#E8FF00" }, { "saturation": -76.6 }, { "lightness": 113 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#FF8300" }, { "saturation": -77 }, { "lightness": 27.400000000000006 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#FF8C00" }, { "saturation": -66.6 }, { "lightness": 34.400000000000006 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#00C4FF" }, { "saturation": 22.799999999999997 }, { "lightness": -11.399999999999991 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#9FFF00" }, { "saturation": 0 }, { "lightness": -23.200000000000003 }, { "gamma": 1 }] }];
        break;
      case 'style-82':
        mapstyle = [{ "featureType": "poi.medical", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "poi.business", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.place_of_worship", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "stylers": [{ "color": "#cec6b3" }] }, { "featureType": "road", "stylers": [{ "color": "#f2eee8" }] }, { "featureType": "water", "stylers": [{ "color": "#01186a" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#cec6b3" }] }, { "featureType": "landscape.man_made", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.government", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-83':
        mapstyle = [{ "stylers": [{ "visibility": "simplified" }, { "saturation": -100 }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 17 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#000045" }, { "lightness": 17 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.stroke", "stylers": [{ "color": "#000045" }, { "lightness": 20 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 25 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 25 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 100 }, { "color": "#7b94be" }, { "lightness": 50 }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 19 }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#000045" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#000045" }, { "lightness": 17 }, { "weight": 1.2 }] }];
        break;
      case 'style-84':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#001204" }, { "saturation": 100 }, { "lightness": -95 }, { "visibility": "on" }] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [{ "hue": "#007F1E" }, { "saturation": 100 }, { "lightness": -72 }, { "visibility": "on" }] }, { "featureType": "landscape.natural", "elementType": "all", "stylers": [{ "hue": "#00C72E" }, { "saturation": 100 }, { "lightness": -59 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "hue": "#002C0A" }, { "saturation": 100 }, { "lightness": -87 }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#00A927" }, { "saturation": 100 }, { "lightness": -58 }, { "visibility": "on" }] }];
        break;
      case 'style-85':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "hue": "#71ABC3" }, { "saturation": -10 }, { "lightness": -21 }, { "visibility": "simplified" }] }, { "featureType": "landscape.natural", "elementType": "geometry", "stylers": [{ "hue": "#7DC45C" }, { "saturation": 37 }, { "lightness": -41 }, { "visibility": "simplified" }] }, { "featureType": "landscape.man_made", "elementType": "geometry", "stylers": [{ "hue": "#C3E0B0" }, { "saturation": 23 }, { "lightness": -12 }, { "visibility": "simplified" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#A19FA0" }, { "saturation": -98 }, { "lightness": -20 }, { "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "hue": "#FFFFFF" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "simplified" }] }];
        break;
      case 'style-86':
        mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 17 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#000045" }, { "lightness": 17 }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.stroke", "stylers": [{ "color": "#000045" }, { "lightness": 20 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 25 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 25 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 0 }, { "color": "#4d88ea" }, { "lightness": 0 }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#000045" }, { "lightness": 19 }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#000045" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#000045" }, { "lightness": 17 }, { "weight": 1.2 }] }];
        break;
      case 'style-87':
        mapstyle = [{ "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#000000" }] }, { "featureType": "landscape", "stylers": [{ "color": "#ffffff" }, { "visibility": "on" }] }, {}];
        break;
      case 'style-88':
        mapstyle = [{ "featureType": "administrative", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "water", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "transit", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "landscape", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.highway", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "visibility": "on" }] }, { "featureType": "water", "stylers": [{ "color": "#abbaa4" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "color": "#3f518c" }] }, { "featureType": "road.highway", "stylers": [{ "color": "#ad9b8d" }] }];
        break;
      case 'style-89':
        mapstyle = [{ "elementType": "labels", "stylers": [{ "visibility": "off" }, { "color": "#f49f53" }] }, { "featureType": "landscape", "stylers": [{ "color": "#f9ddc5" }, { "lightness": -7 }] }, { "featureType": "road", "stylers": [{ "color": "#813033" }, { "lightness": 43 }] }, { "featureType": "poi.business", "stylers": [{ "color": "#645c20" }, { "lightness": 38 }] }, { "featureType": "water", "stylers": [{ "color": "#1994bf" }, { "saturation": -69 }, { "gamma": 0.99 }, { "lightness": 43 }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "color": "#f19f53" }, { "weight": 1.3 }, { "visibility": "on" }, { "lightness": 16 }] }, { "featureType": "poi.business" }, { "featureType": "poi.park", "stylers": [{ "color": "#645c20" }, { "lightness": 39 }] }, { "featureType": "poi.school", "stylers": [{ "color": "#a95521" }, { "lightness": 35 }] }, {}, { "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [{ "color": "#813033" }, { "lightness": 38 }, { "visibility": "off" }] }, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, { "elementType": "labels" }, { "featureType": "poi.sports_complex", "stylers": [{ "color": "#9e5916" }, { "lightness": 32 }] }, {}, { "featureType": "poi.government", "stylers": [{ "color": "#9e5916" }, { "lightness": 46 }] }, { "featureType": "transit.station", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.line", "stylers": [{ "color": "#813033" }, { "lightness": 22 }] }, { "featureType": "transit", "stylers": [{ "lightness": 38 }] }, { "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{ "color": "#f19f53" }, { "lightness": -10 }] }, {}, {}, {}];
        break;
      case 'style-90':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "lightness": 16 }, { "hue": "#ff001a" }, { "saturation": -61 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#ff0011" }, { "lightness": 53 }] }, { "featureType": "poi.park", "stylers": [{ "hue": "#00ff91" }] }, { "elementType": "labels", "stylers": [{ "lightness": 63 }, { "hue": "#ff0000" }] }, { "featureType": "water", "stylers": [{ "hue": "#0055ff" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-91':
        mapstyle = [{ "featureType": "water", "stylers": [{ "visibility": "on" }, { "color": "#333333" }] }, { "featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#666666" }] }, { "featureType": "landscape.man_made", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#df2f23" }, { "visibility": "off" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#cccccc" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.stroke", "stylers": [{ "color": "#999999" }] }, { "featureType": "road.local", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#aaaaaa" }] }, { "featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#808080" }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#aaaaaa" }] }, { "featureType": "administrative", "elementType": "labels.text" }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#c6eeee" }] }, {}];
        break;
      case 'style-92':
        mapstyle = [{ "featureType": "landscape", "elementType": "geometry.fill", "stylers": [{ "color": "#bbd5c5" }] }, { "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{ "color": "#808080" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#fcf9a2" }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "color": "#bbd5c5" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#808080" }] }];
        break;
      case 'style-93':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "visibility": "simplified" }, { "color": "#9debff" }, { "weight": 0.1 }] }, { "featureType": "water", "stylers": [{ "visibility": "simplified" }, { "color": "#ebebeb" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#51dbff" }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#51dbff" }] }, { "featureType": "poi" }, { "featureType": "transit.line", "stylers": [{ "color": "#ff4e80" }, { "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "visibility": "on" }, { "weight": 1.5 }, { "color": "#51dbff" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }, { "color": "#51dbNaN" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }, { "color": "#51dbff" }] }, { "featureType": "poi.business", "stylers": [{ "color": "#9debff" }, { "visibility": "off" }] }, {}, { "featureType": "poi.government", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.school", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.medical", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.attraction", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#51dbff" }] }, { "featureType": "poi.place_of_worship", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.sports_complex", "stylers": [{ "visibility": "off" }] }, {}, { "featureType": "road.arterial", "elementType": "labels.text.stroke", "stylers": [{ "color": "#000000" }, { "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway.controlled_access", "stylers": [{ "visibility": "off" }] }, { "featureType": "road" }];
        break;
      case 'style-94':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "hue": "#000000" }, { "saturation": -100 }, { "lightness": 44 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#00F93f" }, { "saturation": 100 }, { "lightness": -40.95294117647059 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#00F93f" }, { "saturation": 100 }, { "lightness": -51.15294117647059 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#00F93f" }, { "saturation": 100 }, { "lightness": -50.35294117647059 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#00F93f" }, { "saturation": 100 }, { "lightness": -50.35294117647059 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#00F93f" }, { "saturation": 100 }, { "lightness": -50.35294117647059 }, { "gamma": 1 }] }];
        break;
      case 'style-95':
        mapstyle = [{ "stylers": [{ "hue": "#ff8800" }, { "gamma": 0.4 }] }];
        break;
      case 'style-96':
        mapstyle = [{ "featureType": "road", "stylers": [{ "hue": "#5e00ff" }, { "saturation": -79 }] }, { "featureType": "poi", "stylers": [{ "saturation": -78 }, { "hue": "#6600ff" }, { "lightness": -47 }, { "visibility": "off" }] }, { "featureType": "road.local", "stylers": [{ "lightness": 22 }] }, { "featureType": "landscape", "stylers": [{ "hue": "#6600ff" }, { "saturation": -11 }] }, {}, {}, { "featureType": "water", "stylers": [{ "saturation": -65 }, { "hue": "#1900ff" }, { "lightness": 8 }] }, { "featureType": "road.local", "stylers": [{ "weight": 1.3 }, { "lightness": 30 }] }, { "featureType": "transit", "stylers": [{ "visibility": "simplified" }, { "hue": "#5e00ff" }, { "saturation": -16 }] }, { "featureType": "transit.line", "stylers": [{ "saturation": -72 }] }, {}];
        break;
      case 'style-97':
        mapstyle = [{ "featureType": "landscape.natural.landcover", "stylers": [{ "gamma": 0.44 }, { "hue": "#2bff00" }] }, { "featureType": "water", "stylers": [{ "hue": "#00a1ff" }, { "saturation": 29 }, { "gamma": 0.74 }] }, { "featureType": "landscape.natural.terrain", "stylers": [{ "hue": "#00ff00" }, { "saturation": 54 }, { "lightness": -51 }, { "gamma": 0.4 }] }, { "featureType": "transit.line", "stylers": [{ "gamma": 0.27 }, { "hue": "#0077ff" }, { "saturation": -91 }, { "lightness": 36 }] }, { "featureType": "landscape.man_made", "stylers": [{ "saturation": 10 }, { "lightness": -23 }, { "hue": "#0099ff" }, { "gamma": 0.71 }] }, { "featureType": "poi.business", "stylers": [{ "hue": "#0055ff" }, { "saturation": 9 }, { "lightness": -46 }, { "gamma": 1.05 }] }, { "featureType": "administrative.country", "stylers": [{ "gamma": 0.99 }] }, { "featureType": "administrative.province", "stylers": [{ "lightness": 36 }, { "saturation": -54 }, { "gamma": 0.76 }] }, { "featureType": "administrative.locality", "stylers": [{ "lightness": 33 }, { "saturation": -61 }, { "gamma": 1.21 }] }, { "featureType": "administrative.neighborhood", "stylers": [{ "hue": "#ff0000" }, { "gamma": 2.44 }] }, { "featureType": "road.highway.controlled_access", "stylers": [{ "hue": "#ff0000" }, { "lightness": 67 }, { "saturation": -40 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#ff6600" }, { "saturation": 52 }, { "gamma": 0.64 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#006eff" }, { "gamma": 0.46 }, { "saturation": -3 }, { "lightness": -10 }] }, { "featureType": "transit.line", "stylers": [{ "hue": "#0077ff" }, { "saturation": -46 }, { "gamma": 0.58 }] }, { "featureType": "transit.station", "stylers": [{ "gamma": 0.8 }] }, { "featureType": "transit.station.rail", "stylers": [{ "hue": "#ff0000" }, { "saturation": -45 }, { "gamma": 0.9 }] }, { "elementType": "labels.text.fill", "stylers": [{ "gamma": 0.58 }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{ "gamma": 2.01 }, { "hue": "#00ffff" }, { "lightness": 22 }] }, { "featureType": "transit", "stylers": [{ "saturation": -87 }, { "lightness": 44 }, { "gamma": 1.98 }, { "visibility": "off" }] }, { "featureType": "poi.business", "elementType": "labels.text", "stylers": [{ "gamma": 0.06 }, { "visibility": "off" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "hue": "#00aaff" }, { "lightness": -6 }, { "gamma": 2.21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "gamma": 3.84 }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [{ "gamma": 9.99 }] }, { "featureType": "administrative", "stylers": [{ "gamma": 0.01 }] }];
        break;
      case 'style-98':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "hue": "#F600FF" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#DE00FF" }, { "saturation": -4.6000000000000085 }, { "lightness": -1.4210854715202004e-14 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#FF009A" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#FF0098" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#EC00FF" }, { "saturation": 72.4 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#7200FF" }, { "saturation": 49 }, { "lightness": 0 }, { "gamma": 1 }] }];
        break;
      case 'style-99':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "saturation": -7 }, { "gamma": 1.02 }, { "hue": "#ffc300" }, { "lightness": -10 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#ffaa00" }, { "saturation": -45 }, { "gamma": 1 }, { "lightness": -4 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#ffaa00" }, { "lightness": -10 }, { "saturation": 64 }, { "gamma": 0.9 }] }, { "featureType": "road.local", "stylers": [{ "lightness": -5 }, { "hue": "#00f6ff" }, { "saturation": -40 }, { "gamma": 0.75 }] }, { "featureType": "poi", "stylers": [{ "saturation": -30 }, { "lightness": 11 }, { "gamma": 0.5 }, { "hue": "#ff8000" }] }, { "featureType": "water", "stylers": [{ "hue": "#0077ff" }, { "gamma": 1.25 }, { "saturation": -22 }, { "lightness": -31 }] }];
        break;
      case 'style-100':
        mapstyle = [{ "featureType": "road", "elementType": "geometry.fill", "stylers": [{ "lightness": -100 }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "lightness": -100 }, { "visibility": "off" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "lightness": 100 }] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "visibility": "on" }, { "saturation": 100 }, { "hue": "#006eff" }, { "lightness": -19 }] }, { "featureType": "landscape", "elementType": "geometry.fill", "stylers": [{ "saturation": -100 }, { "lightness": -16 }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "hue": "#2bff00" }, { "lightness": -39 }, { "saturation": 8 }] }, { "featureType": "poi.attraction", "elementType": "geometry.fill", "stylers": [{ "lightness": 100 }, { "saturation": -100 }] }, { "featureType": "poi.business", "elementType": "geometry.fill", "stylers": [{ "saturation": -100 }, { "lightness": 100 }] }, { "featureType": "poi.government", "elementType": "geometry.fill", "stylers": [{ "lightness": 100 }, { "saturation": -100 }] }, { "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [{ "lightness": 100 }, { "saturation": -100 }] }, { "featureType": "poi.place_of_worship", "elementType": "geometry.fill", "stylers": [{ "lightness": 100 }, { "saturation": -100 }] }, { "featureType": "poi.school", "elementType": "geometry.fill", "stylers": [{ "saturation": -100 }, { "lightness": 100 }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.fill", "stylers": [{ "saturation": -100 }, { "lightness": 100 }] }];
        break;
      case 'style-101':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#00559B" }, { "saturation": 100 }, { "lightness": -60 }, { "visibility": "simplified" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "on" }] }, { "featureType": "landscape.natural", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "on" }] }, { "featureType": "poi.park", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "hue": "#00559B" }, { "saturation": 100 }, { "lightness": -53 }, { "visibility": "simplified" }] }, { "featureType": "water", "elementType": "all", "stylers": [] }, { "featureType": "administrative.locality", "elementType": "geometry", "stylers": [{ "hue": "#ffffff" }, { "saturation": 0 }, { "lightness": 100 }, { "visibility": "on" }] }, { "featureType": "water", "elementType": "all", "stylers": [] }, { "featureType": "poi.school", "elementType": "labels", "stylers": [{ "hue": "#999999" }, { "saturation": -100 }, { "lightness": -28 }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#999999" }, { "saturation": -100 }, { "lightness": -23 }, { "visibility": "on" }] }, { "featureType": "administrative", "elementType": "all", "stylers": [{ "hue": "#2C3E50" }, { "saturation": 29 }, { "lightness": -52 }, { "visibility": "on" }] }];
        break;
      case 'style-102':
        mapstyle = [{ "featureType": "water", "stylers": [{ "color": "#6ebeab" }] }, { "featureType": "road", "stylers": [{ "color": "#b5a15b" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f9f9f9" }] }, { "featureType": "landscape", "elementType": "labels.text.fill", "stylers": [{ "color": "#808080" }] }, { "featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [{ "color": "#808080" }] }, { "featureType": "landscape.natural.terrain", "stylers": [{ "color": "#d0d0d0" }] }, {}];
        break;
      case 'style-103':
        mapstyle = [{ "featureType": "administrative", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.locality", "elementType": "labels", "stylers": [{ "visibility": "simplified" }, { "saturation": 100 }, { "color": "#ff4702" }] }, { "featureType": "road", "stylers": [{ "saturation": -100 }, { "visibility": "simplified" }, { "lightness": -25 }] }, { "featureType": "water", "stylers": [{ "color": "#5f1bff" }, { "saturation": 100 }, { "visibility": "on" }, { "lightness": -38 }] }, { "featureType": "landscape.natural.terrain", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.park", "stylers": [{ "visibility": "simplified" }, { "color": "#d3ff44" }, { "lightness": -32 }, { "saturation": 30 }] }, { "featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#797679" }, { "gamma": 4.92 }, { "lightness": -47 }] }, {}];
        break;
      case 'style-104':
        mapstyle = [{ "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.man_made", "stylers": [{ "visibility": "off" }, { "saturation": 100 }, { "lightness": -17 }, { "gamma": 1.18 }, { "color": "#da97ae" }] }, { "elementType": "geometry.fill", "stylers": [{ "color": "#f07913" }] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "weight": 0.1 }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "color": "#d0f380" }] }, { "stylers": [{ "weight": 0.1 }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "visibility": "on" }, { "color": "#000000" }] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [{ "weight": 1 }, { "color": "#83827f" }, { "visibility": "off" }] }, {}];
        break;
      case 'style-105':
        mapstyle = [{ "featureType": "landscape.natural", "stylers": [{ "visibility": "on" }, { "color": "#ecd5c3" }] }, { "featureType": "water", "stylers": [{ "visibility": "on" }, { "color": "#32c4fe" }] }, { "featureType": "landscape.natural", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "transit", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }] }, { "featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.man_made", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.fill", "stylers": [{ "color": "#baaca2" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway.controlled_access", "elementType": "labels.text.fill", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#565757" }, { "visibility": "on" }] }, { "featureType": "road.local", "elementType": "labels.text.stroke", "stylers": [{ "color": "#808080" }, { "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.neighborhood", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [{ "visibility": "on" }, { "color": "#535555" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#fffffe" }] }, { "featureType": "road.highway", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "labels.icon", "stylers": [{ "visibility": "on" }] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "visibility": "on" }, { "saturation": -100 }, { "lightness": 17 }] }, {}];
        break;
      case 'style-106':
        mapstyle = [{ "featureType": "road.highway", "elementType": "labels", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "off" }] }, { "featureType": "landscape.natural", "elementType": "all", "stylers": [{ "hue": "#ffffff" }, { "saturation": -100 }, { "lightness": 100 }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "hue": "#ffe94f" }, { "saturation": 100 }, { "lightness": 4 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "hue": "#ffe94f" }, { "saturation": 100 }, { "lightness": 4 }, { "visibility": "on" }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "hue": "#333333" }, { "saturation": -100 }, { "lightness": -74 }, { "visibility": "off" }] }];
        break;
      case 'style-107':
        mapstyle = [{ "stylers": [{ "saturation": -45 }, { "lightness": 13 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#8fa7b3" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#667780" }] }, { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [{ "color": "#333333" }] }, { "featureType": "road.highway", "elementType": "labels.text.stroke", "stylers": [{ "color": "#8fa7b3" }, { "gamma": 2 }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "color": "#a3becc" }] }, { "featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{ "color": "#7a8f99" }] }, { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [{ "color": "#555555" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "color": "#a3becc" }] }, { "featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{ "color": "#7a8f99" }] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{ "color": "#555555" }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#bbd9e9" }] }, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#525f66" }] }, { "featureType": "transit", "elementType": "labels.text.stroke", "stylers": [{ "color": "#bbd9e9" }, { "gamma": 2 }] }, { "featureType": "transit.line", "elementType": "geometry.fill", "stylers": [{ "color": "#a3aeb5" }] }];
        break;
      case 'style-108':
        mapstyle = [{ "featureType": "administrative", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [{ "color": "#DCE7EB" }] }, { "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [{ "color": "#DCE7EB" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape.natural", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.line", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.station.airport", "elementType": "geometry", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.station.airport", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#83888B" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "off" }] }];
        break;
      case 'style-109':
        mapstyle = [{ "stylers": [{ "hue": "#B61530" }, { "saturation": 60 }, { "lightness": -40 }] }, { "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "water", "stylers": [{ "color": "#B61530" }] }, { "featureType": "road", "stylers": [{ "color": "#B61530" }, {}] }, { "featureType": "road.local", "stylers": [{ "color": "#B61530" }, { "lightness": 6 }] }, { "featureType": "road.highway", "stylers": [{ "color": "#B61530" }, { "lightness": -25 }] }, { "featureType": "road.arterial", "stylers": [{ "color": "#B61530" }, { "lightness": -10 }] }, { "featureType": "transit", "stylers": [{ "color": "#B61530" }, { "lightness": 70 }] }, { "featureType": "transit.line", "stylers": [{ "color": "#B61530" }, { "lightness": 90 }] }, { "featureType": "administrative.country", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.station", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit.station", "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }] }];
        break;
      case 'style-110':
        mapstyle = [{ "featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "336d75" }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "hue": "#1900ff" }, { "color": "#d064a4" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill" }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "lightness": 100 }, { "visibility": "simplified" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "stylers": [{ "color": "#6bb1e1" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "lightness": 700 }] }];
        break;
      case 'style-111':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "visibility": "simplified" }, { "color": "#2b3f57" }, { "weight": 0.1 }] }, { "featureType": "administrative", "stylers": [{ "visibility": "on" }, { "hue": "#ff0000" }, { "weight": 0.4 }, { "color": "#ffffff" }] }, { "featureType": "road.highway", "elementType": "labels.text", "stylers": [{ "weight": 1.3 }, { "color": "#FFFFFF" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#f55f77" }, { "weight": 3 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#f55f77" }, { "weight": 1.1 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#f55f77" }, { "weight": 0.4 }] }, {}, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "weight": 0.8 }, { "color": "#ffffff" }, { "visibility": "on" }] }, { "featureType": "road.local", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "labels", "stylers": [{ "color": "#ffffff" }, { "weight": 0.7 }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "color": "#6c5b7b" }] }, { "featureType": "water", "stylers": [{ "color": "#f3b191" }] }, { "featureType": "transit.line", "stylers": [{ "visibility": "on" }] }];
        break;
      case 'style-112':
        mapstyle = [{ "stylers": [{ "saturation": 100 }, { "hue": "#fff700" }] }, { "featureType": "landscape", "stylers": [{ "color": "#ffdd00" }] }, { "featureType": "water", "stylers": [{ "color": "#718098" }, { "saturation": -35 }, { "lightness": 20 }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "labels.text", "stylers": [{ "color": "#ffdd00" }, { "lightness": -38 }] }, { "featureType": "administrative", "elementType": "labels.text.stroke", "stylers": [{ "color": "#ffdd00" }] }, { "featureType": "road", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "stylers": [{ "weight": 0.7 }] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }] }];
        break;
      case 'style-113':
        mapstyle = [{ "featureType": "landscape", "stylers": [{ "visibility": "on" }, { "color": "#e7cd79" }, { "weight": 0.1 }] }, { "featureType": "water", "stylers": [{ "visibility": "simplified" }, { "color": "#282828" }] }, { "featureType": "landscape.natural.landcover", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#d6bc68" }] }, { "featureType": "administrative.locality", "elementType": "geometry", "stylers": [{ "visibility": "off" }, { "color": "#d6bc68" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "visibility": "on" }, { "color": "#d6bc68" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "on" }, { "color": "#d6bc68" }] }, { "featureType": "transit.station.airport", "elementType": "geometry.fill", "stylers": [{ "visibility": "off" }, { "color": "#d6bc68" }] }, { "featureType": "poi" }, { "featureType": "transit.line", "stylers": [{ "color": "#d6bc68" }, { "visibility": "on" }] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }, { "weight": 1 }, { "color": "#e9d9a6" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }, { "color": "#e9d9a6" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }, { "color": "#e9d9a6" }] }, { "featureType": "poi.business", "stylers": [{ "color": "#e9d9a6" }, { "visibility": "on" }] }, {}, { "featureType": "poi.government", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.school", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.medical", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.attraction", "elementType": "geometry", "stylers": [{ "visibility": "off" }, { "color": "#cfb665" }] }, { "featureType": "poi.place_of_worship", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.sports_complex", "stylers": [{ "visibility": "off" }] }, {}, { "featureType": "road.arterial", "elementType": "labels.text.stroke", "stylers": [{ "color": "#cfb665" }, { "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway.controlled_access", "stylers": [{ "visibility": "off" }] }, { "featureType": "road" }];
        break;
      case 'style-114':
        mapstyle = [{ "featureType": "water", "elementType": "all", "stylers": [{ "hue": "#0072B2" }, { "saturation": 100 }, { "lightness": -54 }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "hue": "#E69F00" }, { "saturation": 100 }, { "lightness": -49 }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "hue": "#D55E00" }, { "saturation": 100 }, { "lightness": -46 }, { "visibility": "on" }] }, { "featureType": "road.local", "elementType": "all", "stylers": [{ "hue": "#CC79A7" }, { "saturation": -55 }, { "lightness": -36 }, { "visibility": "on" }] }, { "featureType": "road.arterial", "elementType": "all", "stylers": [{ "hue": "#F0E442" }, { "saturation": -15 }, { "lightness": -22 }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "all", "stylers": [{ "hue": "#56B4E9" }, { "saturation": -23 }, { "lightness": -2 }, { "visibility": "on" }] }, { "featureType": "administrative", "elementType": "geometry", "stylers": [{ "hue": "#000000" }, { "saturation": 0 }, { "lightness": -100 }, { "visibility": "on" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "hue": "#009E73" }, { "saturation": 100 }, { "lightness": -59 }, { "visibility": "on" }] }];
        break;
      default:
        mapstyle = '';
    }
    return mapstyle;
  }

  //Getting marker animation
  function sbvcgmap_get_marker_animation(string) {
    var animation;
    string = string.toUpperCase();

    if (string == 'DROP') {
      animation = google.maps.Animation.DROP;
    } else if (string == 'BOUNCE') {
      animation = google.maps.Animation.BOUNCE;
    } else {
      animation = null;
    }

    return animation;
  }

  //Check if boolean
  function sbvcgmap_check_bool(string) {
    string = string.toLowerCase();
    if (string == 'yes')
      returnval = true;
    else
      returnval = false;

    return returnval;
  }


	/*
	*  sbvcgmap_render_map
	*
	*  This function will render a SB Google Map onto the selected jQuery element
	*
	*  @type	function
	*  @param	$this (jQuery element)
	*  @return	n/a
	*/

  function sbvcgmap_render_map($this) {

    var $markers = $this.find('.sbvcgmap-marker');
    var map_id = $this.attr('map-id');
    var zoom = parseInt($this.attr('zoom'));
    var maptypeid = sbvcgmap_get_map_type($this.attr('maptype'));

    panorama_view = false;
    if ($this.attr('maptype') == 'STREETVIEW') {
      panorama_view = true;
    }

    var panoramatogglebutton = sbvcgmap_check_bool($this.attr('panoramatogglebutton'));
    var pancontrol = sbvcgmap_check_bool($this.attr('pancontrol'));
    var pancontrol_position = sbvcgmap_get_map_control_position($this.attr('pancontrol_position'));
    var zoomcontrol = sbvcgmap_check_bool($this.attr('zoomcontrol'));
    var zoomcontrol_position = sbvcgmap_get_map_control_position($this.attr('zoomcontrol_position'));
    var zoomcontrolstyle = sbvcgmap_get_zoom_control_style($this.attr('zoomcontrolstyle'));
    var maptypecontrol = sbvcgmap_check_bool($this.attr('maptypecontrol'));
    var maptypecontrol_position = sbvcgmap_get_map_control_position($this.attr('maptypecontrol_position'));
    var streetviewcontrol = sbvcgmap_check_bool($this.attr('streetviewcontrol'));
    var streetviewcontrol_position = sbvcgmap_get_map_control_position($this.attr('streetviewcontrol_position'));
    var overviewmapcontrol = sbvcgmap_check_bool($this.attr('overviewmapcontrol'));
    var overviewmapcontrolvisible = sbvcgmap_check_bool($this.attr('overviewmapcontrolvisible'));
    var maptypecontrolstyle = sbvcgmap_get_map_type_control_style($this.attr('maptypecontrolstyle'));
    var mapstyle = sbvcgmap_get_map_style($this.attr('mapstyle'));
    var weather = sbvcgmap_check_bool($this.attr('weather'));
    var traffic = sbvcgmap_check_bool($this.attr('traffic'));
    var transit = sbvcgmap_check_bool($this.attr('transit'));
    var bicycle = sbvcgmap_check_bool($this.attr('bicycle'));
    var panoramio = sbvcgmap_check_bool($this.attr('panoramio'));
    var draggable = sbvcgmap_check_bool($this.attr('draggable'));
    var scrollwheel = sbvcgmap_check_bool($this.attr('scrollwheel'));
    var cplatitude = $this.attr('cplatitude');
    var cplongitude = $this.attr('cplongitude');
    var scalecontrol = sbvcgmap_check_bool($this.attr('scalecontrol'));
    var searchtype = $this.attr('searchtype').toLowerCase();
    var searchradius = parseInt($this.attr('searchradius'));
    var searchiconanimation = sbvcgmap_get_marker_animation($this.attr('searchiconanimation'));
    var searchdirectiontext = $this.attr('searchdirectiontext');
    var reloadonresize = sbvcgmap_check_bool($this.attr('reloadonresize'));
    var clustering = sbvcgmap_check_bool($this.attr('clustering'));

    // vars
    var args = {
      zoom: zoom,
      center: new google.maps.LatLng(cplatitude, cplongitude),
      mapTypeId: maptypeid,
      panControl: pancontrol,
      panControlOptions: {
        position: pancontrol_position
      },
      zoomControl: zoomcontrol,
      zoomControlOptions: {
        position: zoomcontrol_position,
        style: zoomcontrolstyle
      },
      scrollwheel: scrollwheel,
      draggable: draggable,
      mapTypeControl: maptypecontrol,
      mapTypeControlOptions: {
        position: maptypecontrol_position,
        style: maptypecontrolstyle
      },
      scaleControl: scalecontrol,
      streetViewControl: streetviewcontrol,
      streetViewControlOptions: {
        position: streetviewcontrol_position
      },
      overviewMapControl: overviewmapcontrol,
      overviewMapControlOptions: {
        opened: overviewmapcontrolvisible
      },
      styles: mapstyle

    };

    // create map	        	
    map = new google.maps.Map($this[0], args);

    if (weather) {
      var weatherLayer = new google.maps.weather.WeatherLayer({
        temperatureUnits: google.maps.weather.TemperatureUnit.FAHRENHEIT
      });
      weatherLayer.setMap(map);
    }

    if (traffic) {
      var trafficLayer = new google.maps.TrafficLayer();
      trafficLayer.setMap(map);
    }

    if (transit) {
      var transitLayer = new google.maps.TransitLayer();
      transitLayer.setMap(map);
    }

    if (bicycle) {
      var bikeLayer = new google.maps.BicyclingLayer();
      bikeLayer.setMap(map);
    }

    if (panoramio) {
      var panoramioLayer = new google.maps.panoramio.PanoramioLayer();
      panoramioLayer.setMap(map);
    }

    // add a markers reference
    map.markers = [];

    // add markers
    $markers.each(function () {
      sbvcgmap_add_marker($(this), map, map_id);
    });

    if (clustering)
      var markerCluster = new MarkerClusterer(map, map.markers, {
        imagePath: 'https://rawgit.com/googlemaps/js-marker-clusterer/gh-pages/images/m'
      });

    // center map
    if (cplatitude == 0 || cplongitude == 0)
      sbvcgmap_center_map(map);

    //Add nearest places functionality
    if (searchtype != 'disabled' && searchtype != '') {
      var searchrequest = {
        location: map.getCenter(),
        radius: searchradius,
        types: [searchtype]
      };

      var service = new google.maps.places.PlacesService(map);
      service.nearbySearch(searchrequest, function (results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            sbvcgmap_create_place_marker(results[i], searchiconanimation, searchdirectiontext);
          }
        }
      });
    }


    if (reloadonresize) {
      $(window).bind('resize', function () {
        sbvcgmap_center_map(map);
      });
    }

    sbvcgmap_maps[map_id] = map;

    //Code to make fullscreen map
    if ($this.prev('.sbvcgmap-toggle-screen').length) {
      $this.prev('.sbvcgmap-toggle-screen').css('margin-left', -(parseInt($this.prev('.sbvcgmap-toggle-screen').outerWidth()) / 2))
      $this.prev('.sbvcgmap-toggle-screen').css('display', 'block');
      $this.prev('.sbvcgmap-toggle-screen').bind('click', function () {
        var do_screen_mode = $(this).attr('data-do-screen-mode');
        $(this).children('span').hide();
        $(this).children('.sbvcgmap-' + do_screen_mode + '-text').show();
        if (do_screen_mode == 'expand') {
          $(this).closest('.sbvcgmap-map-wrapper').addClass('sbvcgmap-fullscreen');
          $(this).attr('data-do-screen-mode', 'collapse');
        } else {
          $(this).closest('.sbvcgmap-map-wrapper').removeClass('sbvcgmap-fullscreen');
          $(this).attr('data-do-screen-mode', 'expand');
        }
        $(this).css('margin-left', -(parseInt($(this).outerWidth()) / 2));
        google.maps.event.trigger(sbvcgmap_maps[map_id], 'resize');
        sbvcgmap_center_map(sbvcgmap_maps[map_id]);
      });
    }

    //Street View
    if (panorama_view || panoramatogglebutton) {
      var panorama_center = new google.maps.LatLng(cplatitude, cplongitude);
      sbvcgmap_panorama[map_id] = map.getStreetView();
      sbvcgmap_panorama[map_id].set('enableCloseButton', false);
      sbvcgmap_panorama[map_id].setPosition(panorama_center);
      sbvcgmap_panorama[map_id].setPov(({
        heading: 265,
        pitch: 0
      }));
    }
    if (panorama_view) {
      sb_toggle_street_view(sbvcgmap_panorama[map_id]);
    }
    if (panoramatogglebutton) {
      if ($this.closest('.sbvcgmap-map-wrapper').children('.sbvcgmap-toggle-panorama').length) {
        $this.closest('.sbvcgmap-map-wrapper').children('.sbvcgmap-toggle-panorama').bind('click', function () {
          sb_toggle_street_view(sbvcgmap_panorama[map_id]);
        });
      }
    }
  }

	/*
	*  sbvcgmap_create_place_marker
	*
	*  This function will add a marker for nearest place query
	*
	*  @type	function

	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/
  function sbvcgmap_create_place_marker(place, searchiconanimation, searchdirectiontext) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
      map: map,
      animation: searchiconanimation,
      position: place.geometry.location
    });


    infowindow = new google.maps.InfoWindow();

    google.maps.event.addListener(marker, 'click', function () {
      var marker_html = '';
      marker_html += place.name;
      if (searchdirectiontext != '') {
        marker_html += '<br /><a target="_blank" href="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcMrGLpT5OAMiZHeXfWHWixU-Ds2p7Izw&daddr=' + place.geometry.location + '">' + searchdirectiontext + '</a>';
      }

      infowindow.setContent(marker_html);
      infowindow.open(map, this);
    });
  }

	/*
	*  sbvcgmap_add_marker
	*
	*  This function will add a marker to the selected SB Google Map
	*
	*  @type	function

	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

  function sbvcgmap_add_marker($marker, map, map_id) {

    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
    var animation = sbvcgmap_get_marker_animation($marker.attr('animation'));
    // create marker
    var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      animation: animation,
      icon: $marker.attr('icon')
    });

    // add to array
    map.markers.push(marker);
    sbvcgmap_markers[map_id].push(marker);

    // if marker contains HTML, add it to an infoWindow
    if ($marker.html()) {
      // create info window


      var customstyles = sbvcgmap_check_bool($marker.attr('customstyles'));

      if (customstyles) {

        var csbg = $marker.attr('csbg');

        var cswidth = $marker.attr('cswidth');
        var cspadding = $marker.attr('cspadding');
        var csborderradius = $marker.attr('csborderradius');
        var csboxshadow = $marker.attr('csboxshadow');
        var csborder = $marker.attr('csborder');

        var cscloseimage = $marker.attr('cscloseimage');
        var csclosemargin = $marker.attr('csclosemargin');

        var csxposition = parseInt($marker.attr('csxposition'));
        var csyposition = parseInt($marker.attr('csyposition'));


        var infowindow = new InfoBox({
          content: $marker.html()
          , disableAutoPan: false
          , maxWidth: 0
          , alignBottom: true
          , pixelOffset: new google.maps.Size(csxposition, csyposition)
          , zIndex: null
          , boxStyle: {
            background: csbg
            , opacity: 1
            , border: csborder
            , width: cswidth
            , padding: cspadding
            , boxShadow: csboxshadow
            , borderRadius: csborderradius
          }
          , closeBoxMargin: csclosemargin
          , closeBoxURL: cscloseimage
          , infoBoxClearance: new google.maps.Size(10, 10)
          , isHidden: false
          , pane: 'floatPane'
          , enableEventPropagation: false
        });
      } else {
        var infowindow = new google.maps.InfoWindow({
          content: $marker.html()
        });
      }


      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function () {
        $('.sbvcgmap-map .infoBox > img:first').trigger('click');
        $('.gm-style-iw').each(function () {
          $(this).next('div').trigger('click');
        });
        infowindow.open(map, marker);

      });

      var infowindow_popup = sbvcgmap_check_bool($marker.attr('infowindow'));
      if (infowindow_popup) {
        infowindow.open(map, marker);
      }
    }

  }

	/*
	*  sbvcgmap_center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

  function sbvcgmap_center_map(map) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each(map.markers, function (i, marker) {

      var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

      bounds.extend(latlng);

    });

    // only 1 marker?
    if (map.markers.length == 1) {
      // set center of map
      map.setCenter(bounds.getCenter());
      map.setZoom(map.zoom);
    } else {
      // fit to bounds
      map.fitBounds(bounds);
    }

  }

	/*
	*  sb_toggle_street_view
	*
	*  This function enable streetview for map
	*
	*  @type	function
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

  function sb_toggle_street_view(panorama) {
    var toggle = panorama.getVisible();
    if (toggle == false) {
      panorama.setVisible(true);
    } else {
      panorama.setVisible(false);
    }
  }


	/*
	*  document ready
	*
	*  This function will render each map when the document is ready (page has loaded)
	*
	*  @type	function
	*  @date	8/11/2013
	*  @param	n/a
	*  @return	n/a
	*/

  $(document).ready(function () {
    var map_counter = 1;
    $('.sbvcgmap-map').each(function () {

      $(this).attr('map-id', map_counter);

      var map_id = $(this).attr('map-id');
      sbvcgmap_markers[map_id] = new Array();
      sbvcgmap_maps[map_id] = new Array();
      sbvcgmap_panorama[map_id] = new Array();
      sbvcgmap_render_map($(this));

      map_counter++;

    });

  });

})(jQuery);


function sbvcgmap_open_marker(map_id, marker_id) {
  try {
    google.maps.event.trigger(sbvcgmap_markers[map_id][parseInt(marker_id) - 1], 'click');
  } catch (error) {
    console.log('Invalid map id or marker id...');
  }
}




