$(document).ready(function(){

    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
  	});
    $("#delete_row").click(function(){
    	if(i>1){    	
    		let icalc = i-1
    		let doc = document.getElementById("addr"+icalc);
    		let netvalue = doc.getElementsByClassName("netvalue")[0];
    		let boxs = doc.getElementsByClassName("box")[0];
    		let loosebox = doc.getElementsByClassName("loosebox")[0];

    		let value_final = netvalue.value;
    		let boxsvalue_final = boxs.value;
    		// let loosebox_final = loosebox.value;

    		localStorage.setItem("netvalue",value_final);
    		localStorage.setItem("boxvalue",boxsvalue_final);
    		// localStorage.setItem("loosebox",loosebox_final);

    		let stored_net = localStorage.getItem("netvalue");
    		let stored_box = localStorage.getItem("boxvalue");
    		// let stored_loosebox = localStorage.getItem("loosebox");

    		let overall = document.getElementById("overall");
    		let totalbox = document.getElementById("totalbox");
    		// let totalloosebox = document.getElementById("totalloosebox");

    		overall.value -= stored_net;
    		totalbox.value -=stored_box;
    		// totalloosebox.value -=stored_loosebox;

			 $("#totalrowbox").val(totalbox.value);
			 $("#totalrownetvalue").val(overall.value);
			 $("#totalprice").val(overall.value);
			$("#addr"+(i-1)).html('');
			i--;
		}
		
	});
	
	// $('#tab_logic tbody').on('keyup change',function(){
	// 	calc();
	// });
	// $('#tax').on('keyup change',function(){
	// 	calc_total();
	// });
	

});

// function calc()
// {
// 	$('#tab_logic tbody tr').each(function(i, element) {
// 		var html = $(this).html();
// 		if(html!='')
// 		{
// 			var qty = $(this).find('.qty').val();
// 			var price = $(this).find('.price').val();
// 			$(this).find('.total').val(qty*price);
			
// 			calc_total();
// 		}
//     });
// }

// function calc_total()
// {
// 	total=0;
// 	$('.total').each(function() {
//         total += parseInt($(this).val());
//     });
// 	$('#sub_total').val(total.toFixed(2));
// 	tax_sum=total/100*$('#tax').val();
// 	$('#tax_amount').val(tax_sum.toFixed(2));
// 	$('#total_amount').val((tax_sum+total).toFixed(2));
// }

let formatter = new Intl.NumberFormat('en-IN',{}, { maximumSignificantDigits: 3 });

function changeprice(sel){

	let parentnodes = sel.parentNode.parentNode.id;
	let inputs      = document.getElementById(parentnodes);
	var prod_id = inputs.getElementsByClassName("productcategory")[0];

	let idpro = prod_id.options[prod_id.selectedIndex].value;

	let perkgprice = inputs.getElementsByClassName("prod_price")[0];
	let loosekg = inputs.getElementsByClassName("loosekg")[0];

	// let formatter = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'INR' });
	// let formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' },{ maximumSignificantDigits: 3 });
	let formatter = new Intl.NumberFormat('en-IN',{}, { maximumSignificantDigits: 3 });


            $.ajax({
			type:'get',
			url:"findproductprice",
			data:{'id':idpro},
			dataType:'json',
			success:function(data){
	   			data.forEach((productdata,j)=>{
				// perkgprice.value= Math.round(formatter.format(productdata.price));
				perkgprice.value= productdata.price;
				loosekg.value= productdata.unit_name
			})
			},
			error:function(){

			}
	 });

}

//Purchase bill pending amount:-

function pendingamount(){
	// let billcustomer =document.getElementById("billsupplier");

	let selbillsupplier = billsupplier.options[billsupplier.selectedIndex].value;
	let sel = selbillsupplier;

	let total = 0;
	let totalbox = 0;

	$.ajax({
		type:'get',
		url:"/api/supplier/"+sel,		
		dataType:'json',
		success:function(data){

			// data.forEach((i,j)=>{
			// 	console.log(i.opening_balance);
			// 	total += i.opening_balance;
			// })
         
			total +=data.opening_balance;
			totalbox+=data.opening_box;
			// pendingbox.value = data.opening_box;

		},
		error:function(){
		}
 });

	$.ajax({
		type:'get',
		url:"pendingamount",
		data:{'id':sel},
		dataType:'json',
		success:function(data){
			for(var i=0; i<data.length; i++){
				total +=parseInt(data[i].current_balance);
				totalbox +=parseInt(data[i].total_box);
			}
			prebalance.value=total;
			pendingbox.value=totalbox;
		},
		error:function(){
		}
 });
}





//billing



function calculate(s) {

	let parentnodes = s.parentNode.parentNode.id;

	let inputs = document.getElementById(parentnodes);

	let box_id =inputs.getElementsByClassName('box')[0].value;
	let loosekg =inputs.getElementsByClassName('loosekg')[0].value;
	let totalweight =inputs.getElementsByClassName('totalweight')[0];

	let netweight = box_id * loosekg;
	totalweight.value = netweight;
	
	let perkgpricess =inputs.getElementsByClassName('perkgprices')[0].value;
	let purchase_loosekg =inputs.getElementsByClassName('purchase_loosekg')[0].value;
	let actualprice =inputs.getElementsByClassName('actualprice')[0];	

	let overalloutput= netweight + parseFloat(purchase_loosekg);
   
    let overallweight =inputs.getElementsByClassName('overall_weight')[0];

    overallweight.value= overalloutput;

	let actualresult = overalloutput * perkgpricess;

	actualprice.value = actualresult;
	
	let discount =inputs.getElementsByClassName('discount')[0].value;
	let discountprice =inputs.getElementsByClassName('discountprice')[0];	

    let discountpriceresult=  actualresult /100 *discount;
	discountprice.value=discountpriceresult;

	let netvalue =inputs.getElementsByClassName('netvalue')[0];
	 
	let netvalue_output = actualresult-discountpriceresult;
	    netvalue.value =netvalue_output;


var netvalues =document.getElementsByClassName('netvalue');
var box =document.getElementsByClassName('box');
var overall = document.getElementById('overall');
var totalrowbox =document.getElementById('totalrowbox');
var totalrowloosebox =document.getElementById('totalrowloosebox');
var totalrownetvalue =document.getElementById('totalrownetvalue');
var purchaseloosebox =document.getElementsByClassName('purchase_loosebox');
var totalpurchaseloosebox =document.getElementById('total_purchaseloosebox');
var purchaseoverallbox =document.getElementById('purchase_overallbox');
var currentbalances =document.getElementById('currentbalance');
var todaybox =document.getElementById('totalbox');
var purchase_pendingbox =document.getElementById('pendingbox').value;


var totalnetvalue = 0;
var totalbox= 0;
var overallpurchaseloosebox=0;
var total_purchaseloosebox=0;
for(var i = 0; i < netvalues.length; i++){
	 totalnetvalue += parseInt(netvalues[i].value);
}
for (var i= 0; i<box.length; i++){
	totalbox +=parseInt(box[i].value);
}
for(var i=0;i<purchaseloosebox.length; i++){
	overallpurchaseloosebox += parseInt(purchaseloosebox[i].value);
}
	for (var i= 0; i<purchaseloosebox.length; i++){
		total_purchaseloosebox +=parseInt(purchaseloosebox[i].value);
	}

     let todaybox_output = total_purchaseloosebox + totalbox
      todaybox.value = todaybox_output;


     purchaseoverallbox.value = todaybox_output + parseInt(purchase_pendingbox);

     let  ices=totalbox/3;
     let ice=ices.toFixed(2);
     
// $("#totalbox").val(todaybox);
$("#icebar").val(ice);

totalrowbox.value=totalbox;
totalrowloosebox.value=total_purchaseloosebox;
totalrownetvalue.value= totalnetvalue;
  // IF has value in 
currentbalances.value=totalnetvalue;



  $('#transportcharge').add($('#finalicebar')).add($('#less')).add($('#packingcharge')).add($('#excess')).add($('#prebalance'))
  .on('change',function(e){
  e.preventDefault();
  $('#overall').val(
   Number($('#transportcharge').val())
  +Number($('#finalicebar').val())
  -Number($('#less').val())
  +Number($('#packingcharge').val())
  +Number($('#excess').val())
  +Number($('#prebalance').val())
  +Number(totalnetvalue)
  ).change();
  
  });



$("#overall").val(totalnetvalue);

//   overall.value += transportcharge;
//  console.log(overall.value);

}




$('#val1').on('change',function(e){
	
})


function calculate2(){
	var icebar=document.getElementById('icebar').value;
	var pericebar =document.getElementById('pericebar').value;
	// let transportcharge =document.getElementById('transportcharge').value;
	// var overall =document.getElementById('overall');
	//   overall.value += parseInt(transportcharge);
	//  console.log(overall.value);

		var result= document.getElementById('totalicebar');
	   var totalicebar = icebar*pericebar;
	   result.value=totalicebar;

	   var packing_amount =document.getElementById('packing_amount').value; // Packing per Box

	   let totalbox= document.getElementById('totalbox').value; // total box



  var packingcharge = document.getElementById('packingcharge'); 
	  let ToTalBoxCharge = totalbox *packing_amount;
	  

	  finalicebar.value=totalicebar ;
	  packingcharge.value =ToTalBoxCharge;



}

// function total(){
// 	var transportcharge = parseInt(document.getElementById('transportcharge').value);
// 	var finalicebar = parseInt(document.getElementById('finalicebar').value);
// 	var discount = document.getElementById('discount').value;
// 	var packingcharge = parseInt(document.getElementById('packingcharge').value);
// 	var excess = document.getElementById('excess').value;

// 	var result =document.getElementById('overall');

// 	parseInt(document.getElementById('finalicebar')).value = totalicebar;

// 	var overall= transportcharge + packingcharge + finalicebar;
// 	result.value=overall;


// 	calculate2();
	 
// }


//   $(document).ready(function(){
// 	$(document).on('change','.productcategory',function(){

// 		var cat_id=$(this).val();

// 		$.ajax({
// 			   type:'get',
// 			   url:"findproductname",
// 			   data:{'id':cat_id},
// 			   success:function(data){
// 				//    console.log('success');
// 				//    console.log(data);
// 				//    console.log(data.lenght);
// 			   },
// 			   error:function(){

// 			   }
// 		});
// 	});
// 	$(document).on('change','.productcategory',function(){
// 		var prod_id=$(this).val();
		
// 		console.log(prod_id);

// 		$.ajax({
// 			type:'get',
// 			url:"findproductprice",
// 			data:{'id':prod_id},
// 			dataType:'json',
// 			success:function(data){
// 				console.log('price');
// 				console.log(data);
// 				$('.prod_price').val(data.price);
// 				$('.loosekg').val(data.weight);
// 			},
// 			error:function(){

// 			}
// 	 });
//     });
// });




// $('#billdataform').on('submit',function(e){
// 	e.preventDefault();
	
// 	$.ajaxSetup({
// 		headers: {
// 			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
// 		}
// 	});
//     let allRows = $('#tab_logic').find('tr');

// 	let formData = {
// 		'billno': $('#billno').val(),
// 		'billcustomer': $('#billcustomer').val(),
// 		'date': $('#date').val(),
// 		'billproductname': $('#billproductname').val(),
// 		'box': $('#box').val(),
// 		'loosekg': $('#loosekg').val(),
// 		'totalweight': $('#totalweight').val(),
// 		'perkgprice': $('#perkgprice').val(),
// 		'actualprice': $('#actualprice').val(),
// 		'discount': $('#discount').val(),
// 		'discountprice': $('#discountprice').val(),
// 		'netvalue': $('#netvalue').val(),
// 		'totalbox': $('#totalbox').val(),
// 		'icebar': $('#icebar').val(),
// 		'pericebar': $('#pericebar').val(),
// 		'totalicebar': $('#totalicebar').val(),
// 		'packing_amount': $('#packing_amount').val(),
// 		'transportcharge': $('#transportcharge').val(),
// 		'finalicebar': $('#finalicebar').val(),
// 		'less': $('#less').val(),
// 		'packingcharge': $('#packingcharge').val(),
// 		'excess': $('#excess').val(),
// 		'prebalance': $('#prebalance').val(),
// 		'overall': $('#overall').val(),
// 	}

      
//     $.ajax({
// 			method:'post',
// 			url:"/store",
// 			data:formData,
// 			dataType:'json',
// 			success:function(data){
	   
//              console.log(data);
// 			},
// 			error:function(){
//               alert('Not insert');
// 			}
// 	 });
    
//   });
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });


//Purchase Entry function
$('#billdataform').on('submit',function(e){
 e.preventDefault();

 let allRows = [];
// Get Data's from all Row
$("#dynamic_product_rows tr:not(:last-child)").each(function(index) {
    allRows.push({ 
		"billproductname": $(this).find('.billproductname').val(),
		"box": $(this).find('.box').val(),
		"loosekg": $(this).find('.loosekg').val(),
		"totalweight": $(this).find('.totalweight').val(),
		"purchaseloosebox": $(this).find('.purchase_loosebox').val(),
		"purchaseloosekg": $(this).find('.purchase_loosekg').val(),
		"overallweight": $(this).find('.overall_weight').val(),
		"perkgprices": $(this).find('.perkgprices').val(),
		"actualprice": $(this).find('.actualprice').val(),
		"discount": $(this).find('.discount').val(),
		"discountprice": $(this).find('.discountprice').val(),
		"netvalue": $(this).find('.netvalue').val(),
    });
});
// F
 	let formData = {
		'billno': $('#billno').val(),
		'billsupplier': $('#billsupplier').val(),
		'date': $('#date').val(),
		'billtrip': $('#billtrip').val(),
		'todaybox': $('#totalbox').val(),
		'purchase_pendingbox': $('#pendingbox').val(),
		'purchase_overallbox': $('#purchase_overallbox').val(),
		'icebar': $('#icebar').val(),
		'pericebar': $('#pericebar').val(),
		'totalicebar': $('#totalicebar').val(),
		'packing_amount': $('#packing_amount').val(),
		'transportcharge': $('#transportcharge').val(),
		'finalicebar': $('#finalicebar').val(),
		'less': $('#less').val(),
		'packingcharge': $('#packingcharge').val(),
		'excess': $('#excess').val(),
		'pre': $('#prebalance').val(),
		'currentbalance': $('#currentbalance').val(),
		'overall': $('#overall').val(),
		'allproduct_datas':allRows  // ALL BILL DATA ARRAY
	}

	// return false;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $.ajax({
	 type:"post",
	 url:"/bill",
	 data:formData,
	 success:function(response){
	 	response = JSON.parse(response);
	 	console.log(response);
		 //if saved
		 if(response.status == 'success'){
		 	alert(response.message);
		 	window.location.replace("/bill");
		 }else{
		 	alert(response.message);
		 }
	 },
	 error:function(error){
		//  console.log(error)
		 alert("Data Not Saved");
	 }
 });




});




// $('#submit').on('click',function(e){
// 	var value= $('#billcustomer').val();
// 	var date= $('#Date').val();

// });



// $(document).ready(function(){
//     const url = 'http://ars.com/api/supplierdatas';
//     var myHeaders = new Headers();
//     var requestOptions = {
//       method: 'GET',
//       headers: myHeaders,
//       redirect: 'follow'
//     };

// fetch(url, requestOptions)
//   .then(response => response.text())
//   .then(result => getTable(result))
//   .catch(error => console.log('error', error));

// getTable = (result) =>{
//   let res = [];
//   if(typeof result === "string"){
//     res = JSON.parse(result);
//   }
//   console.log(res)
// }
  
// });




//report print out function
function myFunction(el) {
	var restorepage = document.body.innerHTML;
	var printpage = document.getElementById(el).innerHTML;
	document.body.innerHTML = printpage;
	window.print();
	document.body.innerHTML = restorepage;
  }



