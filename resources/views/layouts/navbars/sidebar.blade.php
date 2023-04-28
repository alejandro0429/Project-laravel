<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      <i><img style="width:145px" src="{{ asset('/img/condominioOnce.png') }}"></i>
      {{ __('') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('inicio') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('/img/laravel.svg') }}"></i>
          <p>{{ __('Pagos') }}
            <b class="caret"></b>
          </p>
        </a>
        {{-- PAGOS --}}
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            {{-- PAGOS DEL USUARIO--}}
            <li class="nav-item{{ $activePage == 'bancos' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('tarjeta')}}">
                <span class="material-icons"> paid </span>
                <span class="material"> {{ __('Pagar') }} </span>
              </a>
            </li>
            {{-- LISTA DE PAGOS --}}
            <li class="nav-item{{ $activePage == 'movimientos' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('movimiento')}}">
                <span class="material-icons"> account_balance </span>
                <span class="material">{{ __('Movimientos'), 'mt-3'}} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index')}}">
          <i class="material-icons">content_paste</i>
            <p>usuarios</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'retraso' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('retraso')}}">
          <i class="material-icons">library_books</i>
            <p>retraso de pagos</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'consulta_recibo' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('consulta_recibo.index')}}">
          <i class="material-icons">fact_check</i>
          <p>{{ __('Consulta de recibo') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('tarjeta.create')}}">
          <i class="material-icons">Retrasos de pago</i>
            <p>{{ __('Retrasos de pago') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'morosidad' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('morosidads.index')}}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Morosidad') }}</p>
        </a>
      </li>
      {{---<li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li-->---}}
    </ul>
  </div>
</div>
