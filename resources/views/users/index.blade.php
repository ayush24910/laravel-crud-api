<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  
</head>
<body>
<div class="container">    
           <br />
           <div class="row input-daterange">
               <div class="col-md-3">
                   <input type="text" name="min_price" id="min_price" class="form-control" placeholder="Min Price" />
               </div>
               <div class="col-md-3">
                   <input type="text" name="max_price" id="max_price" class="form-control" placeholder="Max Price"  />
               </div>
               <div class="col-md-3">
                   <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                   <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
               </div>
           </div>
           <br />
        </body>
        </html>
        @extends('layouts.app')

        @section('content')
            {{$dataTable->table()}}
        @endsection
        
        @push('scripts')
            {{$dataTable->scripts()}}
        @endpush
<script>
    
    
     load_data();
    
     function load_data(min_price = '', max_price= '')
     {
      $('#order_table').DataTable({
       processing: true,
       serverSide: true,
       ajax: {
        url:'{{ route("users.index") }}',
        data:{from_date:from_date, to_date:to_date}
       },
       columns: [
        {
         data:'order_id',
         name:'order_id'
        },
        {
         data:'order_customer_name',
         name:'order_customer_name'
        },
        {
         data:'order_item',
         name:'order_item'
        },
        {
         data:'order_value',
         name:'order_value'
        },
        {
         data:'order_date',
         name:'order_date'
        }
       ]
      });
     }
    
     $('#filter').click(function(){
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      if(from_date != '' &&  to_date != '')
      {
       $('#order_table').DataTable().destroy();
       load_data(from_date, to_date);
      }
      else
      {
       alert('Both Date is required');
      }
     });
    
     $('#refresh').click(function(){
      $('#min_price').val('');
      $('#max_price').val('');
      $('#products').DataTable().destroy();
      load_data();
     });
    
    });
    </script>
    
