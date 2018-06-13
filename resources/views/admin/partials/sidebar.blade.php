<div class="sidebar col-3">

    <div class="section">
        <h3>Categorias</h3>
        <ul class="list-group">
            {{--@foreach($archives as $archive)--}}
                {{--<li class="list-group-item"><a href="/?month={{ $archive->month }}&year={{ $archive->year }}">--}}
                        {{--{{ $archive->month }} {{ $archive->year }} ({{ $archive->numberOfPosts  }})</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
        </ul>
    </div>
    <div class="section">
        <h3>Ultimos enlaces añadidos</h3>
        <ul class="list-group">

            @foreach($enlaces as $enlace)
                <li class="list-group-item"><a href="/enlaces/{{ $enlace->slug }}">{{ $enlace->titulo }}</a>

                </li>
            @endforeach
        </ul>
    </div>

    <div class="section">
        <h3>Best users</h3>
        <ul class="list-group">
            <li class="list-group-item">first</li>
            <li class="list-group-item">second</li>
            <li class="list-group-item">third</li>
            <li class="list-group-item">fourth</li>
            <li class="list-group-item">fifth</li>
        </ul>
    </div>
    <div class="section">
        <h3>Comments</h3>
        <ul class="list-group">
            <li class="list-group-item">first</li>
            <li class="list-group-item">second</li>
            <li class="list-group-item">third</li>
            <li class="list-group-item">fourth</li>
            <li class="list-group-item">fifth</li>
        </ul>
    </div>
</div>