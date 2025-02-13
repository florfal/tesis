@extends('layouts.main')

@section('title', 'Mapa')

@section('content')

<div style="display: flex; flex-direction: column; height: 100vh; margin: 0;">
    <!-- Mapa ocupa todo el alto disponible, sin espacio extra -->
    <div id="map" style="flex-grow: 1; width: 100%;"></div>
    
    <!-- Nav ahora está fuera del div del mapa -->
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
        key: "{{ env('AIzaSyDdpAhy1chmRwg6sBcmzBHA1O7RxUDgafY') }}",
        v: "weekly",
    });

    let map;

    async function initMap() {
        const { Map } = await google.maps.importLibrary("maps");

        map = new Map(document.getElementById("map"), {
            center: { lat: -34.5061803, lng: -58.5227185 }, // Ajusta según tu ubicación
            zoom: 12,
        });
    }

    initMap();
</script>

@endsection
