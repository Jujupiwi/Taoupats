var Contact = function () {

    return {

        //Map
        initMap: function () {
            var map;
            $(document).ready(function () {
                map = new GMaps({
                    div: '#map',
                    lat: 43.6640797,
                    lng: 1.3042102
                });
                var marker = map.addMarker({
                    lat: 43.6640797,
                    lng: 1.3042102,
                    title: 'Loop, Inc.'
                });
            });
        }

    };
}();
