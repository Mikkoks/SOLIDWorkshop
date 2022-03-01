<?php 
class OrderProcessor
{
	private OrderInterface $order;
	public function __construct(OrderInterface $order) 
    {
	    $this->order = $order;
    }

    public function Process(): void
    {
        $this->order->prepare();
        $this->order->process();
        $this->order->finalize();
    }
}

interface OrderInterface
{
    public function prepare();
    public function process();
    public function finalize();
}

class EUOrder implements OrderInterface
{
    //prepare() { … }
}
Class UKOrder implements OrderInterface {
	//prepare() { … }
}
