
let connexion = document.getElementById("connexion")
let creer = document.getElementById("creer")
let visiter = document.getElementById("visite")

if(connexion != undefined && visiter != undefined){
    connexion.addEventListener('click', (e) => {
        document.getElementById('charge').classList.remove('charge')
        let telephone = (document.getElementById('phone')).value.trim()
        let pwd = (document.getElementById('pwd')).value.trim()
        console.log(telephone + "     " + pwd)
    
        if(estNumero(telephone)){
            if(pwd.length >= 6){
                $.ajax({
                    url : 'php/verifications.php',
                    type : 'POST',
                    data : 'tel=' + telephone + "&pwd=" + pwd,
                    success : code => {
                        if(code === "OK"){
                            document.location.href = "php/accueil.php"
                        }else{
                            document.getElementById('charge').classList.add('charge')
                            document.getElementById("error").classList.add("error")
                            document.getElementById("error").innerText = "ce Compte n'existe pas!"
                        }
                    }
                })
            }else{
                document.getElementById('charge').classList.add('charge')
                document.getElementById("error").classList.add("error")
                document.getElementById("error").innerText = "Le mot de pase doit dépasser 5 caractères!"
            }
        }else{
            document.getElementById('charge').classList.add('charge')
            document.getElementById("error").classList.add("error")
            document.getElementById("error").innerText = "Il y a un problème avec votre Téléphone!"
        }
    
    })


    visiter.addEventListener('click', e => {
        document.location.href = "php/accueil.php"
    })
}

if(creer != undefined){
    creer.addEventListener('click', (e) => {
        document.getElementById('charge').classList.remove('charge')
        let telephone = (document.getElementById('tel')).value.trim()
        let nom = (document.getElementById('nom')).value.trim()
        let pwd = (document.getElementById('pwd')).value.trim()
    
        console.log(telephone + "     " + pwd)
    
        if(estNumero(telephone)){
            if(nom.length >= 6){
                if(pwd.length >= 6){
                    $.ajax({
                        url : 'php/ajout.php',
                        type : 'POST',
                        data : 'tel=' + telephone + "&nom=" + nom + "&pwd=" + pwd,
                        success : code => {
                            if(code === "OK"){
                                document.location.href = "index.php"
                            }else{
                                document.getElementById('charge').classList.add('charge')
                                document.getElementById("error").classList.add("error")
                                document.getElementById("error").innerText = "Le nom que vous avez renseigné est déjà utilisé!"
                            }
                        }
                    })
                }else{
                    document.getElementById('charge').classList.add('charge')
                    document.getElementById("error").classList.add("error")
                    document.getElementById("error").innerText = "Le mot de passe est trop court"
                }
            }else{
                document.getElementById('charge').classList.add('charge')
                document.getElementById("error").classList.add("error")
                document.getElementById("error").innerText = "Le nom est trop court, au moins 6 caractéres!"
            }
        }else{
            document.getElementById('charge').classList.add('charge')
            document.getElementById("error").classList.add("error")
            document.getElementById("error").innerText = "Il y a un problème avec votre Téléphone!"
        }
    
    })
}
