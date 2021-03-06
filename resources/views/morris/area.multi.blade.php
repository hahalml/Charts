@if(!$model->customId)
    @include('charts::_partials/titledDiv2-container')
@endif

<script type="text/javascript">
    $(function (){
        Morris.Area({
            element: "{{ $model->id }}",
            resize: true,
            data: [
                @for ($k = 0; $k < count($model->labels); $k++)
                    {
                        x: "{{ $l }}",
                        @for ($i = 0; $i < count($model->datasets); $i++)
                            s{{ $i }}: "{{ $model->datasets[$i]['values'][$k] }}",;
                        @endfor
                    },
                @endfor
            ],
            xkey: 'x',
            labels: [
                @foreach($model->datasets as $el => $ds)
                    "{{ $el }}",
                @endforeach
            ],
            ykeys: [
                @for($i = 0; $i < count($model->datasets); $i++)
                    "s{{ $i }}",
                @endfor
            ],
            hideHover: 'auto',
            parseTime: false,
            @if($model->colors)
                lineColors: [
                    @foreach($model->colors as $c)
                        "{{ $c }}",
                    @endforeach
                ],
            @endif
        })
    });
</script>
