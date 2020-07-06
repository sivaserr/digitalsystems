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
	

	

});



let formatter = new Intl.NumberFormat('en-IN',{}, { maximumSignificantDigits: 3 });

function changeprice(sel){

	let parentnodes = sel.parentNode.parentNode.id;
	let inputs      = document.getElementById(parentnodes);
	var prod_id = inputs.getElementsByClassName("productcategory")[0];

	let idpro = prod_id.options[prod_id.selectedIndex].value;

	let perkgprice = inputs.getElementsByClassName("prod_price")[0];
	let kg = inputs.getElementsByClassName("kg")[0];

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
				kg.value= productdata.unit_name
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
				total +=parseInt(data[i].amount_pending);
				totalbox +=parseInt(data[i].box_pending);
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
	let kg =inputs.getElementsByClassName('kg')[0].value;
	let netweight =inputs.getElementsByClassName('net_weight')[0];
	let purchase_loosekg =inputs.getElementsByClassName('purchase_loosekg')[0].value;

	let boxweight = box_id * kg + parseFloat(purchase_loosekg);
    netweight.value = boxweight;
	
   let discount =inputs.getElementsByClassName('discount')[0];
   let pricess =inputs.getElementsByClassName('prices')[0].value;

   let totalweight =inputs.getElementsByClassName('totalweight')[0];
   	let netvalue =inputs.getElementsByClassName('netvalue')[0];


    let discountpriceresult=  boxweight /100 * 5;
  
    let discountweight = discountpriceresult.toFixed();
    discount.value = discountweight;
    let totalsweight = boxweight - discountweight;

    totalweight.value = totalsweight;

     netvalue.value = totalsweight * pricess;
	// discountprice.value=discountpriceresult;
	// let overalloutput= netweight + parseFloat(purchase_loosekg);
   
 //    let netweight =inputs.getElementsByClassName('net_weight')[0];

 //    netweight.value= overalloutput;



	// let actualresult = overalloutput * pricess;

	// actualprice.value = actualresult;
	
	// // let discountprice =inputs.getElementsByClassName('discountprice')[0];	



	// let netvalue =inputs.getElementsByClassName('netvalue')[0];
	 
	// let netvalue_output = actualresult-discountpriceresult;
	//     netvalue.value =netvalue_output;


var netvalues =document.getElementsByClassName('netvalue');
var box =document.getElementsByClassName('box');
var totalrowbox =document.getElementById('totalrowbox');
var totalrowloosebox =document.getElementById('totalrowloosebox');
var totalrownetvalue =document.getElementById('totalrownetvalue');
var purchaseloosebox =document.getElementsByClassName('purchase_loosebox');
var totalpurchaseloosebox =document.getElementById('total_purchaseloosebox');
var purchaseoverallbox =document.getElementById('purchase_overallbox');
var totalnoofbox =document.getElementById('totalnoofbox');
var grass =document.getElementById('grass');
var todaybox =document.getElementById('totalbox');
var purchase_pendingbox =document.getElementById('pendingbox').value;


var totalnetvalue = 0;
var totalbox= 0;
var overallpurchaseloosebox=0;
var total_purchaseloosebox=0;
for(var i = 0; i < netvalues.length; i++){
	 totalnetvalue += parseFloat(netvalues[i].value);
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
totalnoofbox.value=todaybox_output;
grass.value=totalnetvalue;



  // $('#transportcharge').add($('#finalicebar')).add($('#less')).add($('#packingcharge')).add($('#excess')).add($('#prebalance'))
  // .on('change',function(e){
  // e.preventDefault();
  // $('#overall').val(
  //  Number($('#transportcharge').val())
  // +Number($('#finalicebar').val())
  // -Number($('#less').val())
  // +Number($('#packingcharge').val())
  // +Number($('#excess').val())
  // +Number($('#prebalance').val())
  // +Number(totalnetvalue)
  // ).change();
  
  // });




//   overall.value += transportcharge;
//  console.log(overall.value);

}




$('#val1').on('change',function(e){
	
})


function calculate2(){
	var icebar=document.getElementById('icebar').value;
	var pericebar =document.getElementById('pericebar').value;
	var finalicebar= document.getElementById('finalicebar');

	   var totalicebar = icebar*pericebar;
	   finalicebar.value = totalicebar;



	// // let transportcharge =document.getElementById('transportcharge').value;
	// // var overall =document.getElementById('overall');
	// //   overall.value += parseInt(transportcharge);
	// //  console.log(overall.value);

	//   finalicebar.value=totalicebar ;



}

function calpackingcharge(){
   
    var packing_amount =document.getElementById('packing_amount').value; // Packing per Box
	let totalbox= document.getElementById('totalbox').value; // total box
    var packingcharge = document.getElementById('packingcharge'); 

	let ToTalBoxCharge = totalbox *packing_amount;
    packingcharge.value =ToTalBoxCharge;
}


function caltransport(){

	let transportcharge =document.getElementById('transportcharge').value;
	var grass =document.getElementById('grass').value;
	var finalicebar= document.getElementById('finalicebar').value;
	var packingcharge= document.getElementById('packingcharge').value;
	var currentbalance =document.getElementById('currentbalance');
	currentbalance.value = parseFloat(grass) + parseInt(transportcharge) + parseInt(finalicebar) + parseInt(packingcharge);
    console.log(currentbalance.value);

}
function calexcess(ex){
    ex = window.event;
	var excess =document.getElementById('excess').value;
	var currentbalance =document.getElementById('currentbalance');
	let cbal = parseInt(currentbalance.value);
	let ecxc = parseInt(excess)
    if(excess !== ""){
        if(ex.keyCode !== 8){
    cbal +=ecxc;
	currentbalance.value = cbal;
    }else{
    cbal -=ecxc;
    currentbalance.value = 0;
    }	
    }



}
function caldiscount(){
	    le = window.event;

	var less =document.getElementById('less').value;
	var currentbalance =document.getElementById('currentbalance');
	var prebalance =document.getElementById('prebalance').value;
	var overall =document.getElementById('overall');
	let cbal = parseInt(currentbalance.value);
	let dis = parseInt(less)
    if(less !== ""){
        if(le.keyCode !== 8){
    cbal -=dis;
	currentbalance.value = cbal;
	overall.value = parseInt(cbal)+parseInt(prebalance);
    }
    }

}


//Purchase Entry function
$('#billdataform').on('submit',function(e){
 e.preventDefault();

 let allRows = [];
// Get Data's from all Row
$("#dynamic_product_rows tr:not(:last-child)").each(function(index) {
    allRows.push({ 
		"billproductname": $(this).find('.billproductname').val(),
		"box": $(this).find('.box').val(),
		"kg": $(this).find('.kg').val(),
		"purchaseloosebox": $(this).find('.purchase_loosebox').val(),
		"purchaseloosekg": $(this).find('.purchase_loosekg').val(),
		"netweight": $(this).find('.net_weight').val(),
		"discount": $(this).find('.discount').val(),
		"totalweight": $(this).find('.totalweight').val(),
		"prices": $(this).find('.prices').val(),
		// "actualprice": $(this).find('.actualprice').val(),
		"netvalue": $(this).find('.netvalue').val(),
    });
});
// F
 	let formData = {
		'billno': $('#billno').val(),
		'billsupplier': $('#billsupplier').val(),
		'date': $('#date').val(),
		'billtrip': $('#billtrip').val(),
		'totalnoofbox': $('#totalnoofbox').val(),
	    'pericebar': $('#pericebar').val(),
		'icebar': $('#icebar').val(),
		'pericebar': $('#pericebar').val(),
		'packing_amount': $('#packing_amount').val(),
		'todaybox': $('#totalbox').val(),
		'balancebox': $('#pendingbox').val(),
		'totalbox': $('#purchase_overallbox').val(),
		'grass_amount': $('#grass').val(),
		'transportcharge': $('#transportcharge').val(),
		'icebaramount': $('#finalicebar').val(),
		'packingcharge': $('#packingcharge').val(),
		'excess': $('#excess').val(),
		'less': $('#less').val(),
	    'currentbillamount': $('#currentbalance').val(),
		'previousbalance': $('#prebalance').val(),
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
	 url:"/purchase",
	 data:formData,
	 success:function(response){
	 	response = JSON.parse(response);
		 //if saved
		 if(response.status == 'success'){
		 	alert(response.message);
		 	window.location.replace("/purchase");
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


//report print out function
function myFunction(el) {
	var restorepage = document.body.innerHTML;
	var printpage = document.getElementById(el).innerHTML;
	document.body.innerHTML = printpage;
	window.print();
	document.body.innerHTML = restorepage;
  }



