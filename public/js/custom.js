$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
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

	let box_id =inputs.getElementsByClassName('box')[0].value;
	let loosekg =inputs.getElementsByClassName('loosekg')[0].value;
	let totalweight =inputs.getElementsByClassName('totalweight')[0];

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
	 if(i>netvalues.length){
		totalnetvalue -= parseInt(netvalues[i].value);
	}
}
for (var i= 0; i<box.length; i++){
	totalbox +=parseInt(box[i].value);

}
$("#totalbox").val(totalbox);
$("#overall").val(totalnetvalue);

}


function deletevalue(del){

}




function calculate2(){
	var icebar=document.getElementById('icebar').value;
	var pericebar =document.getElementById('pericebar').value;
	var result= document.getElementById('totalicebar');
	   var totalicebar = icebar*pericebar;
	   result.value=totalicebar;

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
function changeprice(sel){

	let parentnodes = sel.parentNode.parentNode.id;
	let inputs      = document.getElementById(parentnodes);

	var prod_id = inputs.getElementsByClassName("productcategory")[0];

	let idpro = prod_id.options[prod_id.selectedIndex].value;

	let perkgprice = inputs.getElementsByClassName("prod_price")[0];
	let loosekg = inputs.getElementsByClassName("loosekg")[0];


			$.ajax({
			type:'get',
			url:"findproductprice",
			data:{'id':idpro},
			dataType:'json',
			success:function(data){
	   
				perkgprice.value= data.price
				loosekg.value= data.weight
			},
			error:function(){

			}
	 });

}
