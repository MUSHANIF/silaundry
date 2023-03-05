<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
      <title>Laporan</title>
      <style>
         * {
            box-sizing: border-box;
         }

         .table {
            width: 100%;
            border-collapse: collapse;
            page-break-after: always;
         }

         .table td,
         .table th {
            text-align: center;
         }

         .table th {
            background-color: #4154F1;
            color: black;
         }

         .table tbody:nth-child(even) {
            background-color: #f5f5f5;
         }

         .title {
            color: #adadad;
            text-align: center;
         }

         .subtitle a {
            color: white;
            text-decoration: none;
            float: left;
            padding-top: 1px;
         }

         .subtitle a:hover {
            color: #dbd7e6;
            text-decoration: none;
         }

         .form-control {
         }

         .btn {
            background-color: #4154F1;
            color: white;
         }

         body {
            margin: 0;
         }
      </style>
   </head>
   <body>
      <div class="container">
        
         <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-self-center text-center">Laporan pdf </h2>
         
<table class="table mt-3" cellpadding="10" cellspace="0">
  
   
    <thead class="align-self-center text-center">
     
      <tr>
         <th>Kode invoces</th>
         <th>Nama paket</th>
         <th>Nama user</th>
         <th>tgl</th>
         <th>Batas waktu</th>
         <th>Total</th>
         <th>Status</th>
         
     </tr>
        
    </thead>
   
    @foreach ($selesai as $key )                                
    <tbody>
        <tr>
            <td>{{ $key->kode_invoce }}</td>
            <td>{{ $key->paket->name }}</td>
            <td>{{ $key->user->name }}</td>
            <td>{{ $key->tgl }}</td>
            <td>{{ $key->batas_waktu }}</td>
            <td>Rp.{{ $key->total }}</td>
            
            <td>
                @if ($key->status == 'Sudah selesai')
                <span class="badge bg-success">Sudah selesai</span>
                @else
                <span class="badge bg-danger">Belum selesai</span>
                @endif
                
            </td>
            
              
              
                
              
            
          
        </tr>
        <tr>
            <th colspan="20" class="text-right" >Total Keseluruhan biaya pemasukan: Rp. {{number_format($sum, 0, '', '.') }}</th>
           </tr>
    </tbody>
    @endforeach
   
   

</table>
			
      </div>
   </body>
</html>

      