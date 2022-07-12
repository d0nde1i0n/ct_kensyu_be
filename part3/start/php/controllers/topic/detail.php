<?php
namespace controller\topic\detail;

use db\CommentQuery;
use db\TopicQuery;
use model\TopicModel;
use lib\Msg;

function get(){

    $topic = new TopicModel;
    $topic->id = get_param('topic_id',null,false);

    $fetchedtopic = TopicQuery::fetchByID($topic);
    $comments = CommentQuery::fetchByTopicId($topic);

    if(!$fetchedtopic){
        Msg::push(Msg::ERROR,'トピックが見つかりません。');
        redirect('404');
    }

        \view\topic\detail\index($fetchedtopic,$comments);

}
?>