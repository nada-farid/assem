<?php

Route::group([ 'as' => 'api.', 'namespace' => 'Api'], function () {
    Route::get('/chat-reply', 'ChatBotController@reply');
    Route::get('/quick-replies', 'ChatBotController@quickReplies');

});
