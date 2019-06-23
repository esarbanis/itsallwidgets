@extends('master')

@section('title', 'Flutter Events')
@section('description', '')
@section('image_url', asset('images/background.jpg'))

@section('header_title', 'An Open List of Flutter Events')
@section('header_subtitle', 'Meeting with local Flutter developers is a great way to grow!')
@section('header_button_url', url('event/feed/json'))
@section('header_button_label', 'EVENT FEED')
@section('header_button_icon', 'fas fa-rss')


@section('head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
       integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
       crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
     integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
     crossorigin=""></script>

@endsection

@section('content')

    <style>

    #map { height: 400px; }

    .short-description {
        line-height: 1.5em;
        height: 4.2em;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
    }

    .flutter-event {
        background-color: white;
        border-radius: 8px;
    }

    .column {
        padding: 1rem 1rem 4rem 1rem;
    }

    </style>


    <script>

    $(function() {
        var planes = [

            @foreach ($events as $event)
            ['{{ $event->eventLink() }}<br/>{{ substr(strip_tags($event->description), 0, 150) }}...', {{ $event->latitude }}, {{ $event->longitude }}],
            @endforeach
        ];

        var map = L.map('map').setView([26, 0], 2);
        mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; ' + mapLink + ' Contributors',
                maxZoom: 18,
            }).addTo(map);

            for (var i = 0; i < planes.length; i++) {
                marker = new L.marker([planes[i][1],planes[i][2]])
                .bindPopup(planes[i][0])
                .addTo(map);
            }
        })

    </script>

<p>&nbsp;</p>
<p>&nbsp;</p>

<div class="container">

<div id="map"></div>

<br/>

<div class="columns is-multiline is-5 is-variable">
    @foreach ($events as $event)
        <div class="column is-one-third">
            <div class="flutter-event is-hover-elevated has-text-centered">

                <header style="padding: 16px">
                    <p class="no-wrap" style="font-size:22px; padding-bottom:10px;">
                        {{ $event->event_name }}
                    </p>
                    <div style="border-bottom: 2px #368cd5 solid; margin-left:40%; margin-right: 40%;"></div>
                </header>
                <div>{{ $event->prettyDate() }}</div>

                <div class="content" style="padding:16px;padding-bottom:16px;padding-top:20px;">

                    @if (auth()->check() && auth()->user()->owns($event))
                        <div style="font-weight:300">
                            <i class="fas fa-eye"></i> &nbsp; {{ $event->view_count ?: '0' }} views &nbsp;&nbsp;&nbsp;
                            <i class="fas fa-user"></i> &nbsp; {{ ($event->click_count + $event->twitter_click_count) ?: '0' }} clicks
                        </div><br/>
                    @endif

                    <div class="short-description">
                        @if (false && auth()->check() && auth()->user()->is_admin)
                            {!! $event->getBanner() !!}
                        @else
                            {{ preg_replace('/\s\s+/', ' ', strip_tags($event->description)) }}
                            <br/>
                        @endif
                    </div>

                    @if (auth()->check() && auth()->user()->is_admin)
                        <br/>
                        @if (! $event->is_approved)
                            <a class="button is-success is-medium is-slightly-elevated" href="{{ url('flutter-event/' . $event->slug . '/approve') }}">
    							<i style="font-size: 20px" class="fas fa-check"></i> &nbsp;
    							Approve
    						</a>
                            <!--
    						<a class="button is-danger is-medium is-slightly-elevated" href="{{ url('flutter-event/' . $event->slug . '/reject') }}">
    							<i style="font-size: 20px" class="fas fa-trash"></i> &nbsp;
    							Reject
    						</a>
                            -->
                        @endif

                    @else

                    @endif

                    <br/>
                    <div class="is-clearfix">
                        <!--
                        <div class="is-pulled-left" style="padding-left:20px;padding-top:10px;">
                            @if ($event->is_approved)
                                <div class="tag is-success">
                                    Approved
                                </div>
                            @else
                                <div class="tag is-warning">
                                    Pending
                                </div>
                            @endif
                        </div>
                        -->
                        <div classx="is-pulled-right">
                            <a href="{{ $event->event_url }}" class="button is-light is-small is-slightly-elevated" target="_blank">
                                <i class="fas fa-external-link-alt"></i> &nbsp; View
                            </a>
                            @if (auth()->check() && auth()->user()->owns($event))
                                &nbsp;
                                <a href="{{ $event->url() }}" class="button is-light is-small is-slightly-elevated">
                                    <i class="fas fa-edit"></i> &nbsp; Edit
                                </a>
                            @endif
                            @if ($event->is_approved)
                                &nbsp;
                                <a href="{{ $event->mapUrl() }}" target="_blank" class="button is-light is-small is-slightly-elevated">
                                    <i class="fas fa-map"></i> &nbsp; Map
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>

@stop
