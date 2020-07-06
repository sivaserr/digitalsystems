$(document).ready(function(){

    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
  	});
    $("#customer_delete_row").click(function(){
    	if(i>1){    	
    		let icalc = i-1
    		let doc = document.getElementById("addr"+icalc);
    		let netvalue = doc.getElementsByClassName("netvalue")[0].value;
    		let boxs = doc.getElementsByClassName("box")[0].value;
    		let loosebox = doc.getElementsByClassName("loosebox")[0].value;
    		let salestotalrownetvalue = document.getElementById("salestotalrownetvalue");
    		let salestotalrowbox = document.getElementById("salestotalrowbox");
    		let salestotalrowloosebox = document.getElementById("salestotalrowloosebox");
    		let totalnoofbox = document.getElementById("totalnoofbox");
    		let totalbox = document.getElementById("totalbox");
    		let overallbox = document.getElementById("overallbox");
    		let grass = document.getElementById("grass");

            salestotalrowbox.value -= boxs;
            salestotalrowloosebox.value -= loosebox;



            totalnoofbox.value -= boxs;
            totalnoofbox.value -= loosebox;
            totalbox.value -= boxs;
            totalbox.value -= loosebox;
            overallbox.value -=boxs;
            overallbox.value -=loosebox;
            salestotalrownetvalue.value -= netvalue;
            grass.value -= netvalue;
   //  		let value_final = netvalue.value;
   //  		let boxsvalue_final = boxs.value;
   //  		// let loosebox_final = loosebox.value;

   //  		localStorage.setItem("netvalue",value_final);
   //  		localStorage.setItem("boxvalue",boxsvalue_final);
   //  		// localStorage.setItem("loosebox",loosebox_final);

   //  		let stored_net = localStorage.getItem("netvalue");
   //  		let stored_box = localStorage.getItem("boxvalue");
   //  		// let stored_loosebox = localStorage.getItem("loosebox");

   //  		let customeroverall = document.getElementById("customeroverall");
   //  		let totalbox = document.getElementById("totalbox");
   //  		// let totalloosebox = document.getElementById("totalloosebox");

   //  		customeroverall.value -= stored_net;
   //  		totalbox.value -=stored_box;
   //  		// totalloosebox.value -=stored_loosebox;

			//  $("#totalrowbox").val(totalbox.value);
			//  $("#totalrownetvalue").val(customeroverall.value);
			//  $("#totalprice").val(customeroverall.value);
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
//Sales entry function

$('#salesdataform').on('submit',function(e){
	e.preventDefault();

	let salesproduct = [];


	$("#dynamic_product_rows tr:not(:last-child)").each(function(index) {
		salesproduct.push({ 
			"salesproductname": $(this).find('.salesproductname').val(),
			"box": $(this).find('.box').val(),
			"weight": $(this).find('.loosekg').val(),
			"netweight": $(this).find('.totalweight').val(),
			"loosebox": $(this).find('.loosebox').val(),
			"loosekg": $(this).find('.salesloosekg').val(),
			"totalweight": $(this).find('.overallweight').val(),
			"price": $(this).find('.saleperkgprice').val(),
			"netvalue": $(this).find('.netvalue').val(),
		});
	});


	let salesData = {
		'saleno': $('#saleno').val(),
		'salescustomer': $('#salescustomer').val(),
		'date': $('#date').val(),
		'trip': $('#salestrip').val(),
		'totalnoofbox': $('#totalnoofbox').val(),
		'todaybox': $('#totalbox').val(),
		'balancebox': $('#pendingbox').val(),
		'totalbox': $('#overallbox').val(),
		'grassamount': $('#grass').val(),
		'transportcharge': $('#trans').val(),
		'excess': $('#excess').val(),
		'less': $('#less').val(),
		'current_balance': $('#currentbalance').val(),
		'prebalance': $('#prebalance').val(),
		'overall_balance': $('#overall').val(),
		'salesproduct_datas':salesproduct  // ALL BILL DATA ARRAY
	}
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
});
	$.ajax({
		type:"post",
		url:"/sales",
		data:salesData,
		success:function(response){
			response = JSON.parse(response);
			//console.log(response);
			//if saved
			if(response.status == 'success'){
				alert(response.message);
				window.location.replace("/sales");
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

//Sales bill pending amount:-

function salespendingamount(){

      let selbillcustomer = salescustomer.options[salescustomer.selectedIndex].value;
      let sell = selbillcustomer;

      let total = 0;
      let totalbox = 0;

      	$.ajax({
		type:'get',
		url:"/api/sales/"+sell,
		dataType:'json',
		success:function(data){

			total +=data.opening_balance;
			totalbox +=data.opening_box;

		},
		error:function(){
		}
});

      	$.ajax({
		type:'get',
		url:"customerbillpending",
		data:{'id':sell},
		dataType:'json',
			success:function(data){

				for(var i=0; i<data.length; i++){
					total += parseInt(data[i].amount_pending);
					totalbox += parseInt(data[i].box_pending);
				}
				prebalance.value=total;
				pendingbox.value=totalbox;
			},
			error:function(){
			}
        });        
}


function salescalculater(sales){
	let parentnodes = sales.parentNode.parentNode.id;

	let inputs = document.getElementById(parentnodes);
//stock 
let stockvalue = inputs.getElementsByClassName('stockbox')[0].innerHTML;
let stockloosekg = inputs.getElementsByClassName('stockloosekg')[0].innerHTML;
let entrybox = inputs.getElementsByClassName('box')[0].value;
let entrysalesloosekg = inputs.getElementsByClassName('salesloosekg')[0].value;
let stockbox = stockvalue.split('box')[0];
let stockkg = stockloosekg.split('kg')[0];
   if(entrybox > parseInt(stockbox)){
   	  alert('No');
   }else{
   		let box_id =inputs.getElementsByClassName('box')[0].value;
	let loosekg =inputs.getElementsByClassName('loosekg')[0].value;
	let loosebox =inputs.getElementsByClassName('loosebox')[0].value;
	let totalweight =inputs.getElementsByClassName('totalweight')[0];
	let netweight = box_id * loosekg;
	totalweight.value = netweight;
     


   }
   // if(entrysalesloosekg > stockkg){

   // 	alert("No stock");
   // }else{

   // }



}   
// test = (event) =>{
// 	event = window.event
// 	console.log(event.target.parentNode.parentNode.id)
	 
// }
let getstockloosekg = 0;

function calloosebox(lb){

    let parentnodes = lb.parentNode.parentNode.id;
    let input = document.getElementById(parentnodes);
	let gettotalweight = input.getElementsByClassName('totalweight')[0].value;
	let stockloosekg = input.getElementsByClassName("stockloosekg")[0];
    stockloosekg.innerHTML = getstockloosekg-gettotalweight+"kg";
}
function callossekg(k){

	  	k = window.event;


	let parentnodes = k.target.parentNode.parentNode.id;
	let inputs = document.getElementById(parentnodes);
	let stockvalue = inputs.getElementsByClassName('stockbox')[0].innerHTML;
	let stockloosekg = inputs.getElementsByClassName('stockloosekg')[0].innerHTML;
	let entrybox = inputs.getElementsByClassName('box')[0].value;
	let entrysalesloosekg = inputs.getElementsByClassName('salesloosekg')[0].value;
    let entrysalestotalweight = inputs.getElementsByClassName('totalweight')[0].value;
	let stockbox = stockvalue.split('box')[0];
	let stockkg = stockloosekg.split('kg')[0];
	if(k.keyCode !== 8){
		if(entrysalesloosekg > parseInt(stockkg)){
    	 alert("No stock");
    }else{

	let totalweight =inputs.getElementsByClassName('totalweight')[0].value;

    let salesloosekg = inputs.getElementsByClassName('salesloosekg')[0].value;
	
	let salloosekg = parseFloat(totalweight) + parseFloat(salesloosekg);
    
	let overallweight = inputs.getElementsByClassName('overallweight')[0];

	overallweight.value = salloosekg;

	let saleperkgprice = inputs.getElementsByClassName('saleperkgprice')[0].value;
	let netvalue = inputs.getElementsByClassName('netvalue')[0];

	netvalue.value = saleperkgprice*salloosekg;

	var box =document.getElementsByClassName('box');
	var salesloosebox =document.getElementsByClassName('loosebox');
	var salesproductbox = document.getElementById("totalbox");
	var salesnetvalue =document.getElementsByClassName('netvalue');
	let pendingbox =document.getElementsByClassName('pendingbox')[0].value;

	var salestotalrowbox =document.getElementById('salestotalrowbox');
	var salestotalrowloosebox =document.getElementById('salestotalrowloosebox');
	var salestotalrownetvalue =document.getElementById('salestotalrownetvalue');
	var totalnoofbox =document.getElementById('totalnoofbox');
	var grass =document.getElementById('grass');
	var salespendingbox =document.getElementById('pendingbox').value;
	var customerprebalance =document.getElementById('prebalance').value;

	let salesbox = 0;
	let totalsalesloosebox = 0;
	let totalsalesnetvalue = 0;

	for (var i= 0; i<box.length; i++){
		salesbox +=parseInt(box[i].value);
	}

	for (var i= 0; i<salesloosebox.length; i++){
		totalsalesloosebox +=parseInt(salesloosebox[i].value);
	}
	// totalloosebox.value = totalsalesloosebox;

	for (var i= 0; i<salesnetvalue.length; i++){
		totalsalesnetvalue +=parseInt(salesnetvalue[i].value);
	}
	overall.value = totalsalesnetvalue + parseInt(customerprebalance);
	
	let todaytotalboxs= salesbox + totalsalesloosebox;
	salesproductbox.value = todaytotalboxs;

	overallbox.value = salesbox + totalsalesloosebox + parseInt(salespendingbox);
	


	//total price
	//totalprice.value =totalsalesnetvalue;



    salestotalrowbox.value= salesbox;
    salestotalrowloosebox.value= totalsalesloosebox;
    salestotalrownetvalue.value= totalsalesnetvalue;	
    totalnoofbox.value= todaytotalboxs;	
    grass.value= totalsalesnetvalue;	
    	
    }
	}
    


}
function caltrans(){
	// var totalprice =document.getElementById('totalprice');
	var grass =document.getElementById('grass').value;
	var trans =document.getElementById('trans').value;
    var currentbalance =document.getElementById('currentbalance');


     currentbalance.value = parseFloat(grass) + parseInt(trans);

}
function saleschangeprice(sel){

	let parentnodes = sel.parentNode.parentNode.id;
	let salescustomer = document.getElementById("salescustomer");
    let selbillcustomer = salescustomer.options[salescustomer.selectedIndex].value;

	let inputs      = document.getElementById(parentnodes);
	var prod_id = inputs.getElementsByClassName("productcategory")[0];

	let idpro = prod_id.options[prod_id.selectedIndex].value;

	let perkgprice = inputs.getElementsByClassName("prod_price")[0];
	let loosekg = inputs.getElementsByClassName("loosekg")[0];

	let stockbox = inputs.getElementsByClassName("stockbox")[0];

	// let formatter = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'INR' });
	// let formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' },{ maximumSignificantDigits: 3 });
	let fixed = 0;
	let unit = 0;

    
     	$.ajax({
		type:'get',
		url:"api/stockalert/"+idpro,			
		dataType:'json',
		success:function(data){
			console.log(data);
             stockbox.innerHTML = data.box +"box";
             getstockloosekg = data.box*unit+data.loosekg;


		},
		error:function(){
		}
        });


	$.ajax({
		type:'get',
		url:"api/customerratefixing/"+selbillcustomer,			
		dataType:'json',
		success:function(data){
			if(data.length>0){
				data = data.filter(fix=>fix.product_id == idpro);
			}
			if(data.length>0){
				data.forEach((i,j)=>{
					fixed = i.fixing_rate
				})
			}
		},
		error:function(){
		}
    });
	let formatter = new Intl.NumberFormat('en-IN',{}, { maximumSignificantDigits: 3 });


            $.ajax({
			type:'get',
			url:"salesfindproductprice",
			data:{'id':idpro},
			dataType:'json',
			success:function(data){
	   			data.forEach((productdata,j)=>{
                unit=productdata.unit_name;
				// perkgprice.value= Math.round(formatter.format(productdata.price));
				if(fixed != 0){
					perkgprice.value = fixed
				}else{
					perkgprice.value= productdata.price;
				}
				loosekg.value= productdata.unit_name
			})
			},
			error:function(){

			}
	 });

}