<?phpnamespace FFDB;/*		  _______________//		 | 				 |//		 |	M.H.GOLKAR	 |//		 |	 FlatFire	 |//		 |	01.00[2012]	 |//		 |_______________|//::: Control panel Database Editor:::*/// redirectif(!isset($_GET["d"]) && !isset($_GET["s"]) && !isset($_GET["ed"]))	@header("Location: ".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."&ed=Jobs");if(isset($_POST["F1"]) || isset($_POST["T1"]) || @$_POST["do"]=="Remove Selectedt" )	@header("Location: ".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]);if(isset($_POST["do"]) && $_POST["do"]=="Delete Element")	@header("Location: ".$_SERVER["PHP_SELF"]."?p=databases&ed=Tree");if(isset($_POST["do"]) && $_POST["do"]=="Delete Table")	@header("Location: ".$_SERVER["PHP_SELF"]."?p=databases&ed=Tree");// Listings$alllist = privilege_list(true);$userli = array();$dblist = real_db_list();foreach($alllist as $in){	if(!in_array($in["user"],$userli)) array_push($userli,$in["user"]);}$trree = true;?><h1>DB EDITOR</h1><!-- Toolbar --><?php include_once("Panel/Includes/Databases/Jobs/Toolbar.php") ?><form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">	<!--editboxes-->	<div class="rigga">	<input type="text" style="display:none" value="databases" name="p">	<input type="text" style="display:none" value="Editor" name="l"/>	<input type="submit" value="Jobs" class="<?php echo(@$_GET["ed"]!=="Jobs"?"rigga":"rigga_sel") ?>" name="ed"/>	<input type="submit" value="Tree" class="<?php echo(@$_GET["ed"]!=="Tree"?"rigga":"rigga_sel") ?>" name="ed"/>	</div></form><!-- Explorer --><form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">	<input type="text" style="display:none" value="databases" name="p">	<?php if(!isset($_GET["l"]) && !$_GET["l"]==="Edit" && !$_GET["l"]==="Editor" )	echo"<input type=\"text\" style=\"display:none\" value=\"Editor\" name=\"l\"/>"	?>	<?php if(isset($_GET["ed"]) && $_GET["ed"]==="Jobs" ) $trree = false;?>	<?php if(isset($_GET["ed"]) && $_GET["ed"]==="Tree" ) $trree = true; ?>	<?php if(!isset($_GET["ed"]) && !isset($_GET["d"]) && isset($_GET["l"])) $trree = false; ?>	<div id="Databases_list">		<!-- tree of database and elements (Free/table) -->		<?php if($trree) include_once("Panel/Includes/Databases/Jobs/Tree.php"); ?>	</div></form><!-- Database edit box --><?php if(isset($_GET["ed"]) && $_GET["ed"]==="Jobs")	include_once("Panel/Includes/Databases/Jobs/Edit_box_db.php");?><form action="<?php echo $_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"] ?>" method="POST">		<!-- Entities -->	<div id="Database_EditBox">		<!-- Edit Panel -->		<?php if($trree) include_once("Panel/Includes/Databases/Jobs/Edit_box_tree.php"); ?>	</div></form><form action="<?php echo $_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"] ?>" method="POST">		<!-- Edit Panel Widgets -->		<?php		if($trree && isset($_GET["s"]) && free_existance($_GET["s"]))			include_once("Panel/Includes/Databases/Jobs/tree_new_free_job.php");		if($trree && isset($_GET["s"]) && table_exists($_GET["s"]))			include_once("Panel/Includes/Databases/Jobs/tree_new_table_job.php");		if($trree && isset($_GET["s"]) && isset($_GET["d"])) include_once("Panel/Includes/Databases/Jobs/tree_to_x_port_job.php");		?></form><!-- REPORT --><?php if(@$raportaj!==null) echo "<div id=\"ff_tree_report\" ><p>".$raportaj."</p></div><br/>";?>