<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 08.11.17
 * Time: 13:08
 */

namespace php;


class Order {
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

    /**
     * Order constructor.
     *
     * @param int   $amount
     * @param int   $price
     * @param Share $share
     */
    public function __construct (int $amount, int $price, Share $share) {
        $this->amount = $amount;
        $this->price = $price;
        $this->share = $share;
    }

    /**
     * @param int $amount
     */
    public function setAmount (int $amount) {
        $this->amount = $amount;
    }

    /**
     * @param int $price
     */
    public function setPrice (int $price) {
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
    public function getAmount (): int {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getPrice (): int {
        return $this->price;
    }

    /**
     * @return Share
     */
    public function getShare (): Share {
        return $this->share;
    }
}