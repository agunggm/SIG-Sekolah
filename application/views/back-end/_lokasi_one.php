  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Rincian Sekolah
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-sm-12 content" style="padding-left:10px;">
        <div class="panel">

          <div class="panel-body" style="border:1px solid #ddd;padding: 0;">
            <div id="map"></div>
            <script>
            function initMap(){
            <?php
            foreach($lo as $key => $value){ ?>
          var myCenter = new google.maps.LatLng(<?= $value['latittude'];?>, <?= $value['longitude'];?>);
          <?php  }?>
          var mapDiv = document.getElementById('map');
          var map = new google.maps.Map(mapDiv,{
            center : myCenter,
            zoom :17,
            zoomControl :true,
          });
          var marker = new google.maps.Marker({position: myCenter,});
          marker.setMap(map);
        }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAe5smDQ6VhcbIS1dm-aaMmn6mk_bDPELs&callback=initMap" type="text/javascript"></script>

          </div>
        </div>
      </div>
    </section>
    </div>
