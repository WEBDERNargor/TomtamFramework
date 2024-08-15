@php
$admin_login=admin_check_login();

@endphp
@yield('php_code')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='{{images()}}/system/apple-touch-icon.png' size="180x180" rel="apple-touch-icon" />
    <link href='{{images()}}/system/favicon-32x32.png' size="32x32" rel="image/png" />
    <link href='{{images()}}/system/favicon-16x16.png' size="16x16" rel="image/png" />
    <link href='{{images()}}/system/favicon.ico' rel="ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/png" href="{{images()}}/system/favicon-32x32.png"/>  
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
     tailwind.config = {
        theme: {
          extend: {},
        },
        plugins: [],
      }
    </script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
   
    <link href="{{assets()}}/css/style.css"  rel="stylesheet" />
    <title>@yield('title') </title>
    @yield('header')

  </head>
  <body>

    






@include('admin.components.navbar')
@include('admin.components.sidebar')


@yield('content')


 
     
 
   
   
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{SSL}}/assets/ckeditor/ckeditor.js"></script>
     @php

    $jsfunctionpath = __DIR__.'/../js_function'; // เปลี่ยนเส้นทางให้เป็นโฟลเดอร์ที่เก็บไฟล์ .js
    $jsfunctionfiles = scandir($jsfunctionpath);
    foreach ($jsfunctionfiles as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'js') {
            echo '<script src="'.SSL.'/js_function/' . $file . '"></script>';
        }
    }
    
     @endphp
    <script>
      var SSL="{{SSL}}";
    </script>
      <script src="{{SSL}}/assets/js/script.js"></script>
    @yield('scripts')
  </body>
</html>

