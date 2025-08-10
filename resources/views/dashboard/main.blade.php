<!doctype html>
<html lang="ru"> 
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Админ панель</title>   
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Dashboard" /> 
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('images/site.webmanifest') }}" />   
     @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif 
    @include('dashboard.css.index')  
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">   
    <div class="app-wrapper">     
      <nav class="app-header navbar navbar-expand bg-body">       
        <div class="container-fluid">         
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>           
          </ul>         
          <ul class="navbar-nav ms-auto"> 
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person"></i>
                <span class="d-none d-md-inline">{{auth()->user()->name}}</span>
              </a>            
            </li>           
          </ul>          
        </div>        
      </nav>      
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">    
        @include('dashboard.sidebar.index')      
      </aside>    
      
      <main class="app-main">        
        <div class="app-content-header">        
          <div class="container-fluid">           
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Админ панель</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">На главную</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Выйти из системы</a></li>
                </ol>
              </div>
            </div>        
          </div>        
        </div>


       
        <div class="app-content">
         
         @yield('content')
        </div>


    
      </main>
  
      <footer class="app-footer">Создано в рамках учебного проекта</footer>     
    </div>    
    @include('dashboard.scripts.index')    
  </body>  
</html>
