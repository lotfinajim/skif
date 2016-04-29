/**
 * Created by lotfi on 26/02/16.
 */
jQuery(document).ready(function(){
    jQuery('.btn-instructeur').click(function(e){
        var value= jQuery(this).data('val');
        e.preventDefault();

        jQuery.get('instructeurs/' +value, function(data){

          //  jQuery('#img').attr("src", '/'+data.img);
            jQuery('#nom').val(data.nom);
            jQuery('#id').val(value);
            jQuery('#prenom').val(data.prenom);
            jQuery('#grade option[value='+data.grade+']').prop('selected', true);
            jQuery('#yearPractice').val(data.yearsOfPractice);
            jQuery('#status option[value='+data.status+']').prop('selected', true);
//           CKEDITOR.instances['editor'].setData(data.post_content);w
            CKEDITOR.instances['editorUpdate'].setData(data.Description);

        });
    });
});

