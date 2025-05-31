<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>{{ $itembuku->judul }}</title>

  <link rel="stylesheet" href="{{ asset('dearflip/css/dflip.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('dearflip/css/themify-icons.min.css') }}" />
  
</head>
<body>

  <div class="_df_book" source="{{ asset('storage/bukus/' . $itembuku->buku) }}" ></div>

  <script src="{{ asset('dearflip/js/jquery.min.js') }}"></script>
  <script src="{{ asset('dearflip/js/pdf.min.js') }}"></script>
  <script src="{{ asset('dearflip/js/dflip.min.js') }}"></script>

  <script>
    jQuery(function($){
      const removeButtons = () => {
        $(' .df-ui-btn.ti-download, .df-ui-btn[title="Share"] ').remove();
      };

      // Jalankan setiap 500ms selama 5 detik (maks 10x)
      let intervalCount = 0;      
      const interval = setInterval(() => {
        removeButtons();
        intervalCount++;
        if (intervalCount > 10) clearInterval(interval);
      }, 500);
    });
  </script>

</body>
</html>
