//* Seleciona o disco da página individual 
const discoIndividual = document.querySelector(".disco-d");
let audio = null;
let playPause = null;

//* Função que aciona animação do disco se deslocando e depois girando

function discoDeslocandoEgirando(audio){
    discoIndividual.classList.add("disco-deslocando-e-girando");
    audio.addEventListener('ended', () => {
        discoIndividual.classList.remove("disco-deslocando-e-girando");
        playPause = null;
    });
}

// *Função que pausa preview
function pausePreview(){
    if (audio){
        audio.pause();
        discoIndividual.classList.remove("disco-deslocando-e-girando");
        playPause = null;
    }
}

function playPreview(id){
    if (playPause !== id){
        if (playPause !== null){
            document.querySelector(`#playPause${playPause}`).classList.toggle('bi-pause-circle-fill');
            document.querySelector(`#playPause${playPause}`).classList.toggle('bi-play-circle-fill');
        }
        fetch(`https://corsproxy.io/?https://api.deezer.com/track/${id}`)
        .then(response=>response.json())
        .then(data=>{
            playPause = id;
            audio = new Audio(data.preview);
            audio.play();
            discoDeslocandoEgirando(audio);
        });
    }    
    pausePreview();
    document.querySelector(`#playPause${id}`).classList.toggle('bi-pause-circle-fill');
    document.querySelector(`#playPause${id}`).classList.toggle('bi-play-circle-fill');
}