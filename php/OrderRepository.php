<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 09.11.17
 * Time: 15:04
 */

namespace php;


use mysqli;

class OrderRepository {
    /**
     * @var mysqli
     */
    private $db;

    /**
     * OrderRepository constructor.
     *
     * @param mysqli $db
     */
    public function __construct (mysqli $db) {
        $this->db = $db;
    }

    public function getOrdersForShare (share $share) {
        $orders = [];

        $sql = 'SELECT * 
                FROM `orders` 
                ORDER BY (amount * `limit`) DESC;';

        $result = $this->db->query($sql);

        while ($order = $result->fetch_assoc()) {
            $orders[$order['type']][] = new Order($order['order'],
                                                  $order['amount'],
                                                  $order['limit'],
                                                  new Share('muh', 3.4), $order['type']);
        }

        return $orders;
    }
}