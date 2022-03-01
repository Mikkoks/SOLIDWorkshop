<?php
class EUOrder implements OrderInterface {
	private ValidatorInterface $validator;
	
    public function prepare() {
        if ($this->validator->isValid === false)
        {
	        throw new Exception();
        }
    }
    public function process(): bool
    {return true;}
}

class UKOrder implements OrderInterface {
	private ValidatorInterface $validator;
	
    public function prepare() {
        if ($this->validator->isValid === false)
        {
	        throw new OrderTooHeavyException();
        }
    }
    public function process(): void
    {
        $this->sendOrderDataToWarehouse();
    }
}
