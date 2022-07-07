<?php
namespace model;

use lib\Msg;

class Usermodel extends AbstractModel {
    public string $id;
    public string $pwd;
    public string $nickname;
    public int $del_flg;

    protected static $SESSION_NAME = '_user';

    // ユーザIDのバリデーションチェック
    public static function validateId($val){
        $res = true;

        if(empty($val)) {

            Msg::push(Msg::ERROR,'ユーザIDを入力してください。');
            $res = false;

        } else {
            if(strlen($val) > 10){
                Msg::push(Msg::ERROR, 'ユーザーIDは10桁以下で入力してください。');
                $res = false;
            }

            if(!is_alnum($val)){
                Msg::push(Msg::ERROR, 'ユーザIDは半角英数字で入力してください。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidId(){
        return static::validateId($this->id);
    }


    // パスワードのバリデーションチェック
    public static function validatePwd($val){
        $res = true;

        if(empty($val)){

            Msg::push(Msg::ERROR,'パスワードを入力してください。');
            $res = false;

        } else {

            if(strlen($val) < 4){
                Msg::push(Msg::ERROR,'パスワードは4桁以上で入力してください。');
                $res = false;
            }

            if(!is_alnum($val)){
                Msg::push(Msg::ERROR,'パスワードは半角英数字で入力してください。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidPwd(){
        return static::validatePwd($this->pwd);
    }

    // ニックネームのバリデーションチェック
    public static function validateNickname($val){
        $res = true;

        if(empty($val)){
            Msg::push(Msg::ERROR,'ニックネームを入力してください。');
            $res = false;
        } else {
            if(mb_strlen($val) > 10){
                Msg::push(Msg::ERROR,'ニックネームは10文字以下で入力してください。');
                $res = false;
            }

            if(!is_alnum($val)){
                Msg::push(Msg::ERROR,'ニックネームは半角英数字で入力してください。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidNickname(){
        return static::validateNickname($this->nickname);
    }
}