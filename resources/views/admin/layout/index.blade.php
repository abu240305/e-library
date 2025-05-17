<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-library</title>
  <link rel="shortcut icon" type="image/jpg" href="{{asset('../assets/images/logos/logo1.jpg')}}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{asset('../assets/css/styles.min.css')}}" />
</head>
<body>
    @include('admin.layout.sidebard')
    @include('admin.layout.header')
    @yield('content')
    @include('admin.layout.footer')
</body>
</html>