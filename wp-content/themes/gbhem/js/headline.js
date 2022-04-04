var rotateSpeed = 4000; //milliseconds between headlines
var rotationWait = 4000; //amount of time to wait before starting the headline rotation
var heroheadline = document.getElementById('HeroHeadline');
var headlines = [
    "Nurturing Leaders. Changing Lives.", //English
    "Former des leaders. Changer des vies.", //French
    "Wir unterstützen Führungskräfte. Wir verändern Leben.",//German
    "Promovendo Líderes. Transformando Vidas.",//Portuguese
    "Взращиваем лидеров. Меняем жизнь.",//Russian
    "Cultivando líderes. Cambiando vidas.",//Spanish
    "培养领导能力，改变人生轨迹",//Simplified Chinese
    "Nililinang ang mga Pinuno. Binabago ang mga Buhay.",//Filipino
    "삶을 변화시키는 리더들을 양성합니다."//Korean
  ];
  
  
function changeHeadline(text){
  heroheadline.className = 'hidden';
  setTimeout(function(){
    heroheadline.textContent = text;
    heroheadline.className = 'visible'
  },1000)
}

function startRotation(){
  var cnt=1;
  setInterval(
    function(){
      if(cnt==headlines.length){
        cnt=0;
      }
      changeHeadline(headlines[cnt]);
      cnt++;
  },rotateSpeed);
}

window.addEventListener('load', function(event){
	if(heroheadline!=undefined){
    setTimeout(function(){startRotation();},rotationWait);
  }
});
