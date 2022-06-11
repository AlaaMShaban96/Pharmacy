
<div class="row "style="overflow: scroll;overflow: scroll;padding-left: 4%;padding-right: 6%;">

    <table class="table table-striped table-bordered">
        <tr class="bg-success">
            <td>@lang('health.U_Code')</td>
            <td>@lang('health.S_Code')</td>
            <td>@lang('health.Specialty')</td>
            <td>@lang('health.Supplier')</td>
            <td>@lang('health.Country')</td>
            <td>@lang('health.Brand_Name')</td>
            <td>@lang('health.Ingredients')</td>
            <td>@lang('health.Dosage')</td>
            <td>@lang('health.Form')</td>
            <td>@lang('health.Pack_size')</td>
            <td>@lang('health.Shelf_life')</td>
            <td>@lang('health.Agent')</td>
            <td>@lang('health.Currency')</td>
            <td>@lang('health.Purchase_price_INC')</td>
            <td>@lang('health.Purchase_LY')</td>
            <td>@lang('health.Selling_price_LY')</td>
            <td>@lang('health.margin')</td>
            <td>@lang('health.Supplier_status')</td>
            <td>@lang('health.Supplier_Reg_No')</td>
        </tr>
        <tbody>
            <tr class="bg-info">
                <td>{{$drug->atc}}</td>
                <td>{{$drug->code}}</td>
                <td>{{$drug->strata->name}}</td>
                <td>{{$drug->laboratory?$drug->laboratory->name:''}}</td>
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
                <td>{{$drug->laboratory?$drug->laboratory->status:''}}</td>
                <td>{{$drug->laboratory?$drug->laboratory->regNo:''}}</td>
            </tr>
        </tbody>
    </table>
</div>

