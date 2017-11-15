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

        $shareOrders = $this->orderRepository->getOrdersForShare(new Share('böah', 3));

        /** @var Order[] $bids */
        $bids = $shareOrders['bid'];

        /** @var Order[] $asks */
        $asks = $shareOrders['ask'];

        foreach ($asks as $ask) {
            $bidAmounts = [];

            foreach ($bids as $bid) {
                if (!isset($bidAmounts[$bid->getOrder()])) {
                    $bidAmounts[$bid->getOrder()] = $bid->getAmount();
                }

                if ($bidAmounts[$bid->getOrder()] === 0 ||
                    ($bid->getPrice() > $ask->getPrice())) {

                    continue;
                }

                if ($bidAmounts[$bid->getOrder()] > $ask->getAmount()) {
                    $bidAmounts[$bid->getOrder()] = $bidAmounts[$bid->getOrder()] - $ask->getAmount();
                    $ask->setAmount(0);
                } else {
                    $ask->setAmount($ask->getAmount() - $bidAmounts[$bid->getOrder()]);
                    $bidAmounts[$bid->getOrder()] = 0;
                }

                if ($ask->getAmount() === 0) {
                    $completedOrders[] = $ask;

                    break;
                }
            }

            if ($ask->getAmount() === 0) {
                foreach ($bids as $bid) {
                    $bid->setAmount($bidAmounts[$bid->getOrder()]);
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
    public
    function getBidsForShare (Share $share) {
        return [new Order(3, 6, new Share('blubb', 34.3))];
    }
// orders die komplett ausgeführt wurden und gegenparts dazzu ermitteln
}