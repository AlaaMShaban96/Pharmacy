
<div class="row ">

    <table class="table table-striped table-bordered">
        <tr class="bg-success">
            <td>U-code</td>
            <td>S-code</td>
            <td>Specialty</td>
            <td>Supplier</td>
            <td>Country</td>
            <td>Brand name</td>
            <td>Dosage</td>
            <td>Form</td>
            <td>Pack size</td>
            <td>Shelf life</td>
            <td>Agent</td>
            <td>Currency</td>
            <td>Purchase price INC</td>
            <td>Purchase LY</td>
            <td>Selling price LY</td>
            <td>margin%</td>
            <td>Supplier status</td>
            <td>Supplier Reg No</td>
        </tr>
        <tbody>
            <tr class="bg-info">
                <td>{{$drug->atc}}</td>
                <td>{{$drug->code}}</td>
                <td>{{$drug->strata->name}}</td>
                <td>{{$drug->laboratory->name}}</td>
                <td>{{$drug->country->name}}</td>
                <td>{{$drug->name}}</td>
                <td>{{$drug->drugDosage->name}}</td>
                <td>{{$drug->route->name}}</td>
                <td>{{$drug->package->name}}</td>
                <td>{{$drug->b_g}}</td>
                <td>{{$drug->company->name}}</td>
                <td>{{$drug->currency->name}}</td>
                <td>{{$drug->price}}</td>
                <td>{{$drug->price*$drug->currency->price}}</td>
                <td>{{$drug->selling_price}}</td>
                <td>{{((($drug->price*$drug->currency->price)/$drug->selling_price)*100).'%'}}</td>
                <td>{{$drug->laboratory->status}}</td>
                <td>{{$drug->laboratory->regNo}}</td>
            </tr>
        </tbody>
    </table>
        {{-- <!-- Atc Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('atc', 'Atc:') !!}
        <p>{{ $drug->atc }}</p>
    </div>

    <!-- Name Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('name', 'Name:') !!}
        <p>{{ $drug->name }}</p>
    </div>

    <!-- B G Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('b_g', 'B G:') !!}
        <p>{{ $drug->b_g }}</p>
    </div>

    <!-- Ingredients Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('Ingredients', 'Ingredients:') !!}
        <p>{{ $drug->ingredients }}</p>
    </div>

    <!-- Drug Dosage Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('drug_dosage', 'Drug Dosage:') !!}
        <p>{{ $drug->drugDosage->name }}</p>
    </div>

    <!-- Company Id Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('company_id', 'Company Id:') !!}
        <p>{{ $drug->company->name }}</p>
    </div>

    <!-- Price Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('price', 'Price:') !!}
        <p>{{ $drug->price }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $drug->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $drug->updated_at }}</p>
    </div> --}}
</div>

