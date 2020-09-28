<?php

class Form {

     private $datas = [];

     public function __construct($datas = []) {
          $this->datas = $datas;
     }

     private function input($type, $name, $label, $valueIn) {

          $value = $valueIn;
          if(isset($this->datas[$name])) {
               $value = $this->datas[$name];
          }

          if($type == 'textarea') {
               $input = "<textarea required name=\"$name\" class=\"form-control \" id=\"input$name\" rows=\"7\">$value</textarea>";
          } else {
               $input = "<input required type=\"$type\" name=\"$name\" class=\"form-control\" id=\"input$name\" value=\"$value\"/>";
          }

          return 
          "<div class=\"form-group\">
               <label for=\"input$name\">$label</label>
               $input
          </div>"; 
     }

     public function password($name, $label, $valueIN){
          return $this->input('password', $name, $label, $valueIN);
     }

     public function confirmPassword($name, $label, $valueIN){
          return $this->input('password', $name, $label, $valueIN);
     }

     public function text($name, $label, $valueIN) {
          return $this->input('text',$name, $label, $valueIN);
     }

     public function email($name, $label, $valueIN) {
          return $this->input('email',$name, $label, $valueIN);
     }

     public function textarea($name, $label, $valueIN) {
          return $this->input('textarea',$name, $label, $valueIN);
     }

     public function number($name, $label, $valueIN){
          return $this->input('number', $name, $label, $valueIN);
     }
}