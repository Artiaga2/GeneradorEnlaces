<div class="tags">
    @foreach($enlace->tags->pluck('nombre')->toArray() as $tag)
        <span class="badge badge-info">{{ $tag }}</span>
    @endforeach
</div>