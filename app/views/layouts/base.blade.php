<!DOCTYPE html>
<html lang="en">
    @include('includes.base.head')
    <body>
        <div class="container">
            <div class="row">
                <div class="span8">
                    @yield('content') 
                </div>
            </div>
        </div>

    </body>
    <footer>
        @include('includes.base.footer')
    </footer>
</html>