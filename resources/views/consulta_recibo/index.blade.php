
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta de recibos</title>

    <div class="card-footer">
        <div class="button-container">
            <a href="{{ route('home') }}" class="btn btn-sm btn.primary mr-3"> Volver </a>
        </div>
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <style>
	table thead{
	background: linear-gradient(to right, #267bdd, #456cee); 
	color:white;
	}
    </style>
</head>
<body>
    
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">consultas de recibo</h4>
                        <p class="card-category"></p>                      
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead class="thead">
                                    <tr>
										
                                        <th>Nombre</th>
										<th>Apellido</th>
										<th>piso</th>
                                        <th>apartamento</th>
                                        <th>Banco</th>
                                        <th>Referencia de la transacción</th>
                                        <th>PDF</th>
                                        <th>Fecha del pago</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($user as $users)
                                    @foreach ($users->tarjetas as $tarjeta)
                                    
                                        <tr>                                         
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->apellido }}</td>
                                            <td>{{ $users->apartamento }}</td>
                                            <td>{{ $users->piso }}</td>
                                            <td>{{$tarjeta->banco}}</td>
                                            <td>{{$tarjeta->referencia}}</td>
                                            <td>{{$tarjeta->PDF}}</td>
                                            <td>{{$tarjeta->dia}} /
                                                {{$tarjeta->mes}} / 
                                                {{$tarjeta->año}}</td>
                                            <td>{{$tarjeta->status}}  </td>                                        
                                        </div>
                                    @endforeach 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  

    <!-- searchPanes   -->
    <script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <!-- select -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  
    
    <script>
    $(document).ready(function(){
        $('#example').DataTable({
                searchPanes:{
                    cascadePanes:true,
                    dtOpts:{
                        dom:'tp',
                        paging:'true',
                        pagingType:'simple',
                        searching:true
                    }
                },
                
        });

    });
    </script>

</body>
</html>