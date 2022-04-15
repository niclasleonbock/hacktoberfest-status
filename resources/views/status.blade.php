<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @if ($sharingMode)
            <meta property="og:title" content="Hacktoberfest Status of {{ $user->name }}" />
            <meta property="og:description" content="On this page you can see the Hacktoberfest stats of {{ $user->name }}." />
            <meta property="og:image" content="https://nyc3.digitaloceanspaces.com/hacktoberfest/Hacktoberfest17-TWFB-02.png" />
        @endif

        @include('partials.favicon')

        <title>{{ $sharingMode ? 'Hacktoberfest Status of ' . $user->name : 'Hacktoberfest Status Tracker' }}</title>

        <style>
            {!! file_get_contents(public_path('css/preload.css')) !!}
        </style>
    </head>
    <body>
    <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <header class="banner banner--with-background">
            <div class="container container--header">
                <div class="container__content centered">
                    <img src="{{ asset('images/logo.svg') }}" alt="Hacktoberfest Logo">

                    <p class="mb-30 mt-30 description">
                    @if ($sharingMode)
                        These are the <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest</a> stats of {{ $user->name }}.
                    @else
                        This little tool helps you to track your <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest</a> status. Below you can see how far you have already come.
                    @endif
                    </p>

                    <div class="user">
                        <img class="user__img" src="{{ $user->github_avatar }}" title="{{ $user->name }}" width="84">

                        <div class="user__info">
                            <h4 id="user__info__name"><a href="https://github.com/{{ $user->github_username }}">{{ $user->name }}</a></h4>

                            <div class="user__info__status">
                                {!! $prs->total_count >= 5 ? '<span class="complete">✔</span>' : '<span class="incomplete">✘</span>' !!} {{ $prs->total_count }} / 5 pull requests done
                            </div>
                        </div>
                    </div>

                    @if(Auth::check() && isset($message))
                        <div class="share mt-10">
                            <a class="twitter-share-button"
                               href="https://twitter.com/intent/tweet?text={{ $message }}&url={{ route('share', ['github_username' => $user->github_username]) }}&hashtags=Hacktoberfest"
                               target="_blank"
                            > Tweet</a>
                            <div class="fb-share-button" data-href="{{ route('share', ['github_username' => $user->github_username]) }}" data-layout="button" data-size="small" data-mobile-iframe="true"></div>
                        </div>
                        <a class="display--inline-block mt-30" href="{{ url('auth/signout') }}">Sign out</a>
                    @endif
                </div>
            </div>
        </header>

        <main>
            <div class="container content">
                @if ($prs->total_count == 0)
                    <div class="centered">
                        @if ($sharingMode)
                            {{ $user->name }} hasn't started yet. Sorry, nothing too see here.
                        @else
                            <h2 class="mb-0">Seems like you didn't even start yet.</h2>
                            <p class="description">
                                Why don't you get yourself some inspiration on the <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest website</a>?
                            </p>
                        @endif
                    </div>
                @else
                    @if (!$sharingMode)
                        @if ($prs->total_count >= 5)
                            <h2 class="mb-0 centered">Congrats, you're done!</h2>
                        @elseif ($prs->total_count == 1)
                            <h2 class="mb-0 centered">A good start, just keep doing.</h2>
                        @elseif ($prs->total_count == 2)
                            <h2 class="mb-0 centered">Almost halfway there, keep doing.</h2>
                        @elseif ($prs->total_count == 3)
                            <h2 class="mb-0 centered">Only 2 left, let's keep doing.</h2>
                        @else
                            <h2 class="mb-0 centered">You're almost done.</h2>
                        @endif
                        <p class="description centered">Your qualified pull requests:</p>
                    @else
                        <h3 class="mb-0 centered">{{ $user->name }}'s qualified pull requests:</h3>
                    @endif

                    <div class="summary">
                        <ul class="summary__list">
                            @foreach ($prs->items as $item)
                            <li class="summary__box">
                                <div class="summary__box__header">
                                    <h3>
                                        <a href="{{ $item->html_url }}" class="tooltip" data-title="{{ $item->title }}">{{ str_limit($item->title, 32) }}</a>
                                    </h3>
                                </div>
                                <p class="summary__box__meta">
                                    Created in <a href="{{ $item->repo->html_url }}" class="tooltip" data-title="{{ $item->repo->full_name }}">{{ $item->repo->name }}</a> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}.
                                </p>
                                <div class="summary__box__content">
                                    <p>{{ str_limit(strip_tags($item->body), 140) }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

        </main>

        <footer class="footer">
            <hr>
            <div class="container">
                <p>This site is in no way affiliated with DigitalOcean, GitHub or the Hacktoberfest project. But it participates in the Hacktoberfest. So why not <a href="https://github.com/niclasleonbock/hacktoberfest-status">contribute on GitHub</a>?</p>
            </div>
        </footer>

        <script>
          // https://github.com/filamentgroup/loadCSS
          function css(e){var n=window.document.createElement("link"),t=window.document.getElementsByTagName("head")[0];n.rel="stylesheet",n.href=e,n.media="only x",t.parentNode.insertBefore(n,t),setTimeout(function(){n.media="all"},0)}
            css('{{ asset('css/app.css') }}');
        </script>
        <script>
            // https://dev.twitter.com/web/javascript/loading
            window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));</script>
        <noscript>
          <!-- Let's not assume anything -->
          <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </noscript>
    </body>
</html>
