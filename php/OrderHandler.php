<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 08.11.17
 * Time: 12:53
 */

namespace php;


class OrderHandler {

    /**
     * OrderHandler constructor.
     */
    public function __construct () {
    }

    public function placeOrder (Order $order) {
        $shareAsks = $this->getBidsForOrder($order);

        if (!$shareAsks) {
            return false;
        }

        return true;
    }

    /**
     * @param Share $share
     *
     * @return Order[]
     */
    public function getBidsForOrder (Order $order): array {
        /** @var Order[] $bids */
        $bids = [new Order(3, 6, new Share('blubb', 34.3))];

        /** @var Order[] $asks */
        $asks = [new Order(3, 9, new Share('blubb', 34.3))];

        foreach ($asks as $ask) {
            $tmpBids = $bids;

            foreach ($tmpBids as $bid) {
                if ($ask->getAmount() <= 0) {
                    break;
                }

                if ($bid->getAmount() === 0) {
                    continue;
                }

                if ($bid->getPrice() > $ask->getPrice()) {
                    continue;
                }

                if ($bid->getAmount() >= $ask->getAmount()) {
                    $bid->setAmount($bid->getAmount() - $ask->getAmount());
                }

            }
        }

        return [new Order(3, 6, new Share('blubb', 34.3))];
    }

    /**
     * @param Share $share
     *
     * @return []Order
     */
    public function getBidsForShare (Share $share): array {
        return [new Order(3, 6, new Share('blubb', 34.3))];
    }
}