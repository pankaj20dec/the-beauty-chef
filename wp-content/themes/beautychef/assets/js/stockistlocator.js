function smallestDistance(t, e, a, s) {
    Number.prototype.toRad = function() {
        return this * Math.PI / 180
    };
    var o = 6371,
        i = a - t,
        n = i.toRad(),
        r = s - e,
        l = r.toRad(),
        c = Math.sin(n / 2) * Math.sin(n / 2) + Math.cos(t.toRad()) * Math.cos(a.toRad()) * Math.sin(l / 2) * Math.sin(l / 2),
        d = 2 * Math.atan2(Math.sqrt(c), Math.sqrt(1 - c)),
        m = o * d;
    return m
}

function showLocationDetails(t) {
    $(".data-stockist-details").removeClass("show"), $('.data-stockist-details[data-stockist-id="' + t + '"]').addClass("show");
    $(".stockist-list a").addClass("inactive"), $('.stockist-list a[data-stockist-id="' + t + '"]').removeClass("inactive");
}

function initialize() {
    function t(t) {
        var e = new google.maps.Geocoder;
        GeocoderRequest = {
            address: t + ", Australia"
        }, e.geocode(GeocoderRequest, function(e, a) {
            if (a == google.maps.GeocoderStatus.OK) {
                for (s.setCenter(e[0].geometry.location), s.setZoom(14), i = 0; i < markers.length; i++) {
                    var o = smallestDistance(e[0].geometry.location.lat(), e[0].geometry.location.lng(), markers[i][1], markers[i][2]);
                    markers[i][4] = o, displaypc.innerHTML = t
                }
                for (markers.sort(function(t, e) {
                        return t[4] - e[4]
                    }), i = 0; i < markers.length; i++) console.log(i + " " + markers[i][0] + "|  " + markers[i][4]), $(stockistList).append($('.data-stockist-btn[data-stockist-id="' + markers[i][3] + '"]'))
            } else console.log("Geocode was not successful for the following reason: " + a)
        })
    }
    var e = new google.maps.LatLng(-33.8573434, 151.1934192),
        a = {
            zoom: 10,
            center: e,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
            },
            styles: styles
        },
        s = new google.maps.Map(document.getElementById("stockistmap"), a),
        o = themePath + "/_assets/images/icon-marker.svg";
        o = "";
    for (i = 0; i < markers.length; i++) marker = new google.maps.Marker({
        position: {
            lat: markers[i][1],
            lng: markers[i][2]
        },
        map: s,
        title: markers[i][3],
        icon: o
    }), google.maps.event.addListener(marker, "click", function(t, e) {
        return function() {
            showLocationDetails(this.title)
        }
    }(marker, i));
    t("2000"), $("#postcodesearch").submit(function(e) {
        e.preventDefault();
        var a = $("#postcode").val();
        t(a)
    }), $(".data-stockist-btn").click(function(t) {
        t.preventDefault();
        var e = $(this).attr("data-stockist-id"),
            a = parseFloat($(this).attr("data-lat")),
            o = parseFloat($(this).attr("data-lng"));
        showLocationDetails(e), s.setCenter(new google.maps.LatLng(a, o)), s.setZoom(20)
    })
}
var styles = [{
        stylers: [{
            saturation: -100
        }, {
            lightness: 39
        }, {
            gamma: .71
        }]
    }],
    stockistList = document.getElementById("stockist-list"),
    displaypc = document.getElementById("displaypc");
	
$(".data-stockist-btn").click(function(t) {
    t.preventDefault();
    var e = $(this).attr("data-stockist-id");
    showLocationDetails(e)
}), google.maps.event.addDomListener(window, "load", initialize), google.maps.event.addDomListener(window, "resize", initialize);