/**
 * Created by lotfi on 26/02/16.
 */
jQuery(document).ready(function(){
    jQuery('.btn-article').click(function(e){
        var value= jQuery(this).data('val');
        e.preventDefault();
        jQuery.get('articles/' +value, function(data){

                jQuery('#img').attr("src", '/'+data.img);
                jQuery('#update').val(data.id);
                jQuery('#description').val(data.description);
                jQuery('#posttitle').val(data.post_title);

                jQuery('#categorie option[value='+data.fk_categorie+']').prop('selected', true);
                jQuery('#status option[value='+data.status+']').prop('selected', true);

                CKEDITOR.instances['editor'].setData(data.post_content);
        });
    });
});

