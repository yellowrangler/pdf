<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
<script>
$( document ).ready(function() {
	$( "#createpdf1" ).click(function() {
		$.ajax({
		    url : "createpdf.php",
		    type: "POST",
		    //data : formData,
		    success: function(data)
		    {
		        var i = 1;
		        // $("#showpdf").html(data);
		        window.open(data);
		    },
		    error: function (request, textStatus, errorThrown)
		    {
		 
		    }
		});
	});

	$( "#createpdf2" ).click(function() {
		$.ajax({
		    url : "h2p.php",
		    type: "POST",
		    //data : formData,
		    success: function(data)
		    {
		        var i = 1;
		        // $("#showpdf").html(data);
		        // window.open(data);
		    },
		    error: function (request, textStatus, errorThrown)
		    {
		 
		    }
		});
	});

	$( "#convertpdf" ).click(function() {
		$.ajax({
		    url : "convertpdf2tiff.php",
		    type: "POST",
		    //data : formData,
		    success: function(data)
		    {
		        var i = 1;
		        $("#showimage").html("<img src='"+data+"'>");
		        //window.open(data);
		    },
		    error: function (request, textStatus, errorThrown)
		    {
		 
		    }
		});
	});
});
</script>
<br />
This will cerate pdf file usinf FPDF library<button id="createpdf1" type="button">Create PDF with FPDF</button>
<br />
<br />
<br />
This will cerate pdf file usinf HTML2PDF library<button id="createpdf2" type="button">Create PDF with HTM2PDF</button>
<br />
<br />

This will conver pdf file to tiff <button id="convertpdf" type="button">Convert PDF</button>
<br />
<br />
<div id="showimage"></div>
</body>
</html>
