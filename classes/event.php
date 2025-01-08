<?php

class Event
{

    protected $title ;
    protected $date;
    protected $availableSeats;
    protected $reservations =[];


    public function __construct($title, $date, $availableSeats,$reservations){

        $this->title = $title;
        $this->date = $date;
        $this->availableSeats = $availableSeats;
        $this->reservations = $reservations;
    }
    public function reserveSeat($userId){
        if ($this->availableSeats >0){
                array_push($reservations,$userId);
                $this->availableSeats -- ;
        }else{
                echo "there is no Place left";
            }
        }

    
    public function __toString() {
                return "Event Title: $this->title\n
                        Event Date: $this->date->format(Y-m-d)\n 
                        Event Remaining seats: $this->availableSeats\n
                        Event Guests: $this->reservations";
            }
     
    }
 

class PremiumEvent extends Event {
    protected $price ;

    public function __construct($title, $date, $availableSeats,$reservations,$price){

        parent::construct($title, $date, $availableSeats,$reservations);
        $this->price = $price;
    }


    public function reserveSeat($userId,$price){
        if ($this->availableSeats >0){
                array_push($reservations,$userId);
                echo "You have reserved you premium ticket with success, and the Price is: $this->price";
                $this->availableSeats -- ;
        }else{
                echo "there is no Place left";
            }

            $result = 
        }

        public function __toString() {
            return "Event Title: $this->title\n
                    Event Date: $this->date->format(Y-m-d)\n 
                    Event Remaining seats: $this->availableSeats\n
                    Event Premium price: $this->price\n
                    Event Guests:" .print_r($this->reservations);
        }

        public function __call($name,$args) {
            if(count($args)==1){
                parent::reserveSeat();
            }
        }

}

















  $toby = new cat;
        print $toby;