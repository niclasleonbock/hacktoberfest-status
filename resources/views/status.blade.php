<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hacktoberfest Status Tracker</title>

        <style>
            {!! file_get_contents(public_path('css/preload.css')) !!}
        </style>
    </head>
    <body>
        <header class="banner banner--with-background">
            <div class="container container--header">
                <div class="container__content centered">
                    <img src="{{ asset('images/logo.svg') }}" alt="Hacktoberfest Logo">

                    <p class="mb-30 mt-30 description">This little tool helps you to track your <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest</a> status. Below you can see how far you have already come.</p>

                    <div class="user">
                        <img class="user__img" src="{{ $user->github_avatar }}" title="{{ $user->name }}" width="84">

                        <div class="user__info">
                            <h4 id="user__info__name"><a href="https://github.com/{{ $user->github_username }}">{{ $user->name }}</a></h4>

                            <div class="user__info__status">
                                {!! $prs->total_count >= 4 ? '<span class="complete">✔</span>' : '<span class="incomplete">✘</span>' !!} {{ $prs->total_count }} / 4 pull requests done
                            </div>
                        </div>
                    </div>

                    <a class="display--inline-block mt-30" href="{{ url('auth/signout') }}">Sign out</a>
                </div>
            </div>
        </header>

        <main>
            <div class="container content">
                @if ($prs->total_count == 0)
                    <div class="centered">
                        <h2 class="mb-0">Seems like you didn't even start yet.</h2>
                        <p class="description">
                            Why don't you get yourself some inspiration on the <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest website</a>?
                        </p>
                    </div>
                @else
                    @if ($prs->total_count >= 4)
                        <h2 class="mb-0 centered">Congrats, you're done!</h2>
                    @elseif ($prs->total_count == 1)
                        <h2 class="mb-0 centered">A good start, just keep doing.</h2>
                    @elseif ($prs->total_count == 2)
                        <h2 class="mb-0 centered">Half-time, keep doing.</h2>
                    @else
                      <h2 class="mb-0 centered">You're almost done.</h2>
                    @endif

                    <p class="description centered">
                        Your qualified pull requests:
                    </p>
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
                <p>This site is in no way affiliated with DigitalOcean, GitHub or the Hacktoberfest project.</p>
            </div>
        </footer>

        <script>
          // https://github.com/filamentgroup/loadCSS
          function css(e){var n=window.document.createElement("link"),t=window.document.getElementsByTagName("head")[0];n.rel="stylesheet",n.href=e,n.media="only x",t.parentNode.insertBefore(n,t),setTimeout(function(){n.media="all"},0)}
            css('{{ asset('css/app.css') }}');
        </script>
        <noscript>
          <!-- Let's not assume anything -->
          <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </noscript>
    </body>
</html>
