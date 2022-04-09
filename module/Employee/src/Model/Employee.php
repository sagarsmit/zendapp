<?php  
namespace Employee\Model;  

// Add these import statements 
use Zend\InputFilter\InputFilter; 
use Zend\InputFilter\InputFilterAwareInterface; 
use Zend\InputFilter\InputFilterInterface;  

class Employee implements InputFilterAwareInterface { 
	public $employee_id; 
	public $employee_name; 
	public $address;
	public $email_address;
	public $phone;
	public $date_of_birth;
	public $employee_image;	
	protected $inputFilter;                         
	public function exchangeArray($data) { 
		$this->employee_id = (isset($data['employee_id'])) ? $data['employee_id'] : null;         
		$this->employee_name = (isset($data['employee_name'])) ? $data['employee_name'] : null;         
		$this->address = (isset($data['address']))  ? $data['address'] : null;
		$this->email_address = (isset($data['email_address']))  ? $data['email_address'] : null;
		$this->phone = (isset($data['phone']))  ? $data['phone'] : null;
		$this->date_of_birth = (isset($data['date_of_birth']))  ? $data['date_of_birth'] : null;
		$this->employee_image = (isset($data['employee_image']))  ? $data['employee_image'] : null;	  
   }
    
   // Add content to these methods:
   public function setInputFilter(InputFilterInterface $inputFilter) { 
      throw new \Exception("Not used"); 
   }  
   public function getInputFilter() { 
      if (!$this->inputFilter) { 
         $inputFilter = new InputFilter();  
         $inputFilter->add(array( 
            'name' => 'employee_id', 
            'required' => true, 
            'filters' => array( 
               array('name' => 'Int'), 
            ), 
         ));  
         $inputFilter->add(array( 
            'name' => 'employee_name', 
            'required' => true, 
            'filters' => array( 
               array('name' => 'StripTags'), 
               array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
               array('name' => 'StringLength', 
                        'options' => array( 
                           'encoding' => 'UTF-8', 
                           'min' => 1, 
                           'max' => 50, 
                        ), 
                    ), 
                ), 
            ));
         $inputFilter->add(array( 
            'name' => 'address', 
            'required' => true, 
            'filters' => array( 
               array('name' => 'StripTags'),  
               array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
               array('name' => 'StringLength', 
                  'options' => array( 
                     'encoding' => 'UTF-8', 
                     'min' => 1, 
                     'max' => 50, 
                  ), 
                  ), 
               ), 
         ));
		$inputFilter->add(array( 
            'name' => 'phone', 
            'required' => true, 
            'filters' => array( 
               array('name' => 'StripTags'),  
               array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
               array('name' => 'StringLength', 
                  'options' => array( 
                     'encoding' => 'UTF-8', 
                     'min' => 10, 
                     'max' => 10, 
                  ), 
                  ), 
               ), 
         ));		 
         $this->inputFilter = $inputFilter; 
      } 
      return $this->inputFilter; 
   }
	public function getArrayCopy() { 
	   return get_object_vars($this); 
	}   
}