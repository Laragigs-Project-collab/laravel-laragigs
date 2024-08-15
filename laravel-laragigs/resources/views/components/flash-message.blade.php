@if(session('success'))
    <div x-data="{ show: true}" x-init="setTimeout(()=>show = false,3000)" x-show = "show" class="fixed top-0 left-1/2 rounded-2xl text-white px-48 py-3 transform -translate-x-1/2 bg-laravel">
        <p>
            {{session('success')}}
        </p>
    </div>
@endif
    