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
        {{Form::open(array('url' => 'foods/update/'.$foods->idfoods, 'class' => 'form-horizontal'))}}
             <div class="x_content">
                <br />
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Name Foods<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="namefoods" name="namefoods" value="{{$foods->namefoods}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="namefoods" name="price" value="{{$foods->price}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Harga Dasar<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="namefoods" name="hargadasar" value="{{$foods->namefoods}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Laba<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="namefoods" name="laba" value="{{$foods->laba}}/{{$foods->images}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    @if($foods->images != NULL)
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="inputName"></label>
                        <div class="col-sm-10">
                            @if(is_null($foods->images))
                            -
                            @else
                            <img class="img-responsive" src="{{asset('foods_images')}}" width="300">
                            @endif
                        </div>
                    </div>
                    @endif


                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="description" rows="3"  class="form-control" required>{{$foods->description}}</textarea>
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