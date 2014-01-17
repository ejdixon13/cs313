function changeColor()
{
	//alert("Color chANGe");
	var textColor = document.getElementById("homeText").style.color;
	
	if (textColor == "yellow") {
		document.getElementById("homeText").style.color = 600000;
	}
	else
		document.getElementById("homeText").style.color = "yellow";
	
	
}