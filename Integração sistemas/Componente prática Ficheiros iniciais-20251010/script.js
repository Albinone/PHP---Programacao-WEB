// Ficheiro onde inserimos o comportamento

console.log(document);

//Highlight de todas as palavras com + de 8 caracteres

const paragraph = document.querySelector("p");
/*paragraph.innerHTML = paragraph.innerText.split(" ")
.map(word => word.length > 8 ? `<span style="background-color: yellow">${word}</span>` : word)
.join(" ").split(".")
.map(sentence => `<p>${sentence}.</p>`)
.join(" ");*/

//<span style="background-color: yellow">Texto</span>        


//criar um link para o site da Google
const link = document.createElement("a");
link.href = 'http://www.google.com';
link.innerText = "Google URL";

document.body.appendChild(link);

// Contar nº de palavras

const wordCounter = paragraph.innerText.split(" ").length;

const countDisplay = document.createElement("div");

countDisplay.innerText = `${wordCounter} words`;

document.body.insertBefore(countDisplay, paragraph);
