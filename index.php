<html>
	<head>
		<title>Text Summarization</title>
		<!-- Bootstrap -->
    	<link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
    	<link href="./css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    	<link href="./css/bootswatch.css" rel="stylesheet" media="screen">
    	<script type="text/javascript">
    		function printValue(sliderID, textbox) {
            var x = document.getElementById(textbox);
            var y = document.getElementById(sliderID);
            x.value = y.value;
        }
    	</script>
	</head>
</script>
	    
	    <style type="text/css">
<!--
.style1 {font-size: 12px}
-->
        </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<marquee> @PENERAPAN METODE TERM FREQUENCY-INVERSE DOCUMENT FREQUENCY (TF-IDF) UNTUK TEXT SUMMARIZATION </marquee>
	<body>
		<?php
		error_reporting(E_ERROR | E_PARSE);
		include "./summarize.php";
		
		// scan nama file korpus
		$dir_corpus = "./corpus";
		$files 		= scandir($dir_corpus);
		$files		= array_slice($files, 2);
		//print_r($files);
		
		// hasil
		if(isset($_GET["filename"]) && isset($_GET["compression"])) {
			$filename	 = $_GET["filename"];
			$compression = $_GET["compression"];
			$output 	 = summarize($filename, $compression);
			$title 		 = substr($filename, 0, -4);
		}

		?>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="index.php">RingkasGeh!</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li><a class="brand" style="margin-left:85px;"><?php echo $title;?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	    <div class="container-fluid">
			<div class="row-fluid">
				<div class="span3">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
						<form action="index.php" method="GET">
							<li class="nav-header style1">
							  <div align="center">
							    <p>Peringkasan Dokumen</p>
							    <p>&nbsp;</p>
							  </div>
							</li>
							<li>
								<select class="span3" name="filename" style="width:100%;">
									<option value="0">Pilih File</option>
									<?php
									foreach ($files as $key => $value) {
										$title = str_replace("_", " ", substr($value, 0, -4));
										if($filename == $value) {
											echo "<option value='$value' SELECTED>$title</option>";
										}
										else {
											echo "<option value='$value'>$title</option>";
										}
									}
									?>
								</select>
							</li>
							<li class="nav-header style1">Set Kompresi rate %</li>
							<li>
								<table border="0">
									<tr>
										<td><input type="range" id="slider" min="1" max="100" value="<?php echo !empty($compression)? $compression : '';?>" step="1" style="width:100%;" onChange="printValue('slider','rangeValue')"></td>
										<td><input type="text" id="rangeValue" name="compression" value="<?php echo !empty($compression)? $compression : '50';?>" style="width:35px;" /></td>
									</tr>
								</table>
							</li>
							<li class="nav-header"></li>
							<li><input class="btn btn-primary" type="submit" value="RINGKAS" style="float: right;"></li>
							<li>&nbsp;</li>
						</form>
						</ul>
					</div><!--/.well -->

					<div class="well sidebar-nav">
						<ul class="nav nav-list">
						<div align="center">Upload Dokumen</div>
							</li>
								<div class="page-title text-center"> 
								<hr class="pg-titl-bdr-btm"></hr> </div>
								<form method="post" enctype="multipart/form-data" action="upload.php">
									<input class="form-control text-field-box" style="width:100%;" type="file" name="file"> 
									<input class="btn btn-primary" type="submit" name="submit" value="UPLOAD" style="float: right;">
								</form>
						</form>
						</ul>
					</div>
				</div><!--/span-->


				<div class="span9">
					<div class="row-fluid" style="margin-top:0px;">
						<div class="span6">
							<h2 align="center" class="label-success"> <strong>Teks Asli </strong></h2>
							<p align="justify"><?php echo !empty($output['original'])? $output['original'] : "";?></p>
						</div><!--/span-->
						<div class="span6">
							<h2 align="center" class="btn-success"><strong>Hasil Ringkasan </strong></h2>
							<p align="justify"><?php echo !empty($output['summary'])? $output['summary'] : "";?></p>
						</div><!--/span-->
					</div><!--/row-->
				</div><!--/span-->
			</div><!--/row-->

			<hr>
			<footer>
			<p>2021 ©Rivaldi Amru 1611010125</p>
			</footer>
	    </div><!--/.fluid-container-->

	    <script src="./js/latest.js"></script>
	    <script src="./js/bootstrap.min.js"></script>
	</body>
</html>