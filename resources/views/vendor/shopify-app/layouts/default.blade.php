<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('shopify-app.app_name') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://unpkg.com/turbolinks"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        @yield('styles')
    </head>

    <body>
        <div class="app-wrapper">
            <div class="app-content">
                <main role="main">
                    @include('shopify-app::partials\navbar')
                    @yield('content')
                </main>
            </div>
        </div>

        @if(config('shopify-app.appbridge_enabled'))
            <script src="https://unpkg.com/@shopify/app-bridge{{ config('shopify-app.appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
            <script>
                var AppBridge = window['app-bridge'];
                var createApp = AppBridge.default;
                var app = createApp({
                    apiKey: '{{ config('shopify-app.api_key') }}',
                    shopOrigin: '{{ Auth::user()->name }}',
                    forceRedirect: false,
                });
            </script>

            @include('shopify-app::partials.flash_messages')
        @endif

        @yield('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>