<?phpnamespace FFDB;/*		  _______________//		 | 				 |//		 |	M.H.GOLKAR	 |//		 |	 FlatFire	 |//		 |	01.00[2012]	 |//		 |_______________|//::: Control panel Config File editor:::*/// function to change defined constant in config.phpfunction constantin($na=null,$in=null){	if($na!==null && $in!==null){		$config = _FFDIR_."Config.php";		$opinas = fopen($config,"r+");		clearstatcache(); set_file_buffer($opinas,0);		$configus = fread($opinas,filesize($config));		$patsun = "(\"".$na."\",";		$startan = strpos($configus,$patsun)+strlen($patsun);		if($startan){		$spartan = strpos($configus,");",$startan);			if($in===true || $in===false || $in==="true" || $in==="false") {				if((bool)$in) $replaco = "true"; else $replaco = "false";			}			if(is_numeric($in)) $replaco = (int)$in;			if(!@$replaco) $replaco = "\"".$in."\"";		$newingo = substr_replace($configus,$replaco,$startan,$spartan-$startan);		ftruncate($opinas,0); rewind($opinas);		fwrite($opinas,$newingo);		}	}	else return false;}// CONFIGURATIONif(isset($_POST["Con_calcata"])){	// ALLOW MIXED DATABASE	if(isset($_POST["allow_MX_db"])){		if($_POST["allow_MX_db"]==="No") constantin("_FF_mxd_db_",false);		else constantin("_FF_mxd_db_",true);	}	// Flat Fire Error Report	if(isset($_POST["allow_err"])){		if($_POST["allow_err"]==="No") constantin("_FF_ERR_",false);		if($_POST["allow_err"]==="Yes") constantin("_FF_ERR_",true);		if($_POST["allow_err"]==="SHORT") {constantin("_FF_ERR_",true); constantin("_FF_ERR_short_",true);}	}	// Maximum free element per database	if(isset($_POST["conf_max_frr"])){		if($_POST["conf_max_frr"]==="UNLIMITED") constantin("_FF_E_MAX_","UNLIMITED");		if(is_numeric($_POST["conf_max_frr"])) constantin("_FF_E_MAX_",(int)$_POST["conf_max_frr"]);	}	// use plugins	if(isset($_POST["allow_plugs"])){		if($_POST["allow_plugs"]==="No") constantin("_FF_Plug_in_",false);		else constantin("_FF_Plug_in_",true);	}	// api	if(isset($_POST["allow_api_use"])){		if($_POST["allow_api_use"]==="Yes") constantin("_FF_use_api_",true);		if($_POST["allow_api_use"]==="No") constantin("_FF_use_api_",false);		if($_POST["api_tlimit"]==="DEF") constantin("_FF_api_time_",60);		if(is_numeric($_POST["api_tlimit"])) constantin("_FF_api_time_",(int)$_POST["api_tlimit"]);	}if(@$opinas) @fclose($opinas);}//echo "<h1>CONFIGURATIONS</h1>";include_once(_FFDIR_."Panel/Includes/Settings/Toolbar.php");//?><div class="configasus"><h2>Configurations</h2><form action="<?php echo $_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]?>" method="POST"><input type="submit" class="creatbot" name="Con_calcata" value="Save"/><!-- allow mixed database --><fieldset><b>Allow Mixed database</b><br/><span>Do You wan to mix table structured and free element databases?</span><br/>	<input type="radio" name="allow_MX_db" value="Yes" /><span>Yes</span>	<input type="radio" name="allow_MX_db" value="No" /><span>No</span></fieldset><!-- report FFDB short/detailed Errors --><fieldset><b>Flat Fire Error Report</b><br/><span>Flat Fire can report detailed or short messages on almost any error...</span><br/><span>What do you wan?</span><br/>	<input type="radio" name="allow_err" value="Yes" /><span>Report detailed</span>	<input type="radio" name="allow_err" value="SHORT" /><span>Only messages</span>	<input type="radio" name="allow_err" value="No" /><span>Dont report</span></fieldset><!-- Maximum free element per database --><fieldset><b>Maximum FE/D</b><br/><span>Maximum Free Elements per database</span><br/>	<input type="number" min="0" name="conf_max_frr" /><span>Elements or</span>	<input type="radio" name="conf_max_frr" value="UNLIMITED" /><span>Unlimited</span></fieldset><!-- use plugins --><fieldset><b>Plugins</b><br/><span>Loading all Plugins</span><br/>	<input type="radio" name="allow_plugs" value="Yes" /><span>On script start or</span>	<input type="radio" name="allow_plugs" value="No" /><span>Never</span><br/><span>to change specific plugin activation status go to Plugins page in dashboard</span></fieldset><!-- api? --><fieldset><b>API</b><br/><span>Do You wan to use api?</span><br/>	<input type="radio" name="allow_api_use" value="Yes" /><span>Yes</span>	<input type="radio" name="allow_api_use" value="No" /><span>No</span><br/><span>Flat Fire Api has a request time limit for security reasons, Do You wan to change that?</span><br/>	<input type="number" name="api_tlimit" style="width:3em;text-indent:5px;" value="60" /><span> Seconds or</span>	<input type="radio" name="api_tlimit" value="DEF" /><span>Default</span><br/></fieldset><br/><input type="submit" class="creatbot" name="Con_calcata" value="Save"/></form></div>