<?phpnamespace FFDB;/*		  _______________//		 | 				 |//		 |	M.H.GOLKAR	 |//		 |	 FlatFire	 |//		 |_______________|  *///	::: free_element existance :::// function: free_existance(id); returns file name of exist free element or false if dosent exists// input: id (name of element)// but first connect to database using connect(database,user,pass)// ____________________________________________//function free_existance($in = null){global $indb;	//	if ( $indb && connected($indb["db"]) && $in!=null ) {		// find where is the element			$idx = _FFDBDIR_.$indb["db"]."/".$indb["db"].".idx";			$oidx = @fopen($idx,"r");			if($oidx){			clearstatcache();			$idxstr = fread($oidx,filesize($idx));			$idxpat = pure_encode($in)."[=]";			$idxget = stristr($idxstr,$idxpat);			$pluserpos = strpos($idxget,"[+]");			$findex = substr($idxget,strlen($idxpat),$pluserpos-strlen($idxpat));			// if exists return file name			if($findex) return $findex; else return false;			}			else return false;		}		elseif($in==null){		trigger_error("bad function invoking: input is null",E_USER_WARNING);		return false;		}		else{		trigger_error("first connect to database",E_USER_WARNING);		return false;		}}?>