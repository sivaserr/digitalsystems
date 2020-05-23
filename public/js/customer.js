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

    		let customeroverall = document.getElementById("customeroverall");
    		let totalbox = document.getElementById("totalbox");
    		// let totalloosebox = document.getElementById("totalloosebox");

    		customeroverall.value -= stored_net;
    		totalbox.value -=stored_box;
    		// totalloosebox.value -=stored_loosebox;

			 $("#totalrowbox").val(totalbox.value);
			 $("#totalrownetvalue").val(customeroverall.value);
			 $("#totalprice").val(customeroverall.value);
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
			"loosekg": $(this).find('.loosekg').val(),
			"totalweight": $(this).find('.totalweight').val(),
			"loosebox": $(this).find('.loosebox').val(),
			"salesloosekg": $(this).find('.salesloosekg').val(),
			"overallweight": $(this).find('.overallweight').val(),
			"saleperkgprice": $(this).find('.saleperkgprice').val(),
			"netvalue": $(this).find('.netvalue').val(),
		});
	});


	let salesData = {
		'saleno': $('#saleno').val(),
		'salescustomer': $('#salescustomer').val(),
		'date': $('#date').val(),
		'totalbox': $('#totalbox').val(),
		'totalloosebox': $('#totalloosebox').val(),
		'ovarall_box': $('#overallbox').val(),
		'totalprice': $('#totalprice').val(),
		'prebalance': $('#prebalance').val(),
		'overall_balance': $('#customeroverall').val(),
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

      let customertotal = 0;
      let customertotalbox = 0;

      	$.ajax({
		type:'get',
		url:"/api/sales/"+sell,
		dataType:'json',
		success:function(data){
			customertotal +=data.opening_balance;
			customertotalbox += data.opening_box;
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
					customertotal += parseInt(data[i].overall_balance);
					customertotalbox += parseInt(data[i].total_box);
				}
				prebalance.value=customertotal;
				pendingbox.value=customertotalbox;
			},
			error:function(){
			}
        });        
}


function salescalculater(sales){
	let parentnodes = sales.parentNode.parentNode.id;

	let inputs = document.getElementById(parentnodes);

	let box_id =inputs.getElementsByClassName('box')[0].value;
	let loosekg =inputs.getElementsByClassName('loosekg')[0].value;
	let loosebox =inputs.getElementsByClassName('loosebox')[0].value;
	let totalweight =inputs.getElementsByClassName('totalweight')[0];

	let netweight = box_id * loosekg;
	totalweight.value = netweight;


	let salesloosekg = inputs.getElementsByClassName('salesloosekg')[0].value;
	
	let salloosekg = netweight + parseFloat(salesloosekg);
    
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
	customeroverall.value = totalsalesnetvalue + parseInt(customerprebalance);
	
	salesproductbox.value = salesbox + totalsalesloosebox;

	overallbox.value = salesbox + totalsalesloosebox + parseInt(salespendingbox);
	


	//total price
	totalprice.value =totalsalesnetvalue;



    salestotalrowbox.value= salesbox;
    salestotalrowloosebox.value= totalsalesloosebox;
    salestotalrownetvalue.value= totalsalesnetvalue;
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

	// let formatter = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'INR' });
	// let formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' },{ maximumSignificantDigits: 3 });
	let fixed = 0;
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