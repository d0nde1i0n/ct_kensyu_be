<?php
namespace controller\home;

use db\TopicQuery;

function get() {

    $topics = TopicQuery::fetchByPublishedTopics();
    \view\home\index($topics);

}
