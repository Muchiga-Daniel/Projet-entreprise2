
$(document).ready(function($)
{
    //alert('test');
    $('#volume').keyup(calcule_volume);
    $('#volume-commande').keyup(calcule_volume_commande);
    $('#volume-facture').keyup(calcule_volume_facture);
    $('#cpm').keyup(calcule_volume_facture, calcule_volume_commande, calcule_volume);


    function calcule_volume_facture(){
        if($('#volume-facture').val() >= 0) { 
            var ht = $('#volume-facture').val() * $('#cpm').val() / 1000;
        }
        $('#ht').val(ht);
        calcule_tva();
        calcule_ttc(); 
    }

    function calcule_volume_commande(){
        if($('#volume-commande').val() >= 0) { 
            var ht = $('#volume-commande').val() * $('#cpm').val() / 1000;
        }
        $('#ht').val(ht);
        calcule_tva();
        calcule_ttc();
    }

    function calcule_volume(){
        if($('#volume').val() >= 0) { 
            var ht = $('#volume').val() * $('#cpm').val() / 1000;
        }
        $('#ht').val(ht);
        calcule_tva();
        calcule_ttc();
    }

    function calcule_tva(){
        var tva = $('#ht').val() * 0.2;
        $('#tva').val(tva);
    }

    function calcule_ttc(){
        var ttc = $('#ht').val() * 1.2;
        $('#ttc').val(ttc);
    }

});
