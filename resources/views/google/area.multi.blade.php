<script type="text/javascript">
    chart = google.charts.setOnLoadCallback(drawChart)

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            [
                'Element',
                @foreach($model->datasets as $el => $ds)
                    "{{ $el }}",
                @endforeach
            ],
            @for ($i = 0; $i < count($model->labels); $i++)
                [
                    "{{ $l }}",
                    @foreach($model->datasets as $el => $ds)
                        "{{ $ds['values'][$i] }}",
                    @endforeach
                ],
            @endfor
        ])

        var options = {
            @include('charts::_partials.dimension.js')
            fontSize: 12,
            @if($model->title)
                title: "{{ $model->title }}",
            @endif
            @if($model->colors)
                colors:[
                    @foreach($model->colors as $color)
                        "{{ $color}}",
                    @endforeach
                ],
            @endif
            legend: { position: 'top', alignment: 'end' }
        };

        var chart = new google.visualization.AreaChart(document.getElementById("{{ $model->id }}"))

        chart.draw(data, options)
    }
</script>

@if(!$model->customId)
    @include('charts::_partials.container.div')
@endif
