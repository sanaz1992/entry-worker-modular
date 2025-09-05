<tr>
    <td>{{$chart->user->full_name}}</td>
    <td> {{$chart->created_at_jalali}} </td>
    <td>{{$chart->deleted_at_jalali}}</td>
</tr>
<?php $refrence = $chart->refrence; ?>
@if($refrence)
    @include('company::livewire.admin.partials.chart-refrence-tr', ['chart' => $refrence])
@endif