<html>
	<header>
		<link type="text/css" rel="stylesheet" href="dslWeb_Assets/style.css"/> 
		<script type="text/javascript" src="dslWeb_Assets/js/si.files.js"></script>
		<script type="text/javascript" language="javascript"> // <![CDATA[
			SI.Files.stylizeAll();</script>
	</header>
	<body>

		<div id="mycontainer">
			<div id="banner"></div>
			<div id = "line"></div>
			<div id="main">
				<div id="dStatus">
					<div id ="dStatus1">
						<h1>DSL SEGREGATOR&copy;: </h1><h1>Benguet Electric Cooperative</h1>
					</div>
						<?php include_once 'dslWeb.php';?>
						<div class = "error">
							<p><?php 
								if (isset($_SESSION['outEcho'])){
										echo $_SESSION['outEcho'];
								}
								?>
						   </p>	
						</div>
				</div>
					<div id="dList"><?php include_once 'index.php';?></div>
			</div>
			<div class="clear"></div>
			<div id="footer"><div id="copy">DSL SEGREGATOR&copy;. Benguet Electric Cooperative.</div></div>
		</div>	
	</body>
</html>