<tr>
    @foreach($columns as $column)
        <td>{{
                $record->{$column->name}
            }}</td>
    @endforeach
</tr>