<div class="dashboard_graph">
        <div class="col-md-12">
        <div class="row x_title"><span class="pull-right"><i class="fa fa-plus"></i> <a href="{{url('sellings/create-new')}}">Create-new</a></span></div>
            <table id="table_id" class="display">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>purchase order</th>
                    <th>price</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellings as $numb => $sell)
                    <tr>
                        <td>{{$numb+1}}</td>
                        <td>{{$sell->code}}</td>
                        <td>{{$sell->total}}</td>
                        <td>
                        <center>
                        <a href="{{url('/sellings/update/'.$sell->idsellings)}}"><i class="fa fa-pencil-square-o"></i></a>
                        </center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>		
        </div>
    </div>
    
    
    