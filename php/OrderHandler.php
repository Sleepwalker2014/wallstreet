<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 08.11.17
 * Time: 12:53
 */

namespace php;


/**
 * Class OrderHandler
 * @package php
 */
class OrderHandler {

    /**
     * OrderHandler constructor.
     */
    public function __construct () {
$this->getBidsForOrder();
    }

    /**
     * @param Share $share
     *
     * @return Order[]
     */
    public function getBidsForOrder () {
        /** @var Order[] $completedOrders */
        $completedOrders = [];

        /** @var Order[] $bids */
        $bids = [new Order(10, 8, new Share('blubb', 34.3)), new Order(3, 8, new Share('blubb', 34.3))];

        /** @var Order[] $asks */
        $asks = [new Order(9, 7, new Share('blubb', 34.3)), new Order(4, 20, new Share('blubb', 34.3))];

        foreach ($asks as $ask) {
            $tmpBids = $bids;

            foreach ($tmpBids as $bid) {
                if ($bid->getAmount() === 0 ||
                    ($bid->getPrice() > $ask->getPrice())) {

                    continue;
                }

                if ($bid->getAmount() > $ask->getAmount()) {
                    $bid->setAmount($bid->getAmount() - $ask->getAmount());
                    $ask->setAmount(0);
                } else {
                    $ask->setAmount($ask->getAmount() - $bid->getAmount());
                    $bid->setAmount(0);
                }

                if ($ask->getAmount() === 0) {
                    $bids = $tmpBids;
                    $completedOrders[] = $ask;

                    break;
                }
            }
        }

        $currentCourse = $completedOrders[0]->getPrice();

        return $completedOrders;
    }

    /**
     * @param Share $share
     *
     * @return []Order
     */
    public function getBidsForShare (Share $share) {
        return [new Order(3, 6, new Share('blubb', 34.3))];
    }

    // orders die komplett ausgeführt wurden und gegenparts dazzu ermitteln
}