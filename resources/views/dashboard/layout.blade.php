<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>ADMIN</title>
      
    @include('dashboard.head')

    <body>
      <style type="text/css">
        .ava{
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }
        </style>

      <div id="app">
        <div class="content-wrapper">
        <div class="main-wrapper main-wrapper-1">
            @include('dashboard.header')

            @include('dashboard.sidebar')

            <!-- Main Content -->
            <div class="main-content">
            
              <section class="section">

              @yield('content')
              </section>
            </div>
            
            
          <footer class="main-footer">
            <div class="footer-right">
              Copyright &copy; 2021
            </div>
          </footer>
        </div>
      </div>
      
          @include('dashboard.footer')

    </body>
  </head>
</html>