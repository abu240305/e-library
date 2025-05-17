<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>{{$itembuku->judul}}</title>

  <link rel="stylesheet" href="{{ asset('dearflip/css/dflip.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('dearflip/css/themify-icons.min.css') }}" />
</head>
<body>

  <div class="_df_book" source="{{ asset('storage/bukus/' . $itembuku->buku) }}"></div>



<script src="{{ asset('dearflip/js/jquery.min.js') }}"></script>
<script src="{{ asset('dearflip/js/pdf.min.js') }}"></script>
<script src="{{ asset('dearflip/js/dflip.min.js') }}"></script>

</body>
</html>
