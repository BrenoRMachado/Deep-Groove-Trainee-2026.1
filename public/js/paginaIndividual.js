function playPreview(id){
    fetch(`https://corsproxy.io/?https://api.deezer.com/track/${id}`)
    .then(response=>response.json())
    .then(data=>{
        const audio = new Audio(data.preview)
        audio.play()
    })

}