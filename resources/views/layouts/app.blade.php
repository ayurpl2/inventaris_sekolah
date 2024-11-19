<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
        <style>
            input.form-control,
            select.form-control {
                color: #333; /* Warna teks gelap */
                background-color: #fff; /* Latar belakang putih */
            }
        </style>

    </head>
    <body>
        {{-- navbar --}}
        @include('layouts.navbar')

        {{-- sidebar --}}
        @include('layouts.sidebar')


        <div class="mani-wrapper">
        <div class="content-body">

            <div class="container">
                @yield('content')

     </div>
        </div>
    </div>


      @include('layouts.footer')
</body>
</html>
