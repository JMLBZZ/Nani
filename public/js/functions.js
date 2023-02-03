// ############################## COOKIES ############################## //
let cookies = document.cookie;//récupère tous les cookies et en fait une chaine de caractère séparé par ";" et espace.
let trouve = false;

let tabCookies = cookies.split("; ");//on sépare la chaine de caractère index et valeur en tableau
for(let i of tabCookies){//boucle pour rechercher le cookie concerné
    let elements=i.split("=");//le cookie est composé de "index" = "valeur", donc on découpe (split) par le "="
    if(elements[0]=="NaniAcceptCookies"){//si le cookie "NaniAcceptCookies" n'est pas présent... 
        trouve = true;//...alors on passe "trouvé" à "true"
    }
}

if(!trouve){//si à la sortie de la boucle, "trouvé" n'a pas été trouvé (false)...
    document.getElementById("bandeaucookies").classList.add("ouvert");//... alors on fait apparaitre la fenetre "bandeaucookie"
}

if(document.getElementById("bandeaucookies")){

    document.getElementById("NaniAcceptCookies").addEventListener("click",()=>{//on écoute l'élément "click" sur le bouton "NaniAcceptCookies"
        let expiration = new Date;//on définit un temps d'expiration en GMT
        expiration.setTime(expiration.getTime() + 10 * 24 * 3600 * 1000);//10 jours

        //ajout d'un cookie =  nom   =  valeur (on n'ecrase pas les valeurs précédentes)
        document.cookie = `NaniAcceptCookies=yes; expires=${expiration.toGMTString()}; path=/`//fonctionne dnas n'importe quel arborescence/chemin/page
        document.getElementById("bandeaucookies").classList.remove("ouvert");//on fait disparaitre la fenêtre
    });
}