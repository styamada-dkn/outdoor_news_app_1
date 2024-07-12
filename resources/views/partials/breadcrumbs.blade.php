<style>
    .breadcrumb {
        display: flex;
        font-size: 14px
    }
    .breadcrumb-item {
        list-style: none;
        margin-left: 12px;
        color: blue;
    }
    .breadcrumb-item.active {
        list-style: none;
        margin-left: 12px;
        color: black;
    }
</style>
@unless ($breadcrumbs->isEmpty())

    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}&nbsp;&nbsp;&gt;</a></li>
            @else
                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>

@endunless
