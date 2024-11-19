<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layoutsUsers.head')
    </head>
    <body>
        {{-- navbar --}}
        @include('layoutsUsers.navbar')
        
        {{-- sidebar --}}
        @include('layoutsUsers.sidebar')
        
        
        <div class="mani-wrapper">
        <div class="content-body">

            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    
      @include('layoutsUsers.footer')
</body>
</html>