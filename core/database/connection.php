<?php


class Connection{

    public static function make($config){
        try{
            // return new PDO('mysql:host=localhost;dbname=practice','root','');
            return new PDO(
                $config['CONNECTION'].';dbname='.$config['DB_NAME'],
                $config['USER_NAME'],
                $config['PASSWORD'],
                $config['OPTIONS']
            );

        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

}