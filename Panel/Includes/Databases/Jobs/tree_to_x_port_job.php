<?phpnamespace FFDB;/*		  _______________//		 | 				 |//		 |	M.H.GOLKAR	 |//		 |	 FlatFire	 |//		 |	01.00[2012]	 |//		 |_______________|//::: Control panel send to Xport:::*/?><form action="<?php echo $_SERVER["PHP_SELF"]."?p=databases&l=Export";?>" method="POST" ><input style="display:none;" name="ff_x_port_db" value="<?php echo $_GET["d"] ?>" /><input style="display:none;" name="ff_x_port_it" value="<?php echo $_GET["s"] ?>" /><input type="submit" value="Xport" /></form>