@if(Session::has('message'))
<div class="alert alert-{{ session('category') }}">
    {{ session('message') }}
</div>
@endif
@error('error')

@enderror
