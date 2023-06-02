<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">@yield('title')</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Inicio</a></li>
                        <li>@yield('title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->