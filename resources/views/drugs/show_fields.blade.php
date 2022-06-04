
<div class="row "style="overflow: scroll;overflow: scroll;padding-left: 4%;padding-right: 6%;">

    <table class="table table-striped table-bordered">
        <tr class="bg-success">
            <td>U-code</td>
            <td>S-code</td>
            <td>Specialty</td>
            <td>Supplier</td>
            <td>Country</td>
            <td>Brand name</td>
            <td>Ingredients</td>
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
                <td>{{$drug->ingredients}}</td>
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
</div>

