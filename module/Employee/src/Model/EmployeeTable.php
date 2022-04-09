<?php  
namespace Employee\Model;  
use Zend\Db\TableGateway\TableGatewayInterface;  
class EmployeeTable { 
	protected $tableGateway; 
	public function __construct(TableGatewayInterface $tableGateway) { 
      $this->tableGateway = $tableGateway; 
	}
	public function fetchAll() {
      $resultSet = $this->tableGateway->select();  
      return $resultSet; 
	}
	public function getEmployee($id) {
	   $id  = (int) $id; 
	   $rowset = $this->tableGateway->select(array('employee_id' => $id)); 
	   $row = $rowset->current();  
	   if (!$row) { 
		  throw new \Exception("Could not find row $id"); 
	   }
	   return $row; 
	}  
	public function saveEmployee(Employee $employee,$file) {
	   $data = array (  
			'employee_id' => $employee->employee_id, 
			'employee_name'  => $employee->employee_name,
			'address'  => $employee->address,
			'email_address'  => $employee->email_address,
			'phone'  => $employee->phone,
			'date_of_birth'  => $employee->date_of_birth,
			'employee_image'  => $file != '' ? $file : $employee->employee_image,		  
	   );  
	   $id = (int) $employee->employee_id; 
	   if ($id == 0) { 
		  $this->tableGateway->insert($data); 
	   } else { 
		  if ($this->getEmployee($id)) { 
			 $this->tableGateway->update($data, array('employee_id' => $id)); 
		  } else { 
			 throw new \Exception('Employee id does not exist'); 
		  } 
	   } 
	}
	public function deleteEmployee($id) { 
	   $this->tableGateway->delete(['employee_id' => (int) $id]); 
	}
}  