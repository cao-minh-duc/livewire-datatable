<div>
    <div class="form-group">
        <select name="status" wire:model="filter.status">
            <option value=""></option>
            <option value="blank">Blank</option>
            <option value="finish">Finish</option>
        </select>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                @foreach($columns as $column)
                    @include('livewire-datatable::column-header', compact('column'))
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if($collection->isEmpty())
                <tr>
                    <td colspan="{{count($columns)}}">No data available in table</td>
                </tr>
            @endif
            @foreach($collection as $record)
                @include('livewire-datatable::record-row', [
                    'record' => $record,
                    'columns' => $columns
                ])
            @endforeach
        </tbody>
    </table>

    {{ !$is_pagination ? NULL : $collection->links() }}
</div>
