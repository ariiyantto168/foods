<div class="dashboard_graph">
	<div class="col-md-12">
	<div class="row x_title"><span class="pull-right"><i class="fa fa-plus"></i> <a href="{{url('foods/create-new')}}">Create-new</a></span></div>
		<table id="table_id" class="display">
		    <thead>
		        <tr>
		        <th>No</th>
       			<th>Name</th>
                <th>price</th>
                <th>photos</th>
        		<th>status</th>
                <th></th>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach ($foods as $numb => $food)
            <tr>
                <td>{{$numb+1}}</td>
                <td>{{$food->namefoods}}</td>
                <td>{{$food->price}}</td>
                <td>
                    @if (is_null($food->images))
                      <label> - </label>
                    @else
                      <img class="img-rounded zoom" src="{{asset('foods_images')}}/{{$food->images }}" width="100">
                    @endif
                  </td>
                <td>
                <center>
                @if ($food->active)
                     <span class="label label-success">Actice</span>
                 @else
                    <span class="label label-danger">Inactive</span>
                @endif
                 </center>
                </td>
                <td>
                    <center>
                    <a href="{{url('/foods/update/'.$food->idfoods)}}"><i class="fa fa-pencil-square-o"></i></a>
                    </center>
                </td>
                
            </tr>
            @endforeach
		    </tbody>
		</table>		
	</div>
</div>


