<?php
	class Parser {
		private $_tpl;

		public function __construct($_tplFile) {
			if(!$this->_tpl=file_get_contents($_tplFile))
				exit('ERROR:template file r/w error');
		}

		private function parVar() {
			$_pattern='/\{\$([\w]+)\}/';
			if(preg_match($_pattern, $this->_tpl))
				$this->_tpl=preg_replace($_pattern, "<?=\$this->_vars['$1']?>", $this->_tpl);
		}

		private function parIf() {
			$_patternIf='/\{if\s+\$([\w]+)\}/';
			$_patternEndIf='/\{\/if\}/';
			$_patternElse='/\{else\}/';

			if(preg_match($_patternIf, $this->_tpl)) {
				if(preg_match($_patternEndIf, $this->_tpl)) {
					$this->_tpl=preg_replace($_patternIf, "<?php if(\$this->_vars['$1']) { ?>", $this->_tpl);
					$this->_tpl=preg_replace($_patternEndIf, "<?php } ?>", $this->_tpl);
					if(preg_match($_patternElse, $this->_tpl))
						$this->_tpl=preg_replace($_patternElse, "<?php } else { ?>", $this->_tpl);
				}
				else
					echo 'ERROR: if statement no ending';
			}
		}

		private function parIff() {
			$_patternIf='/\{iff\s+\@([\w\-\>]+)\}/';
			$_patternEndIf='/\{\/iff\}/';
			$_patternElse='/\{else\}/';

			if(preg_match($_patternIf, $this->_tpl)) {
				if(preg_match($_patternEndIf, $this->_tpl)) {
					$this->_tpl=preg_replace($_patternIf, "<?php if(\$$1) { ?>", $this->_tpl);
					$this->_tpl=preg_replace($_patternEndIf, "<?php } ?>", $this->_tpl);
					if(preg_match($_patternElse, $this->_tpl))
						$this->_tpl=preg_replace($_patternElse, "<?php } else { ?>", $this->_tpl);
				}
				else
					echo 'ERROR: if statement no ending';
			}
		}

		private function parForeach() {
			$_patternForeach='/\{foreach\s+\$([\w]+)\(([\w]+), ([\w]+)\)\}/';
			$_patternEndForeach='/\{\/foreach\}/';
			$_patternVar='/\{@([\w]+)([\w\-\>\+]*)\}/';

			if(preg_match($_patternForeach, $this->_tpl)) {
				if(preg_match($_patternEndForeach, $this->_tpl)) {
					$this->_tpl=preg_replace($_patternForeach, "<?php foreach(\$this->_vars['$1'] as \$$2=>\$$3) { ?>", $this->_tpl);
					$this->_tpl=preg_replace($_patternEndForeach, "<?php } ?>", $this->_tpl);
					if(preg_match($_patternVar, $this->_tpl)) {
						$this->_tpl=preg_replace($_patternVar, "<?php echo \$$1$2 ?>", $this->_tpl);
					}
				}
				else
					echo 'ERROR: foreach statement no ending';
			}
		}

		private function parFor() {
			$_patternFor='/\{for\s+\@([\w\-\>]+)\(([\w]+), ([\w]+)\)\}/';
			$_patternEndFor='/\{\/for\}/';
			$_patternVar='/\{@([\w]+)([\w\-\>\+]*)\}/';

			if(preg_match($_patternFor, $this->_tpl)) {
				if(preg_match($_patternEndFor, $this->_tpl)) {
					$this->_tpl=preg_replace($_patternFor, "<?php foreach(\$$1 as \$$2=>\$$3) { ?>", $this->_tpl);
					$this->_tpl=preg_replace($_patternEndFor, "<?php } ?>", $this->_tpl);
					if(preg_match($_patternVar, $this->_tpl)) {
						$this->_tpl=preg_replace($_patternVar, "<?php echo \$$1$2 ?>", $this->_tpl);
					}
				}
				else
					echo 'ERROR: for statement no ending';
			}
		}

		private function parInclude() {
			$_pattern='/\{include\s+file=(\"|\')([\w\.\-\/]+)(\"|\')\}/';
			if(preg_match_all($_pattern, $this->_tpl, $_file)) {
				foreach($_file[2] as $_value) {
					if(!file_exists('templates/'.$_value)) exit('ERROR: wrong include file');
					$this->_tpl=preg_replace($_pattern, "<?php \$_tpl->create('$2') ?>", $this->_tpl);
				}
			}
		}

		private function parCommon() {
			$_pattern='/\{#\}(.*)\{#\}/';

			if(preg_match($_pattern, $this->_tpl)) {
				$this->_tpl=preg_replace($_pattern, "<?php /*$1*/ ?>", $this->_tpl);
			}
		}

		private function parConfig() {
			$_pattern='/<!--\{([\w]+)\}-->/';
			if(preg_match($_pattern, $this->_tpl)) {
				$this->_tpl=preg_replace($_pattern, "<?php echo \$this->_config['$1']; ?>", $this->_tpl);
			}
		}

		public function compile($_parFile) {
			$this->parVar();
			$this->parIf();
			$this->parIff();
			$this->parCommon();
			$this->parForeach();
			$this->parFor();
			$this->parInclude();
			$this->parConfig();

			if(!file_put_contents($_parFile, $this->_tpl))
				exit('ERROR:compile file error');
		}
	}
?>
