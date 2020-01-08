<div class="alert alert-{{ $type }} alert-dismissible fade show py-3" role="alert">
    <span class="font-weight-bold">{{ $title }}</span> {{ $slot }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
