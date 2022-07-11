<?php
namespace db;

use db\DataSource;
use model\TopicModel;

class TopicQuery {
    public static function fetchByUserId($user) {

        if(!$user->isValidId()){
            return false;
        }

        $db = new DataSource;
        $sql = 'select * from pollapp.topics where user_id = :id and del_flg != 1 order by id desc;';

        $result = $db->select($sql, [
            ':id' => $user->id
        ], DataSource::CLS, TopicModel::class);

        return $result;

    }

    public static function fetchByPublishedTopics() {

        $db = new DataSource;
        $sql = 'select t.*,u.nickname from pollapp.topics t
        inner join pollapp.users u
        on t.user_id =u.id
        where t.del_flg != 1
        and u.del_flg !=1
        and t.published =1
        order by t.id desc;';

        $result = $db->select($sql, [], DataSource::CLS, TopicModel::class);

        return $result;

    }

    // public static function insert($user) {

    //     $db = new DataSource;
    //     $sql = 'insert into users(id, pwd, nickname) values (:id, :pwd, :nickname)';

    //     $user->pwd = password_hash($user->pwd, PASSWORD_DEFAULT);

    //     return $db->execute($sql, [
    //         ':id' => $user->id,
    //         ':pwd' => $user->pwd,
    //         ':nickname' => $user->nickname,
    //     ]);

    // }
}