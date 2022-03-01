<?php

namespace MyShop\Orders;

class OrderService
{   
    public function order(Product $product, int $quantity, Customer $customer): OrderResult
    {
       $this->logger->info($product, $quantity, $customer);

       try {
            $this->orderValidator->validate($product, $quantity, $customer);
            $this->orderProcessor->process($product, $quantity, $customer);
       } 
       catch (OrderValidatorException $e) {
            return new ValidationFailedOrderResult($e);
       } 
       catch (Exception $e) {
            return new FailedOrderResult($e);
       }
       finally {
           return new SuccessOrderResult($product, $quantity, $customer);
       }
    }
}

interface ProductInterface {
    public function getOrderLimit(): ?int;
}

class Product implements ProductInterface {

}

class Customer implements CustomerInterface {

}

class OrderProcessor {
    public function process($product, $quantity, $customer)
    {
        $this->sendOrderDataToWarehouse();
        $this->checkLiquidity();
        $this->calculateTaxes();
        $this->sendInvoice();
    }
}