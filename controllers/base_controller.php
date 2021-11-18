<?php
 	class BaseController
	 {
	 	protected $folder;
		public function render($file,$data = array())
		{
			$view = 'views/'.$this->folder.'/'.$file.'.php';
			if(is_file($view))
			{
				extract($data);
				ob_start();
				require_once($view);
				$content = ob_get_clean();
				require_once ("views/layouts/template.php");

			}
			else
			{
				header("location:index.php?controller=home&action=index");
			}
		}
	 }
?>