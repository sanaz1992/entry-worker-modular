<li>
    <a href="#" onclick="onNodeClick({{$chart->id}})">
        <span class="border-bottom">{{ $chart->title }}</span>

        {{-- @php
        $showName = $showUserNames;
        @endphp

        @foreach ($chart->users as $user)
        @if ($showName || $panel == 'company' || $user->id == auth()->id())
        @php $showName = true; @endphp
        <br><span>{{ $user->name }}</span>
        @if ($user->id == auth()->id())
        @break
        @endif
        @endif
        @endforeach --}}
    </a>

    @if ($chart->children->count())
        <ul>
            @foreach ($chart->children as $child)
                <x-company::chart.chart-node :chart="$child" />
            @endforeach
        </ul>
    @endif
</li>