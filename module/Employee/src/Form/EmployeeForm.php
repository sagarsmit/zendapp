<?php  
namespace Employee\Form; 
use Zend\Form\Form;  

class EmployeeForm extends Form { 
   public function __construct($name = null) {
       
      parent::__construct('employee');  
      $this->add(array( 
         'name' => 'employee_id', 
         'type' => 'Hidden', 
      )); 
      $this->add(array( 
         'name' => 'employee_name', 
         'type' => 'Text', 
         'options' => array( 
            'label' => 'Employee Name', 
         ), 
      )); 
      $this->add(array( 
         'name' => 'address', 
         'type' => 'Text', 
         'options' => array( 
            'label' => 'Address', 
         ), 
      ));
	$this->add(array( 
         'name' => 'email_address', 
         'type' => 'Email', 
         'options' => array( 
            'label' => 'Email Address', 
         ), 
      ));
	$this->add(array(
         'name' => 'phone', 
         'type' => 'Number', 
         'options' => array( 
            'label' => 'Phone',
         ),
      ));
	$this->add(array( 
         'name' => 'date_of_birth', 
         'type' => 'Date', 
         'options' => array( 
            'label' => 'Date of Birth',
         ),
		 'attributes' => array(
            'max' => Date("Y-m-d"),	 
         ),
         
      ));
	$this->add(array( 
         'name' => 'employee_image', 
         'type' => 'File', 
         'options' => array( 
            'label' => 'Employee Image', 
         ), 
      ));	  
      $this->add(array( 
         'name' => 'submit', 
         'type' => 'Submit', 
         'attributes' => array(
            'value' => 'Go', 
            'id' => 'submitbutton', 
         ), 
      )); 
   } 
}  