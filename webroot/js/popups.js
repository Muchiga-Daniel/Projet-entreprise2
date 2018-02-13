/*var popup = (function() 
{
 
    function init() {
 
        var overlay = $('.overlay');
 
        $('.popup-button').each(function(i, el)
        {
            var modal = $('#' + $(el).attr('data-modal'));
            var close = $('.close');
 
            // fonction qui enleve la class .show de la popup et la fait disparaitre
            function removeModal() {
                modal.removeClass('show');
            }
 
            // evenement qui appelle la fonction removeModal()
            function removeModalHandler() {
                removeModal(); 
            }
 
            // au clic sur le bouton on ajoute la class .show a la div de la popup qui permet au CSS3 de prendre le relai
            $(el).click(function()
            {   
                modal.addClass('show');
                overlay.unbind("click");
                // on ajoute sur l'overlay la fonction qui permet de fermer la popup
                overlay.bind("click", removeModalHandler);
            });
 
            // en cliquant sur le bouton close on ferme tout et on arrête les fonctions
            close.click(function(event)
            {
                event.stopPropagation();
                removeModalHandler();
            });
 
        });
    }
 
    init();
 
})();*/

//csrf_token = $("input[name='_csrfToken']").val();

$('#sumbitform').click(function(event)
{
    event.preventDefault();
    var formSerialize = $('#dialogform').serialize();
    var resultat = $.ajax(
        {
            url: myurl,
            data: formSerialize,
            type: "POST",
            dataType: "JSON"
        }
    )
    .done(function(response)
    {
        if(response["status"] === "saved")
        {
            if(response['champtype'] === 'partenaire')
            {
                $('#partenaire-client-id').append(response['data']);
                $('#partenaire-facture-id').append(response['data']);
                $('#partenaire-id').append(response['data']);
            }
            if(response['champtype'] === 'contact')
            {
                $('#contact-client-id').append(response['data']);
                $('#contact-facture-id').append(response['data']);
                $('#contact-id').append(response['data']);
            }
            if(response['champtype'] === 'utilisateur')
            {
                $('#utilisateur-client-id').append(response['data']);
                $('#utilisateur-facture-id').append(response['data']);
                $('#utilisateur-id').append(response['data']);
            }
            if(response['champtype'] === 'operationType')
            {
                $('#operationType-client-id').append(response['data']);
                $('#operationType-facture-id').append(response['data']);
                $('#operationType-id').append(response['data']);
            }
            $('#popupmessage').append(response['message']);
            $('#dialog').dialog('close');
        }
        if(response["status"] === "error")
        {
            $('#popupmessage').append(response['message']);
            $('#dialog').dialog('close');
        }
    })
    .fail(function(response)
    {
        
    });
});
