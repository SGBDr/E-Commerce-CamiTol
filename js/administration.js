$('#com').click(e => {
    e.preventDefault()
    $("#com").parent().parent().find('li').removeClass('ss')
    $('#com').parent().addClass('ss')
    $('#comk').parent().find('div').addClass('nv')
    $('#comk').removeClass('nv')
    $('#titre').text('Nouvelles Commandes Enregistrées')
    $.ajax({
        url: 'infoCommande.php',
        type: 'POST',
        data: 'b=1',
        success: com => {
            $('.listco').replaceWith(com)
            $('button').click(e => {
                if(e.target.id.split('$')[0] == "valid"){
                    $(e.target).parent().remove()
                    let id = e.target.id.split('$')[1]
                    console.log(id)
                    $.ajax({
                        url: "valideCom.php",
                        type: "POST",
                        data: "id=" + id,
                        success : rps => {
                            if(rps !== "OK")alert("Le Commande Ne peut etre validé, il y a un probleme!")
                        }
                    })
                }
            })
        }
    })
})


$('#apro').click(e => {
    e.preventDefault()
    $("#apro").parent().parent().find('li').removeClass('ss')
    $("#apro").parent().addClass('ss')
    $('#aprok').parent().find('div').addClass('nv')
    $('#aprok').removeClass('nv')
    $('#titre').text('Ajout Produit')

    $('#aprok').replaceWith('<div id="aprok">'+
'<form enctype="multipart/form-data" action="#">'+
    '<div class="row">'+
      '<fieldset style="padding: 2%;">'+
          '<div  style="padding: 3%;">'+
              '<div class="row">'+
                  '<div class="col-6">'+
                      '<label for="nom">Nom :</label>'+
                      '<input type="text" id="_nom" name="nom" style="background-color: rgba(86, 193, 220);" class="form-control" placeholder="Nom" required>'+
                  '</div>'+
                  '<div class="col-6">'+
                      '<label for="mail">Prix :</label>'+
                      '<input type="number" id="_prix" name="prix" class="form-control" style="background-color: rgba(86, 193, 220);"  placeholder="0" required>'+
                  '</div>'+
              '</div>'+
          '</div>'+
          '<br>'+
          '<div style="padding: 3%;">'+
          '    <div class="row">'+
           '       <div class="col-6">'+
            '          <label for="tel">Quantité :</label>'+
             '         <input type="number" id="_qte" name="qte" class="form-control" value="00" required>'+
              '    </div>'+
               '   <div class="_image">'+
                '  </div>'+
              '</div>'+
              '<br>'+
              '<div class="row">'+
                '<div class="col-6">'+
                    '<label for="description">Description :</label>'+
                    '<textarea name="desc" id="_desc" class="form-control" value="" placeholder="Description du produit" required></textarea>'+
                  '</div>'+
                  '<div class="col-6">'+
                    '<h3>Image</h3><small> jpg,gif,png,jpeg,webp,jfif, Pas plus de 5Mo</small>'+
                    '<input type="file" class="form-control btn btn-sm" name="image" id="_image">'+
                  '</div>'+
              '</div>'+
          '</div>'+
          '<div align="center">'+
           '   <button name="submit" class="btn btn-lg btn-primary" id="rrr">Ajouter Le Produit</button>'+
          '</div>'+
         ' <p id="error_" class="text-warning"></p>'+
      '</fieldset>'+
    '</div>'+
  '</form>'+
  '</div>')

  $('form').find('button').click(e => {
      e.preventDefault()
      let nom = $('#_nom').val().trim() !== ""
      let prix = $('#_prix').val().trim() !== ""
      let qte = $('#_qte').val().trim() !== ""
      let desc = $('#_desc').val().trim() != ""
      let image = $('#_image').val().trim() != ""
       
      if(nom && prix && qte && desc && image){
        $.ajax({
            url: 'ajouteProduit.php', //script php qui traitera l'envoi du fichier
            type: 'POST',
            success : function(rps){
                $('#error_').replaceWith('<p id="error_" class="text-warning">' + rps + '</p>')
            },
            //Données du formulaire envoyé
            data : new FormData($('form')[0]),
            //Options signifiant à jQuery de ne pas s'occuper du type de données
            cache: false,
            contentType: false,
            processData: false
        });
      }
  })

})

$('#rpro').click(e => {
    e.preventDefault()
    $('#rpro').parent().parent().find('li').removeClass('ss')
    $('#rpro').parent().addClass('ss')
    $('#rprok').parent().find('div').addClass('nv')
    $('#rprok').removeClass('nv')
    $('#titre').text('Retirer Produit')
    $.ajax({
        url: 'produits1.php',
        type: 'POST',
        data: 'b=1',
        success: com => {
            $('.listrpro').replaceWith(com)
            $('button').click(a => {
                if(a.target.id.split('$')[0] == "supp"){
                    $(a.target).parent().remove()
                    let id = a.target.id.split('$')[1]
                    console.log(id)
                    $.ajax({
                        url: "suppProd.php",
                        type: "POST",
                        data: "id=" + id,
                        success : rps => {
                            if(rps !== "OK")alert("Le produit n'a pas pu etre supprimé !")
                        }
                    })
                }
            })
        }
    })
})

$('#cli').click(e => {
    e.preventDefault()
    $('#cli').parent().parent().find('li').removeClass('ss')
    $('#cli').parent().addClass('ss')
    $('#clik').parent().find('div').addClass('nv')
    $('#clik').removeClass('nv')
    $('#titre').text('Liste Clients')
    $.ajax({
        url: 'infoClient.php',
        type: 'POST',
        data: 'a=1',
        success: clients => {
            $('.listClient').replaceWith(clients)
        }
    })
})

$('#con').click(e => {
    e.preventDefault()
    $('#con').parent().parent().find('li').removeClass('ss')
    $('#con').parent().addClass('ss')
    $('#conk').parent().find('div').addClass('nv')
    $('#conk').removeClass('nv')
    $('#titre').text('Liste de toutes Les Commandes')
    $.ajax({
        url: 'infoCommande.php',
        type: 'POST',
        data: 'a=1',
        success: com => {
            $('.listcom').replaceWith(com)
        }
    })
})

$('#adm').click(e => {
    e.preventDefault()
    $('#adm').parent().parent().find('li').removeClass('ss')
    $('#adm').parent().addClass('ss')
    $('#admk').parent().find('div').addClass('nv')
    $('#admk').removeClass('nv')
    $('#titre').text('Administrateurs')
    $.ajax({
        url: 'infoAdmin.php',
        type: 'POST',
        data: 'a=1',
        success: com => {
            $('.listadm').replaceWith(com)
            $('button').click(a => {
                let r = a.target.id.split('$')[0] == 'dele'
                let r1 = a.target.id.split('$')[0] == "add"
                if(r){
                    console.log("ok5")
                    $(a.target).parent().remove()
                    let id = a.target.id.split('$')[1]
                    $.ajax({
                        url: "SuppAdmin.php",
                        type: "POST",
                        data: "id=" + id,
                        success : rps => {
                            if(rps !== "OK")alert("Le produit n'a pas pu etre supprimé !")
                            else alert("Le produit a été supprimé !")
                        }
                    })
                }else if(r1){
                    let nom = $(a.target).parent().find('#no_m').val().trim()
                    let tel = $(a.target).parent().find('#t_el').val()
                    let pwd = $(a.target).parent().find('#p_wd').val().trim()
                    console.log(id)
                    if(nom != "" && tel != 0 && pwd != ""){
                        $.ajax({
                            url: "addAdmin.php",
                            type: "POST",
                            data: "nom=" + nom + "&tel=" + tel + "&pwd=" + pwd,
                            success : rps => {
                                if(rps !== "OK")alert("L'utilisateur n'a pas pu etre Ajouté !")
                                else alert("L'utilisateur a été Ajouté")
                            }
                        })
                    }else alert("Des champs sont vides");
                }
            })
        }
    })
})


$('#com').click()