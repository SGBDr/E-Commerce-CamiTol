let listP = [];
let ry = true
let a_a = "", b_b = "", c_c = ""
let afficheProduits = ($) => {
    $('.liste').replaceWith(
    "<div class=\"row liste\">"+
        '<div class="" align="center" id="">'+
            '<div class="spinner-border text-danger" role="status">'+
                '<span class="sr-only"></span>'+
            '</div>'+
        '</div>'+
    "</div>")

    $.ajax({
        url : 'rechProduits.php',
        type : 'post',
        data : "a=a",
        success : rps => {
            listP = rps.split('$$').map((x => x = x.split('||')))
            console.log(listP)
        }
      })

    $.ajax({
        url : "produits.php",
        type : 'POST',
        data : 'a=1',
        success : (produits) => {

            $('.liste').replaceWith(
            "<div class=\"row liste\">" +
            produits +
            "</div>")
            $('.t_h').replaceWith('<p class="text-center"><strong class="border-bottom t_h pb-2 mb-0 text-center">Produit en Stock</strong></p>')

            $('.im_age').click((e) => {
                console.log("ok")
                idd = $(e.target).parent().find('input').val()
                let tt = true
                for(let i = 0 ; i < panier.produits.length ; i++){
                    let tmpproduit = panier.produits[i]
                    if(tmpproduit.id === idd)tt = false;
                }
                if(tt){
                    $.ajax({
                        url : "info.php",
                        type : 'POST',
                        data : 'id='+idd,
                        success : (produits) => {
                            console.log(produits)
                            $('#im_ages').attr('src', "../images/marchandises/" + produits.split('&&')[0])
                            $('#na_me').text(produits.split('&&')[1])
                            $('#pr_ix').text(produits.split('&&')[2])
                            a_a = "../images/marchandises/" + produits.split('&&')[0]
                            b_b = produits.split('&&')[1]
                            c_c = produits.split('&&')[2]
                            console.log(a_a + "  " + b_b + "  " + c_c)
                            panier.qte++
                            panier.produits.push({
                                id : idd,
                                nom : c_c,
                                prix : b_b,
                                image : a_a
                            })
                            $('#panier').text(parseInt($("#panier").text()) + 1)
                            console.log(panier)
                        }
                    })
                }
            })
            
        }
    })
}

let idd = -1;

$('.im_age').click((e) => {
    console.log("ok")
    idd = $(e.target).parent().find('input').val()
    $.ajax({
        url : "info.php",
        type : 'POST',
        data : 'id='+idd,
        success : (produits) => {
            $('#im_ages').attr('src', "../images/marchandises/" + produits.split('&&')[0])
            $('#na_me').text(produits.split('&&')[1])
            $('#pr_ix').text(produits.split('&&')[2])
            $('#mod').click()
        }
    })
})


$("#accueil").click((e) => {
    e.preventDefault()
    afficheProduits(jQuery)
})

$("#btn_panier").click((e) => {
    let list = '<div class="row liste">'+
    '<input type="text" placeholder="Moyen de livraison : Boutique || Domicile (Nom Domicile)" class="form-control" id="mode">'
    panier.produits.forEach(produit => {
        let pro = '<div class="d-flex music tim col-sm-12 text-muted pt-3">'+
        '<img class="me-3 im_" src="'+ produit.image +'" alt="" width="32" height="32">'+
        '<p class="pb-3 mb-0 me-3 small lh-sm border-bottom">'+
          '<strong class="d-block text-gray-dark">'+produit.nom+'</strong>'+
          '<strong style="color:black;">' + produit.prix + ' XAF</strong>'+
        '</p>'+
        '<input type="hidden" name="" class="hidden" value="' + produit.id + '">'+
        '<input type="number" class="form-control qq" placeholder="QUANTITE">'+
    '</div>'
    list += pro
    })
    list += "<br><br>"

    if(parseInt(id.value) !== -1){
        if(panier.produits.length > 0){
            list += '<a class="btn btn-lg btn-primary" id="valid" href="#liste" role="button">Validez la commande</a>'
        }
    }else{
        list += '<a class="btn btn-lg btn-primary" href="../index.php" role="button">Conectez-Vous Continuer</a>'
    }

    list += '</div>'

    $('.liste').replaceWith(list)
    $('.t_h').replaceWith('<strong class="border-bottom font-weight-bold t_h pb-2 mb-0">Votre Panier</strong>')

    $('.im_').click((e) => {
        let tmpid = $(e.target).parent().find('input').val()
        let i = 0
        for(i = 0 ; i < panier.produits.length ; i++){
            let tmpproduit = panier.produits[i]
            if(tmpproduit.id === tmpid)break;
        }
        panier.produits.splice(i,1)
        $('#panier').text(parseInt($("#panier").text()) - 1)
        $(e.target).parent().remove()
    })

    $('#valid').click((e) => {
        let list_ids = "", ll = ""
        let liste = $('.liste').children('div')
        let qte = $('.liste').find('div').find('.qq')
        let mode = $('#mode').val().trim()
        let ty = true;
        for(ele of qte){
            console.log(ele)
            ll += "$" + $(ele).val()
            if(isNaN($(ele).val()) || $(ele).val() == 0 || $(ele).val() == "")ty = false
        }
        qte = ll
        for(element of liste){
            list_ids += "$" + $(element).find('input').val()
        }
        list_ids = [...list_ids]
        list_ids[0] = ""
        list_ids = list_ids.join('')
        ll = [...ll]
        ll[0] = ""
        ll = ll.join('')
        console.log(ll)
        if(ty){
            if(mode !== ""){
                $.ajax({
                    url : 'validCommandes.php',
                    type : 'POST',
                    data : 'id=' + id.value + "&com=" + list_ids + "&qte=" + ll + "&mode=" + mode,
                    success : rps => {
                        if(rps === 'OK'){
                            panier = {
                                qte : 0,
                                produits : []
                            }
                            $('#panier').text(0)
                            $('.liste').replaceWith(
                                '<div class=\"row liste\">' +
                                '<h2> Votre Commande a bien été enregistrée </h2>'+
                                '<small>Vous serez contacté dans les plus bref délaits pour confirmation et spécification les quantités'+
                            '</div>')
                        }else{
                            $('.liste').replaceWith(
                                '<div class=\"row liste\">' +
                                '<h2>Un problème est survenu lors de l\'enregistrement de votre commande </h2>'+
                                '<small>Pour y remédier, consultez de nouveau le panier et validez a nouveau la commande</small>'+
                            '</div>')
                        }
                    }
                })
            }else alert("Le moyen de paiement n'est pas renseigné")
        }else alert("Les quantités ne sont pas règlementaires")
    })
      
})


afficheProduits(jQuery)
setInterval(() => {
  if(ry){
    $('.a2').addClass('dd')
    $('.a2').addClass('oo')
    setTimeout(() => {
      $('.a1').removeClass('dd')
      $('.a1').removeClass('oo')
    }, 0)

    ry = !ry
  }else{
    $('.a1').addClass('oo')
    $('.a1').addClass('dd')
    setTimeout(() => {
      $('.a2').removeClass('dd')
      $('.a2').removeClass('oo')
    }, 0)
    ry = !ry
  }
}, 3000)