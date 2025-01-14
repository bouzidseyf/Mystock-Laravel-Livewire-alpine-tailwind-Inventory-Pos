<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Supplier  : {{$provider['provider_name']}}</title>
      <link rel="stylesheet" href="{{asset('/print/pdfStyle.css')}}" media="all" />
   </head>

   <body>
      <header class="clearfix">
         <div id="logo">
         <img src="{{asset('/images/'.$setting['logo'])}}">
         </div>
        
         <div id="Title-heading">
               Supplier  : {{$provider['provider_name']}}
         </div>
         </div>
      </header>
      <main>
         <div id="details" class="clearfix">
            <div id="client">
               <table class="table-sm">
                  <thead>
                     <tr>
                        <th class="desc">Info fournisseur</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <div><strong>{{__('Name')}}:</strong> {{$provider['provider_name']}}</div>
                           <div><strong>{{__('Tax_number')}}:</strong> {{$provider['provider_ice']}}</div>
                           <div><strong>{{__('Phone')}}:</strong> {{$provider['phone']}}</div>
                           <div><strong>{{__('Purchase Total')}}:</strong> {{$provider['total_purchase']}}</div>
                           <div><strong>{{__('Total Amount')}}:</strong> {{$symbol}} {{$provider['total_amount']}}</div>
                           <div><strong>{{__('Total Paid')}}:</strong> {{$symbol}} {{$provider['total_paid']}}</div>
                           <div><strong>{{__('Due')}}:</strong> {{$symbol}} {{$provider['due']}}</div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div id="invoice">
               <table class="table-sm">
                  <thead>
                     <tr>
                        <th class="desc">Infos société</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <div id="comp">{{$setting['CompanyName']}}</div>
                           <div><strong>ICE:</strong>  {{$setting['CompanyTaxNumber']}}</div>
                           <div><strong>Adresse:</strong>  {{$setting['CompanyAdress']}}</div>
                           <div><strong>Téle:</strong>  {{$setting['CompanyPhone']}}</div>
                           <div><strong>{{__('Email')}}:</strong>  {{$setting['email']}}</div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div id="details_inv">
            <h3 style="margin-bottom:10px">
                  Tous les achats ( Non payé/Partiel )
            </h3>
            <table  class="table-sm">
               <thead>
                  <tr>
                     <th>{{__('Date')}}</th>
                     <th>REF</th>
                     <th>PAYE</th>
                     <th>DÛ</th>
                     <th>ETAT DE PAIEMENT</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($purchases as $purchase)
                  <tr>
                     <td>{{$purchase['date']}} </td>
                     <td>{{$purchase['Ref']}}</td>
                     <td>{{$symbol}} {{$purchase['paid_amount']}} </td>
                     <td>{{$symbol}} {{$purchase['due']}} </td>
                     <td>{{$purchase['payment_status']}} </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </main>
   </body>
</html>
