<div class="row">
    @if (false)
        <!-- Doctor Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('doctor_id', 'Doctor Id:') !!}
            {!! Form::select('doctor_id',$doctors, null, ['class' => 'form-control', 'placeholder' => 'Pick a Doctor Id...']) !!}
        </div>

    @else
        <input type="hidden" name="doctor_id" value="{{auth()->user()->id }}">
    @endif


    <!-- Drug Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('drug_id', 'Drug:') !!}
        {!! Form::select('', $drugsForSeclect, null, ['class' => ' select_search form-control','id'=>'code', 'placeholder' => 'Pick a Drug Id...']) !!}
    </div>

    @if (false)

        <!-- Price Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::number('price', null, ['class' => 'form-control','id'=>'price']) !!}
        </div>

    @else
        <input id="price" type="hidden" name="price" >
    @endif

    <!-- Quantity Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::number('', null, ['class' => 'form-control','id'=>'quantity']) !!}
    </div>

    <!-- For Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('for', 'For:') !!}
        {!! Form::text('for', null, ['class' => 'form-control','id'=>'for']) !!}
    </div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">drug</th>
            <th scope="col">quantity</th>
            <th scope="col">For</th>
            <th scope="col">Action</th>


          </tr>
        </thead>
        <tbody id="cars-table">

        </tbody>
    </table>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
@push('scripts')
<script type="text/javascript">

        var drugs=@json($drugs);
        setCode();
        $('#code').change(function(e) {
            setCode();
        });

        function setCode() {

            console.log(drugs,$('#code option:selected').text());
           var code=$('#code').val();
            drugs.forEach(element => {
                if (element.id==code) {
                    // $('#drug_id').data('selectize').setValue(element.id);
                    // $('#validity').val(element.validity);
                    $('#company_id').val(element.company_id);
                    $('#code').val(element.id);
                    $('#price').val(element.selling_price );
                }
            });
        }


    $('#add-new-drug').on('click', function(){
        if ($('#quantity').val()=="" ||$('#for').val() =="") {
            alert("I am an alert box!");
        } else {
            var row = createTR();
            $("#cars-table").prepend(row);
        }

    });

    function createTR(element,index) {
            return $(" <tr><th  class='col'><input type='hidden' name='drug_id[]' value='"+$('#code').val()+"'>"+$('#code option:selected').text()
                +"</th><td class='col' ><input type='hidden' name='quantity[]' value='"+$('#quantity').val()+"'>"+$('#quantity').val()
                +"</td><td class='col' ><input type='hidden' name='for[]' value='"+$('#for').val()+"'>"+$('#for').val()
                +"</td><td class='col' ><input type='hidden' name='price[]' value='"+$('#price').val()+"'><button onclick='onDelete(event)' type='button' class='btn btn-danger'>Delete</button></td><tr>");
        }
    function onDelete(event) {
        event.target.parentNode.parentNode.remove();
    }
  </script>
@endpush
