<?php
namespace Template;
final class Basic {
	private $data = array();
	
	public function set($key, $value) {
		$this->data[$key] = $value;
	}
	
	public function render($template) {
		$file = DIR_TEMPLATE . $template;
		$file2 = str_replace("theme/default/template", "theme", $file);

		if (file_exists($file)) {
			extract($this->data);

			ob_start();

			require(\VQMod::modCheck(modification($file), $file));

			$output = ob_get_contents();

			ob_end_clean();

			return $output;
		} else if (file_exists($file2)) {
			extract($this->data);

			ob_start();

			require(\VQMod::modCheck(modification($file2), $file2));

			$output = ob_get_contents();

			ob_end_clean();

			return $output;
		} else {
			trigger_error('Error: Could not load template ' . $file . '!');
			exit();
		}
	}	
}