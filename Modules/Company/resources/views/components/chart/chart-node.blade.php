<li>
    <a href="#" onclick="onNodeClick({{$chart->id}})">
        <span class="border-bottom">{{ $chart->title }}</span>
        <br>
        <span>{{ $chart->user?->full_name }}</span>
    </a>

    @if ($chart->children->count())
        <ul>
            @foreach ($chart->children as $child)
                <x-company::chart.chart-node :chart="$child" />
            @endforeach
        </ul>
    @endif
</li>