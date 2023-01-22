@if (session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="alert alert-success fixed-top"
        style="left:50%; transform: translate(-50%);" role="alert">
        <div>{{ session('message') }}</div>
        <button type="button" class="btn-close" @click="show = false" aria-label="Close"></button>
    </div>
@endif
