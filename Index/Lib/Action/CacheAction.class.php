<?php
       class CacheAction extends Action{
                           public $vars=array();//储存assign分配的变量
		private $tplFile;//模板文件
		private $compileFile;//编译文件
		private $cacheFile;//缓存文件
		public function run($tpl){
			$tpl = str_replace(".html", '', $tpl).".html";
			$this->tplFile = "./".APP_NAME.'/tpl/'.$tpl;#模板文件
			$this->cacheFile='./tmp/'.APP_NAME.'/'.CONTROL.'/'.ACTION.'/cache/'.md5($this->tplFile);
			$this->compileFile='./tmp/'.APP_NAME.'/'.CONTROL.'/'.ACTION.'/compile/'.md5($this->tplFile);
			if(!is_file($this->tplFile))error("模板文件:".$this->tplFile."不存在");
			if($this->checkCache()){
				include $this->cacheFile;
			}else{
				$this->parse();
				$this->createCache();#创建缓存
				extract($this->vars);
				include $this->compileFile;
			}
		}
		private function createCache(){
			$cacheTime=60;//缓存时间
			if($cacheTime<0){
				return false;
			}
			ob_start();
			extract($this->vars);
			include $this->compileFile;
			$content = ob_get_clean();
			$cacheDir = dirname($this->cacheFile);
			is_dir($cacheDir) || mkdir($cacheDir,0777,true);
			file_put_contents($this->cacheFile, $content);
		}
		#验证缓存文件
		private function checkCache(){
			$cacheTime=C("tpl_cache_time");//缓存时间
			if(!file_exists($this->cacheFile) || $cacheTime<0){
				return false;
			}
			if($cacheTime==0){#持久缓存
				return true;
			}
			#指定缓存时间
			if($cacheTime>0 && filemtime($this->cacheFile)+$cacheTime>time()){
				return true;
			}
		}
		private function parse(){
			if(filemtime($this->tplFile)<filemtime($this->compileFile)){
				return;
			}
			$content = file_get_contents($this->tplFile);
			$preg  = '/'.C("tpl_left").'\$(.*?)'.C("tpl_right").'/is';
			$content = preg_replace($preg,'<?php echo $\1;?>', $content);
			$compileDir = dirname($this->compileFile);//编译目录
			is_dir($compileDir) || mkdir($compileDir,0777,true);
			file_put_contents($this->compileFile, $content);
		}
       }

?>