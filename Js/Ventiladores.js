/**   Trabajo final de proyecto de grado by JUAN PABLO PRIETO
         Tema: Sistema de Invernadero Automatico (SIA)
         Carrera: Lic. en Analisis de Sistemas Informaticos.
         Institucion: Universidad Autonoma de Encarnacion (UNAE).
         Pais: Paraguay
         Dto. Itapua
         Ciudad: Encarnacion
   **/
///////////////////////////////////////////////////////////////////////////
///  CODIGO PARA HACER GIRAR VENTILADORES //////////
/////////////////////////////////////////////////////

//// Ventilador para temperatura de aire caliente
    function VentiladorCaliente(){
      ventiCaliente = $('#ventiladorCaliente').val();
     return ventiCaliente;
}
	var cSpeed=1;
	var cWidth=150;
	var cHeight=150;
	var cTotalFrames=20;
	var cFrameWidth=150;
	var cImageSrc='Img/ventiCaliente.gif';

	var cImageTimeout=false;
	var cIndex=0;
	var cXpos=0;
	var cPreloaderTimeout=false;
	var SECONDS_BETWEEN_FRAMES=0;

	function startAnimation(){

		document.getElementById('ventiCaliente').style.backgroundImage='url('+cImageSrc+')';
		document.getElementById('ventiCaliente').style.width=cWidth+'px';
		document.getElementById('ventiCaliente').style.height=cHeight+'px';

		//FPS = Math.round(100/(maxSpeed+2-speed));
		FPS = Math.round(120/cSpeed);
		SECONDS_BETWEEN_FRAMES = 1 / FPS;

		cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES/1000);

	}

	function continueAnimation(){

		cXpos += cFrameWidth;
		//increase the index so we know which frame of our animation we are currently on
		cIndex += 1;

		//if our cIndex is higher than our total number of frames, we're at the end and should restart
		if (cIndex >= cTotalFrames) {
			cXpos =0;
			cIndex=0;
		}

		if(document.getElementById('ventiCaliente'))
			document.getElementById('ventiCaliente').style.backgroundPosition=(-cXpos)+'px 0';
         if(VentiladorCaliente()==1){
            cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES*1000);
                                         }else{stopAnimation();}
    }

	function stopAnimation(){//stops animation
		clearTimeout(cPreloaderTimeout);
		cPreloaderTimeout=false;
	}

	function imageLoader(s, fun)//Pre-loads the sprites image
	{
		clearTimeout(cImageTimeout);
		cImageTimeout=0;
		genImage = new Image();
		genImage.onload=function (){cImageTimeout=setTimeout(fun, 0)};
		genImage.onerror=new Function();
		genImage.src=s;
	}

	//The following code starts the animation
	new imageLoader(cImageSrc, 'startAnimation()');
	
	/// Ventilador para temperatura de aire Fria
    function VentiladorFrio(){
      ventiFrio     =$('#ventiladorFrio').val();
      return ventiFrio;
}
 	var cSpeedAireFria=2;
	var cWidth=150;
	var cHeight=150;
	var cTotalFrames=20;
	var cFrameWidth=150;
	var cImgVentiFrio='Img/ventiFrio.gif';

	var cImageTimeoutVentiFrio=false;
	var cIndex=0;
	var cXpos=0;
	var cPreloaderTimeoutVentiFria=false;
	var SECONDS_BETWEEN_FRAMES=0;

	function startVentiFrio(){

		document.getElementById('ventiFrio').style.backgroundImage='url('+cImgVentiFrio+')';
		document.getElementById('ventiFrio').style.width=cWidth+'px';
		document.getElementById('ventiFrio').style.height=cHeight+'px';

		//FPS = Math.round(100/(maxSpeed+2-speed));
		FPS = Math.round(100/cSpeedAireFria);
		SECONDS_BETWEEN_FRAMES = 1 / FPS;

		cPreloaderTimeoutVentiFria=setTimeout('continueVentiFrio()', SECONDS_BETWEEN_FRAMES/1000);

	}

	function continueVentiFrio(){

		cXpos += cFrameWidth;
		//increase the index so we know which frame of our animation we are currently on
		cIndex += 1;

		//if our cIndex is higher than our total number of frames, we're at the end and should restart
		if (cIndex >= cTotalFrames) {
			cXpos =0;
			cIndex=0;
		}

		if(document.getElementById('ventiFrio'))
			document.getElementById('ventiFrio').style.backgroundPosition=(-cXpos)+'px 0';
     if(VentiladorFrio()==1){
	cPreloaderTimeoutVentiFria=setTimeout('continueVentiFrio()', SECONDS_BETWEEN_FRAMES*1000);
                                 }else{stopVentiFrio();}
    }

	function stopVentiFrio(){//stops animation
		clearTimeout(cPreloaderTimeoutVentiFria);
		cPreloaderTimeoutVentiFria=false;
	}

	function imgVentiFrio(s, fun)//Pre-loads the sprites image
	{
		clearTimeout(cImageTimeoutVentiFrio);
		cImageTimeout=0;
		genImage = new Image();
		genImage.onload=function (){cImageTimeoutVentiFrio=setTimeout(fun, 0)};
		genImage.onerror=new Function();
		genImage.src=s;
	}

	//The following code starts the animation
	new imgVentiFrio(cImgVentiFrio, 'startVentiFrio()');
	
//////////////////////////////////////////////////////////////////////////////////////
////// codigo sol////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
    function Sol(){
     if(Regar()!=1){
     return 1;
   }
}
    var solSpeed=100;
	var solWidth=128;
	var solHeight=128;
	var solTotalFrames=20;
	var solFrameWidth=128;
	var solImageSrc='Img/sol.gif';

	var solImageTimeout=false;
	var solIndex=0;
	var solXpos=0;
	var solPreloaderTimeout=false;
	var SECONDS_BETWEEN_FRAMES=0;

	function startAnimationSol(){

		document.getElementById('sol').style.backgroundImage='url('+solImageSrc+')';
		document.getElementById('sol').style.width=solWidth+'px';
		document.getElementById('sol').style.height=solHeight+'px';

		//FPS = Math.round(100/(maxSpeed+2-speed));
		FPS = Math.round(100/solSpeed);
		SECONDS_BETWEEN_FRAMES = 1 / FPS;

		solPreloaderTimeout=setTimeout('continueAnimationSol()', SECONDS_BETWEEN_FRAMES/1000);

	}

	function continueAnimationSol(){

		solXpos += solFrameWidth;
		//increase the index so we know which frame of our animation we are currently on
		solIndex += 1;

		//if our cIndex is higher than our total number of frames, we're at the end and should restart
		if (solIndex >= solTotalFrames) {
			solXpos =0;
			solIndex=0;
		}

		if(document.getElementById('sol'))
			document.getElementById('sol').style.backgroundPosition=(-solXpos)+'px 0';
        if(Sol()==1){
		solPreloaderTimeout=setTimeout('continueAnimationSol()', SECONDS_BETWEEN_FRAMES*1000);
        }else{stopAnimationSol();}
    }

	function stopAnimationSol(){//stops animation
		clearTimeout(solPreloaderTimeout);
		solPreloaderTimeout=false;
	}

	function solLoader(s, fun)//Pre-loads the sprites image
	{
		clearTimeout(solImageTimeout);
		solImageTimeout=0;
		genImage = new Image();
		genImage.onload=function (){solImageTimeout=setTimeout(fun, 0)};
		genImage.onerror=new Function();
		genImage.src=s;
	}

	//The following code starts the animation
	new solLoader(solImageSrc, 'startAnimationSol()');
///////////////////////////////////////////////////////////////
///// codigo lluvia //////////////////////////////////////////
//////////////////////////////////////////////////////////////

    function Regar(){
      lluvia =$('#lluviaInvernadero').val();
      return lluvia;
}

    var lluviaSpeed=40;
	var lluviaWidth=128;
	var lluviaHeight=128;
	var lluviaTotalFrames=20;
	var lluviaFrameWidth=128;
	var lluviaImageSrc='Img/lluvia.gif';

	var lluviaImageTimeout=false;
	var lluviaIndex=0;
	var lluviaXpos=0;
	var lluviaPreloaderTimeout=false;
	var SECONDS_BETWEEN_FRAMES=0;

	function startAnimationlluvia(){

		document.getElementById('lluvia').style.backgroundImage='url('+lluviaImageSrc+')';
		document.getElementById('lluvia').style.width=lluviaWidth+'px';
		document.getElementById('lluvia').style.height=lluviaHeight+'px';

		//FPS = Math.round(100/(maxSpeed+2-speed));
		FPS = Math.round(100/lluviaSpeed);
		SECONDS_BETWEEN_FRAMES = 1 / FPS;
         if(Regar()==1){
		lluviaPreloaderTimeout=setTimeout('continueAnimationlluvia()', SECONDS_BETWEEN_FRAMES/1000);
                        }else{stopAnimationlluvia();}
	}
	function DetenteLluvia(){
    if(Regar()==''){
     stopAnimationlluvia();
    }}

	function continueAnimationlluvia(){

		lluviaXpos += lluviaFrameWidth;
		//increase the index so we know which frame of our animation we are currently on
		lluviaIndex += 1;

		//if our cIndex is higher than our total number of frames, we're at the end and should restart
		if (lluviaIndex >= lluviaTotalFrames) {
			lluviaXpos =0;
			lluviaIndex=0;
		}

		if(document.getElementById('lluvia'))
			document.getElementById('lluvia').style.backgroundPosition=(-lluviaXpos)+'px 0';

		lluviaPreloaderTimeout=setTimeout('continueAnimationlluvia()', SECONDS_BETWEEN_FRAMES*1000);

    }

	function stopAnimationlluvia(){//stops animation
		clearTimeout(lluviaPreloaderTimeout);
		lluviaPreloaderTimeout=false;
	}

	function lluviaLoader(s, fun)//Pre-loads the sprites image
	{
		clearTimeout(lluviaImageTimeout);
		lluviaImageTimeout=0;
		genImage = new Image();
		genImage.onload=function (){cImageTimeout=setTimeout(fun, 0)};
		genImage.onerror=new Function();
		genImage.src=s;
	}

	//The following code starts the animation
	new lluviaLoader(lluviaImageSrc, 'startAnimationlluvia()');
	
setInterval(VentiladorFrio, 1000);// cada 1 segundo se ejecuta esta funcion para leer si esta o no activado el ventilador de aire fria
setInterval(continueVentiFrio,4000);// cada 4 segundos se ejecuta esta funcion para actualizar el estado de la funcion ventilador frio
setInterval(VentiladorCaliente, 1000);// cada 1 segundo se ejecuta esta funcion para leer si esta o no activado el ventilador de aire caliente
setInterval(continueAnimation,4000);// cada 4 segundos se ejecuta esta funcion para actualizar el estado de la funcion ventilador caliente
setInterval(Sol, 1000);// cada 1 segundo se ejecuta esta funcion para leer estado del sol
setInterval(continueAnimationSol,4000);// cada 4 segundos se ejecuta esta funcion para actualizar el estado de regadio
setInterval(Regar, 1000);// cada 1 segundo se ejecuta esta funcion para leer estado del sol
setInterval(startAnimationlluvia,4000);// cada 4 segundos se ejecuta esta funcion para actualizar el estado del regadio
setInterval(DetenteLluvia,100);// cada 0.1 segundos se ejecuta esta funcion para actualizar el estado del regadio


