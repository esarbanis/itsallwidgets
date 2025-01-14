<!doctype html>
<html lang="en">
<head>

    @if ($tracking_id)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $tracking_id }}"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ config('services.analytics.tracking_id') }}', { 'anonymize_ip': true });

        function trackEvent(category, action) {
            ga('send', 'event', category, action, this.src);
        }

        </script>
    @else
        <script>
        function gtag(){}
        </script>
    @endif

    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="description" content="@yield('description')">

    @include('feed::links')

    <meta property="og:title" content="@yield('title') | {{ config('app.name') }}">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image_url')?clear_cache=1">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:site_name" content="It's All Widgets!">

    <meta name="twitter:title" content="@yield('title') | {{ config('app.name') }}">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image_url')?clear_cache=2">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image:alt" content="@yield('title') | {{ config('app.name') }}">

    <meta charset="utf-8">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Overpass:200,400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bulma-extensions.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <script src="{{ asset('js/vue.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script defer src="{{ asset('js/fontawesome.js') }}"></script>

    <style>

    a {
        color: #368cd5;
    }

    .has-bg-img {
        background: url('/images/header_bg.jpg') center center; background-size:cover;
    }

    .has-bg-podcast-img {
        background: url('/images/header_podcast_bg.jpg') center center; background-size:cover;
    }

    .footer {
        padding: 7rem 1.5rem 7rem;
    }

    .is-head-font {
        font-family: 'Overpass', sans-serif;
        font-weight: 800;
        letter-spacing: 1px;
        vertical-align: bottom;
    }

    .is-body-font {
        font-family: 'Overpass', sans-serif;
    }

    .is-elevated {
        -moz-filter: drop-shadow(0px 16px 16px #CCC);
        -webkit-filter: drop-shadow(0px 16px 16px #CCC);
        -o-filter: drop-shadow(0px 16px 16px #CCC);
        filter: drop-shadow(0px 16px 16px #CCC);
    }

    @if (request()->is('podcast*') || isset($useBlackHeader))
        a.navbar-item:hover {
            background-color: #000 !important;
        }
    @endif

    .button.is-elevated-dark {
        color: white;
        @if (request()->is('podcast*') || isset($useBlackHeader))
            background-color:#000;
            border-color:#000;
        @else
            background-color:#5e60af;
            border-color:#5e60af;
        @endif
    }

    .button.is-elevated-dark:hover {
        @if (request()->is('podcast*') || isset($useBlackHeader))
            background-color:#060606;
            border-color:#060606;
        @else
            background-color:#6062b1;
            border-color:#5e60af;
        @endif
        -moz-filter: drop-shadow(0px 2px 4px #888);
        -webkit-filter: drop-shadow(0px 2px 4px #888);
        -o-filter: drop-shadow(0px 2px 4px #888);
        filter: drop-shadow(0px 2px 4px #888);
    }

    .is-elevated-dark {
        -moz-filter: drop-shadow(0px 1px 2px #777);
        -webkit-filter: drop-shadow(0px 1px 2px #777);
        -o-filter: drop-shadow(0px 1px 2px #777);
        filter: drop-shadow(0px 1px 2px #777);
    }

    .is-hover-elevated {
        -moz-filter: filter: drop-shadow(0px 16px 16px #CCC);
        -webkit-filter: filter: drop-shadow(0px 16px 16px #CCC);
        -o-filter: filter: drop-shadow(0px 16px 16px #CCC);
        filter: drop-shadow(0px 16px 16px #CCC);
        -webkit-transition : -webkit-filter 320ms;
        -moz-transition : -moz-filter 320ms;
        -o-transition : -o-filter 320ms;
        transition : filter 320ms;
    }

    .is-hover-elevated:hover {
        -moz-filter: filter: drop-shadow(0px 4px 6px #CCC);
        -webkit-filter: filter: drop-shadow(0px 4px 6px #CCC);
        -o-filter: filter: drop-shadow(0px 4px 6px #CCC);
        filter: drop-shadow(0px 4px 6px #CCC);
        -webkit-transition : -webkit-filter 320ms;
        -moz-transition : -moz-filter 320ms;
        -o-transition : -o-filter 320ms;
        transition : filter 320ms;
    }

    .is-slightly-elevated {
        -moz-filter: drop-shadow(0px 4px 2px #CCC);
        -webkit-filter: drop-shadow(0px 4px 2px #CCC);
        -o-filter: drop-shadow(0px 4px 2px #CCC);
        filter: drop-shadow(0px 4px 2px #CCC);
    }

    .has-text-centered {
        justify-content: center;
        align-items: center;
    }

    .is-vertical-center {
        display: flex;
        align-items: center;
    }

    .no-wrap {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .wrap {
        white-space: pre-wrap;
        word-wrap: break-word;
        font-family: inherit;
    }

    span.navbar-item,
    div.navbar-animate,
    .hero-body-animate .title,
    .hero-body-animate .subtitle,
    .hero-body-animate .button {
        visibility: hidden;
    }

    .hero-body .subtitle a:hover {
        border-bottom: 1px white dashed;
    }

    .footer .column a div {
        font-size: 15px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        word-break: break-all;
    }

    /* https://stackoverflow.com/a/22603610/497368 */
    .strike {
        display: block;
        text-align: center;
        overflow: hidden;
        white-space: nowrap;
    }

    .strike > span {
        position: relative;
        display: inline-block;
    }

    .strike > span:before,
    .strike > span:after {
        content: "";
        position: absolute;
        top: 50%;
        width: 230px;
        height: 1px;
        background: #dddddd;
    }

    .strike > span:before {
        right: 100%;
        margin-right: 15px;
    }

    .strike > span:after {
        left: 100%;
        margin-left: 15px;
    }

    .hero-body {
         padding: 5rem 1.5rem 5rem 1.5rem;
    }

    </style>

    <script>

    window.onerror = function (errorMsg, url, lineNumber, column, error) {
        try {
            $.ajax({
                type: 'GET',
                url: '{{ URL::to('log_error') }}',
                data: 'error=' + encodeURIComponent(errorMsg + ' | URL: ' + url + ' | Line: ' + lineNumber + ' | Column: '+ column)
                + '&url=' + encodeURIComponent(window.location)
            });
        } catch (exception) {
            // do nothing
        }

        return false;
    }

    $.fn.extend({
        animateCss: function(animationName, callback) {
            var animationEnd = (function(el) {
                var animations = {
                    animation: 'animationend',
                    OAnimation: 'oAnimationEnd',
                    MozAnimation: 'mozAnimationEnd',
                    WebkitAnimation: 'webkitAnimationEnd',
                };

                for (var t in animations) {
                    if (el.style[t] !== undefined) {
                        return animations[t];
                    }
                }
            })(document.createElement('div'));

            this.addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated ' + animationName);

                if (typeof callback === 'function') callback();
            });

            return this;
        },
    });

    $(function() {
        $('div.navbar-animate').addClass('animated tada').css('visibility', 'visible');
        $('.hero-body-animate .title, .hero-body-animate .subtitle, .hero-body-animate .button').addClass('animated fadeIn').css('visibility', 'visible');
        if (document.body.clientWidth > 1000) {
            $('span.navbar-item').addClass('animated slideInDown').css('visibility', 'visible');
        } else {
            $('span.navbar-item').css('visibility', 'visible');
        }

        // Check for click events on the navbar burger icon
        $(".navbar-burger").click(function() {

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");

        });
    })

    function trackBannerClick(eventSlug, isTwitter) {
        $.ajax({
            type: 'GET',
            url: '{{ url('/flutter-event-click') }}/' + encodeURIComponent(eventSlug) + '/' + (isTwitter ? 'twitter' : 'event'),
        });
    }

    </script>

    @yield('head')



</head>

<body>
    <section class="hero is-info is-head-font {{ request()->is('podcast*') || isset($useBlackHeader) ? 'has-bg-podcast-img' : 'has-bg-img' }}" style="background-color: {{ request()->is('podcast*') || isset($useBlackHeader) ? '#222' : '#3389d7' }};">
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <div class="navbar-animate">
                            <a href="{{ iawUrl() }}">
                                <img src="{{ asset('images/logo.png') }}" width="240" style="padding-top: 12px; padding-left: 12px;"/>
                            </a>
                        </div>
                        <span class="navbar-burger burger" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navMenu" class="navbar-menu">
                        <div class="navbar-end">
                            <span class="navbar-item has-text-centered">

                                @navigation()
                                @endnavigation

                                &nbsp;&nbsp;&nbsp;

                                @channels(['isPodcast' => request()->is('podcast*') || isset($useBlackHeader)])
                                @endchannels
                            </span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="hero-body hero-body-animate" style="padding-top:34px">
            <div class="container has-text-centered">
                <div class="subtitle" style="font-weight:200; font-size:18px;">
                    MADE WITH &nbsp;<i class="fas fa-heart" style="font-size:16px"></i>&nbsp; BY THE FLUTTER COMMUNITY <!-- <a href="https://twitter.com/hashtag/Flutter" target="_blank">FLUTTER COMMUNITY</a> -->
                </div>
                <div class="title" style="font-size:38px; padding-top:8px;">
                    @yield('header_title', 'An open list of apps built with Flutter')
                </div>
                <div class="subtitle" style="font-size:18px; padding-bottom:6px;">
                    @yield('header_subtitle', 'Feel free to add an app in progress and update it when it goes live')
                </div>
                @if (!request()->is('podcast*') || (auth()->check() && auth()->user()->is_admin))
                <a class="button is-elevated-dark" style="padding: 20px 32px 18px 32px"
                    href="@yield('header_button_url', url(auth()->check() ? 'submit' : 'auth/google?intended_url=submit'))">
                    <span class="icon">
                        <i class="@yield('header_button_icon', 'fas fa-cloud-upload-alt')"></i>
                    </span> &nbsp;
                    <span>@yield('header_button_label', 'SUBMIT APP')</span>
                </a>
                @endif
            </div>
        </div>
    </section>

    @if (session('warning'))
        <section class="hero is-light is-small">
            <div class="hero-body">
                <div class="container">
                    <div class="notification is-warning">
                        {{ session('warning') }}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (session('status'))
        <section class="hero hero-status is-light is-small">
            <div class="hero-body">
                <div class="container">
                    <div class="notification is-success">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        </section>

        <script>
        $(function() {
            setTimeout(function() {
                $('section.hero-status .notification').animateCss('animated fadeOut', function() {
                    $('section.hero-status').hide();
                });
            }, 3000);
        });
        </script>
    @endif

    @yield('content')

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <footer class="footer is-body-font">
        <div class="content has-text-centered">

            <img src="{{ asset('images/thank_you.png') }}" width="330"/>

            <p>
                <div style="font-size:16px; letter-spacing:2px; padding-bottom:6px; font-weight:600">
                    TO THE <a href="https://flutter.dev" target="_blank">FLUTTER</a> & <a href="https://www.dartlang.org/" target="_blank">DART</a> TEAMS
                </div>
                for this amazing platform!
            </p>

            <p style="padding-top:16px;">
                <div class="strike">
                   <span>FROM</span>
                </div>
            <p>

            <div class="columns is-gapless is-centered" style="padding-top:12px;">
                <div class="column is-offset-4 is-1">
                    <a href="https://twitter.com/hillelcoren" target="_blank">
                        <img src="{{ asset('images/img_hillel.png') }}" width="72"/><br/>
                        <div>@hillelcoren</div>
                    </a>
                </div><br/>
                @if (isIAW())
                    <div class="column is-1">
                        <a href="https://twitter.com/ThomasBurkhartB" target="_blank">
                            <img src="{{ asset('images/img_thomas.png') }}" width="72"/><br/>
                            <div>@ThomasBurkhartB</div>
                        </a>
                    </div><br/>
                    <div class="column is-1">
                        <a href="https://twitter.com/devangelslondon" target="_blank">
                            <img src="{{ asset('images/img_simon.png') }}" width="72"/><br/>
                            <div>@devangelslondon</div>
                        </a>
                    </div><br/>
                    <div class="column is-1">
                        <a href="https://twitter.com/scottstoll2017" target="_blank">
                            <img src="{{ asset('images/img_scott.png') }}" width="72"/><br/>
                            <div>@scottstoll2017</div>
                        </a>
                    </div><br/>
                @elseif (isFE())
                    <div class="column is-1">
                        <a href="https://twitter.com/Nash0x7E2" target="_blank">
                            <img src="{{ asset('images/img_nash.png') }}" width="72"/><br/>
                            <div>@Nash0x7E2</div>
                        </a>
                    </div><br/>
                    <div class="column is-1">
                        <a href="https://twitter.com/MendyMarcus" target="_blank">
                            <img src="{{ asset('images/img_mendy.png') }}" width="72"/><br/>
                            <div>@MendyMarcus</div>
                        </a>
                    </div><br/>
                @elseif (isFX())
                @elseif (isFC())
                @endif
            </div>

            <br/> &nbsp; <br/>

            @if (!request()->is('podcast*') || (auth()->check() && auth()->user()->is_admin))
            <a class="button is-elevated-dark" style="padding: 20px 32px 18px 32px"
                href="@yield('header_button_url', url(auth()->check() ? 'submit' : 'auth/google?intended_url=submit'))">
                <span class="icon">
                    <i class="@yield('header_button_icon', 'fas fa-cloud-upload-alt')"></i>
                </span> &nbsp;
                <span>@yield('header_button_label', 'SUBMIT APP')</span>
            </a>
            @endif
        </div>
    </footer>



</body>
</html>
