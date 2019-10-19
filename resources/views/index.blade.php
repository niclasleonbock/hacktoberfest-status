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
        <meta property="og:image" content="https://nyc3.digitaloceanspaces.com/hacktoberfest/Hacktoberfest17-TWFB-02.png" />

        @include('partials.favicon')

        <title>Hacktoberfest Status Tracker</title>

        <style>
            {{ file_get_contents(public_path('css/preload.css')) }}
        </style>
    </head>
    <body>
        <header class="banner banner--with-background banner--home">
            <div class="container container--header">
                <div class="container__content centered">
                    <img src="{{ asset('images/logo.svg') }}" alt="Hacktoberfest Logo">

                    <p class="mb-30 mt-30 description">This little tool helps you to track your <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest</a> status.<br>Simply click "Authenticate using GitHub" and we'll do the rest for you.</p>

                    <a href="{{ url('/auth') }}" class="btn mt-30">Authenticate using GitHub</a>
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
	<meta property="og:image" content="https://nyc3.digitaloceanspaces.com/hacktoberfest/Hacktoberfest17-TWFB-02.png" />

	@include('partials.favicon')

	<title>Hacktoberfest Status Tracker</title>

	<style>
		{{ file_get_contents(public_path('css/preload.css')) }}
	</style>

	<style>
	/**
	 * Dark Mode
	 */

	.dark-mode-switcher {
		position: fixed;
		top: 30px;
		right: 50px;
	}

	.theme-switch-wrapper {
		display: flex;
		align-items: center;
	}
	
	.theme-switch-wrapper em {
		font-size: 1rem;
		margin-right: 10px;
		color: #fff;
	}

	.theme-switch-wrapper em:last-child {
		margin-left: 10px;
		margin-right: 0;
	}

	.theme-switch {
		display: inline-block;
		height: 34px;
		position: relative;
		width: 60px;
	}

	.theme-switch input {
		display:none;
	}

	.slider {
		background-color: #ccc;
		bottom: 0;
		cursor: pointer;
		left: 0;
		position: absolute;
		right: 0;
		top: 0;
		transition: .4s;
	}

	.slider:before {
		background-color: #fff;
		bottom: 4px;
		content: "";
		height: 26px;
		left: 4px;
		position: absolute;
		transition: .4s;
		width: 26px;
	}

	input:checked + .slider {
		background-color: #506680;
	}

	input:checked + .slider:before {
		transform: translateX(26px);
	}

	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}

	html[data-theme="dark"] header.banner--with-background{
		background: #081B33;
		transition: background 1s ease;
	}

	html[data-theme="dark"] body {
		color: #fff;
		transition: color 1s ease;
	}
	html[data-theme="dark"] footer,
	html[data-theme="dark"] main{
		background: #152642;
		transition: background 1s ease;
	}
	</style>
</head>
<body>

	<div class="dark-mode-switcher">
		<div class="theme-switch-wrapper">
			<em>Light</em>
			<label class="theme-switch" for="checkbox">
				<input type="checkbox" id="checkbox" />
				<div class="slider round"></div>
			</label>
			<em>Dark</em>
		</div>
	</div>

	<header class="banner banner--with-background banner--home">
		<div class="container container--header">
			<div class="container__content centered">
				<img src="{{ asset('images/logo.svg') }}" alt="Hacktoberfest Logo">
				<p class="mb-30 mt-30 description">This little tool helps you to track your <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest</a> status.<br>Simply click "Authenticate using GitHub" and we'll do the rest for you.</p>
				<a href="{{ url('/auth') }}" class="btn mt-30">Authenticate using GitHub</a>
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

	<script>
		/**
		 * Dark Mode
		 */
		const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
		const currentTheme = localStorage.getItem('theme');

		if (currentTheme) {
			document.documentElement.setAttribute('data-theme', currentTheme);

			if (currentTheme === 'dark') {
				toggleSwitch.checked = true;
			}
		}

		function switchTheme(e) {
			if (e.target.checked) {
				document.documentElement.setAttribute('data-theme', 'dark');
				localStorage.setItem('theme', 'dark');
			}
			else { document.documentElement.setAttribute('data-theme', 'light');
				localStorage.setItem('theme', 'light');
			}    
		}

		toggleSwitch.addEventListener('change', switchTheme, false);

		
	</script>
	<noscript>
		<!-- Let's not assume anything -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	</noscript>
	</body>
</html>