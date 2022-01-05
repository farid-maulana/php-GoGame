var words = document.getElementById('description')
var wordCounter = document.getElementById('word-counter');
words.onkeyup = () => {
    wordCounter.innerHTML = words.value.trim().length + " / 250 words";
    if(words.value.trim().length > 250){
        wordCounter.style = "color: red;"
    }else{
        wordCounter.style = "color: black;"    
    }
    
}