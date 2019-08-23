<section class="content-header">
    <h1>
        <small>Makan yuk sepuasnya</small>
     </h1>
        <ol class="breadcrumb" class="pull-right">
            <li><a href="{{url('/sellings')}}"><i class="fa fa-cutlery"></i>Foods</a>
            <li class="active"><i class="fa fa-plus"></i>Create New</a>
        </ol>
</section>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">
                <div class="row x_title">
            {{ Form::open(array('url' => 'sellings/update/'.$selling->idsellings, 'class' => 'form-horizontal')) }}
                 <div class="x_content">
                    <br />
                        <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="date">Date<span class="required">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control datepicker pull-right" name="date" id="date" data-date-format='yyyy-mm-dd' value="{{$selling->date}}" autocomplete="off" aria-readonly="true">
                                     </div>
                                </div>
                        </div>
    
                        <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="code">Code<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{$selling->code}}" class="form-control" readonly col-md-7 col-xs-12">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="total">Total<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="totalall" name="totalall" value="{{$selling->total}}" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Money<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="money" name="money" value="{{$selling->money}}"  required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Change<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="change"  name="change" value="{{$selling->change}}" onkeyup="change()" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                        <a class="pull-right btn btn-primary btn-xs" id="addRow"> <i class="fa fa-plus"></i> Add</a>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-7 col-offset-1">
                                <div class="table-responsive">
                                    <table class="table table-bordered " style="border: 2px solid #d2d6de !important;" id="table">
                                    <tbody>
                                        @php
                                         $no = 1;   
                                        @endphp

                            @foreach ($selling->sellings_details as $index => $sell)
                                    <tr>
                                        <td style="border: 1px solid #d2d6de !important; text-align:center ">
                                            <label>{{$index+1}}</label>
                                        </td>
                                        <input type="hidden" value="{{$sell->idsellingsdetails}}" id="idsellingsdetails_{{$index+1}}" name="idsellingsdetails[]">
                                        <td  style="border: 1px solid #d2d6de !important; ">
                                            <small><strong>Foods</strong></small>
                                            <select class="form-control select2" name="idfoods[]" id="idfoods_{{$index+1}}" onchange="passing_price({{$index+1}},this.value);">
                                              <option>- select Foods -</option>
                                              @php
                                                  $param = [];
                                              @endphp
                                              @foreach($foods as $food)
                                              @php
                                                $param[$food->idfoods] = $food->price;    
                                              @endphp
                                              <option value="{{$food->idfoods}}" @if ($food->idfoods == $sell->idfoods)
                                                  selected
                                              @endif>{{$food->namefoods}}</option>
                                             @endforeach
                                            </select>
                                          </td>
                                        <td  style="border: 1px solid #d2d6de !important; ">
                                            <small><strong>Quantity</strong></small>
                                            <input type="number" name="quantity[]" onkeyup="count_value(1)" value="{{$sell->quantity}}" class="form-control"  id="quantity_{{$index+1}}">
                                        </td>
                                        <td  style="border: 1px solid #d2d6de !important; ">
                                            <small><strong>Price</strong></small>
                                        <input type="number" class="form-control" id="price_{{$index+1}}" name="price[]" readonly value="{{$sell->foods->price}}" onkeyup="count_value(1)" readonly>
                                            </select>
                                          </td>
                                        <td  style="border: 1px solid #d2d6de !important; ">
                                            <small><strong>Total</strong></small>
                                        <input type="number" name="totalsendiri[]" class="form-control"  id="total_{{$index+1}}" readonly value="{{$sell->total}}" onkeyup="total(1)">
                                        </td>
                                    </tr>
                            @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                                <button class="btn btn-primary" type="button" onclick="hitung()" >hitung</button>
                                {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                                <button type="submit" value="save" class="btn btn-success" id="btn_save" disabled>Submit</button>
                            </div>
                        </div>
                 </div>
            {{Form::close()}}
                </div>
            </div>
        </div>
        {{-- box --}}
        <input type="hidden" id="appendindex" value="{{$selling->sellings_details->count()+1}}">
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
var makan = {!!json_encode($param)!!};
    // console.log(makan);

// looping namefood
var idfoods = '';
@foreach($foods as $food)
  idfoods += "<option value='{{$food->idfoods}}'>{{$food->namefoods}}</option>";
@endforeach
// console.log(idprice)

// delete row
$('#table').on('click', '.del' ,function() {
  $(this).closest('tr').remove();
});

// create table
$('#addRow').on('click',function(){
  var ais = $('#appendindex').val();
  $('#appendindex').val(parseInt(ais)+1);

  $('#table').append('<tr>'
      +'<td style="border: 1px solid #d2d6de !important; text-align:center">'
        +'<label>'+ais+'</label><br>'
        +'<input type="hidden" value="new" name="idsellingsdetails[]" id="idsellingsdetails">'
        +'<a class="btn btn-xs del"><i class="fa fa-trash" aria-hidden="true"></i></a>'
      +'</td style="border: 1px solid #d2d6de !important; ">'
      +'<td style="border: 1px solid #d2d6de !important; ">'
        +'<small><strong>Foods</strong></small>'
        +'<select class="form-control select2" onchange="passing_price('+ais+',this.value)" name="idfoods[]" id="idfoods_'+ais+'"> <option>- select foods -</option>'+idfoods+
        +'</select>'
      +'</td>'
      +'<td style="border: 1px solid #d2d6de !important; ">'
        +'<small><strong>Quantity</strong></small>'
        +'<input type="number" value="0" name="quantity[]" class="form-control"  id="quantity_'+ais+'" onkeyup="count_value('+ais+')" >'
      +'</td>'
      +'<td  style="border: 1px solid #d2d6de !important; ">'
        +'<small><strong>Price</strong></small>'
        +'<input class="form-control" name="price[]" id="price_'+ais+'" readonly value="0" onkeyup="count_value('+ais+')">'
      +'</td>'
      +'<td  style="border: 1px solid #d2d6de !important; ">'
      +'<small><strong>Total</strong></small>'
      +'<input type="number" name="totalsendiri[]" class="form-control" value="0"  id="total_'+ais+'" readonly onkeyup="total('+ais+')">'
      +'</td>'                                     
    +'</tr>'
    );
    // total()
});

function passing_price(id,val){
  $('#price_'+id).val(makan[val]);
  count_value(id);
  total();
  change();
}

function count_value(id){
  var qty = $('#quantity_'+id).val() || 0; 
  var price = $('#price_'+id).val() || 0;
  setTimeout(function(){
    var total = parseInt(qty) * parseInt(price);
    if(total > 0){
      $('#total_'+id).val(total);
    }else{
      $('#total_'+id).val(0);
    }
  }, 500);
  // console.log(y); 
  total();
  change();

}

function total(){
  var count_all = 0;
  var totalall = $('#appendindex').val();
  var money = $('#money').val();

  setTimeout(function(){
    for (var i = 1; i < totalall; i++) {
      var total = $('#total_'+i).val();
      if (typeof total !== 'undefined') {
        count_all += parseInt(total);
      }
      $('#totalall').val(count_all);
      change();
      
    }
  },500)
}

function change(){
  var money = $('#money').val();
  var totalall = $('#totalall').val();
  // console.log(money);
 
  setTimeout(function(){
    var change = parseInt(money) - parseInt(totalall);
  $('#change').val(change);   
  },500)

}
function hitung(){
  change();

  $('#btn_save').prop('disabled',false);
}
</script>

