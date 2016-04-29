/**
 * Created by lotfi on 27/02/16.
 */
jQuery(document).ready(function(){

    jQuery('#updateUser .typeahead').typeahead({
        source:function(query,process){
            jQuery.ajax({
                url: "{!!URL::route(searchAllUser)!!}",
                data:'query=' + query,
                dataType:'JSON',
                async:true,
                success:function(data){
                    if(data=="vide"){
                        jQuery('#resultlistCP').attr('class','col-sm-push-3 col-sm-4 alert alert-info').html("Aucun résultat trouvé");
                    }else{
                        //process(data);
                        jQuery('#resultlistCP').text('');
                        jQuery.each(data, function(key,val){
                            jQuery('#resultlistCP').attr('class','col-xs-12 col-sm-4 alert alert-info').append('<li class="itemOnClickCP" data-idmembre="'+val.id+'" >'+val.Prenom+' ' + val.Nom+ '</li>')
                            jQuery('.itemOnClickCP').click(function(t){
                                jQuery('#search').val(jQuery(this).text());
                                jQuery('#resultlistCP').empty().attr('class','');
                                var idMembre=val.id;
                                jQuery("#showUser").show(function(){
                                    jQuery.ajax({
                                        url: "{!!URL::route('searchUser')!!}",
                                        data:'query=' + idMembre,
                                        dataType:'JSON',
                                        async:true,
                                        success:function(data){
                                            jQuery("#nomU").val(data.Nom);
                                            jQuery('#prenomU').val(data.Prenom);

                                            if(data.sexe == 'H'){
                                                jQuery('input#sexeH').prop("checked",true);
                                            }else{
                                                jQuery('input#sexeF').prop("checked",true);
                                            }

                                            jQuery('#addresseU').val(data.Adres);
                                            jQuery('#localiteU').val(data.Localite);
                                            jQuery('#emailU').val(data.Email);
                                            jQuery('#nrIdU').val(data.NrID);
                                            jQuery('#PhoneU').val(data.Phone);

                                            var dateNaissance = data.DateNaissance;
                                            var daysN=dateNaissance.substring(8,10);
                                            var monthN=dateNaissance.substring(5,7);
                                            var yearsN=dateNaissance.substring(0,4);
                                            jQuery("select#dayNU").val(daysN.replace(/^0+/,''));
                                            jQuery("select#monthNU").val(monthN.replace(/^0+/,''));
                                            jQuery("select#yearNU").val(yearsN.replace(/^0+/,''));

                                            var dateD = data.DebutCot;
                                            var daysD=dateD.substring(8,10);
                                            var monthD=dateD.substring(5,7);
                                            var yearsD=dateD.substring(0,4);
                                            jQuery("select#dayDU").val(daysD.replace(/^0+/,''));
                                            jQuery("select#monthDU").val(monthD.replace(/^0+/,''));
                                            jQuery("select#yearDU").val(yearsD.replace(/^0+/,''));


                                            var dateF = data.FinCot;
                                            var daysF=dateF.substring(8,10);
                                            var monthF=dateF.substring(5,7);
                                            var yearsF=dateF.substring(0,4);
                                            jQuery("select#dayFU").val(daysF.replace(/^0+/,''));
                                            jQuery("select#monthFU").val(monthF.replace(/^0+/,''));
                                            jQuery("select#yearFU").val(yearsF.replace(/^0+/,''));
                                            var x =  daysF.replace(/^0+/,'');

                                        }
                                    });
                                });
                            });


                        });
                    }

                }
            });




        }
    });




});