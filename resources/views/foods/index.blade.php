<div class="dashboard_graph">
	<div class="col-md-12">
	<div class="row x_title"><span class="pull-right"><i class="fa fa-plus"></i> <a href="{{url('foods/create-new')}}">Create-new</a></span></div>
		<table id="table_id" class="display">
		    <thead>
		        <tr>
		        <th>No</th>
       			<th>Name</th>
        		<th>price</th>
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


