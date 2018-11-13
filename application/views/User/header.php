<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FINDING MEMO 2018</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">
  <link rel="icon" type="image/ico" href="<?php echo base_url()?>assets/img/image.png">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//jqueryui.com/jquery-wp-content/themes/jqueryui.com/style.css">
  <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <style>
    th { white-space: nowrap; }
  </style>-->
 
   <style>
     html {zoom: 100%;}
  </style>
  <script>
    $( function() {
      $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
    } );
  </script>
  <script>
    function FormatCurrency(objNum)
    {
     var num = objNum.value
     var ent, dec;
     if (num != '' && num != objNum.oldvalue)
     {
       num = HapusTitik(num);
       if (isNaN(num))
       {
         objNum.value = (objNum.oldvalue)?objNum.oldvalue:'';
       } else {
         var ev = (navigator.appName.indexOf('Netscape') != -1)?Event:event;
         if (ev.keyCode == 190 || !isNaN(num.split('.')[1]))
         {
           alert(num.split('.')[1]);
           objNum.value = TambahTitik(num.split('.')[0])+'.'+num.split('.')[1];
         }
         else
         {
           objNum.value = TambahTitik(num.split('.')[0]);
         }
         objNum.oldvalue = objNum.value;
       }
     }
   }

   function HapusTitik(num)
   {
     return (num.replace(/\./g, ''));
   }

   function TambahTitik(num)
   {
     numArr=new String(num).split('').reverse();
     for (i=3;i<numArr.length;i+=3)
     {
       numArr[i]+='.';
     }
     return numArr.reverse().join('');
   } 
   
   function formatCurrency(num) {
     num = num.toString().replace(/\$|\./g,'');
     if(isNaN(num))
       num = "0";
     sign = (num == (num = Math.abs(num)));
     num = Math.floor(num*100+0.50000000001);
     cents = num0;
     num = Math.floor(num/100).toString();
     for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
       num = num.substring(0,num.length-(4*i+3))+'.'+
     num.substring(num.length-(4*i+3));
     return (((sign)?'':'-') + num);
   }

   $(document).ready(function() {
    $('#dataTable').DataTable( {
      "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
              return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
              i : 0;
            };

            // Total over all pages
            total = api
            .column( 5 )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 5, { 'search': 'applied'} )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 5 ).footer() ).html(
              '$'+pageTotal +' ( $'+ total +' total)'
              );
          }
        } );
  } );

   $(document).ready(function() {
     $("input[name='masknumber']").on("keyup", function(){
      $("input[name='number']").val(destroyMask(this.value));
      this.value = createMask($("input[name='number']").val());
    })

     function createMask(string){
      console.log(string)
      return string.replace(/(\d{2})(\d{3})(\d{2})/,"$1-$2-$3");
    }

    function destroyMask(string){
      console.log(string)
      return string.replace(/\D/g,'').substring(0, 8);
    }
  } );
</script>
</head>