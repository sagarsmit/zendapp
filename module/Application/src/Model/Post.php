<?php
	namespace Application\Model;
	
	class Post
	{
		protected $id;
		protected $title;
		protected $description;
		protected $category;
		
		public function getId() {
			return $this->id;
		}
		
		public function getTitle() {
			return $this->title;
		}
		
		public function getDescription() {
			return $this->description;
		}
		
		public function getCategory() {
			return $this->category;
		}
	}

?>