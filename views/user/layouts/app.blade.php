<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
    <link rel="stylesheet" href="{{SSL}}/node_modules/simplelightbox/dist/simple-lightbox.css"  />
    <link rel="stylesheet" href="{{assets()}}/css/style.css"  />
  </head>
  <body>

    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.cookie@1.4.1/jquery.cookie.min.js"></script>
   <script src="{{SSL}}/node_modules/simplelightbox/dist/simple-lightbox.jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('user.components.navbar')
    <div class="container mt-2">
        @yield('content')
    </div>
    @include('user.components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script  src="{{SSL}}/node_modules/editorjs-html/build/edjsHTML.browser.js"></script>
   
    @yield('scripts')
  </body>
</html>

