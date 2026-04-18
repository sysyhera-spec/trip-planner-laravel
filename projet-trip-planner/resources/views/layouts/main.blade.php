<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>@yield('title', 'Trip Planner')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description', 'Trip Planner - application de planification de voyages')">

    {{--
      Template pédagogique : styles via CDN (Bulma / Font Awesome) pour éviter de rajouter de la configuration front
      (npm, Vite, Tailwind…) et rester focalisé sur Laravel / Blade / Eloquent.
    --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Cg fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cg stroke='%23fff' stroke-width='8'%3E%3Cpath d='M58 12 8 33l18 7 7 16 7-20 18-24z'/%3E%3Cpath d='M26 40 58 12'/%3E%3Cpath d='M8 33l18 7 7 16'/%3E%3C/g%3E%3Cg stroke='%23D33682' stroke-width='4'%3E%3Cpath d='M58 12 8 33l18 7 7 16 7-20 18-24z'/%3E%3Cpath d='M26 40 58 12'/%3E%3Cpath d='M8 33l18 7 7 16'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    <nav class="navbar py-4" role="navigation" aria-label="main navigation">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="/" title="Accueil">
            <span class="icon">
              <i class="fa-solid fa-map-location-dot" style="font-size:26px; width:26px"></i>
            </span>
            <span class="ml-2 has-text-weight-semibold">Trip Planner</span>
          </a>

          <a class="navbar-burger" role="button" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="/">Home</a>
            <a class="navbar-item" href="/trips">Voyages</a>
            <a class="navbar-item" href="/contact">Contact</a>
          </div>

          <div class="navbar-end">
            {{-- Optionnel: barre de recherche sur la page /trips --}}
            <div class="navbar-item">
              <form method="GET" action="/trips">
                <div class="field has-addons">
                  <div class="control">
                    <input class="input" type="search" name="q" placeholder="Rechercher un voyage" value="{{ request('q') }}">
                  </div>
                  <div class="control">
                    <button class="button" type="submit" aria-label="Rechercher">
                      <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </button>
                  </div>
                </div>
              </form>
            </div>

            {{-- Optionnel: liens auth (si Breeze installé) --}}
            {{--
            @auth
              <div class="navbar-item">Bonjour {{ auth()->user()->name }}</div>
              <div class="navbar-item">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="button is-light" type="submit">Logout</button>
                </form>
              </div>
            @else
              <a class="navbar-item" href="{{ route('login') }}">Login</a>
              <a class="navbar-item" href="{{ route('register') }}">Register</a>
            @endauth
            --}}
          </div>
        </div>
      </div>
    </nav>

    <section class="section">
      <div class="container">
        <div class="mb-6 columns is-multiline is-centered">
          <div class="column is-9 has-text-centered">
            <span class="has-text-grey-dark">@yield('subtitle', 'Planifiez vos voyages')</span>
            <h1 class="mt-2 mb-4 is-size-1 is-size-3-mobile has-text-weight-bold">
              @yield('header', 'Trip Planner')
            </h1>
            <p class="subtitle has-text-grey">
              @yield('description', 'Organisez destinations, activités, hébergements et budget en un seul endroit.')
            </p>
          </div>
        </div>

        @if (session('status'))
          <div class="notification is-success is-light">
            {{ session('status') }}
          </div>
        @endif

        @yield('content')

        {{-- Exemple de layout pour 3 voyages --}}
        {{--

        <div class="columns is-multiline">
        <div class="column is-4 mb-5">
        <span><small class="has-text-grey-dark">12 mar 2026 — 18 mar 2026</small></span>
        <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold">Lisbonne</h2>
        <p class="subtitle has-text-grey">6 jours / 2 personnes</p>
        <p class="subtitle has-text-grey">Budget estimé : 750€</p>
        <a href="#">Voir le détail</a>
        </div>
        <div class="column is-4 mb-5">
        <span><small class="has-text-grey-dark">02 avr 2026 — 10 avr 2026</small></span>
        <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold">Tokyo</h2>
        <p class="subtitle has-text-grey">9 jours / 1 personne</p>
        <p class="subtitle has-text-grey">Budget estimé : 2200€</p>
        <a href="#">Voir le détail</a>
        </div>
        <div class="column is-4 mb-5">
        <span><small class="has-text-grey-dark">15 mai 2026 — 22 mai 2026</small></span>
        <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold">Reykjavik</h2>
        <p class="subtitle has-text-grey">8 jours / 4 personnes</p>
        <p class="subtitle has-text-grey">Budget estimé : 3400€</p>
        <a href="#">Voir le détail</a>
        </div>
        </div>

        --}}
      </div>
    </section>

    <footer class="footer">
      <div class="content has-text-centered">
        <p>
          <strong>Trip Planner</strong> — Laravel — SQLite
        </p>
      </div>
    </footer>

    <script>
      // Burger menu Bulma
      document.addEventListener('DOMContentLoaded', () => {
        const burgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
        burgers.forEach((el) => {
          el.addEventListener('click', () => {
            const target = el.dataset.target;
            const $target = document.getElementById(target);
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');
          });
        });
      });
    </script>
  </body>
</html>