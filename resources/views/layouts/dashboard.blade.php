{{-- filepath: resources/views/layouts/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>UReporting | UBA</title>
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}">



  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/buttons.dataTables.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">


</head>

<body>
  <div class="main-wrapper">
    <div class="navbar-bg" style="background-color:#d51709"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
      <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
          </li>
        </ul>
      </form>
      <ul class="navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">
              {{ Auth::user()->name ?? 'Utilisateur' }}
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">
              PROFIL: {{ strtoupper(Auth::user()->role ?? 'Utilisateur') }}
            </div>
            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
              <i class="fas fa-user-cog"></i> Mon profil
            </a>
            <div class="dropdown-divider"></div>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item has-icon text-danger" style="width:100%;text-align:left;">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
              </button>
            </form>
          </div>
        </li>
      </ul>
    </nav>
  </div>
  </div>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">
          <img src="{{ asset('favicon.png') }}" height="20" class="mr-2"> UReporting
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">
          <img src="{{ asset('favicon.png') }}" height="20">
        </a>
      </div>

      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li>
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="fas fa-chart-pie"></i> <span>Tableau de bord</span>
          </a>
        </li>

        <li>
          <a href="{{ route('declaration.xml.index') }}" class="nav-link text-purple">
            <i class="fas fa-file-code"></i> <span>Génération XML</span>
          </a>
        </li>

        <li class="menu-header">Produit électronique</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-credit-card"></i> <span>MPS</span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('acquisition.create') }}" class="nav-link">Acquisition de cartes</a></li>
            <li><a href="{{ route('emission-cartes.create') }}" class="nav-link">Émission de cartes</a></li>
            <li><a href="{{ route('fraudechequecarte.create') }}" class="nav-link">Fraude chèque/carte</a></li>
            <li><a href="{{ route('incidentchequecarte.create') }}" class="nav-link">Incidents chèque/carte</a></li>
            <li><a href="{{ route('incidentpaiementcarte.create') }}" class="nav-link">Incidents paiement carte</a></li>
            <li><a href="{{ route('incidentpaiementcheque.create') }}" class="nav-link">Incidents paiement chèque</a></li>
            <li><a href="{{ route('reclamationchequecarte.create') }}" class="nav-link">Réclamations</a></li>
            <li><a href="{{ route('tarificationchequecarte.create') }}" class="nav-link">Tarification (carte & chèque)</a></li>
            <li><a href="{{ route('typologiecheque.create') }}" class="nav-link">Typologie chèques</a></li>
            <li><a href="{{ route('utilisationcarte.create') }}" class="nav-link">Utilisation carte</a></li>
            <li><a href="{{ route('utilisationcheque.create') }}" class="nav-link">Utilisation chèque</a></li>
          </ul>
        </li>

        <li class="menu-header">Produit de transfert rapide</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-exchange-alt"></i> <span>STRA</span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('risquestra.create') }}" class="nav-link">Risques STRA</a></li>
            <li><a href="{{ route('incidentstra.create') }}" class="nav-link">Incidents STRA</a></li>
            <li><a href="{{ route('ecosysteme.create') }}" class="nav-link">Écosystème STRA</a></li>
            <li><a href="{{ route('fraudestra.create') }}" class="nav-link">Fraudes STRA</a></li>
            <li><a href="{{ route('operationstra.create') }}" class="nav-link">Opérations STRA</a></li>
            <li><a href="{{ route('reclamationstra.create') }}" class="nav-link">Réclamations STRA</a></li>
            <li><a href="{{ route('annuairestra.create') }}" class="nav-link">Annuaire STRA</a></li>
          </ul>
        </li>
      </ul>
    </aside>
  </div>


  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      {{-- <div class="section-header">
        <h1>@ViewBag.Title</h1>
      </div> --}}
      <div class="section-body">
        @yield('content')
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="text-center">
      Copyright &copy; {{ now()->format('d/m/Y') }} {{-- Résultat : 17/06/2025 --}} <div class="bullet"></div> Designed
      By <strong>IT Benin Republic</strong>
    </div>
    <div class="footer-right">

    </div>
  </footer>

  </div>

</body>


<!-- General JS Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>

<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
<script>
  $(document).ready(function () {
    $('#myTable').DataTable();
  });
</script>
<script>
  $('.modal').appendTo("body")
</script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js')}}"></script>
<script src="{{ asset('assets/js/custom.js')}}"></script>

<script>
  $('#message').delay(5000).fadeOut('slow');
</script>

</html>