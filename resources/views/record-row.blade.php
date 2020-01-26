<tr>
    @foreach($columns as $column)
        
        
        
        @if(
            $record->{$column->name} instanceof \Illuminate\View\View
            || $record->{$column->name} instanceof \Illuminate\View\ViewFactoryInterface
        )
            <td>{!! $record->{$column->name}->render() !!}</td>
        @else
            <td>{{
                    $record->{$column->name}
                }}</td>
        @endif
    @endforeach
</tr>