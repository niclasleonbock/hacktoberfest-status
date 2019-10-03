<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="hacktoberfest, status, checker, tracker">
        <meta name="description" content="This little tool helps you to track your Hacktoberfest status">
        <meta property="og:title" content="Hacktoberfest Status Tracker" />
        <meta property="og:description" content="This little tool helps you to track your Hacktoberfest status" />
        <meta property="og:image" content="https://hacktoberfest.digitalocean.com/assets/HF19_social-744d976f227e4aff6866443abcede8c651b309ec9c7c9f7410f5944f8e1299b9.png" />

        <title>Hacktoberfest Status Tracker</title>

        <style>
            {{ file_get_contents(public_path('css/preload.css')) }}
        </style>
    </head>
    <body>
        <header class="banner banner--with-background banner--home">
            <div class="container container--header">
                <div class="container__content centered">
                    <div class="logo">
                        <img src="{{ asset('images/logo-2019.svg') }}" alt="Hacktoberfest Logo">
                    </div>

                    <h2>Error!</h2>
                    <p class="mt-30 description">Sorry, something unexpected happened.</p>
                    <p class="mb-10">
                        We have tracked this error and will try to resolve it as soon as possible.
                    </p>
                    <p class="mb-30">
                        In the meantime, you can try to reload the page and see if this fixes your problem.<br>
                        If you want you may also create an <a href="https://github.com/niclasleonbock/hacktoberfest-status/issues">issue</a>.
                    </p> 
                </div>
            </div>
        </header>

        <footer class="footer">
            <div class="container">
                <p class="mb-0 mt-20">This site is in no way affiliated with DigitalOcean, GitHub or the Hacktoberfest project. But it participates in the Hacktoberfest. So why not <a href="https://github.com/niclasleonbock/hacktoberfest-status">contribute on GitHub</a>?</p>
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
