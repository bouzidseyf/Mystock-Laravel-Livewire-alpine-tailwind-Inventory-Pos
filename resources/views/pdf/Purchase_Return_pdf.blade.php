<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{__('Return')}} _{{$return_purchase['Ref']}}</title>
      <link rel="stylesheet" href="{{asset('/print/pdfStyle.css')}}" media="all" />
   </head>

   <body>
      <header class="clearfix">
         <div id="logo">
         <img src="{{asset('/images/'.$setting['logo'])}}">
         </div>
         <div id="company">
            <div><strong> Date: </strong>{{$return_purchase['date']}}</div>
            <div><strong> Numéro: </strong> {{$return_purchase['Ref']}}</div>
            <div><strong> Réf d'achat: </strong> {{$return_purchase['purchase_ref']}}</div>
         </div>
         <div id="Title-heading">
            {{__('Return')}} {{$return_purchase['Ref']}}
         </div>
         </div>
      </header>
      <main>
         <div id="details" class="clearfix">
            <div id="client">
               <table class="table-sm">
                  <thead>
                     <tr>
                        <th class="desc">{{__('Supplier Info')}}</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <div><strong>Nom:</strong> {{$return_purchase['name']}}</div>
                           <div><strong>ICE:</strong> {{$return_purchase['tax_number']}}</div>
                           <div><strong>Téle:</strong> {{$return_purchase['phone']}}</div>
                           <div><strong>Adresse:</strong>   {{$return_purchase['adress']}}</div>
                           <div><strong>{{__('Email')}}:</strong>  {{$return_purchase['email']}}</div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div id="invoice">
               <table class="table-sm">
                  <thead>
                     <tr>
                        <th class="desc">{{__('Company Info')}}</th>
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
            <table class="table-sm">
               <thead>
                  <tr>
                     <th>{{__('PRODUCT')}}</th>
                     <th>{{__('UNIT COST')}}</th>
                     <th>{{__('QUANTITY')}}</th>
                     <th>{{__('DISCOUNT')}}</th>
                     <th>{{__('TAX')}}</th>
                     <th>{{__('TOTAL')}}</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($details as $detail)    
                  <tr>
                     <td>
                        <span>{{$detail['code']}} ({{$detail['name']}})</span>
                           @if($detail['is_imei'] && $detail['imei_number'] !==null)
                              <p>IMEI/SN : {{$detail['imei_number']}}</p>
                           @endif
                     </td>
                     <td>{{$detail['cost']}} </td>
                     <td>{{$detail['quantity']}}/{{$detail['unit_purchase']}}</td>
                     <td>{{$detail['DiscountNet']}} </td>
                     <td>{{$detail['taxe']}} </td>
                     <td>{{$detail['total']}} </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         <div id="total">
            <table>
               <tr>
                  <td>Taxe de commande</td>
                  <td>{{$return_purchase['TaxNet']}} </td>
               </tr>
               <tr>
                  <td>Remise</td>
                  <td>{{$return_purchase['discount']}} </td>
               </tr>
               <tr>
                  <td>Livraison</td>
                  <td>{{$return_purchase['shipping']}} </td>
               </tr>
               <tr>
                  <td{{__('Total')}}</td>
                  <td>{{$symbol}} {{$return_purchase['GrandTotal']}} </td>
               </tr>

               <tr>
                  <td>Montant paiement</td>
                  <td>{{$symbol}} {{$return_purchase['paid_amount']}} </td>
               </tr>

               <tr>
                  <td>Dû</td>
                  <td>{{$symbol}} {{$return_purchase['due']}} </td>
               </tr>
            </table>
         </div>
         <div id="signature">
            @if($setting['is_invoice_footer'] && $setting['invoice_footer'] !==null)
               <p>{{$setting['invoice_footer']}}</p>
            @endif
         </div>
      </main>
   </body>
</html>