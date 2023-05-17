const video = document.getElementById("myVideo");

video.addEventListener("timeupdate", function(){
	if(this.currentTime >= 9){
		this.style.transform = "scale(2.2)";
	}else{
		this.style.transform = "scale(1)";
	}
});

