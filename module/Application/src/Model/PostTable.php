<?php
	namespace Application\Model;
	
	use Zend\Db\TableGateway\TableGatewayInterface;
	
	class PostTable 
	{
		protected $tableGateway;
		
		function _construct(TableGatewayInterface $tableGateway)
		{
			$this->tableGateway = $tableGateway;
		}
		
		public function fetchAll(){
			return $this->tableGateway->select();
		}
	}
	
?>