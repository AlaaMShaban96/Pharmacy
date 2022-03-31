<div class="table-responsive">
    <table class="table" id="drugs-table">
        <thead>
        <tr>
            <th>Atc</th>
        <th>Name</th>
        <th>B G</th>
        <th>Ingredients</th>
        <th>Drug Dosage </th>
        <th>Company </th>
        <th>Price </th>

            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($drugs as $drug)
            <tr>
                <td>{{ $drug->ATC }}</td>
            <td>{{ $drug->name }}</td>
            <td>{{ $drug->B_G }}</td>
            <td>{{ $drug->ingredients }}</td>
            <td>{{ $drug->drugDosage->name }}</td>
            <td>{{ $drug->company->name }}</td>
            <td>{{ $drug->price  }}</td>

                <td width="120">
                    {!! Form::open(['route' => ['drugs.destroy', $drug->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('drugs.show', [$drug->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('drugs.edit', [$drug->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
