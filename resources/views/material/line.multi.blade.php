<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']})

    google.charts.setOnLoadCallback(drawChart)

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            [
                'Element',
                @foreach($model->datasets as $el => $ds)
                    "{{ $el }}",
                @endforeach
            ],

            @php($i = 0)
            @foreach($model->labels as $l)
                [
                    "{{ $l }}",
                    @foreach($model->datasets as $el => $ds)
                        "{{ $ds['values'][$i] }}",
                    @endforeach
                ],
                @php($i++)
            @endforeach

      ])

    var options = {
        chart: {
            @if($model->title)
                title: "{{ $model->title }}",
            @endif
        },
        @if($model->colors)
            colors: [
                @foreach($model->colors as $c) {
                  "{{ $c }}",
                }
            ],
        @endif
    };

    var chart = new google.charts.Line(document.getElementById("{{ $model->id }}"))

    chart.draw(data, options)
}
</script>

<div @include('charts::_partials.dimension.css') id="{{ $model->id }}"></div>
