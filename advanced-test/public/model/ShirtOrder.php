<?php

namespace Befeni\Model;
require_once getcwd() . '/database/Connect.php';

/**
 * A test Shirt Order model
 */

class ShirtOrder 
{
    
    /**
     * The id of the shirt order
     *
     * @var integer
     */
    public $id;

    /**
     * The id of the customer
     *
     * @var integer
     */
    public $customerId;
     
    /**
     * The id of the fabric
     *
     * @var integer
     */
    public $fabricId;
    
    /**
     * The size of the customer's collar in inches
     *
     * @var integer
     */
    public $collarSize;

    /**
     * The size of the customer's chest in inches
     *
     * @var integer
     */
    public $chestSize;

    /**
     * The size of the customer's waist in inches
     *
     * @var integer
     */
    public $waistSize;

    /**
     * The size of the customer's wrist in inches
     *
     * @var integer
     */
    public $wristSize;

    public function redis()
    {
        $key = 'shirtOrder';

        if (!$redis->get($key)) 
        {
            $source = 'MySQL Server';
            // $database_name     = 'test_store';
            // $database_user     = 'test_user';
            // $database_password = 'PASSWORD';
            // $mysql_host        = 'localhost';

            // $pdo = new PDO('mysql:host=' . $mysql_host . '; dbname=' . $database_name, $database_user, $database_password);
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            Connect::mysqlConnect();
            $sql  = "SELECT * FROM products";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
            }

            $redis->set($key, serialize($products));
            $redis->expire($key, 10);

        } else {
            $source = 'Redis Server';
            $products = unserialize($redis->get($key));

        }

        echo $source . ': <br>';
        print_r($products);
    }

}