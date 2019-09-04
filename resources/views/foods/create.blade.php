<section class="content-header">
<h1>
    Foods
    <small>Master</small>
 </h1>
    <ol class="breadcrumb" class="pull-right">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Master</a>
        <li><a href="{{url('/foods')}}"><i class="fa fa-cutlery"></i>Foods</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
</section>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">
            <div class="row x_title">
        {{ Form::open(array('url' => 'foods/create-new', 'class' => 'form-horizontal', 'files' => 'true')) }}
             <div class="x_content">
                <br />
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Name Foods<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="namefoods" name="namefoods" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="price" name="price" onkeyup="count_value(1)" value="0"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Harga Dasar<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="hargadasar" name="hargadasar" onkeyup="count_value(1)" value="0" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Laba<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="laba" name="laba" onkeyup="laba(1)" value="0" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Images<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="images" name="images" class="form-control col-md-7 col-xs-12">
                          <small class="text-danger">size image max height:1000, width:1000 pixel</small>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="description" rows="3"  class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Status<span class="required">*</span>
                        </label>
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" name="active" checked> Active
                            </label>
                          </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" value="save" class="btn btn-success">Submit</button>
                        </div>
                    </div>
             </div>
        {{Form::close()}}
            </div>
        </div>
    </div>
</div>

<script>

function count_value(id)
{
      var price = $('#price').val() || 0; 
      var hargadasar = $('#hargadasar').val() || 0;
      setTimeout(function(){
        var laba = parseInt(price) - parseInt(hargadasar);
        if(laba > 0){
          $('#laba').val(laba);
        }else{
          $('#laba').val(0);
        }
      }, 500);
      // console.log(y); 

    
}


</script>