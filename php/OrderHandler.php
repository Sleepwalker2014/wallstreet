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
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * OrderHandler constructor.
     *
     * @param OrderRepository $orderRepository
     */
    public function __construct (OrderRepository $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param Share $share
     *
     * @return Order[]
     */
    public function getBidsForOrder () {
        /** @var Order[] $completedOrders */
        $completedOrders = [];

        $shareOrders = $this->orderRepository->getOrdersForShare(new Share('böah',3));

        /** @var Order[] $bids */
        $bids = $shareOrders['bid'];

        /** @var Order[] $asks */
        $asks = $shareOrders['ask'];

        $bidAmounts = [];

        foreach ($asks as $ask) {
            $tmpBids = $bids;

            foreach ($tmpBids as $bid) {
                if (!isset($bidAmounts[$bid->getOrder()])) {
                    $bidAmounts[$bid->getOrder()] = $bid->getAmount();
                }

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

        if (isset($completedOrders[0])) {
            echo $currentCourse = $completedOrders[0]->getPrice();
        }

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