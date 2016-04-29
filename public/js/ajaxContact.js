jQuery(document).ready(function(){
    var value;
    var lu;
    var nonLu;
    var draft;
    var spanid;
    var status;
    var content;
    jQuery('.userContact').click(function(e){
        //valeur de ID
         value= jQuery(this).data('val');
         lu = jQuery('#Lu').val();
         nonLu = jQuery('#nonLu').val();
         draft = jQuery('#draft').val();
        e.preventDefault();

         spanid = jQuery('#'+value).data('val');
                if(jQuery('#'+spanid).hasClass('glyphicon-envelope' )){
                    jQuery("#"+spanid).removeClass('glyphicon-envelope').addClass('glyphicon-ok');
                        lu = parseInt(lu) + parseInt(1);
                        nonLu = parseInt(nonLu)- parseInt(1);
                    }


               if( jQuery('#'+spanid).hasClass('glyphicon-pencil')){
                    draft = parseInt(draft)-1;
                    lu = parseInt(lu) + parseInt(1);
                    jQuery("#"+spanid).removeClass('glyphicon-pencil').addClass('glyphicon-ok');

                }
        jQuery.ajax({
            url: "message/read",
            data: 'id=' + value,
            dataType:'JSON',
            async: true,
            success:function(data){
                jQuery('#Lu').val(lu);
                jQuery('#nonLu').val(nonLu);
                jQuery('#draft').val(draft);
                jQuery('#from').val(data.email);
                jQuery('#id').val(data.id);
                jQuery('#content').val(data.information).prop('readonly',true);
                jQuery('#reply').removeAttr('disabled');
                jQuery('#unread').removeAttr('disabled');
            }

        });



    });

    //Function CLick on Reply button
    jQuery('#reply').click(function(e){
        jQuery('#content').removeAttr('readonly');
        jQuery('#content').val(jQuery('#content').val());
        //CKEDITOR.instances['content'].config.readOnly=
        jQuery('#nameTo').removeAttr('hidden','readonly');
        jQuery('#to').removeAttr('hidden','readonly').addClass('form-control');
        jQuery('#obj').removeAttr('hidden').addClass('form-control');
        jQuery('#nameObj').removeAttr('hidden');
        jQuery('#obj').removeAttr('readonly');
        jQuery('#to').val(jQuery('#from').val());
        jQuery('#obj').val('RE : ');
        jQuery('#from').val('lotfi.najim@gmail.com');
        jQuery('#send').removeAttr('disabled');
        jQuery('#draftBtn').removeAttr('disabled');
    });

    //Function CLick on draft button
    jQuery('#draftBtn').click(function(e){
        e.preventDefault();
        draft = parseInt(draft)+1;
        lu = parseInt(lu)-1;
        content =   jQuery('#content').val();
        status = jQuery('#'+spanid).data('status');
        jQuery('#draft').val(draft);
        jQuery('#Lu').val(lu);
        hidden();
        jQuery.ajax({
            url: "message/draft",
            data: {id : value, status: status, content: content},
            dataType:'JSON',
            async: true,
            success:function(data){
                jQuery("#"+spanid).removeClass('glyphicon-ok').addClass('glyphicon-pencil');
            }
        });
    });
    jQuery('#unread').click(function(e){
        if(jQuery('#'+spanid).hasClass('glyphicon-ok')){
            jQuery('#'+spanid).removeClass('glyphicon-ok').addClass('glyphicon-envelope');
            lu = parseInt(lu) - parseInt(1);
            nonLu = parseInt(nonLu)+ parseInt(1);
            jQuery("#nonLu").val(nonLu);
            jQuery("#Lu").val(lu);
            hidden();
            jQuery("#from").val(jQuery('#to').val());
            jQuery.ajax({
                url: "message/unread",
                data: {id : value},
                dataType:'JSON',
                async: true,
                success:function(data){
                    jQuery("#"+spanid).removeClass('glyphicon-ok').addClass('glyphicon-envelope');
                }
            });
        }
    });



    function hidden(){
        document.getElementById("reply").disabled = true;
        document.getElementById("draft").disabled = true;
        document.getElementById("unread").disabled = true;
        document.getElementById("send").disabled = true;
        document.getElementById("nameObj").hidden = true;
        document.getElementById("obj").hidden = true;
        jQuery('#from').val("");
        jQuery('#content').val('');
        jQuery('#content').prop('readonly', true);
        jQuery('#nameObj').hide();
        jQuery('#nameTo').hide();
        jQuery("#to").hide();
        jQuery("#obj").hide();
    }

});