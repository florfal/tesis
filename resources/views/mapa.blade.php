@extends('layouts.main')

@section('title', 'Mapa')

@section('content')

<div style="display: flex; flex-direction: column; height: 100vh; margin: 0;">
    <!-- aca manejamos las dimensiones del mapa -->
    <div id="map" style="flex-grow: 1; width: 100%;"></div>
    
    <x-nav></x-nav>  
</div>

<script>
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API",
            c = "google",
            l = "importLibrary",
            q = "__ib__",
            m = document,
            b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
            r = new Set,
            e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a);
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })({
        key: "{{ config('services.google_maps.key') }}",
        v: "weekly",
    });

    let map;

    async function initMap() {
        // Carga la librería de Maps
        await google.maps.importLibrary("maps");

        const mapOptions = {
            center: { lat: -34.6037, lng: -58.3816 }, // Centrado en CABA
            zoom: 13,
            styles: [
                { featureType: "poi", stylers: [{ visibility: "off" }] },
                { featureType: "transit", stylers: [{ visibility: "off" }] },
                { featureType: "road", elementType: "labels.icon", stylers: [{ visibility: "off" }] }
            ],
        };

        map = new google.maps.Map(document.getElementById("map"), mapOptions);

        const iconUrl = "/img/eventos/evento.png"; //esto es para el dibujito de los iconos

        // Ubicación del usuario
        if (navigator.geolocation) {
            const watchId = navigator.geolocation.watchPosition(
                (position) => {
                    const userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    if (window.userLocationMarker) {
                        window.userLocationMarker.setMap(null);
                    }
                    if (window.userAccuracyCircle) {
                        window.userAccuracyCircle.setMap(null);
                    }

                    window.userAccuracyCircle = new google.maps.Circle({
                        strokeColor: '#4285F4',
                        strokeOpacity: 0.3,
                        strokeWeight: 1,
                        fillColor: '#4285F4',
                        fillOpacity: 0.1,
                        map: map,
                        center: userLocation,
                        radius: position.coords.accuracy || 100
                    });

                    window.userLocationMarker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: "Tu ubicación",
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: 8,
                            fillColor: '#4285F4',
                            fillOpacity: 1,
                            strokeColor: '#ffffff',
                            strokeWeight: 2,
                            strokeOpacity: 1
                        },
                        zIndex: 1000
                    });

                    const userInfoWindow = new google.maps.InfoWindow({
                        content: `
                            <div style="max-width: 200px;">
                                <strong>Tu ubicación aproximada</strong><br>
                                <small>Lat: ${userLocation.lat.toFixed(6)}, Lng: ${userLocation.lng.toFixed(6)}</small>
                            </div>
                        `
                    });

                    window.userLocationMarker.addListener("click", () => {
                        userInfoWindow.open(map, window.userLocationMarker);
                    });

                    if (!window.userLocationCentered) {
                        map.setCenter(userLocation);
                        window.userLocationCentered = true;
                    }
                },
                (error) => {
                    console.warn("Error al obtener la ubicación del usuario:", error.message);
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            console.warn("El usuario denegó el permiso de geolocalización");
                            break;
                        case error.POSITION_UNAVAILABLE:
                            console.warn("La información de ubicación no está disponible");
                            break;
                        case error.TIMEOUT:
                            console.warn("La solicitud de ubicación expiró");
                            break;
                        default:
                            console.warn("Error desconocido al obtener la ubicación");
                            break;
                    }
                },
                {
                    enableHighAccuracy: true,
                    timeout: 15000,
                    maximumAge: 5000
                }
            );

            window.geolocationWatchId = watchId;
        } else {
            console.warn("La geolocalización no es compatible con este navegador");
        }

        // Cargar ubicaciones de eventos desde la API
        fetch("{{ url('/api/ubicaciones') }}")
            .then(response => response.json())
            .then(ubicaciones => {
                ubicaciones.forEach(ubicacion => {
                    const marker = new google.maps.Marker({
                        position: { 
                            lat: parseFloat(ubicacion.lat), 
                            lng: parseFloat(ubicacion.lng) 
                        },
                        map: map,
                        title: ubicacion.nombre,
                        icon: {
                            url: iconUrl,
                            scaledSize: new google.maps.Size(32, 32)
                        },
                    });

                    const infoWindow = new google.maps.InfoWindow({
                        content: `
                            <div style="max-width: 250px;">
                                <strong>${ubicacion.nombre}</strong><br>
                                <em>${ubicacion.direccion}</em><br>
                                <p>${ubicacion.descripcion ?? 'Sin descripción'}</p>
                            </div>
                        `
                    });

                    marker.addListener("click", () => {
                        infoWindow.open(map, marker);
                    });
                });
            })
            .catch(error => console.error("Error al cargar ubicaciones:", error));
    }

    // Inicializar mapa cuando esté disponible
    window.initMap = initMap;
    initMap();
</script>

@endsection
