<?php
namespace Befeni;

class Connect 
{
    public static function mysqlConnect()
    {
        $servername = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $db = env('DB_NAME');
    
        // Create connection
        $con = mysqli_connect($servername, $username, $password,$db);
    
        // Check connection
        if (!$con) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $con;
    }

    public static function redisConnect()
    {
        $redis = new Redis();
        $redis->connect(env('REDIS_HOST'), env('REDIS_PORT'));
        $redis->auth(env('REDIS_PASSWORD'));
    }
}
?>