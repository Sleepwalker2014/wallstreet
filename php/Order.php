<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 08.11.17
 * Time: 13:08
 */

namespace php;

class Order {
    const ASK = 'ASK';
    const BID = 'BID';

    /**
     * @var int
     */
    private $amount;
    /**
     * @var int
     */
    private $price;
    /**
     * @var Share
     */
    private $share;

    private $type;
    private $order;

    /**
     * Order constructor.
     *
     * @param       $order
     * @param int   $amount
     * @param int   $price
     * @param Share $share
     * @param       $type
     */
    public function __construct ($order, $amount, $price, $share, $type) {
        $this->amount = $amount;
        $this->price = $price;
        $this->share = $share;
        $this->type = $type;
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getOrder () {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder ($order) {
        $this->order = $order;
    }

    /**
     * @param int $amount
     */
    public function setAmount ($amount) {
        $this->amount = $amount;
    }

    /**
     * @param int $price
     */
    public function setPrice ($price) {
        $this->price = $price;
    }

    /**
     * @param Share $share
     */
    public function setShare (Share $share) {
        $this->share = $share;
    }

    /**
     * @return int
     */
    public function getAmount () {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getPrice () {
        return $this->price;
    }

    /**
     * @return Share
     */
    public function getShare () {
        return $this->share;
    }
}