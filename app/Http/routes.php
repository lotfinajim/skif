<?php

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    //home
    Route::get('/', ['as' => 'welcome', 'uses' => 'PagesController@home']);
    Route::get('showNew', ['as' => 'showNew','uses' => 'PagesController@showNew']);
    Route::get('instructeurs',['as' => 'instructeurs','uses' => 'InstructeursController@index']);
    Route::get('administration/instructeurs',['as' => 'adminInstructeurs','uses' => 'InstructeursController@adminInstructeurs']);
    Route::get('agenda',['as'=> 'agenda','uses'=> 'AgendaController@index']);
    Route::get('calendar',['as' => 'calendar','uses' => 'AgendaController@Json']);
    Route::get('sections',['as' => 'sections','uses' =>  'SectionController@index']);
    Route::get('horaire',['as' => 'horaire','uses' => 'HoraireController@index']);
    Route::get('contact', ['as' =>'contact','uses'=>'ContactController@index']);
    Route::get('connexion',['as' => 'connexion','uses'=>'ConnexionController@connexion']);
    Route::post('/valid',['as'=> 'validFormContact','uses'=> 'ContactController@validFormContact']);
    Route::get('administration',['as' => 'admin','uses'=> 'AdminController@index']);
    Route::get('administration/articles',['as' => 'articles','uses'=> 'PostsController@articles']);
    Route::get('administration/articles/ajouter',['as' => 'ajouterArticle','uses'=> 'PostsController@articles']);
    Route::get('administration/articlesUpdate',['as'=>"articlesUpdate","uses"=>'PostsController@articlesUpdate']);
    Route::post('administration/storePost',['as' => 'storePost','uses' => 'PostsController@storePost']);
    Route::post('administration/instructeurs/storeInstructeurs',['as' => 'storeInstructeurs','uses' => 'InstructeursController@storeInstructeurs']);
    Route::post(' administration/instructeurs/updateInstructeur',['as' => 'updateInstructeur','uses' => 'InstructeursController@updateInstructeur']);
    Route::get('searchArticle',['as' => 'searchArticle','uses'=>'PostsController@searchArticle']);
    Route::get('administration/message/inbox',['as' => 'inbox','uses'=> 'ContactController@getMail']);
    Route::post('administration/storeMembre',['as' => 'storeMembre','uses' => 'MembreController@storeMembre']);
    Route::post("administration/message/send",['as'=>'send','uses'=> 'ContactController@send']);
    Route::post('administration/agendaAdmin/updateEvent',['as' => 'updateEvent','uses' => 'AgendaController@updateEvent']);
    Route::post('administration/agenda/store',['as' => 'storeAgenda','uses' => 'AgendaController@storeAgenda']);
    Route::post('administration/updateMembre',['as' => 'updateMembre','uses' => 'MembreController@updateMembre']);
    Route::post('administration/update',['as' => 'update','uses' => 'PostsController@updatePost']);
    Route::get('administration/membres',['as' =>'membres','uses' => 'MembreController@membres']);
    Route::get('administration/agendaAdmin',['as' =>'agendaAdmin','uses' => 'AdminController@agendaAdmin']);
    Route::get('administration/membresAjouter',['as' =>'membresAjouter','uses' => 'MembreController@membresAjouter']);
    Route::get('administration/membresMisAJour',['as' =>'membresMisAJour','uses' => 'MembreController@membresMisAJour']);
    Route::get('administration/message',['as' => 'message','uses' => 'ContactController@messages']);
    Route::get('administration/message/draft', ['as'=>'draft','uses'=>'ContactController@draft']);
    Route::get('searchLocalite',['as' => 'searchLocalite','uses'=>'MembreController@searchLocalite']);
    Route::get('searchAllUser',['as' => 'searchAllUser','uses'=>'MembreController@searchAllUser']);
    Route::get('searchUser',['as' => 'searchUser','uses'=>'MembreController@searchUser']);
    Route::get('event',['as' => 'event','uses'=>'AdminController@event']);
    route::get('/articles/{id}',['as' => 'showArticleId','uses'=> 'PagesController@show']);


    Route::get('administration/message/read', ['as' => 'read', 'uses'=>'ContactController@read']);
    Route::get('administration/message/unread', ['as' => 'read', 'uses'=>'ContactController@unread']);
    Route::get('administration/message/show/{contact}',[
        'as' => 'showContact',
        'uses' => function(\App\Contact $contact, \App\Compteurs $cpt){
                if(Request::ajax()){
                   //test si le status est 0 alors on fait l'update des compteurs et on les sauves sinon
                        /*if($contact->status ==0 ){
                            $compteur=$cpt->findOrNew(1);

                            $lu = $compteur->lu;
                            $nonLu = $compteur->nonLu;
                            $compteur->lu = $lu + 1;
                            $compteur->nonLu = $nonLu-1;
                            $cpt->lu= $lu;
                            $cpt->nonLu= $nonLu;
                            DB::table('compteurs')->where('id',1)->update(['lu'=>$compteur->lu,'nonLu'=>$compteur->nonLu]);
                            $contact->status=1;
                            $contact->save();
                        }elseif($contact->status==2){
                            $compteur=$cpt->findOrNew(1);
                            $contact->status=2;
                            $contact->save();
                            $compteur->lu=$compteur->lu-1;
                            $compteur->draft=$compteur->draft + 1;
                            DB::table('compteurs')->where('id',1)->update(['lu'=>$compteur->lu,'draft'=>$compteur->draft]);
                        }else{
                            $compteur = $cpt->findOrNew(1);
                            $contact->status=0;
                            $contact->save();
                            $lu =  $compteur->lu -1;
                            $nonLu = $compteur->nonLu+1;
                            DB::table('compteurs')->where('id',1)->update(['lu'=>$lu,'nonLu'=>$nonLu]);
                            return $contact;
                        }*/
                return $contact;
                 }
            }
    ]);




   Route::get('updateCompteur',[
       'as' => 'updateCompteur',
        'uses'=>function(\App\Contact $contact, \App\Compteurs $cpt){
                if(Request::ajax()){
                  if($contact->status==1){
                      echo 'dans update';
                      return $contact;
                  }
                }
            }
    ]);
        Route::get('administration/instructeurs/{instructeur}',
        [
            'as' =>'showInstructeur',
            //'uses'=> 'InstructeursController@showInstructeur'
            'uses'=> function(\App\Instructeurs $instructeur){
                    if(Request::ajax()){
                        return $instructeur;
                    }
                }
        ]);


    Route::get('administration/articles/{article}',[
        'as' => 'showArticles',
        'uses' => function(\App\Posts $article){
                if(Request::ajax()){
                    return $article;
                }
            }
    ]);




    \Route::get('token',[
        'as' => 'token',
        'uses' =>function () {
        return csrf_token();
            }
    ]);
    route::get('administration/agendaAdmin/{event}',[
        'as' => 'showEvent',
       'uses'=> function(App\Event $event){
                if(Request::ajax()){
                    return $event;
                }
            }
    ]);


//    Route::get('/home', 'HomeController@index');

});

