@if(!$model->customId)
    @include('charts::_partials/titledDiv2-container')
@endif

<script type="text/javascript">
    $(function (){
        Morris.Donut({
            element: "{{ $model->id }}",
            resize: true,
            data: [
                @for($i = 0; $i < count($model->values); $i++)
                    {
                        label: "{{ $model->labels[$i] }}",
                        value: "{{ $model->values[$i] }}"
                    },
                @endforeach
            ],
            @if($model->colors) {
                colors: [
                    @foreach($model->colors as $c)
                        "{{ $c }}",
                    @endforeach
                ]
            @endif
        })
    });
</script>

