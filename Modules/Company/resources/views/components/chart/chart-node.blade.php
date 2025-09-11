<li>
    <a href="#" onclick="onNodeClick({{$chart->id}})">
        <span class="border-bottom">{{ $chart->title }}</span>
        @foreach ($chart->company_employees as $companyEmployee)
            <br>
            <span>{{ $companyEmployee->employee->full_name }} - {{$companyEmployee->shift->title}}</span>
        @endforeach
    </a>

    @if ($chart->children->count())
        <ul>
            @foreach ($chart->children as $child)
                <x-company::chart.chart-node :chart="$child" />
            @endforeach
        </ul>
    @endif
</li>