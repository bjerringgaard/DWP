<?php
$csColorClass = '';
$csFontClass = '';

$csFontSql = "SELECT TextStylingFont
					FROM textstyling";
$csFontResult = mysqli_query($conn, $csFontSql);
if (mysqli_num_rows($csFontResult) > 0) {
	while($csFont = mysqli_fetch_assoc($csFontResult)) {
		if($csFont['TextStylingFont'] == "Bold"){$csFontClass='csBold';}
		if($csFont['TextStylingFont'] == "Italic"){$csFontClass='csItalic';}
		else($csFont['TextStylingFont'] == "Regular"){$csFontClass='csRegular'};
	}
}

$csColorSql = "SELECT TextStylingColor
					FROM textstyling";
$csColorResult = mysqli_query($conn, $csColorSql);
if (mysqli_num_rows($csColorResult) > 0) {
	while($csColor = mysqli_fetch_assoc($csColorResult)) {
		if($csColor['TextStylingColor'] == "Red"){$csColorClass='csRed';}
		if($csColor['TextStylingColor'] == "Green"){$csColorClass='csGreen';}
		if($csColor['TextStylingColor'] == "Cyan"){$csColorClass='csCyan';}
		if($csColor['TextStylingColor'] == "Blue"){$csColorClass='csBlue';}
		if($csColor['TextStylingColor'] == "Yellow"){$csColorClass='csYellow';}
		if($csColor['TextStylingColor'] == "Purple"){$csColorClass='csPurple';}
		else($csColor['TextStylingColor'] == "White"){$csColorClass='csWhite'};
	}
}
$csTextStylingClass = $csColorClass .' '. $csFontClass;
?>