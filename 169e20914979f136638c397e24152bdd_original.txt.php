include ("head.php");
/*$date=date("Y-m-d");
	$rsac=mysql_query("select * from accounts,account_type where accounts.account_type_Id=account_type.account_Type_Id");
	 while ($newArray = mysql_fetch_array($rsac)) 
	 									{
							$account_Id= $newArray['account_Id'];
							$Opning_Balenc= $newArray['Opning_Balenc'];
							$Favorable_Balance  = $newArray['Favorable_Balance'];
							
	$CB=0;
	$CB=$Opning_Balenc;
	$rsleg=mysql_query("select * from ledger where Account_Id='$account_Id'");
	 while ($newArray = mysql_fetch_array($rsleg)) 
	 									{
							if ($Favorable_Balance=='DR'){ $CB=$CB+($newArray['Dr']-$newArray['Cr']); } else { $CB=$CB+($newArray['Cr']-$newArray['Dr']); }
						
										}
								$rs=mysql_query("UPDATE accounts SET Close_Date='$date',Close_balenc='$CB' where account_Id='$account_Id'");
									}	
*/
$rs=mysql_query("select * from purch");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$expdate = $newArray['date'];
							$id = $newArray['id'];
}
if($expdate<date("Y-m-d") || $id==2)
{
 echo "<font color=red>Trial Expair</font>";
mysql_query("update purch set id=2");
} else {
?>
<body><form name="sampleform" onKeyUp="highlight(event)" onClick="highlight(event)" method="post" action="" >
  <table  width="99%" style="border-radius: 20px; box-shadow: 10px 10px 5px #888888; background-color:#E5F3FB; border:solid #70C0E7; ">
  
  		<tr>
		<td width="33%" rowspan="2" align="center"><strong><font size="+5">Reports</font></strong></td>
			
		</tr>
  </table></form>
  <div id="invoicearea">

  
  
  <form action="Reports/Sale_Summary.php" target="_blank">
			<table align="right">
			<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">SALE SUMMARY</td>
</tr>
				<tr>
				<td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
				<td>TO</td>
				<td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
				<td>
					<select name="Area">
						<option value="">ALL</option>
						<?
								$rs=mysql_query("select Specific_use, count(*) from specification_uasils where Specification_Id=12 group by Specific_use");
	 while ($newArray = mysql_fetch_array($rs))
								 {
								 
								   $Specific_use=$newArray['Specific_use'];
						?><option value="<? echo $Specific_use; ?>"><? echo $Specific_use; ?></option><? } ?>
					</select>
				</td>
				</tr>
				<tr>
					<td colspan="3"> <input type="hidden" value="<?php echo $ProductId; ?>" name="Bank"><br>
Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"> 
 <input type="submit" value="Report"></td>
				</tr>
			</table>
 </form>
<form name="sampleform" action="Reports/Sale_Print.php" target="_blank" onKeyUp="highlight(event)" onClick="highlight(event)" method="post" onSubmit="return Select_Date(this)">
		  <br>
		 
            <table style="margin-left:60;">
              <tr> 
                <td width="111" align="center"><font color="990000" face="Courier" >From</font></td>
                <td ><font face="Courier">&nbsp;</font></td>
                <td width="143" align="center"><font color="990000" face="Courier">TO</font></td>                
             </tr>
              <tr> 
                <td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
      <td></td>
      <td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
      
       </tr>
	   <tr>
	    <td width="111" align="center"><font color="990000" face="Courier" >Product</font></td>
			   <td width="111" align="center"><font color="990000" face="Courier" >Customer</font></td>
			    <td width="143" align="center"><font color="990000" face="Courier" >Company</font></td>
              </tr>
	   <tr>
	   <td > 
	  <input type="hidden" name="Expense" id="PName_hidden">
	  <input type="text" name="PName" id="prdSearch"  value="ALL" onKeyUp="ajax_showOptions4(this,'getCountriesByLetters',event)" onFocus="if (this.value == 'ALL') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'ALL';}"  size="15">
	  
	  </td>

	   <td>
	  <input type="hidden" name="CustomerId" id="Customer_hidden">
	  <input type="text" name="Customer" id="prdSearch"  value="ALL" onKeyUp="ajax_showOptions(this,'getCountriesByLetters',event)" onFocus="if (this.value == 'ALL') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'ALL';}" size="15" >
	  </td>
	   <td > 
	  <input type="hidden" name="Company" id="CName_hidden">
	  <input type="text" name="CName" id="prdSearch"  value="ALL" onKeyUp="ajax_showOptions6(this,'getCountriesByLetters',event)" onFocus="if (this.value == 'ALL') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'ALL';}"  size="15">
	  
	  </td>
	  </tr>
    <tr> 
      <td>&nbsp;</td>
 
      <td colspan="2" align="right"> <select name="Saleman">
<option value="All"></option>
	  <? 	$rs=mysql_query("select * from accounts where account_type_Id=34");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$account_Name= $newArray['account_Name'];
							$account_Id= $newArray['account_Id'];
									 ?>
	  <option value="<? echo $account_Id; ?>"><? echo $account_Name; ?></option>
	 	<? } ?>
	  </select></td>
     

    </tr>
    <tr> 
      <td colspan="2">Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"> </td>

      <td  align="right"> 
	  <select name="id">
	  	<option>Sale</option>
		<option value="786">Purchase</option>
		<option value="7862">Purchase Return</option>
		<option value="7861">Sale Return</option>
		<option value="7867">Profit</option>
		</select>
          <input type="submit" name="Submit" value="Report" class="btn"/>
     </td>
    </tr>
 </table>
  </form>
  <hr>
<form action="Reports/Print_All.php" target="_blank">
<input type="hidden" name="Account" value="11000">

<table align="right" >
<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="4">Print</td>
</tr>
<tr>
	<td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
	<td>TO</td>
	<td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
	
	 <td>
	  <select name="Saleman">

	  <? 	$rs=mysql_query("select * from accounts where account_type_Id=34");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$account_Name= $newArray['account_Name'];
							$account_Id= $newArray['account_Id'];
									 ?>
	  <option value="<? echo $account_Id; ?>"><? echo $account_Name; ?></option>
	 	<? } ?>
	  </select>	  </td>

</tr>
<tr>
	<td colspan="3"></td>
	<td align="right"><input type="submit" value="Print"></td>
</tr>
</table></form>

<form action="Reports/Load.php" target="_blank">
<input type="hidden" name="Account" value="11000">

<form action="Reports/Load.php" target="_blank">
<input type="hidden" name="Account" value="11000">
<table align="right" >
<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="4">LOAD SHEET</td>
</tr>
<tr>
	<td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
	<td>TO</td>
	<td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
	
	 <td>
	  <select name="Saleman">

	  <? 	$rs=mysql_query("select * from accounts where account_type_Id=34");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$account_Name= $newArray['account_Name'];
							$account_Id= $newArray['account_Id'];
									 ?>
	  <option value="<? echo $account_Id; ?>"><? echo $account_Name; ?></option>
	 	<? } ?>
	  </select>	  </td>

</tr>
<tr>
	<td colspan="3">Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td>
	<td align="right"><input type="submit" value="Report"></td>
</tr>
</table></form>

<form action="Reports/Product_Sale.php" target="_blank">
<input type="hidden" name="Account" value="11000">
<table align="right" >
<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">PRODUCT SALE</td>
</tr>
<tr>
	<td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
	<td>TO</td>
	<td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
</tr>
<tr>
	<td colspan="2">Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td>
	<td align="right"><input type="submit" value="Report"></td>
</tr>
</table></form>


<form action="Reports/Recovery.php" target="_blank">
<input type="hidden" name="Account" value="11000">
<table align="right" >
<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">RECOVERY REOPRT</td>
</tr>
<tr>
	<td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
	<td>TO</td>
	<td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
</tr>
<tr>
	<td colspan="2">Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td>
	<td align="right"><input type="submit" value="Report"></td>
</tr>
</table></form>
<form action="Reports/Party_Ledger_saleman.php" target="_blank">
  <table >
  	<tr>
		<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">Saleman Party</td>
</tr>
		<td>Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td>
		<td><input type="submit" value="Report"></td>
		<td>
	  <select name="Saleman">

	  <? 	$rs=mysql_query("select * from specification_uasils where Specification_Id=16 GROUP BY Specific_use");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$Specific_use= $newArray['Specific_use'];
						
									 ?>
	  <option value="<? echo $Specific_use; ?>"><? echo $Specific_use; ?></option>
	 	<? } ?>
	  </select>	  </td>

	</tr>		
  </table></form>
  
  <form action="Reports/Party_Ledger_saleman_Recovery.php" target="_blank">
  <table >
  	<tr>
		<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">Saleman Recovery</td>
</tr>
<tr>
	<td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
	<td>TO</td>
	<td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
</tr>

<tr>
		<td>Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td>
		<td><input type="submit" value="Report"></td>
		<td>
	  <select name="Saleman">

	  <? 	$rs=mysql_query("select * from specification_uasils where Specification_Id=16 GROUP BY Specific_use");
	 while ($newArray = mysql_fetch_array($rs)) 
	 									{
							$Specific_use= $newArray['Specific_use'];
						
									 ?>
	  <option value="<? echo $Specific_use; ?>"><? echo $Specific_use; ?></option>
	 	<? } ?>
	  </select>	  </td>

	</tr>		
  </table></form>

<form action="Reports/TrialBalance.php" target="_blank">
  <table align="right">
  	<tr>
		<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">Trial Balance</td>
</tr>
		<td>Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td>
		<td><input type="submit" value="Report"></td>
	</tr>		
  </table></form>

  
<form action="Reports/Party_Ledger.php" target="_blank">
  <table align="right">
  	<tr>
		<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">Party Ledger</td>
</tr>
		<td>Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td>
		<td><input type="submit" value="Report"></td>
	</tr>		
  </table></form>
  

<form action="Reports/CusDetail.php" target="_blank">
<input type="hidden" name="Account" value="11000">
<table align="right" >
<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">Cash Register</td>
</tr>
<tr>
	<td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
	<td>TO</td>
	<td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
</tr>
<tr>
	<td colspan="2">Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td>
	<td align="right"><input type="submit" value="Report"></td>
</tr>
</table></form>

</div>


  
  <div id="bilarea">
 <form action="Reports/CusDetail.php" target="_blank"><br>
  	<table  align="center">
	<tr>
				<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="2">ACCOUNTS REPORT</td>
				
		</tr>
		 <tr> 
                <td  align="center"><font color="990000" face="Courier" >From</font></td>
                
                <td align="center"><font color="990000" face="Courier">TO</font></td>                
             </tr>
              <tr> 
				   <td><input type="text" name="From" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
				  
				  <td><input type="text" name="To" class="tcal"  size="9" value="<? if ($date!=NULL){ echo $date; } else { echo date("d-m-Y"); } ?>"/></td>
       		</tr>
		<tr>
				
				<td colspan="3"><div id="Account" style="width:200px; height:30px;"></div></td>
		</tr>
	
		<tr>
				<td colspan="2" ><input type="radio" name="we" value="0" checked="checked">Web<input type="radio" name="we" value="1">Word<input type="radio" name="we" value="2">Excel
				
				
		</tr>
		<tr>
				<td colspan="2" align="right">
				
				<input type="submit" value="REPORT" />
		</tr>
	
	
	</table>
</form>
<hr>
<form action="Reports/IncomeStatment.php" target="_blank">
  <table align="right">
  	<tr>
		
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">INCOME STATEMENT</td>
</tr>
<tr>
	<td><input type="text" name="From" class="tcal"  size="9" value="<?  echo date("d-m-Y");  ?>"/></td>
	
	<td><input type="text" name="To" class="tcal"  size="9" value="<? echo date("d-m-Y");
  ?>"/></td>
</tr>
<tr>
		<td >Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td>
		<td><input type="submit" value="Report"></td>
	</tr>		
  </table></form>
  
  <HR>
  <form action="Reports/BalanceSheet.php" target="_blank">
  <table align="right">
  	<tr>
		<tr>
	<td style="border:groove #CCCCCC;border-radius: 10px;" align="center" bgcolor="#AFCBE8"  colspan="3">BALANCE SHEET</td>
</tr>
		<td>Web<input type="radio" name="we" value="0" checked="checked">Word<input type="radio" name="we" value="1">Excel<input type="radio" name="we" value="2"></td></tr>
		<tr>
		<td align="right" colspan="3"><input type="submit" value="Report"></td>
	</tr>		
  </table></form>
  </div>
<script>	
		
		var zA=new dhtmlXCombo("Account","Account",200);
	  	zA.enableFilteringMode(true);
		zA.loadXML("php/Accounts.php")	
	</script>
	<?php }