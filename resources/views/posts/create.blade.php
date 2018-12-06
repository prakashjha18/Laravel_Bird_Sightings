@include('layouts.app')

@include('layouts.maps')



     <div class="container"> <h1>create your post</h1></div>
      <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="description" content="Display a moveable marker on a map">
    
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
  </head>
  <div class="container">
  <body>
    
    
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
          	 {{Form::label('title','Title')}}
          	 {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title' ])}}
          </div>
          <div class="form-group">
          	 {{Form::label('body','Body')}}
          	 {{Form::textarea('body','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'body text' ])}}
          </div>
          <div class="form-group">
             {{Form::label('species_name','Species Name')}}
             {{Form::text('species_name','',['class' => 'form-control', 'placeholder' => 'Species Name' ])}}
          </div>
          <div class="form-group">
             {{Form::label('number_sigh','Numbers Sighted')}}
             {{Form::text('number_sigh','',['class' => 'form-control', 'placeholder' => 'Total no. of birds sighted' ])}}
          </div>
          <div class="form-group">
             {{Form::label('location','location')}}
             {{Form::text('location','',['class' => 'form-control', 'placeholder' => 'location' ])}}
          </div>
          <div class="form-group">
             {{Form::label('lat','latitude')}}
             {{Form::text('lat','',['class' => 'form-control', 'placeholder' => 'latitude' ])}}
          </div>
          <div class="form-group">
             {{Form::label('lng','longitutde')}}
             {{Form::text('lng','',['class' => 'form-control', 'placeholder' => 'longitude' ])}}
          </div>
          <div class="form-group">
             {{Form::file('cover_image')}}
          </div>   
                    {{Form::submit('Submit',['Class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
      
<script>
  /**
 * Adds a  draggable marker to the map..
 *
 * @param {H.Map} map                      A HERE Map instance within the
 *                                         application
 * @param {H.mapevents.Behavior} behavior  Behavior implements
 *                                         default interactions for pan/zoom
 */
function addDraggableMarker(map, behavior){

  var marker = new H.map.Marker({lat:42.35805, lng:-71.0636});
  // Ensure that the marker can receive drag events
  marker.draggable = true;
  map.addObject(marker);

  // disable the default draggability of the underlying map
  // when starting to drag a marker object:
  map.addEventListener('dragstart', function(ev) {
    var target = ev.target;
    if (target instanceof H.map.Marker) {
      behavior.disable();
    }
  }, false);


  // re-enable the default draggability of the underlying map
  // when dragging has completed
  map.addEventListener('dragend', function(ev) {
    var target = ev.target;
    if (target instanceof mapsjs.map.Marker) {
      behavior.enable();
    }
    console.log(marker.getPosition())
    var laat = marker.getPosition().lat;
    var long = marker.getPosition().lng;
    console.log(laat)
    console.log(long)
    
    document.getElementById("lat").value=laat;
    document.getElementById("lng").value=long;
  }, false);

  // Listen to the drag event and move the position of the marker
  // as necessary
   map.addEventListener('drag', function(ev) {
    var target = ev.target,
        pointer = ev.currentPointer;
    if (target instanceof mapsjs.map.Marker) {
      target.setPosition(map.screenToGeo(pointer.viewportX, pointer.viewportY));
    }
  }, false);
}

/**
 * Boilerplate map initialization code starts below:
 */

//Step 1: initialize communication with the platform
var platform = new H.service.Platform({
  app_id: 'nuKYhHFJdh6NMK9M4duO',
  app_code: '5Wmq-x701tp2YWL76Zqnog',
  useCIT: true,
  useHTTPS: true
});
var defaultLayers = platform.createDefaultLayers();

//Step 2: initialize a map - this map is centered over Boston
var map = new H.Map(document.getElementById('map'),
  defaultLayers.normal.map,{
  center: {lat:42.35805, lng:-71.0636},
  zoom: 12
});

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Step 4: Create the default UI:
var ui = H.ui.UI.createDefault(map, defaultLayers, 'en-US');

// Add the click event listener.
addDraggableMarker(map, behavior);
</script>



















