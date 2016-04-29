
jQuery(document).ready(function(){
    jQuery('.btn-event').click(function(e){
        var value= jQuery(this).data('val');
        e.preventDefault();

        jQuery.get('agendaAdmin/' +value, function(data){


            jQuery('#titreEvent').val(data.titre);
            jQuery('#description').val(data.Description);
            jQuery('#id').val(data.id);
            jQuery('#start').val(data.start);
            jQuery('#end').val(data.end);
            jQuery('#map').val(data.map);
            jQuery('#status option[value='+data.categorie+']').prop('selected', true);
            CKEDITOR.instances['editor'].setData(data.content);

        });
    });
});
