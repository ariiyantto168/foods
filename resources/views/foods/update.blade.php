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

                    
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Images<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{-- <input type="file" id="images" name="images" value="{{$foods->images}}" class="form-control col-md-7 col-xs-12"> --}}
                            <img class="img-rounded zoom" id="img-upload" src="{{asset('foods_images')}}/{{$foods->images }}" width="50">
                          <small class="text-danger">size image max height:1000, width:1000 pixel</small>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#change-image">change</button>
                        </div>
                    </div>


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
        <div id="change-image" class="modal fade" role="dialog">
            <div class="modal-dialog">

                {{-- modal content --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Image</h4>
                    </div>
                    <div class="modal-body">
                        {{Form::open(array('url' => 'foods/change-image/'.$foods->idfoods, 'class' => 'form-horizontal','files' => 'true'))}}
                        <div class="row">
                            <div class="col-sm-10">
                                <small>Upload Image</small>
                                <input type="file" class="form-control" placeholder="Image" name="images" required>  
                            </div>
                        </div>
                           
                    </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input type="submit" value="Save" class="btn btn-success">
                        {{Form::close()}}
                    </div>
                </div>



            </div>

        </div>

        </div>
    </div>
</div>