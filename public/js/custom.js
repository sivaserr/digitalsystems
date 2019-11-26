$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){
		b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
		$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');				
		i++; 
		$('.prod_price').addClass(i);  
		  
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});
	

});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);
			
			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}


//billing



function calculate(s) {

	let parentnodes = s.parentNode.parentNode.id;

	let inputs = document.getElementById(parentnodes);

<<<<<<< HEAD
function calculate(d) {
	var box = document.getElementById('box').value;	
	var loosekg = document.getElementById('loosekg').value;
	var result = document.getElementById('totalweight');	
	var totalweight = box * loosekg;
	result.value = totalweight;
=======
	let box_id =inputs.getElementsByClassName('box')[0].value;
	let loosekg =inputs.getElementsByClassName('loosekg')[0].value;
	let totalweight =inputs.getElementsByClassName('totalweight')[0];
>>>>>>> 8b7aaecd847f787244dae880d8240e5e33617bac

	var netweight = box_id * loosekg;
	totalweight.value = netweight;
	
	let perkgpricess =inputs.getElementsByClassName('perkgprices')[0].value;
	let actualprice =inputs.getElementsByClassName('actualprice')[0];	

	var actualresult = netweight * perkgpricess;

	actualprice.value=actualresult;

	let discount =inputs.getElementsByClassName('discount')[0].value;
	let discountprice =inputs.getElementsByClassName('discountprice')[0];	

    var discountpriceresult=  actualresult /100 *discount;
	discountprice.value=discountpriceresult;

	let netvalue =inputs.getElementsByClassName('netvalue')[0];
	netvalue.value=actualresult-discountpriceresult;

    let prod_netvalue = actualresult-discountpriceresult

// console.log(prod_netvalue);


var netvalues =document.getElementsByClassName('netvalue');
var box =document.getElementsByClassName('box');
var totalnetvalue = 0;
var totalbox= 0;
for(var i = 0; i < netvalues.length; i++){
	 totalnetvalue += parseInt(netvalues[i].value);
}
for (var i= 0; i<box.length; i++){
	totalbox +=parseInt(box[i].value);
}
$("#totalbox").val(totalbox);
$("#overall").val(totalnetvalue);

console.log(bb);
}

function calculate2(){
	var icebar=document.getElementById('icebar').value;
	var pericebar =document.getElementById('pericebar').value;
	var result= document.getElementById('totalicebar');
	   var totalicebar = icebar*pericebar;
	   result.value=totalicebar;
}

function total(){
	var transportcharge = parseInt(document.getElementById('transportcharge').value);
	var finalicebar = parseInt(document.getElementById('finalicebar').value);
	var discount = document.getElementById('discount').value;
	var packingcharge = parseInt(document.getElementById('packingcharge').value);
	var excess = document.getElementById('excess').value;

	var result =document.getElementById('overall');

	parseInt(document.getElementById('finalicebar')).value = totalicebar;

	var overall= transportcharge + packingcharge + finalicebar;
	result.value=overall;


	calculate2();
	 
}


  $(document).ready(function(){
	// $(document).on('change','.productcategory',function(){

	// 	var cat_id=$(this).val();

	// 	$.ajax({
	// 		   type:'get',
	// 		   url:"findproductname",
	// 		   data:{'id':cat_id},
	// 		   success:function(data){
	// 			//    console.log('success');
	// 			//    console.log(data);
	// 			//    console.log(data.lenght);
	// 		   },
	// 		   error:function(){

	// 		   }
	// 	});
	// });
	// $(document).on('change','.productcategory',function(){
<<<<<<< HEAD
	// // 	var prod_id=$(this).val();
		
	// // 	//console.log(prod_id,'data');
	// // 	$.ajax({
	// // 		type:'get',
	// // 		url:"findproductprice",
	// // 		data:{'id':prod_id},
	// // 		dataType:'json',
	// // 		success:function(data){
				
	// // 			console.log(data,'data');
	// // 			$('.prod_price').val(data.price);
	// // 			$('.loosekg').val(data.weight);
	// // 			console.log(data.price,'price')
	// // 		},
	// // 		error:function(){

	// // 		}
	// //  });
	// });

	
	
});

function changePrice(sel){	
	let parentnodes = sel.parentNode.parentNode.id;
	
	let inputs = document.getElementById(parentnodes);
	var prod_id=inputs.getElementsByClassName("productcategory")[0];
	let idPro = prod_id.options[prod_id.selectedIndex].value;	
	console.log(prod_id,'idPro')
	let perkgprice = inputs.getElementsByClassName("prod_price")[0];
	let loosekg = inputs.getElementsByClassName("loosekg")[0];
=======
	// 	var prod_id=$(this).val();
		
	// 	console.log(prod_id);

	// 	$.ajax({
	// 		type:'get',
	// 		url:"findproductprice",
	// 		data:{'id':prod_id},
	// 		dataType:'json',
	// 		success:function(data){
	// 			console.log('price');
	// 			console.log(data);
	// 			$('.prod_price').val(data.price);
	// 			$('.loosekg').val(data.weight);
	// 		},
	// 		error:function(){

	// 		}
	//  });
    // });
});


function changeprice(sel){
>>>>>>> 8b7aaecd847f787244dae880d8240e5e33617bac

	let parentnodes = sel.parentNode.parentNode.id;
	let inputs      = document.getElementById(parentnodes);

	var prod_id = inputs.getElementsByClassName("productcategory")[0];

	let idpro = prod_id.options[prod_id.selectedIndex].value;

	let perkgprice = inputs.getElementsByClassName("prod_price")[0];
	let loosekg = inputs.getElementsByClassName("loosekg")[0];


			$.ajax({
			type:'get',
			url:"findproductprice",
<<<<<<< HEAD
			data:{'id':idPro},
			dataType:'json',
			success:function(data){
				
				perkgprice.value = data.price
				loosekg.value = data.weight

=======
			data:{'id':idpro},
			dataType:'json',
			success:function(data){
	   
				perkgprice.value= data.price
				loosekg.value= data.weight
>>>>>>> 8b7aaecd847f787244dae880d8240e5e33617bac
			},
			error:function(){
				console.log("eror")
			}
<<<<<<< HEAD
	});
}
=======
	 });

}

// function calc(s){
// 	let parentnodes = s.parentNode.parentNode.id;

// 	let inputs = document.getElementById(parentnodes);

// 	let box_id =inputs.getElementsByClassName('box')[0];

// 	var demo = box_id.value;

// 	console.log(box);
// }
>>>>>>> 8b7aaecd847f787244dae880d8240e5e33617bac
