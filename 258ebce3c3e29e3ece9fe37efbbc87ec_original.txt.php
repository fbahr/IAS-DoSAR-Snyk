include("head.php"); 
  $EIn=$_REQUEST['EIn'];
  
  if ($EIn!=NULL){
  $CustomerId=NULL;
  $rs=mysql_query("delete from temp"); 
 $rs=mysql_query("select * from  sale where Invoice='$EIn'");				
	 while($newArray=mysql_fetch_array($rs)) {
	 						
								$CustomerId= $newArray['CustomerId'];
								$Product= $newArray['Product'];	
								$Quantity= $newArray['Quantity'];	
								$Schem= $newArray['type'];
								$EPrice= $newArray['Price'];
								$SQty=$Quantity-$Schem;	
								$Description= $newArray['Description'];	
								$Date= $newArray['Date'];	
								$SaleMan= $newArray['PBalance'];	
		
					$rss=mysql_query("insert into temp 
							(Product_Id,TQTY,Rate,Customer_Id,PQTY,BachNo,Expiry) 
						values
							('$Product','$SQty','$EPrice','$CustomerId','$Schem','$EIn','$Date')");

								}   
	$rs=mysql_query("select * from  invoice_summary where Invoice='$EIn'");				
	 while($newArray=mysql_fetch_array($rs)) {
	 						
								
								$EDiscount= $newArray['Discount'];	
								$ECash= $newArray['Cash'];	
									}
			$rss=mysql_query("insert into edit_temp 
							(Date,Ref) 
						values
							('$Date','$EIn')");		
  
  }
  
  
  
  
 $rs=mysql_query("select * from  edit_temp");				
	 while($newArray=mysql_fetch_array($rs)) {
	 						
								$Date= $newArray['Date'];
								}
  $Ref=$_REQUEST['Ref'];
  if ($Ref!=NULL){
  echo '<script> window.open("Reports/bil.php?Invoice='.$Ref.'","_blank"); </script>';
  }
  	$Reg_Code=$_REQUEST['Reg_Code'];
	if($CustomerId!=NULL){
		$Reg_Code=$CustomerId;	
	}
	$Product_Code=$_REQUEST['Product_Code'];
	$QTY=$_REQUEST['QTY'];
	$Rate=$_REQUEST['Rate'];
	$Product_Code=$_REQUEST['Product_Code'];

	$del=$_REQUEST['del'];
	$PQTY=$_REQUEST['PQTY'];
	$TAchive;
	$rs=mysql_query("select * from sale where CompanyId='41000'");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$TAchive= $TAchive+($newArray['Quantity']*$newArray['Price']);
									}
									
	$rs=mysql_query("select * from specification_uasils where Specification_Id='11'");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$Target= $newArray['Specific_use'];
							
									}
	if ($del!=NULL){
	$rs=mysql_query("select * from temp where Temp_Id='$del'");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$Reg_Code= $newArray['Customer_Id'];
							
									}
	$rs=mysql_query("delete from temp where Temp_Id='$del'");
	}
	
	if ($Reg_Code!=NULL){ 
	$rs=mysql_query("select * from accounts where account_Id='$Reg_Code'");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$account_Name= $newArray['account_Name'];
							$Close_balenc= $newArray['Close_balenc'];
									}
	
	}
	
	if ($Product_Code!=NULL && $QTY==NULL && $Rate==NULL){
	$rs=mysql_query("select * from product where Product_Id='$Product_Code'");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$P_Name= $newArray['Name'];
							$P_Price= $newArray['TP'];	
							$Available_QTY= $newArray['QTY'];
							$BP= $newArray['ORate'];
									}
	

	}
	
	
	   if ($Product_Code!=NULL && $QTY!=NULL && $Rate!=NULL){

				 $rs=mysql_query("select * from  temp where Product_Id='$Product_Code'");				
	 while($newArray=mysql_fetch_array($rs)) {
	 							$Temp_Id= $newArray['Temp_Id'];
	 							$Add_QTY= $newArray['TQTY'];
								$PPQTY= $newArray['PQTY'];
								}
					if ($Temp_Id!=NULL){
					$UPDQTY=$Add_QTY+$QTY;
					$UPPPQTY=$PPQTY+$PQTY;
					
					$rs=mysql_query("UPDATE temp SET TQTY='$UPDQTY',Rate='$Rate',Tax='$Tax',Customer_Id='$Reg_Code',PQTY='$UPPPQTY' where Temp_Id='$Temp_Id'");
					} else {
					$rs=mysql_query("insert into temp 
							(Product_Id,TQTY,Rate,Tax,Customer_Id,PQTY) 
						values
							('$Product_Code','$QTY','$Rate','$Tax','$Reg_Code','$PQTY')");
					
				}
 }


	
  ?>

 <script type="text/javascript">
 function  registration_emptyForm(card)
		{
			if(card.TotalBill.value=="" || card.TotalBill.value==0)
				{
					alert("ERROR! MUST SELECT PRODUCT BEFORE CLICK SAVE");
					return false;
				}
				
				
			else 
			{
			return true;
			}
				
		}


function ItemDist()

{
		
var TP=document.sampleform.TP.value;


var Rate=document.sampleform.Rate;
    var ItemDiscount=document.sampleform.ItemDiscount.value;
	var R=parseInt(ItemDiscount);

	var DA=(TP*ItemDiscount/100);
	var TB=TP-DA;

		Rate.value=(""+TB+"");
		
		
}	

function DisPer()

{
		

var TotalBill=document.form.TotalBill;


    var DisP=document.form.DisP.value;
	var Gbil=document.form.Gbil.value;
	var Discount=document.form.Discount.value;
	Gbil=Gbil-Discount;
	var DA=(Gbil*DisP/100);
	var TB=Gbil-DA;

		TotalBill.value=(""+TB+"");
		
		
}	

function DisAmt()

{
		

var TotalBill=document.form.TotalBill;


    var DisP=document.form.DisP;
	var Discount=document.form.Discount.value;
	var Gbil=document.form.Gbil.value;

	var DA=((Discount/Gbil)*100);
	var TB=Gbil-Discount;

		TotalBill.value=(""+TB+"");
		
		
}	

function Csh()

{
		
var BillBalance=document.form.BillBalance;

var TotalBill=document.form.TotalBill.value;

	var Cash=document.form.Cash.value;

	var BB=TotalBill-Cash;

		BillBalance.value=(""+BB+"");
		
}


function cashtransfer(formCheck) 
{					
 if((formCheck.keyCode==117) || (formCheck.keyCode==40)){
		document.form.Cash.focus();	
	} else if((formCheck.keyCode==39)) {
		document.form.DisP.select();
	} else if (formCheck.keyCode==120){
	
	window.open("EditSale_Controller.php?Print=786","_self");
	
	} 
}


function QuantityTransfer(formCheck) 
{		 if((formCheck.keyCode==37)) 
		document.sampleform.Deal.focus();
		else if((formCheck.keyCode==39)) 
		document.form.Discount.focus();
	
}


function DiscountTransfer(formCheck) 
{					
 if((formCheck.keyCode==117 || formCheck.keyCode==40 || formCheck.keyCode==39 ))
		document.form.Cash.focus();	
		else if((formCheck.keyCode==37)) 
		document.sampleform.Product_Code.focus();
	else if ((formCheck.keyCode>=48 && formCheck.keyCode<=57 || formCheck.keyCode==8))
		return true; 
	
}

function dealtransfer(formCheck) 
{					
 if((formCheck.keyCode==113 || formCheck.keyCode==38 || formCheck.keyCode==37))
		document.sampleform.Product_Code.focus();	
	
}

function backproduct(formCheck) 
{ 
		if ((formCheck.keyCode==119)){
		window.location.replace("Editsale.php");
	} else if (formCheck.keyCode==120){
	
	window.open("Sale_Controller.php","_blank");
	window.location.replace("Editsale.php");		
	} 

}
</script>
  <body  OnLoad="document.sampleform.<?php if ($Reg_Code==NULL){ ?>Reg_Code
  <?php }else if ($Reg_Code!=NULL && $P_Name==NULL){ ?>PName<?php } else { echo "QTY"; }?>.focus();"  >
<form name="sampleform" action="Editsale.php" method="post">
<input type="hidden" name="EditInv" value="<?php echo $EIn; ?>" />
  <table  width="100%" style="border-radius: 20px; box-shadow: 10px 10px 5px #888888; background-color:#E5F3FB; border:solid #70C0E7; ">
  
  		<tr>
		<td width="16%" rowspan="3" align="center"><strong><font size="+3">Edit Sale</font></strong><BR />
		  <?php  echo $EIn; ?></td>
			<td width="7%">Customer_Id</td>
			
		  <td width="12%"><input type="text" name="Reg_Code" value="<?php echo $Reg_Code; ?>" id="Name_hidden"/></td>
			<td width="3%">Name</td>
		  <td width="14%"><input type="text" name="Name" value="<?php echo $account_Name; ?>" onKeyUp="ajax_showOptions(this,'getCountriesByLetters',event)"/></td>
			<td width="4%"><a href="#" onClick="Open_Account(<?php echo "77";?>); return false"><img src="imgs/add-user.png" width="20" height="20"></a></td>
		    
		  <td colspan="4" style="font-size:12px;">
			<? $rs=mysql_query("select * from specification_uasils where account_Id='$Reg_Code' and Specification_Id='1'");				
	 while($newArray=mysql_fetch_array($rs)) {
									echo $newArray['Specific_use'].'  ';
									} echo '<font color=red>RS. '.$Close_balenc.'</font>'; ?>
		  </td>

		</tr>
		<tr>
			<td>Product_Id</td>
			
			<td><input type="text" name="Product_Code" id="PName_hidden" value="<?php echo $Product_Code;?>" onFocus="if (this.value == '<?php echo $Product_Code;?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php echo $Product_Code;?>';}" onKeyDown="return cashtransfer(event)"/></td>
			<td>Product_Name</td>
			<td><input type="text" name="PName" onKeyUp="ajax_showOptions4(this,'getCountriesByLetters',event)" value="<?php echo $P_Name;?>" /></td>
			<td>Stock</td>
			<td><input type="text" name="STOCK"   value="<?php echo $Available_QTY; ?>"/></td>
			<td>TP</td>
			<td><input type="text" name="TP"   value="<?php echo $P_Price; ?>"/></td>
		
		    <td width="16%">  <a href="Return.php?re=10110"><img src="imgs/Search-icon.png" title="Search Bil" width="30" height="30"/></a>
		  <a href="#" onClick="SaleReturn(); return false"><img src="imgs/salereturn.png" width="30" height="30" title="SALE RETURN"></a></td>
		</tr>
		<tr>
			<td>QTY</td>
			
			<td><input type="text" name="QTY" size="8"/>+<input type="text" name="PQTY" size="2" value="0"/></td>
			<td>Discount %</td>
			<td><input type="text" name="ItemDiscount" value="0" onKeyUp="ItemDist();"/></td>
			<td>Rate</td>
			<td><input type="text" name="Rate" value="<?php echo $P_Price; ?>" onFocus="if (this.value == '<?php echo $P_Price;?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php echo $P_Price;?>';}" /></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="16%"><input type="submit" name="submit" value="ENTER" /></td>
		</tr>
  </table></form>
  <div id="invoicearea"><br />


<table width="100%">
 	<tr>
		<th width="9%" style="border-bottom:solid; border-width:1px;">QTY</th>
		<th width="21%" style="border-bottom:solid; border-width:1px;">Company</th>
		<th width="47%" style="border-bottom:solid; border-width:1px;">Name</th>
		<th width="7%" style="border-bottom:solid; border-width:1px;">Rate</th>

		<th width="8%" style="border-bottom:solid; border-width:1px;">Amount</th>
		<th width="4%" style="border-bottom:solid; border-width:1px;">Del</th>
	</tr>
 </table>

 <div class="scroll" style="height:75%; width:100%;"> 
 
<table width="100%">
<?php 	
$Total_Amount=0;
$sr=1;
$rs=mysql_query("select * from temp,product where temp.Product_Id=product.Product_Id");				
	 while($newArray=mysql_fetch_array($rs)) {
	 							$TQTY= $newArray['TQTY'];
								$P_Name= $newArray['Name'];
								$S_Price= $newArray['Rate'];
								$Temp_Id= $newArray['Temp_Id'];
								$Tax= $newArray['Tax'];
								$Company_Id= $newArray['Company_Id'];
								$CId= $newArray['Customer_Id'];
								$PPQTY= $newArray['PQTY'];
								$Amount=($TQTY*$S_Price)+(($TQTY*$S_Price)*$Tax/100);
								$rsc=mysql_query("select * from accounts where account_Id='$Company_Id'");
	 while ($newArray = mysql_fetch_array($rsc)) 
	 									{
							$account_Name= $newArray['account_Name'];
							
									}
								 ?>
 	<tr >
		 	<tr >
		<td width="9%" align="center" style="border-bottom:dotted; border-width:1px;"><?php echo $TQTY.' + '.$PPQTY; ?></td>
		<td width="21%" style="border-bottom:dotted; border-width:1px; font-size:10px"><?php echo $account_Name; ?></td>
		<td width="47%" style="border-bottom:dotted; border-width:1px;"><?php echo $P_Name.' '.$Size; ?></td>
		<td width="7%" align="right" style="border-bottom:dotted; border-width:1px;"><?php echo number_format($S_Price, 2); ?></td>

		<td width="9%" align="right" style="border-bottom:dotted; border-width:1px;"><?php echo number_format($Amount, 2); ?></td>
		<td width="3%" align="right"><a href="Editsale.php?del=<?php echo $Temp_Id; ?>"><img src="imgs/DeleteRed.png" height="20" width="20" /></a></td>
	</tr>
	<?php $sr=$sr+1; $Total_Amount=$Total_Amount+$Amount; }  ?>
 </table> 
 </div>
  </div>
  
  <div id="bilarea">
  <table width="100%">
  	<tr bgcolor="7DFFE5">
			<td style="border-bottom:solid #000000;" colspan="2"><font color="#FF0000" size="+4">RS. <?php echo number_format($Total_Amount,2); ?></font></td>
	</tr>
	
  </table>
  
 
  <form name="form" onKeyUp="highlight(event)" onClick="highlight(event)" method="post" action="sale_Controller.php" onSubmit="return registration_emptyForm(this)">
	 <input type="hidden" name="InvoicNo" value="786"> 
  <input type="hidden" name="Code" value="<? echo $CId; ?>">
  <table align="right">
    <tr> 
      <td height="28"><font  size="4" face="Calibri">Date</font></td>
      <td><input type="text" name="Date"  class="tcal" value="<? echo $Date;?>" size="15"></td>
    </tr>
	 <tr> 
      <td height="28"><font  size="4" face="Calibri">Discount</font></td>
      <td><input type="text" name="Discount"  onKeyUp="DisAmt();" value="<? echo $EDiscount; ?>"></td>
    </tr>

	<tr> 
      <td height="28"><font  size="4" face="Calibri">Dis. %</font></td>
      <td><input type="text" name="DisP"  onKeyUp="DisPer();" onKeyDown="return DiscountTransfer(event)">	  </td>
    </tr>
	  <tr> 
      <td height="28"><font  size="4" face="Calibri">Total 
        Bill</font></td><?php $Total=$Total_Amount; $PBalance=$Ending_Balance; ?>
      <td><input type="text" name="TotalBill" value="<?php echo $Total;?>"  readonly="" tabindex="0">
	 <input type="hidden" name="Gbil" value="<?php echo $Total; ?>">	  </td>
    </tr>
	   <tr> 
      <td height="28"><font  size="4" face="Calibri">Cash</font></td>
      <td><input type="text" name="Cash" onKeyUp="Csh();"  onKeyDown="return dealtransfer(event)" value="<? echo $ECash; ?>">	  </td>
    </tr>
	 <tr> 
      <td height="28"><font  size="4" face="Calibri">Credit</font></td>
      <td><input type="text" name="BillBalance" value="<? echo $Total-$ECash-$EDiscount; ?>"></td>
    </tr>
	 <tr> 
      <td height="28"><font  size="4" face="Calibri">SaleMan</font></td>
      <td>
	  <select name="Saleman">
	  <option></option>
	  <? 	$rs=mysql_query("select * from accounts where account_type_Id=34");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$account_Name= $newArray['account_Name'];
							$account_Id= $newArray['account_Id'];
									 ?>
	  <option value="<? echo $account_Id; ?>"<? if ($account_Id==$SaleMan){ echo 'selected="selected"'; }?> ><? echo $account_Name; ?></option>
	 	<? } ?>
	  </select>	  </td>
    </tr>
	 <tr> 
      <td height="28"><font  size="4" face="Calibri">Remarks</font></td>
      <td><input type="text" name="Remarks" value="<? echo $Description; ?>"></td>
    </tr>
	 
	<tr>
		<td height="31" colspan="2" align="right">
   Name & Address 
     <input type="checkbox" value="1" name="Ad" checked="checked">		
   PRINT 
     <input type="checkbox" value="786" name="Print" checked="checked"><input name="Input" type="submit" value="SAVE"  tabindex="5" class="btn">	</td>
    </tr>
  </table>
</form>

<table>
<tr><td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8" >
		<font color="#FFFFFF" size="+2" >REPORTS</font>
		<img src="imgs/report-icon.png" width="25" height="25"></td>
 		</tr>
	<tr>
			<td> <form action="Reports/Sale_Print.php" target="_blank">
			<table>
				<tr>
				<td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
				<td>TO</td>
				<td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); }